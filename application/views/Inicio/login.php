<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>ASOUTN | Inicio de sesión</title>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS  -->
    <link href="<?php echo base_url(); ?>min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>min/custom-min.css" type="text/css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
    <script src="https://use.fontawesome.com/df85f162da.js"></script>    
    <script src="<?php echo base_url(); ?>js/js.js"></script>
</head>
<body id="top" class="scrollspy">
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
 <div class="navbar-fixed">
    <nav id="nav_f" class="blue_color" role="navigation">
        <div class="container">
              <div class="nav-wrapper">
                <a href="<?php echo base_url();?>" id="logo-container" class="brand-logo">ASOUTN</a>
                    <ul class="right hide-on-med-and-down ">
                      <li><a class="hoverable" href="<?php echo site_url(); ?>User/registro">Registrarse</a></li>
                    </ul>
                    <ul id="nav-mobile" class="side-nav">
                        <li class="divider"></li>
  <li><a class="hoverable" href="<?php echo site_url(); ?>User/registro">Registrarse</a></li>      
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
      <center>
  


   <h5 class="blue-text   text-darken-4">Inicie sesión en su cuenta</h5>
   <div class="section"></div>

   <div class="container">
     <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

       <form class="col s12" method="post"  action="<?php echo base_url('inicio_principal'); ?>">

         <div class='row'>
           <div class='input-field col s12'>
             <input class='validate' type='email' name='email' id='email' />
             <label for='email'>Ingresa tu correo</label>
           </div>
         </div>
        
         <div class='row'>
           <div class='input-field col s12'>
             <input class='validate' type='password' name='password' id='password' />
             <label for='password'>Ingresa tu contraseña</label>
           </div>
           <label style='float: right;'>
             <a class='blue-text' href='#!'><b>¿Olvidaste tu contraseña?</b></a>
           </label>
         </div>
         <div class="row">
         <?php
           if(isset($error)){
          echo "<p>".$error."</p>";
         } ?>
         </div>  
         <br />
         <center>
           <div class='row'>
             <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect blue darken-4'>Iniciar sesión</button>
           </div>
         </center>
       </form>
     </div>
   </div>
   <a href="<?php echo site_url(); ?>User/registro">Crear una cuenta</a>
 </center>
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
    <script src="<?php echo base_url(); ?>js/js.js"></script>
<script src="https://use.fontawesome.com/df85f162da.js"></script>
    </body>
</html>
