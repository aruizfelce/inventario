new Vue({
    el:'main',
    data: {
        subgrupoCodigo:'',
        subgrupoDescripcion:'',
        grupo:'',
        subgrupos:[],
        grupoDesc:[],
        idGrup:[],
        idDisc:'',
        disciplinaDesc:[],
        subgrupoModal:{},
        subgrupos:[],
        NUM_RESULTS: 5, // Numero de resultados por página
        pag: 1, // Página inicial
        textobuscar:''
    },
    created: function(){
       let paths = window.location.pathname.split('/');
       this.grupo = paths[paths.length-1]; 
       this.cargarsubgrupos(this.grupo);
       this.buscarGrupo(this.grupo);
    },
   
    mounted:function() {
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
          });
    },
    methods: {
        
        eliminar:function(subgrupo){
            if(confirm("Desea eliminar a " + subgrupo.subgrupoDescripcion + "?")){
                url= 'http://localhost/inventario/tablas/subgrupos/eliminar';
                param = new FormData();
                param.append("idSubgrupo",subgrupo.idSubgrupo);
                axios.post(url,param)
                 .then(res=>{
                     o = res.data;
                     M.toast({html:o.value});
                     this.cargarsubgrupos(this.grupo);
                 })
                 .catch(error=>{
                     console.log(error);
                 });
            }
        },
        buscarGrupo:function(id){
            url= 'http://localhost/inventario/tablas/subgrupos/buscargrupo';
            param = new FormData();
            
            param.append("grupo",id);
            axios.post(url,param)
                 .then(res=>{
                    this.grupoDesc=res.data['grupoDescripcion'];
                    this.disciplinaDesc=res.data['disciplinaDescripcion'];
                    this.idGrup=res.data['idGrupo'];
                    this.idDisc=res.data['disciplina'];
                 })
                 .catch(error=>{
                     console.log(error);
                 });
        },
        insertar:function(){
            url= 'http://localhost/inventario/tablas/subgrupos/insertar';
            param = new FormData();
            param.append("subgrupoCodigo",this.subgrupoCodigo);
            param.append("subgrupoDescripcion",this.subgrupoDescripcion);
            param.append("grupo",this.grupo);
            axios.post(url,param)
                 .then(res=>{
                     o = res.data;
                     M.toast({html:o.value});
                     this.cargarsubgrupos(this.grupo);
                     this.subgrupoCodigo='';
                     this.subgrupoDescripcion='';
                     var elem = document.querySelectorAll('.modal');
                     var instance = M.Modal.getInstance(elem);
                     instance.close();
                 })
                 .catch(error=>{
                     console.log(error);
                 });
        },
      cargaModal:function(c)  {
        this.subgrupoModal=c;
        var elem = document.querySelector('.modal');
        var instance = M.Modal.getInstance(elem);
        instance.open();
      },
      actualizar:function(){
        url= 'http://localhost/inventario/tablas/subgrupos/actualizar';
        param = new FormData();
        param.append("idSubgrupo",this.subgrupoModal.idSubgrupo);
        param.append("subgrupoCodigo",this.subgrupoModal.subgrupoCodigo);
        param.append("subgrupoDescripcion",this.subgrupoModal.subgrupoDescripcion);
                
        axios.post(url,param)
             .then(res=>{
                 o = res.data;
                 M.toast({html:o.value});
                 var elem = document.querySelector('.modal');
                 var instance = M.Modal.getInstance(elem);
                 instance.close();
                 this.cargarsubgrupos(id);
             })
             .catch(error=>{
                 console.log(error);
             });
      },
      cargarsubgrupos:function(id){
        url= 'http://localhost/inventario/tablas/subgrupos/subgrupos';
        param = new FormData();
        
        param.append("grupo",id);
        axios.post(url,param)
             .then(res=>{
                this.subgrupos=res.data;
             })
             .catch(error=>{
                 console.log(error);
             });
      }
    },
    computed:{
        buscar:function(){
            return this.subgrupos.filter((item) => item.subgrupoDescripcion.toLowerCase().includes(this.textobuscar.toLowerCase()));
        }
    }
});