//http://localhost/agenda/productos
//http://localhost/agenda/insertar
//http://localhost/agenda/actualizar
//http://localhost/agenda/eliminar

new Vue({
    el:'main',
    data: {
        productoCodigo:'',
        productoDescripcion:'',
        ubicacion:'',
        precio:0,
        precioMayor:0,
        fechaPrecio:'',
        productoFoto:'',
        unidad:'',
        unidadPieza:'',
        piezas:1,
        unidadPieza:'',
        subgrupo:'',
        grupoDesc:'',
        disciplinaDesc:'',
        idGrup:'',
        idDisc:'',
        idSubg:'',
        subgrupoDesc:'',
        codigoProd:'',
        cantidadProductos:1,
        file:'',
        productos:[],
        productoModal:{},
        productos:[],
        urlImagen:null,
        productoBuscar:'',
        NUM_RESULTS: 5, // Numero de resultados por página
        pag: 1, // Página inicial
        textobuscar:''
    },
    created: function(){
       let paths = window.location.pathname.split('/');
       this.subgrupo = paths[paths.length-1]; 
       this.contarproductos(this.subgrupo);
       this.cargarproductos(this.subgrupo);
       this.buscarsubgrupo(this.subgrupo);
       
    },
   
    mounted:function() {
          /* document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
            
          });  */
    },
    methods: {
        
        eliminar:function(producto){
            
            if(confirm("Desea eliminar a " + producto.productoDescripcion + "?")){
                url= 'http://localhost/inventario/tablas/productos/eliminar';
                param = new FormData();
                param.append("id",producto.idProducto);
                axios.post(url,param)
                 .then(res=>{
                     o = res.data;
                     M.toast({html:o.value});
                     this.cargarproductos(this.subgrupo);
                 })
                 .catch(error=>{
                     console.log(error);
                 });
            }
        },
        buscarsubgrupo:function(id){
            url= 'http://localhost/inventario/tablas/productos/buscarsubgrupo';
            param = new FormData();
            
            param.append("subgrupo",id);
            axios.post(url,param)
                 .then(res=>{
                    this.grupoDesc=res.data['grupoDescripcion'];
                    this.disciplinaDesc=res.data['disciplinaDescripcion'];
                    this.idGrup=res.data['idGrupo'];
                    this.idDisc=res.data['disciplina'];
                    this.idSubg=res.data['idSubgrupo'];
                    this.subgrupoDesc=res.data['subgrupoDescripcion'];
                    var numero = this.cantidadProductos.toString();
                    resultado = numero.padStart(4, "0");
                    this.productoCodigo=res.data['disciplinaCodigo'] + res.data['grupoCodigo'] + res.data['subgrupoCodigo'] + resultado;
                 })
                 .catch(error=>{
                     console.log(error);
                 });
        },
        onChangeFileUpload(){
            this.file = this.$refs.file.files[0];
            this.urlImagen = URL.createObjectURL(this.file);    
        },
        
        insertar:function(){
            let formData = new FormData();
            formData.append('file', this.file);
            formData.append('codigo', this.productoCodigo);
  
            axios.post('http://localhost/inventario/tablas/productos/subirimagen',
                formData,
                {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
              }
            ).then(function(data){
              console.log(data.data);
            })
            .catch(function(){
              console.log('FAILURE!!');
            });

            url= 'http://localhost/inventario/tablas/productos/insertar';
            param = new FormData();
            
            param.append("productoCodigo",this.productoCodigo);
            param.append("productoDescripcion",this.productoDescripcion);
            param.append("subgrupo",this.subgrupo);
            param.append("ubicacion",this.ubicacion);
            param.append("precio",this.precio);
            param.append("precioMayor",this.precioMayor);        
            param.append("fechaPrecio",this.fechaPrecio);
            param.append("productoFoto",this.productoCodigo);
            param.append("unidad",this.unidad);
            param.append("unidadPieza",this.unidadPieza);
            param.append("piezas",this.piezas);

            axios.post(url,param)
                 .then(res=>{
                     o = res.data;
                     M.toast({html:o.value});
                     this.cargarproductos(this.subgrupo);
                     this.productoCodigo='';
                     this.productoDescripcion='';
                     this.ubicacion='';
                     this.precio=0;
                     this.precioMayor=0;
                     this.productoFoto="";
                     this.unidad='';
                     this.unidadPieza='';
                     this.piezas='';
                     var elem = document.getElementById("modal2");
                     var instance = M.Modal.getInstance(elem);
                     instance.close();
                     this.buscarsubgrupo(this.subgrupo);
                 })
                 .catch(error=>{
                     console.log(error);
                 });
        },
      cargaModal:function(c)  {
        this.buscarsubgrupo(this.subgrupo);
        this.productoModal=c;
        var elem = document.querySelector('.modal');
        var instance = M.Modal.getInstance(elem);
        instance.open();
      },
      cerrarModal:function()  {
        var elem = document.querySelector('.modal');
        var instance = M.Modal.getInstance(elem);
        instance.close();
      },
      actualizar:function(){
          
        url= 'http://localhost/inventario/tablas/productos/actualizar';
        param = new FormData();
        
        param.append("idProducto",this.productoModal.idProducto);
        param.append("productoCodigo",this.productoModal.productoCodigo);
        param.append("productoDescripcion",this.productoModal.productoDescripcion);
        param.append("ubicacion",this.productoModal.ubicacion);
        param.append("precio",this.productoModal.precio);
        param.append("precioMayor",this.productoModal.precioMayor);        
        param.append("fechaPrecio",this.productoModal.fechaPrecio);
        param.append("fotoProducto",this.productoModal.fotoProducto);
        param.append("unidad",this.productoModal.unidad);
        param.append("piezas",this.productoModal.piezas);
        param.append("unidadPieza",this.productoModal.unidadPieza);
        
        axios.post(url,param)
             .then(res=>{
                 o = res.data;
                 M.toast({html:o.value});
                 var elem = document.querySelector('.modal');
                 var instance = M.Modal.getInstance(elem);
                 instance.close();
                 this.cargarproductos(id);
             })
             .catch(error=>{
                 console.log(error);
             });
      },
      cargarproductos:function(id){
        url= 'http://localhost/inventario/tablas/productos/productos';
        param = new FormData();
        
        param.append("subgrupo",id);
        axios.post(url,param)
             .then(res=>{
                this.productos=res.data;
             })
             .catch(error=>{
                 console.log(error);
             });
      },
      filtrarproductos:function(){
        url= 'http://localhost/inventario/tablas/productos/filtrarproductos';
        param = new FormData();
        
        param.append("subgrupo",this.subgrupo);
        param.append("producto",this.productoBuscar);
        axios.post(url,param)
             .then(res=>{
                this.productos=res.data;
             })
             .catch(error=>{
                 console.log(error);
             });
      },
      contarproductos:function(id){
        url= 'http://localhost/inventario/tablas/productos/contarproductos';
        param = new FormData();
        
        param.append("subgrupo",id);
        axios.post(url,param)
             .then(res=>{
                this.cantidadProductos=res.data + 1;
             })
             .catch(error=>{
                 console.log(error);
             });
      },
      verimagen:function(){
        var _this = this;
        _this.file = _this.$refs.fotoProducto.files[0];
        _this.url = URL.createObjectURL(_this.file);
      }
    },
    computed:{
      buscar:function(){
          return this.productos.filter((item) => item.productoDescripcion.toLowerCase().includes(this.textobuscar.toLowerCase()));
      }
  }
});