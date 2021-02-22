<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/prism.css"/>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css"/>
	    <script type="text/javascript" src= "https://code.jquery.com/jquery-2.1.1.min.js"> </script> 	
      <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">      
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>       
      <!-- Vee Validate -->
      <script src="https://cdn.jsdelivr.net/npm/vee-validate@<3.0.0/dist/vee-validate.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
        .modal {
          width: 70%;
          height: 100%;
        } 
      </style>  
    </head>
    
    <body>
    <script>
      var base_url = "<?php echo base_url();?>";
    </script>
    <script> 
          $(document).ready(function(){
			      $('select').formSelect();
            $('.sidenav').sidenav();
            $('.collapsible').collapsible();
            $('.modal').modal( {
              dismissible: false, // Modal can be dismissed by clicking outside of the modal
              opacity: 0, // Opacity of modal background
              inDuration: 500, // Transition in duration
              outDuration: 200, // Transition out duration
              
          });
        });
          
    </script> 
    <header>
      <!-- <nav class="top-nav blue darken-4">
        <div class="container">
          <div class="nav-wrapper">
            <div class="row">
              <div class="col s12  offset-m2">
                <h4 class="brand-logo">Kingstone Joyas</h4>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <div class="container"><a href="#" data-target="nav-mobile" class="top-nav sidenav-trigger full hide-on-large-only"><i class="material-icons">menu</i></a></div>
      <ul id="nav-mobile" class="sidenav sidenav-fixed">
        <li class="logo"><a id="logo-container" href="<?php echo base_url() ?>" class="brand-logo">
            <img src="<?php echo base_url()?>assets/img/logo.jpg" alt="" width="100%">
         </li>   
         <a href="about.html" class="waves-effect waves-teal"></a>
  
        <ul class="collapsible">
          <li>
              <div class="collapsible-header waves-effect waves-teal" >Tablas</div>
              <div class="collapsible-body">
                <ul>
                  <li><a href="<?php echo base_url() ?>tablas/disciplinas">Disciplinas</a></li>
                  <li><a href="#!">Grupos</a></li>
                  <li><a href="#!">Subgrupos</a></li>
                  <li><a href="#!">Materiales</a></li>
                </ul>
              </div>
          </li>
          <li>
              <div class="collapsible-header waves-effect waves-teal" >Almacen</div>
              <div class="collapsible-body">
                <ul>
                  <li><a href="<?php echo base_url() ?>/tablas/disciplinas">Entradas</a></li>
                  <li><a href="#!">Devoluciones</a></li>
                  <li><a href="#!">Salidas</a></li>
                  <li><a href="#!">Pérdidas</a></li>
                </ul>
              </div>
          </li>

      </ul>
    </header> -->
    <header>
        <div class="row">
          <div class="col">
          <label class="lnr lnr-menu"></label>
          </div>
          
          <img style="padding-top:12px;padding-left:25px" src="<?php echo base_url()?>assets/img/logo.jpg">
          
        </div>
    </header>
    
    <div class="menu">
    
 
        <div class="line"><label class="lnr lnr-home"><font>Inicio</font></label></div>
        <div class="line">
          <a href="<?php echo base_url() ?>tablas/disciplinas">
            <label class="lnr lnr-music-note"><font>Materiales</font></label>
          </a>
        </div>
        <div class="line"><label class="lnr lnr-envelope"><font>Correos</font></label></div>
        <div class="line"><label class="lnr lnr-picture"><font>Galeria</font></label></div>
        <div class="line"><label class="lnr lnr-film-play"><font>Videos</font></label></div>
        
    </div>
   
    <script>
    //var instance = M.Sidenav.getInstance(elem);
    
    </script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>