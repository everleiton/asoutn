<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>ASOUTN | Registro</title>
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
              
              
                      <li><a class="hoverable" href="<?php echo site_url(); ?>User/entrar">Iniciar sesión</a></li>
        
                  
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
        <form class="login-form" id="registro" class="col s12" method="post" action="<?php echo base_url(); ?>User/insert" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s12 center">
              <h4>Registro</h4>
              <p class="center">Sé parte de nuestra comunidad!</p>
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
              <i class="mdi-action-lock-outline prefix"></i>
              <input value="" name="password" type="password">
              <label for="password">Contraseña</label>
            </div>
          </div>
        <div class="file-field input-field">
      <div class="btn">
        <span>Foto de perfil</span>
        <input name="imagenCargada" type="file" accept="image/*">
      </div>
      <div class="file-path-wrapper">
        <input name="photo_nombre" class="file-path validate" type="text"  placeholder="Sube una foto de perfil">
      </div>
    </div>
          
          <div class="row">
            <div class="input-field col s12">
              <button class="btn waves-effect waves-light" type="submit">Registrar
              <i class="material-icons right">send</i>
            </button>
            </div>
            <div class="input-field col s12">
              <p class="margin center medium-small sign-up">¿Ya tienes una cuenta? <a href="<?php echo site_url(); ?>User/entrar">Iniciar sesión</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
    
      </div>
    
</div>

<div class="myfooter"  id="contact">

    
          <div class="itemfooter">
            <form class="col s12" action="contact.php" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="mdi-action-account-circle prefix white-text"></i>
                        <input id="icon_prefix" name="name" type="text" class="validate white-text">
                        <label for="icon_prefix" class="white-text">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="mdi-communication-email prefix white-text"></i>
                        <input id="icon_email" name="email" type="email" class="validate white-text">
                        <label for="icon_email" class="white-text">Correo</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="mdi-editor-mode-edit prefix white-text"></i>
                        <textarea id="icon_prefix2" name="message" class="materialize-textarea white-text"></textarea>
                        <label for="icon_prefix2" class="white-text">Mensaje</label>
                    </div>
                    <div class="col offset-s7 s5">
                        <button class="btn waves-effect waves-light blue darken-4" type="submit">Enviar
                            <i class="mdi-content-send right white-text"></i>
                        </button>
                    </div>
                </div>
            </form>
          </div>
        
          <div class="itemfooter">
              <h5 class="white-text">Social</h5>
              <ul>
                  <li>
                      <a class="white-text" href="">
                          <i class="small fa fa-facebook-square white-text"></i> Facebook
                      </a>
                  </li>
                  <li>
                      <a class="white-text" href="">
                          <i class="small fa fa-twitter-square white-text"></i> Twitter
                      </a>
                  </li>
                  <li>
                      <a class="white-text" href="">
                          <i class="small fa fa-instagram white-text"aria-hidden="true"></i> Instagram
                          
                      </a>
                  </li>
                  <li>
                      <a class="white-text" href="">
                          <i class="small fa fa-snapchat" aria-hidden="true"></i> Snapchat
                      </a>
                  </li>
    
              </ul>
          </div>
    

</div>


    <!--  Scripts-->
    <script src="<?php echo base_url(); ?>min/plugin-min.js"></script>
    <script src="<?php echo base_url(); ?>min/custom-min.js"></script>
    <script src="<?php echo base_url(); ?>js/materialize.min.js"></script>

    <script src="<?php echo base_url(); ?>js/js.js"></script>
<script src="https://use.fontawesome.com/df85f162da.js"></script>
    </body>
</html>