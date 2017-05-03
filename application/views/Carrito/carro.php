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
  <script type="text/javascript">
    header("Location: <?php echo base_url('inicio_principal'); ?>");
  </script>
  <link href="<?php echo base_url(); ?>css/materialize.min.css" type="text/css" rel="stylesheet" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>slider2/style.css" />
  <script src="https://files.codepedia.info/uploads/iScripts/html2canvas.js"></script>
  <?php
  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
  }
  $idUser= $user['email']; 
  $idU= $user['id']; 
  $conexion =new mysqli("localhost", "root", "", "asoutn");
  $query= "SELECT *FROM imagen_perfil WHERE id_usuario = '$idUser'"; $resultado = $conexion->query($query);
  while ($row = $resultado->fetch_assoc()) {  
    $imagenPerfil = base64_encode($row['imagen']);
  }
  $queryProductos= "SELECT productos.id as idProductoCarrito,productos.cantidad as CantidadInventario, usuario_producto.id, productos.imagen, productos.nombreProducto, SUM(usuario_producto.cantidad) as CantidadArticulos, productos.precio as PrecioUnitario,(productos.precio*SUM(usuario_producto.cantidad)) as PrecioFinal from usuario_producto Join productos on  usuario_producto.id_producto = productos.id AND usuario_producto.id_usuario = $idU and usuario_producto.estado = 'pendiente' GROUP by productos.nombreProducto ORDER by  productos.nombreProducto ASC ";
  $resultadoproductos = $conexion->query($queryProductos);
  $queryCarritoCont= "SELECT count(DISTINCT id_producto) as count FROM usuario_producto WHERE estado ='Pendiente' and id_usuario=$idU";
  $resultadoCont = $conexion->query($queryCarritoCont);

  while ($row = $resultadoCont->fetch_assoc()) {  
    $contador= $row['count'];
  }
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
<div class="section no-pad-bot" id="index-banner">    </div>
  <div class=""><img src="<?php echo base_url(); ?>img/parallax3.png"></div>
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
         <h4>De momento no tienes artículos en tu carrito.<br> <a id="refInicio" href="<?php echo base_url('productos') ?>">Seguir comprando...!</a> </h4>
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
            <th class="titulocolumnas" >Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php $total = 0;
          $pedidoNumero=0;
          $var1 ="";
          $var2 = "";
          while ($row =$resultadoproductos->fetch_assoc()) { 
            $imagenPro = base64_encode($row['imagen']);
            $total += $row['PrecioFinal'];   
            $pedidoNumero += $row['id'];
            $cantidadActual=    $row['CantidadInventario'] -$row['CantidadArticulos'];
            $var1 = $var1 . $row['idProductoCarrito']  .',';
              $var2 = $var2 . $cantidadActual .',';
            ?>
            <tr >  
              <td><img class="circle responsive-img" width="80px" height="80px"src="data:image/jpg;base64,<?php echo $imagenPro;?>" > </td>
              <td><?php echo $row['nombreProducto'];?></td>
              <td><?php echo $row['CantidadArticulos'];?></td>
              <td>₡<?php echo $row['PrecioUnitario'];?></td>
              <td>₡<?php echo $row['PrecioFinal'];?></td>   
              <td>
                <form class="" action="<?php echo base_url('/Producto/eliminarItemCarrito'); ?>" method="post">
                  <div class="inputsInvisibles">
                    <input class="inputsInvisibles"type="text" name="idProductoCarrito" value="<?php echo $row['id'];?>">
                  </div>
                  <button type="submit" class="waves-effect red waves-light btn" name="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
</form> 
                </td>
                <?php  } ?>
              </td>
              <tr>
                <th class="titulocolumnas" colspan="4">Total</th>
                <th class="titulocolumnas"  >₡ <?php echo $total ?> </th>
                <th> </th>
              </tr>
            </tr>
          </tbody>
        </table>
        <button  class=" col s12 btn waves-effect waves-light"  name="action" onclick="mostrar()" >Realizar pago
    <i class="material-icons right">send</i>
  </button>
  </div>
    <?php 
    } ?>
    </div>
  <div id='oculto' style='display:none;'>
      <div class="container">
        <div class="card-panel">
          <h4 class="header2">Formulario de pago #<?php echo $pedidoNumero ?></h4> 
          <div class="row">
            <form class="col s12" action="<?php echo base_url('Email/enviarCorreo'); ?>" method="post">
              <div class="row">
                <div class="input-field col s4">
                  <input id="name" type="text" value="<?php echo $user['name'] ?>"required>
                  <label for="first_name" class="">Titular de targeta</label>
                </div>
                <div class="input-field col s4">
                  <input id="numerotargeta" type="number"  maxlength="15" required>
                  <label for="numerotargeta" class="">Número de Targeta</label>
                </div>
                <div class="input-field col s2">
                  <select required>
                    <option value="" disabled selected>Mes</option>
                    <option value="	1	">	Enero	</option>
                    <option value="	2	">	Febrero	</option>
                    <option value="	3	">	Marzo	</option>
                    <option value="	4	">	Abril	</option>
                    <option value="	5	">	Mayo	</option>
                    <option value="	6	">	Junio	</option>
                    <option value="	7	">	Julio	</option>
                    <option value="	8	">	Agosto	</option>
                    <option value="	9	">	Septiembre	</option>
                    <option value="	10	">	Octubre	</option>
                    <option value="	11	">	Noviembre	</option>
                    <option value="	12	">	Diciembre	</option>
                  </select>
                  <label>Vencimiento</label>
                </div>
                <div class="input-field col s2">
                  <select required>
                    <option value="" disabled selected>Año</option>
                    <option value="	1	">	2017	</option>
                    <option value="	2	">	2018	</option>
                    <option value="	3	">	2019	</option>
                    <option value="	4	">	2020	</option>
                    <option value="	5	">	2021	</option>
                    <option value="	6	">	2022	</option>
                    <option value="	7	">	2023	</option>
                    <option value="	8	">	2024	</option>
                    <option value="	9	">	2025	</option>
                    <option value="	10	">	2026	</option>
                    <option value="	11	">	2027	</option>
                    <option value="	12	">	2028	</option>
                    <option value="	13	">	2029	</option>
                    <option value="	14	">	2030	</option>
                    <option value="	15	">	2031	</option>
                    <option value="	16	">	2032	</option>
                    <option value="	17	">	2033	</option>
                    <option value="	18	">	2034	</option>
                    <option value="	19	">	2035	</option>
                    <option value="	20	">	2036	</option>
                  </select>                  
                </div>
              </div>
              <div class="row">
                <div class="input-field col s4">
                  <input id="number" type="number" min="0" maxlength="3" required>
                  <label for="number" class="">Código de seguridad</label>
                </div>
                <div class="input-field col s8">
                  <input type="text" name="direccion" value="Será retirado en la tienda de ASOUTN">
                  <label for="direccion">Dirección completa de envío</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s4">
                  <input type="text" class="inputsInvisibles"name="montocancelar" value="₡<?php echo $total ?>">
                  <label for="montocancelar" class="">Monto a Cancelar ₡ <?php echo $total ?></label>
                </div>
                <div class="input-field col s8">  
                  <div class="inputsInvisibles">  
                    <input type="hidden" name="var1" value="<?php echo $var1 ?>">
                    <input type="hidden" name="var2" value="<?php echo $var2 ?>">
                    <input class="inputsInvisibles"type="text" name="nombreUsuario" value="<?php echo $user['name'];?>">
                    <input class="inputsInvisibles"type="text" name="correoUsuario" value="<?php echo $user['email'];?>">
                    <input class="inputsInvisibles"type="text" name="idUsuario" value="<?php echo $user['id'];?>">
                  </div>
                  <button width="150px"class="btn cyan waves-effect waves-light" type="submit" name="action">Enviar pedido
                        <i class="mdi-content-send"></i>
                </button>
                </div>
              </div>  
            </form>
          </div>
        </div>
      </div>
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
