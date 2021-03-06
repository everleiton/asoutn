<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html >
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="theme-color" content="#2196F3">
  <title>ASOUTN | Mantenimiento Productos</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- CSS  -->
  <link href="<?php echo base_url(); ?>min/plugin-min.css" type="text/css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>min/custom-min.css" type="text/css" rel="stylesheet" >
  <script src="https://use.fontawesome.com/df85f162da.js"></script>
  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>slider2/style.css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>slider2/jquery.js"></script>
  <!-- End WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/style.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
  <?php
  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
  }
  $idUser= $user['email']; 
  $conexion =new mysqli("localhost", "root", "", "asoutn");
  $query= "SELECT *FROM imagen_perfil WHERE id_usuario = '$idUser'"; 
  $resultadoUsuario = $conexion->query($query);
  while ($row = $resultadoUsuario->fetch_assoc()) {  
    $imagenPerfil = base64_encode($row['imagen']);
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
    
    ?>
    
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
            <a href="<?php echo base_url('inicio_principal'); ?>" id="logo-container" class="brand-logo">ASOUTN</a>
            <ul class="right hide-on-med-and-down ">
              <li><a class="hoverable" href="#intro">Mantenimiento Productos</a></li>
              <li><a class="hoverable" href="<?php echo base_url('Mail/principal'); ?>">Contactenos</a></li>
              <li ><a  id="rowPerfil"class="dropdown-button hoverable" data-activates="dropdown1">  
                <img class="circle responsive-img" width="50px" height="50px"src="data:image/jpg;base64,<?php echo $imagenPerfil;?>" > 
                
                <?php echo $user['name']; ?>
                <i class="material-icons right">arrow_drop_down</i>
              </a>
              <ul id="dropdown1" class="dropdown-content">
                
                <li class="divider"></li>
                <li><a class="hoverable" href="<?php echo base_url('inicioSesion'); ?>">Cerrar sesión</a></li>
              </ul>
            </li>
          </ul>
          <ul id="nav-mobile" class="side-nav">
            <li><a class="hoverable" href="#intro">Conocemos</a></li>
            
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
  <div class="section no-pad-bot" id="index-banner">    </div>
  <div id="wowslider-container1">
    <div class="ws_images"><ul>
      <li><a href="www.utn.ac.cr"><img src="<?php echo base_url(); ?>slider2/1.png" alt="Visita nuestro sitio web oficial, haciendo click aquí." title="Visita nuestro sitio web oficial, haciendo click aquí." id="wows1_0"/></a></li>
      <li><a href="http://wowslider.com"><img src="<?php echo base_url(); ?>slider2/3.png" alt="wowslider" title="Encuentra materiales promocionales UTN para ir a clases u oficina." id="wows1_1"/></a></li>
      <li><img src="<?php echo base_url(); ?>slider2/2.png" alt="Universidad Técnica Nacional   |   #SomosUTN" title="Universidad Técnica Nacional   |   #SomosUTN" id="wows1_2"/></li>
    </ul></div>
    <div class="ws_bullets"><div>
      <a href="#" title="Visita nuestro sitio web oficial, haciendo click aquí."><span><img src="<?php echo base_url(); ?>slider2/1.png" alt="Visita nuestro sitio web oficial, haciendo click aquí."/>1</span></a>
      <a href="#" title="Encuentra materiales promocionales UTN para ir a clases u oficina."><span><img src="<?php echo base_url(); ?>slider2/3.png" alt="Encuentra materiales promocionales UTN para ir a clases u oficina."/>2</span></a>
      <a href="#" title="Universidad Técnica Nacional   |   #SomosUTN"><span><img src="<?php echo base_url(); ?>slider2/2.png" alt="Universidad Técnica Nacional   |   #SomosUTN"/>3</span></a>
    </div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com/vi">bootstrap carousel</a> by WOWSlider.com v8.7</div>
    <div class="ws_shadow"></div>
  </div>	
  <script type="text/javascript" src="<?php echo base_url(); ?>slider2/wowslider.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>slider2/script.js"></script>
  <!--Intro and service-->
  <div id="intro" class="section scrollspy">
  </div>
  <div class=""><img src="<?php echo base_url(); ?>img/parallax1.png"></div>
  
  
  <div class="myfooter"  id="contact">
  </div>
  
  
  <!--  Scripts-->
  <script src="<?php echo base_url(); ?>min/plugin-min.js"></script>
  <script src="<?php echo base_url(); ?>min/custom-min.js"></script>
  <script src="<?php echo base_url(); ?>js/js.js"></script>
  <script src="https://use.fontawesome.com/df85f162da.js"></script>
  
</body>
</html>














