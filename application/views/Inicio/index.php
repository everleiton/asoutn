<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>ASOUTN</title>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS  -->
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
  <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
    <script src="https://use.fontawesome.com/df85f162da.js"></script>
    
    
    <link rel="stylesheet" type="text/css" href="js/style.css" />
    <script type="text/javascript" src="js/jquery.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    
      
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
               <a href="<?php echo base_url();?>" id="logo-container" class="brand-logo">ASOUTN <img src="<?php echo base_url();?>images/puntos.png" alt=""></a>
                   <ul class="right hide-on-med-and-down ">
                     <li><a class="hoverable" href="#intro">Conocenos</a></li>
                  <li><a class="hoverable" href="#productos">Productos</a></li>
                     <li><a class="hoverable" href="#Contacto">Contáctenos</a></li>
                     <li><a class="dropdown-button hoverable" href="#!" data-activates="dropdown1">Entrar
                           <i class="material-icons right">arrow_drop_down</i>
                         </a>
                           <ul id="dropdown1" class="dropdown-content">
                               <li><a class="hoverable" href="<?php echo base_url('inicioSesion'); ?>">Iniciar sesión</a></li>
                               <li class="divider"></li>
                               <li><a class="hoverable" href="<?php echo base_url('registro'); ?>">Registrarse</a></li>
                           </ul>
                     </li>
                   </ul>
                   <ul id="nav-mobile" class="side-nav">
                     <li><a class="hoverable" href="#intro">Conocenos</a></li>
                     
                  
                     <li><a class="hoverable" href="#team">Contactenos</a></li>
                     <li class="divider"></li>
                     <li><a class="hoverable" href="#!">Iniciar sesión</a></li>
                     <li><a class="hoverable" href="#!">Registrarse</a></li>      
                   </ul>
               <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
               </div>
       </div>
   </nav>
</div>

<!--Hero-->
<div class="section no-pad-bot" id="index-banner">    </div>

<!--  <div class="container">-->
<div id="wowslider-container1">
  <div class="textohastag">
    <h1 class="text_h center header cd-headline letters type">
        <span>#Somos</span> 
        <span class="cd-words-wrapper waiting">
            <b class="is-visible">UTN</b>
            <b>UPública</b>
      
        </span>
    </h1>
  </div>
    	<div class="ws_images"><ul>
    		<li><img src="images/img.png" alt="img" title="img" id="wows1_0"/></li>
    		<li><img src="images/img1.png" alt="wow slider" title="img1" id="wows1_1"/></li>
    		<li><img src="images/img2.png" alt="img2" title="img2" id="wows1_2"/></li>
    	</ul></div>
  
    	<div class="ws_shadow"></div>
    	</div>	
      
    	<script type="text/javascript" src="js/wowslider.js"></script>
    	<script type="text/javascript" src="js/script.js"></script>
      

<!--Intro and service-->
<div id="intro" class="section scrollspy">
  <!-- Modal Trigger -->
  
    <div class="container">
        <div class="row">
            <div  class="col s12">
                <h2 class="center header text_h2"><span class="span_h2"> Asociación Solidarista UTN CR  </span><br>Venta de Artículos promocionales</h2>
            </div>

            <div  class="col s12 m6 l6">
                <div class="center promo promo-example">
                    <!--  <i class="mdi-image-flash-on"></i> -->
                    <h5 class="promo-caption"> <span class="span_h2"> Misión </span></h5>
                    <p class="light center">Ser una organización, que promueva el mejoramiento integral y la calidad de vida de sus asociados, procurando ser partícipe de su desarrollo mediante proyectos sociales, económicos y culturales según los intereses de la colectividad.  .</p>
                </div>
            </div>
            
            <div class="col s12 m6 l6">
                <div class="center promo promo-example">
                  <!--  <i class="mdi-hardware-desktop-windows"></i> -->
                    <h5 class="promo-caption"><span class="span_h2"> Visión </span></h5>
                    <p class="light center">Ser una organización solidarista abierta, transparente e identificada con los principios de ayuda mutua, justicia y paz social en armonía obrero patronal, brindando las mejores condiciones de crédito, servicios y beneficios para sus asociados..</p>
                </div>
            </div>
        </div>
    </div>
</div>

<
<div class="section scrollspy" id="productos">
    <div class="container">
        <h2 class="header text_b">Conoce nuestros productos</h2>
        <div class="row">
            <div class="col s12 m4 l4">
                <div class="card">
                  <div    class="card-image waves-effect waves-block waves-light ">
                      <img   class="activator" src="img/img1.jpg">
                  </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Libretas<i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="<?php echo base_url('inicioSesion'); ?>">Ver más...</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Libretas<i class="mdi-navigation-close right"></i></span>
                        <p>Deberás <a href="<?php echo base_url('inicioSesion'); ?>"><span class="span_h2"> iniciar sesión </span></a>  para ver más información de los productos. </p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                  <div    class="card-image waves-effect waves-block waves-light ">
                      <img   class="activator" src="img/img2.jpg">
                  </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Lapiceros<i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="<?php echo base_url('inicioSesion'); ?>">Ver más...</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Lapiceros<i class="mdi-navigation-close right"></i></span>
                          <p>Deberás <a href="<?php echo base_url('inicioSesion'); ?>"><span class="span_h2"> iniciar sesión </span></a>  para ver más información de los productos. </p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                  <div    class="card-image waves-effect waves-block waves-light ">
                      <img   class="activator" src="img/img3.jpg">
                  </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Llaveros<i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="<?php echo base_url('inicioSesion'); ?>">Ver más...</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Llaveros<i class="mdi-navigation-close right"></i></span>
                          <p>Deberás <a href="<?php echo base_url('inicioSesion'); ?>"><span class="span_h2"> iniciar sesión </span></a>  para ver más información de los productos. </p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                  <div    class="card-image waves-effect waves-block waves-light ">
                      <img   class="activator" src="img/img4.jpg">
                  </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Marcadores<i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="<?php echo base_url('inicioSesion'); ?>">Ver más...</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Marcadores<i class="mdi-navigation-close right"></i></span>
                          <p>Deberás <a href="<?php echo base_url('inicioSesion'); ?>"><span class="span_h2"> iniciar sesión </span></a>  para ver más información de los productos. </p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                  <div    class="card-image waves-effect waves-block waves-light ">
                      <img   class="activator" src="img/img5.jpg">
                  </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Folders<i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="<?php echo base_url('inicioSesion'); ?>">Ver más...</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Folders<i class="mdi-navigation-close right"></i></span>
                          <p>Deberás <a href="<?php echo base_url('inicioSesion'); ?>"><span class="span_h2"> iniciar sesión </span></a>  para ver más información de los productos. </p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                  <div  class="card-image waves-effect waves-block waves-light ">
                      <img   class="activator" src="img/img6.jpg">
                  </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Broches<i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="<?php echo base_url('inicioSesion'); ?>">Ver más...</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Broches<i class="mdi-navigation-close right"></i></span>
                          <p>Deberás <a href="<?php echo base_url('inicioSesion'); ?>"><span class="span_h2"> iniciar sesión </span></a>  para ver más información de los productos. </p>
                    </div>
                </div>
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
<!--
<div class="parallax-container">
    <div class="parallax"><img src="img/parallax1.png"></div>
</div>





    <!--  Scripts-->
    <script src="min/plugin-min.js"></script>
    <script src="min/custom-min.js"></script>
    <script src="js/js.js"></script>
    <script src="https://use.fontawesome.com/df85f162da.js"></script>
    </body>
</html>
  