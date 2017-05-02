<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>ASOUTN | Contáctenos</title>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
 
    <link href="<?php echo base_url(); ?>min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>min/custom-min.css" type="text/css" rel="stylesheet" >
    <link href="<?php echo base_url(); ?>css/materialize.min.css" type="text/css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
    <script src="https://use.fontawesome.com/df85f162da.js"></script>

    
    
</head>
<body id="top" class="scrollspy">

<!-- Pre Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>

<!--Navigation-->
 <div class="navbar-fixed">
    <nav id="nav_f" class="blue_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
            <a href="<?php echo base_url();?>" id="logo-container" class="brand-logo">ASOUTN</a>
                <ul class="right hide-on-med-and-down ">
              
              
                      <li><a class="hoverable" href="<?php echo site_url(); ?>">Volver al inicio</a></li>
        
                  
                </ul>
                <ul id="nav-mobile" class="side-nav">
            
                  <li class="divider"></li>
                  
                <li><a class="hoverable" href="<?php echo site_url(); ?>User/entrar">Iniciar sesión</a></li>
            
                    
                    
                    
                    
                </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>

<!--Hero-->
<div class="section no-pad-bot" id="index-banner">    </div>


<div class="section scrollspy" id="team">
    <div class="container">
      <div id="login-page" class="row">
      <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" id="registro" class="col s12" method="post" action="<?php echo base_url(); ?>Email/contactar" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s12 center">
              <h4>Contáctenos</h4>
              <p class="center">Cualquier duda, sugerencia o inconformidad, favor hacernosla saber</p>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <input value="" name="name" type="text" class="validate">
              <label for="name">Nombre completo</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-communication-email prefix"></i>
              <input value="" name="email" type="email" class="validate">
               <label for="email" data-error="Dirección no válida" data-success="¡Correcto!">Correo</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-communication-email prefix"></i>
              <input value="" name="msj" type="text" class="validate">
              <label for="msj">Mensaje:</label>
            </div>
          </div>
          
          <div class="row">
            <div class="input-field col s12">
              <button class="btn waves-effect waves-light" type="submit">Contactar
              <i class="material-icons right">send</i>
            </button>
            </div>
          
          </div>
        </form>
      </div>
    </div>
    
      </div>
    
</div>

<div class="myfooter"  id="contact">

    
    

</div>


    <!--  Scripts-->
    <script src="<?php echo base_url(); ?>min/plugin-min.js"></script>
    <script src="<?php echo base_url(); ?>min/custom-min.js"></script>
    <script src="<?php echo base_url(); ?>js/materialize.min.js"></script>

    <script src="<?php echo base_url(); ?>js/js.js"></script>
<script src="https://use.fontawesome.com/df85f162da.js"></script>
    </body>
</html>
