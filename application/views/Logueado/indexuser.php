<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html >
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="theme-color" content="#2196F3">
  <title>ASOUTN</title>
  <script type="text/javascript">
    header("Location: <?php echo base_url('inicio_principal'); ?>");
  </script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- CSS  -->
  <link href="<?php echo base_url(); ?>min/plugin-min.css" type="text/css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>min/custom-min.css" type="text/css" rel="stylesheet" >
  <script src="https://use.fontawesome.com/df85f162da.js"></script>
  
  <link href="<?php echo base_url(); ?>css/materialize.min.css" type="text/css" rel="stylesheet" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>slider2/style.css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>slider2/jquery.js"></script>
  <!-- End WOWSlider.com HEAD section -->
  <?php
  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
  }
  $idUser= $user['email']; 
  
  $conexion =new mysqli("localhost", "root", "", "asoutn");
  $query= "SELECT *FROM imagen_perfil WHERE id_usuario = '$idUser'"; $resultado = $conexion->query($query);
  while ($row = $resultado->fetch_assoc()) {  
    $imagenPerfil = base64_encode($row['imagen']);
    
  }
  $queryProductos= "SELECT *FROM productos ";
  $resultadoproductos = $conexion->query($queryProductos);
  $queryCarritoCont= "SELECT count(DISTINCT id_producto) as count FROM usuario_producto WHERE estado ='Pendiente'";
  $resultadoCont = $conexion->query($queryCarritoCont);
  while ($row = $resultadoCont->fetch_assoc()) {  
    $contador= $row['count'];
    
    
  }
  
  // seteando las cabeceras
  header('Cache-Control: no-cache, no-store, must-revalidate');
  header('Pragma: no-cache');
  
  // en codeigniter seria:
  $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
  $this->output->set_header("Pragma: no-cache");
  
  ?>
  
  
</head>
<body id="top" class="scrollspy" onload="Materialize.toast('Bienvenido <?php echo $user['name']?>', 3000, 'rounded')">
  
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
          <a href="#" id="logo-container" class="brand-logo">ASOUTN</a>
          <ul class="right hide-on-med-and-down ">
            <li><a class="hoverable" href="#productosLista">Productos</a></li>
            <li ><a id="Carrito" class="hoverable" href="<?php echo base_url('/Producto/carrito');?>"><i class="material-icons">shopping_cart </i><?php echo $contador;?> Artículos</a></li>
            <li ><a  id="rowPerfil"class="dropdown-button hoverable" data-activates="dropdown1">           
              <img class="circle responsive-img" width="50px" height="50px"src="data:image/jpg;base64,<?php echo $imagenPerfil;?>" > 
              <?php echo $user['name']; ?>
              <i class="material-icons right">arrow_drop_down</i>
            </a>
            <ul id="dropdown1" class="dropdown-content">
                <li><a class="hoverable" href="<?php echo base_url('Producto/historial'); ?>">Historial de compras</a></li>
              <li class="divider"></li>
              <li><a class="hoverable" href="<?php echo base_url('inicioSesion'); ?>">Cerrar sesión</a></li>
            </ul>
          </li>
          
          
        </ul>
        <ul id="nav-mobile" class="side-nav">
          
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
  <div class="ws_images"><ul>
    <li><a href="http://www.utn.ac.cr"><img src="<?php echo base_url(); ?>slider2/1.png" alt="Visita nuestro sitio web oficial, haciendo click aquí." title="Visita nuestro sitio web oficial, haciendo click aquí." id="wows1_0"/></a></li>
    <li><img src="<?php echo base_url(); ?>slider2/3.png" alt="" title="Encuentra materiales promocionales UTN para ir a clases u oficina." id="wows1_1"/></li>
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
  <div class="container">
    <div class="row">
      <div  class="col s12">
        <h2 class="center header text_h2"><span class="span_h2">Productos que ofrecemos...  </span><br>Aprovecha nuestros precios bajos.</h2>
        
        
        
      </div>
      
      
    </div>
  </div>
</div>
<div id="productosLista"class="container">
  <div class="row">
    <?php    while ($row = $resultadoproductos->fetch_assoc()) { 
      $imagenPro = base64_encode($row['imagen']);
      
      ?>
      
      <div class="col s12 m4 l4">
        <img class="materialboxed responsive-img" src="data:image/jpg;base64,<?php echo $imagenPro;?>" > 
        <div class="card">
        
        
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Descripción"><?php echo $row['nombreProducto'];?><i class="mdi-navigation-more-vert right"></i></span>
            <form class="form-control" action="<?php echo base_url('index.php/Producto/insertCompra'); ?>" method="post">
              <div class="inputsInvisibles">
                <input class="inputsInvisibles" type="text" name="id_producto" value="<?php echo $row['id'];?>">
                <input class="inputsInvisibles"type="text" name="id_usuario" value="<?php echo $user['id'];?>">
              </div>
              Cantidad deseada  <input id="cantidadDeseada" type="number" name="cantidadDeseada" value="" min="1" max="10" required></p>
              <input class=" buttonCompra white-text" type="submit" name="" value="Añadir a carrito por ₡<?php echo $row['precio'];?>">
              
            </form>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4"><?php echo $row['nombreProducto'];?> <i class="mdi-navigation-close right"></i></span>
            <p><?php echo $row['descripcion'];?></p>
          </div>
        </div>
      </div>  
      
      <?php  } ?>
      
      
      
      
    </div>
  </div>
  

<div class="parallax-container">
  <div class="parallax"><img src="<?php echo base_url(); ?>img/parallax2.png"></div>
</div>



      
      <!--Footer-->
      <div class="myfooter"  id="contact">
        
      </div>
      
      
      
      
      
      <!--  Scripts-->
      <script src="<?php echo base_url(); ?>min/plugin-min.js"></script>
      <script src="<?php echo base_url(); ?>min/custom-min.js"></script>
      <script src="<?php echo base_url(); ?>js/js.js"></script>
      <script src="https://use.fontawesome.com/df85f162da.js"></script>
      
    </body>
    </html>
