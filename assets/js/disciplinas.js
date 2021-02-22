new Vue({
    el:'main',
    data: {
        disciplinaCodigo:'',
        disciplinaDescripcion:'',
        disciplinas:[],
        disciplinaModal:{},
        // grupos:[],
        NUM_RESULTS: 5, // Numero de resultados por página
        pag: 1, // Página inicial
        errorDisciplinaCodigo: false,
        errorDisciplinaDescripcion:false,
        textobuscar: ''
    },
    created: function(){
        this.cargardisciplinas();
      
    },
   
    mounted:function() {
      /*   document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
          });
       */    
    },
    methods: {
        cargardisciplinas: function(){
            url= base_url + 'tablas/disciplinas/disciplinas';
            axios.post(url)
                 .then(res=>{
                     this.disciplinas=res.data;
                 })
                 .catch(error=>{
                     console.log(error);
                 });
        },
        eliminar:function(disciplina){
            if(confirm("Desea eliminar a " + disciplina.disciplinaDescripcion + "?")){
                url= base_url + 'tablas/disciplinas/eliminar';
                param = new FormData();
                param.append("idDisciplina",disciplina.idDisciplina);
                axios.post(url,param)
                 .then(res=>{
                     o = res.data;
                     M.toast({html:o.value});
                     this.cargardisciplinas();
                 })
                 .catch(error=>{
                     console.log(error);
                 });
            }
        },
        insertar:function(){
      
            if (this.buscarCodigo==-1) {  
                url= base_url + 'tablas/disciplinas/insertar';
                param = new FormData();
                param.append("disciplinaCodigo",this.disciplinaCodigo);
                param.append("disciplinaDescripcion",this.disciplinaDescripcion);
                axios.post(url,param)
                    .then(res=>{
                        o = res.data;
                        M.toast({html:o.value});
                        this.cargardisciplinas();
                        this.disciplinaCodigo='';
                        this.disciplinaDescripcion='';
                        var elem = document.getElementById("modal2");
                        var instance = M.Modal.getInstance(elem);
                        instance.close();
                    })
                    .catch(error=>{
                        console.log(error);
                    });
            }else{
              alert ("El codigo ya existe");
            }      
        },
      cargaModal:function(c)  {
        this.disciplinaModal=c;
        var elem = document.querySelector('.modal');
        var instance = M.Modal.getInstance(elem);
        instance.open();
      },
      cerrarModal:function()  {
        var elem = document.getElementById("modal2");
        var instance = M.Modal.getInstance(elem);
        instance.close();
        this.disciplinaCodigo='';
        this.disciplinaDescripcion='';
        this.errorDisciplinaCodigo=false;
        this.errorDisciplinaDescripcion=false;
      },
      actualizar:function(){
        url= base_url + 'tablas/disciplinas/actualizar';
        param = new FormData();
        param.append("idDisciplina",this.disciplinaModal.idDisciplina);
        param.append("disciplinaCodigo",this.disciplinaModal.disciplinaCodigo);
        param.append("disciplinaDescripcion",this.disciplinaModal.disciplinaDescripcion);
        axios.post(url,param)
             .then(res=>{
                 o = res.data;
                 M.toast({html:o.value});
                 this.cargardisciplinas();
                 var elem = document.querySelector('.modal');
                 var instance = M.Modal.getInstance(elem);
                 instance.close();
             })
             .catch(error=>{
                 console.log(error);
             });
      }
      
    },
    computed:{
        buscar:function(){
            return this.disciplinas.filter((item) => item.disciplinaDescripcion.toLowerCase().includes(this.textobuscar.toLowerCase()));
        },
        buscarCodigo:function(){
            return this.disciplinas.findIndex(item => item.disciplinaCodigo.toLowerCase() == this.disciplinaCodigo.toLowerCase());
            
        }
    }
});