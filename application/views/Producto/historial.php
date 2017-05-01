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
  <link href="<?php echo base_url(); ?>min/plugin-min.css" type="text/css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>min/custom-min.css" type="text/css" rel="stylesheet" >
  <script src="https://use.fontawesome.com/df85f162da.js"></script>
  <link href="<?php echo base_url(); ?>css/materialize.min.css" type="text/css" rel="stylesheet" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>slider2/style.css" />
  <script src="https://files.codepedia.info/uploads/iScripts/html2canvas.js"></script>
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
  $queryProductos= "SELECT usuario_producto.estado, usuario_producto.id, productos.imagen, productos.nombreProducto, SUM(usuario_producto.cantidad) as CantidadArticulos, productos.precio as PrecioUnitario,(productos.precio*SUM(usuario_producto.cantidad)) as PrecioFinal from usuario_producto Join productos on  usuario_producto.id_producto = productos.id AND usuario_producto.id_usuario = 5 and usuario_producto.estado = 'Comprado' GROUP by productos.nombreProducto ORDER by  productos.nombreProducto ASC ";
  $resultadoproductos = $conexion->query($queryProductos);
  $queryCarritoCont= "SELECT count(DISTINCT id_producto) as count FROM usuario_producto WHERE estado ='Comprado'";
  $queryCarritoCont2= "SELECT count(DISTINCT id_producto) as count FROM usuario_producto WHERE estado ='pendiente'";
  $resultadoCont = $conexion->query($queryCarritoCont);$resultadoCont2 = $conexion->query($queryCarritoCont2);

  while ($row = $resultadoCont2->fetch_assoc()) { $contador2= $row['count'];} 
  while ($row = $resultadoCont->fetch_assoc()) { $contador= $row['count'];}
  ?>
  <script type="text/javascript">
  function mostrar(){
    document.getElementById('misProductos').style.display = 'none';
     document.getElementById('oculto').style.display = 'block';

  
  }
  </script>
</head>
<body id="top" class="scrollspy" >
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <div class="navbar-fixed">
    <nav id="nav_f" class="blue_color" role="navigation">
      <div class="container">
        <div class="nav-wrapper">
          <a href="<?php echo base_url('productos') ?>" id="logo-container" class="brand-logo">ASOUTN</a>
          <ul class="right hide-on-med-and-down ">
            <li><a class="hoverable" href="<?php echo base_url('productos') ?>">Productos</a></li>
            <li ><a id="Carrito" class="hoverable" href="<?php echo base_url('/Producto/carrito');?>"><i class="material-icons">shopping_cart </i><?php echo $contador2;?> Artículos</a></li>
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
      </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </div>
  </nav>
</div>
<div class="section no-pad-bot" id="index-banner">    </div>

  <div class=""><img src="<?php echo base_url(); ?>img/parallax4.png"></div>

<div id="intro" class="section scrollspy">
  <?php
    if(isset($msj)){
   echo "<span class='mensajito'>".$msj."</span>";
  } ?>
  <div  class="container">
    <?php

       if ($contador=='0') {
     ?>
     <div id="MensajeNoHayNada"class="">
       <div id="itemMNHN" class="row"></div>
       <div id="itemMNHNCenter" class="">
         <h4>De momento no has comprado ningun artículo.<br> <a id="refInicio" href="<?php echo base_url('productos') ?>">Seguir comprando...!</a> </h4>
       </div>
       <div id="itemMNHN"></div>
       
        
     </div>
     
     
     <?php 
    }else{
    
    ?>
    
    <div id="misProductos" class="row">
      <table id="tabla"class="centered striped bordered">
        <thead>
          <tr>
            <th class="titulocolumnas" >Imagen</th>
            <th class="titulocolumnas" >Nombre del producto</th>
            <th class="titulocolumnas" >Cantidad</th>
            <th class="titulocolumnas" >Precio Unitario</th>
            <th class="titulocolumnas" >Total</th>
            <th class="titulocolumnas" >Estado</th>
          
          </tr>
        </thead>
      
        <tbody>
          <?php $total = 0;
          $pedidoNumero=0;
          
          while ($row =$resultadoproductos->fetch_assoc()) { 
            $imagenPro = base64_encode($row['imagen']);
            $total += $row['PrecioFinal'];   
             $pedidoNumero += $row['id'];
            ?>
            <tr >
              <td><img class="materialboxed circle responsive-img" width="80px" height="80px"src="data:image/jpg;base64,<?php echo $imagenPro;?>" > </td>
              <td><?php echo $row['nombreProducto'];?></td>
              <td><?php echo $row['CantidadArticulos'];?></td>
              <td>₡<?php echo $row['PrecioUnitario'];?></td>
              <td>₡<?php echo $row['PrecioFinal'];?></td>   
              <td><?php echo $row['estado'];?></td>   
                <?php  } ?>
              </td>
              <tr>
                <th class="titulocolumnas" colspan="4">Total de todas las compras realizadas</th>
                <th class="titulocolumnas"  >₡ <?php echo $total ?> </th>
                <th> </th>
              </tr>
            
            </tr>
          </tbody>
        </table>
      
  </div>
    <?php 
    } ?>
  
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
