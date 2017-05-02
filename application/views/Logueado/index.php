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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- CSS  -->
  <link href="<?php echo base_url(); ?>min/plugin-min.css" type="text/css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>min/custom-min.css" type="text/css" rel="stylesheet" >
  <script src="https://use.fontawesome.com/df85f162da.js"></script>
  
  <link href="<?php echo base_url(); ?>css/materialize.min.css" type="text/css" rel="stylesheet" >

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
  $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
  $this->output->set_header("Pragma: no-cache");
  ?>
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
  <?php 
  $query3= "SELECT productos.id as idProductoCarrito,productos.cantidad as CantidadInventario, usuario_producto.id, productos.imagen, productos.nombreProducto, SUM(usuario_producto.cantidad) as CantidadArticulos, productos.precio as PrecioUnitario,(productos.precio*SUM(usuario_producto.cantidad)) as PrecioFinal from usuario_producto Join productos on  usuario_producto.id_producto = productos.id  and usuario_producto.estado = 'comprado' GROUP by productos.nombreProducto ORDER by  productos.nombreProducto ASC "; 
  $resultadoproductos2 = $conexion->query($query3);
  $query= "SELECT *FROM imagen_perfil WHERE id_usuario = '$idUser'"; 
  $resultado = $conexion->query($query);
  $queryProductos= "SELECT *FROM productos ";
  $resultadoproductos = $conexion->query($queryProductos);
  
   ?>
  
</head>
<body id="top" class="scrollspy" onload="Materialize.toast('Bienvenido USUARIO ADMINISTRADOR ', 3000, 'rounded')">
  
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
            <li><a class="hoverable" href="<?php echo base_url('mantenimiento'); ?>">Mantenimiento</a></li>
            
            <li><a class="hoverable" href="<?php echo base_url('estadisticas'); ?>">Estadísticas</a></li>
            <li ><a  id="rowPerfil"class="dropdown-button hoverable" data-activates="dropdown1">  
              
              
              
              <img class="circle responsive-img" width="50px" height="50px"src="data:image/jpg;base64,<?php echo $imagenPerfil;?>" > 
              
              
              <?php echo $user['name']; ?>
              <i class="material-icons right">arrow_drop_down</i>
            </a>
            <ul id="dropdown1" class="dropdown-content">
              <li>
                
              </li>
              <li class="divider"></li>
              <li><a class="hoverable" href="<?php echo base_url('inicioSesion'); ?>">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
        <ul id="nav-mobile" class="side-nav">
          <li><a class="hoverable" href="">Conocemos</a></li>
          
        
          <li class="divider"></li>
          <li><a class="hoverable" href="">Iniciar sesión</a></li>
          <li><a class="hoverable" href="">Registrarse</a></li>      
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
    <li><a href="www.utn.ac.cr"><img src="<?php echo base_url(); ?>slider2/1.png" alt="Visita nuestro sitio web oficial, haciendo click aquí." title="Visita nuestro sitio web oficial, haciendo click aquí." id="wows1_0"/></a></li>
    <li><a href="http://wowslider.com"><img src="<?php echo base_url(); ?>slider2/3.png" alt="wowslider" title="Encuentra materiales promocionales UTN para ir a clases u oficina." id="wows1_1"/></a></li>
    <li><img src="<?php echo base_url(); ?>slider2/2.png" alt="Universidad Técnica Nacional   |   #SomosUTN" title="Universidad Técnica Nacional   |   #SomosUTN" id="wows1_2"/></li>
  </ul></div>
  <div class="ws_bullets"><div>
    <a href="#" title="Visita nuestro sitio web oficial, haciendo click aquí."><span><img src="<?php echo base_url(); ?>slider2/1.png" alt="Visita nuestro sitio web oficial, haciendo click aquí."/>1</span></a>
    <a href="#" title="Encuentra materiales promocionales UTN para ir a clases u oficina."><span><img src="<?php echo base_url(); ?>slider2/3.png" alt="Encuentra materiales promocionales UTN para ir a clases u oficina."/>2</span></a>
    <a href="#" title="Universidad Técnica Nacional   |   #SomosUTN"><span><img src="<?php echo base_url(); ?>slider2/2.png" alt="Universidad Técnica Nacional   |   #SomosUTN"/>3</span></a>
  </div></div>
</div>	
<script type="text/javascript" src="<?php echo base_url(); ?>slider2/wowslider.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>slider2/script.js"></script>


<!--Intro and service-->
<div id="intro" class="section ">

  <div class="container">
    <ul class="collapsible popout" data-collapsible="accordion">
        <li>
          <div class="collapsible-header"><img  src="<?php echo base_url(); ?>img/parallax8.png" width="100%"></div>
        <div class="collapsible-body">
          <div class="container">
            <div class="row ">
              <?php    while ($row = $resultadoproductos->fetch_assoc()) { 
                $imagenPro = base64_encode($row['imagen']);
                
                ?>
                
                <div class="col s12 m4 l4">
                  <img class="materialboxed responsive-img" src="data:image/jpg;base64,<?php echo $imagenPro;?>" > 
                  <div class="card">
                  
                  
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Descripción"><?php echo $row['nombreProducto'];?><i class="mdi-navigation-more-vert right"></i></span>
                        <input style="text-align: center"class=" buttonCompra white-text" type="" name="" value="Precio: ₡<?php echo $row['precio'];?>">
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
        </div>
        
        
        </li>
        <li>
          <div class="collapsible-header"><img  src="<?php echo base_url(); ?>img/parallax9.png" width="100%"></div>
        <div class="collapsible-body">
          <div class="container">
            <div id="misProductos" class="row">
              <table id="tabla"class="centered striped bordered">
                <thead>
                  <tr>
                    <th class="titulocolumnas" >Imagen</th>
                    <th class="titulocolumnas" >Nombre del producto</th>
                    <th class="titulocolumnas" >Cantidad</th>
                    <th class="titulocolumnas" >Precio Unitario</th>
                    <th class="titulocolumnas" >Total</th>
                  
                  </tr>
                </thead>
              
                <tbody>
                  <?php $total = 0;
                
                  
                  while ($row =$resultadoproductos2->fetch_assoc()) { 
                    $imagenPro = base64_encode($row['imagen']);
                    $total += $row['PrecioFinal'];   
                    
                    

                  
                  
                    ?>
                    <tr >
                      
                      <td><img class="circle responsive-img" width="80px" height="80px"src="data:image/jpg;base64,<?php echo $imagenPro;?>" > </td>
                      <td><?php echo $row['nombreProducto'];?></td>
                      <td><?php echo $row['CantidadArticulos'];?></td>
                      <td>₡<?php echo $row['PrecioUnitario'];?></td>
                      <td>₡<?php echo $row['PrecioFinal'];?></td>   
                    
                        <?php  } ?>
                      </td>
                      <tr>
                        <th class="titulocolumnas" colspan="4">Total</th>
                        <th class="titulocolumnas"  >₡ <?php echo $total ?> </th>
                      
                      </tr>
                  
                    </tr>
                  </tbody>
                </table>
              
          </div>
          </div>
        
        </div>
    </div>
        </li>
    </ul>
    
    


  </div>
</div>

  
  
  
  




  
      <div class="myfooter"  id="contact">
       </div>
      
      
      
      
      
      <!--  Scripts-->
      <script src="<?php echo base_url(); ?>min/plugin-min.js"></script>
      <script src="<?php echo base_url(); ?>min/custom-min.js"></script>
      <script src="<?php echo base_url(); ?>js/js.js"></script>
      <script src="https://use.fontawesome.com/df85f162da.js"></script>
      
    </body>
    </html>
