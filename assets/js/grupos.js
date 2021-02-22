
new Vue({

    el:'main',
    data: {
        grupoCodigo:'',
        grupoDescripcion:'',
        disciplina:'',
        disciplinaDesc:[],
        grupos:[],
        grupoModal:{},
        grupos:[],
        NUM_RESULTS: 5, // Numero de resultados por página
        pag: 1, // Página inicial
        textobuscar:''
    },
    created: function(){
       let paths = window.location.pathname.split('/');
       this.disciplina = paths[paths.length-1]; 
       this.cargargrupos(this.disciplina);
       this.buscarDisciplina(this.disciplina);
    },
   
    mounted:function() {
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
          });
    },
    methods: {
        buscarDisciplina:function(id){
            url= 'http://localhost/inventario/tablas/grupos/buscardisciplina';
            param = new FormData();
            
            param.append("disciplina",id);
            axios.post(url,param)
                 .then(res=>{
                    this.disciplinaDesc=res.data['disciplinaDescripcion'];
                 })
                 .catch(error=>{
                     console.log(error);
                 });
        }, 
        eliminar:function(grupo){
            if(confirm("Desea eliminar a " + grupo.grupoDescripcion + "?")){
                url= 'http://localhost/inventario/tablas/grupos/eliminar';
                param = new FormData();
                param.append("idGrupo",grupo.idGrupo);
                axios.post(url,param)
                 .then(res=>{
                     o = res.data;
                     M.toast({html:o.value});
                     this.cargargrupos(this.disciplina);
                 })
                 .catch(error=>{
                     console.log(error);
                 });
            }
        },
        insertar:function(){
            url= 'http://localhost/inventario/tablas/grupos/insertar';
            param = new FormData();
            param.append("grupoCodigo",this.grupoCodigo);
            param.append("grupoDescripcion",this.grupoDescripcion);
            param.append("disciplina",this.disciplina);
            axios.post(url,param)
                 .then(res=>{
                     o = res.data;
                     M.toast({html:o.value});
                     this.cargargrupos(this.disciplina);
                     this.grupoCodigo='';
                     this.grupoDescripcion='';
                     var elem = document.querySelector('.modal');
                     var instance = M.Modal.getInstance(elem);
                     instance.close();
                 })
                 .catch(error=>{
                     console.log(error);
                 });
        },
      cargaModal:function(c)  {
        this.grupoModal=c;
        var elem = document.querySelector('.modal');
        var instance = M.Modal.getInstance(elem);
        instance.open();
      },
      actualizar:function(){
        url= base_url + 'tablas/grupos/actualizar';
        param = new FormData();
        param.append("idGrupo",this.grupoModal.idGrupo);
        param.append("grupoCodigo",this.grupoModal.grupoCodigo);
        param.append("grupoDescripcion",this.grupoModal.grupoDescripcion);
                
        axios.post(url,param)
             .then(res=>{
                 o = res.data;
                 M.toast({html:o.value});
                 var elem = document.querySelector('.modal');
                 var instance = M.Modal.getInstance(elem);
                 instance.close();
                 this.cargargrupos(id);
             })
             .catch(error=>{
                 console.log(error);
             });
      },
      cargargrupos:function(id){
        url=  base_url + '/tablas/grupos/grupos';
        param = new FormData();
        
        param.append("disciplina",id);
        axios.post(url,param)
             .then(res=>{
                this.grupos=res.data;
             })
             .catch(error=>{
                 console.log(error);
             });
      }
    },
    computed:{
        buscar:function(){
            return this.grupos.filter((item) => item.grupoDescripcion.toLowerCase().includes(this.textobuscar.toLowerCase()));
        }
    }
});