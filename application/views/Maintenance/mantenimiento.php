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
  $queryCategorias= "SELECT *FROM lista_categoria ";
  $queryProductos= "SELECT lista_categoria.nombre_categoria as categoria, productos.id, productos.nombreProducto, productos.codProducto, productos.cantidad, productos.precio, productos.descripcion, productos.imagen from productos join lista_categoria on productos.categoria = lista_categoria.id ORDER by productos.nombreProducto";
  $resultadocategorias = $conexion->query($queryCategorias);
  $resultadoproductos = $conexion->query($queryProductos);
  while ($row = $resultadoUsuario->fetch_assoc()) {  
    $imagenPerfil = base64_encode($row['imagen']);
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
    
    ?>
    <script type="text/javascript">
    
    </script>
    <script type="text/javascript">
    function mostrar(id){
      $("#editFade"+id).each(function() {
        displaying = $(this).css("display");
        if(displaying == "none") {
          $(this).fadeOut('slow',function() {
            $(this).css("display","");
          });
        } else {
          $(this).fadeIn('slow',function() {
            $(this).css("display","none");
          });
        }
      });
    }
    </script>
    
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
            <a href="<?php echo base_url('inicioAdministrador') ?>" id="logo-container" class="brand-logo">ASOUTN</a>
            <ul class="right hide-on-med-and-down ">
              <li><a class="hoverable" href=""onmouseDown="alert('La opción seleccionada, hace referencia a la página actual.')">Mantenimiento</a></li>
              
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
  
  <!--Hero-->
  <div class="section no-pad-bot" id="index-banner">    </div>
  
  <!--Intro and service-->
  <div id="intro" class="section scrollspy">
    
    <div class="materialboxed"><img  src="<?php echo base_url(); ?>img/parallax5.png" width="100%"></div>
    
    <div class="container">
      <div  class="col s12">
        <h4 class="center  text_h4"><span class="span_h2"> Mantenimiento Productos  <i class="fa fa-cog fa-spin fa-2x fa-fw"></i>
          <span class="sr-only"></span></span> </h4>
          <h6 class="center">En este apartado podra agregar, editar o eliminar sus productos</h6>
          <br>
        </div>
        
      </div>
      <div class="container">
        <ul class="collapsible popout" data-collapsible="accordion">
          <li>
            <div class="collapsible-header"><i class="material-icons ">turned_in_not </i>Mantenimiento de Categorías</div><!--////////Categorías//////-->
            <div class="collapsible-body">
              <div class="container">
                <form class="col s12" method="post"  action="<?php echo base_url('agregarCategoria'); ?>">
                  <div class='row'>
                    <div class='input-field col s12 m6'>
                      <input class='validate' type='text' name='nuevaCategoria' required />
                      <label for='nuevaCategoria'>Nombre de la nueva categoría</label>
                    </div>
                    <div class='input-field col s12 m6'>
                      <button type='submit' id="agregarRow" class='col s12 btn btn-large waves-effect blue darken-4'>Agregar categoria</button>
                    </div>
                    
                    
                  </div>
                  
                </form>
                
                
                
              </div>
              
              
            </div>
          </li>
          <li>
            <div class="collapsible-header" ><i class="material-icons ">shopping_basket</i>Mantenimiento de Productos</div> <!--//////Productos//////-->
            <div class="collapsible-body">
              
              <div class="container">
                <div class="row">
                  <div  class="col s12">
                    <br>  <br>  <h4 class="header">  <span class="span_h2"> Agregar productos</span> </h4>
                    
                    <br>
                  </div>
                  <div class="row">
                    <form class="col s12" method="post"  action="<?php echo base_url('agregarProducto'); ?>" enctype="multipart/form-data">
                      <div class='row'>
                        <div class='input-field col s12 m6'>
                          <input required class='validate' type='text' name='nombreProducto'  />
                          <label for='nombreProducto'>Nombre del producto</label>
                        </div>
                        <div class="input-field col s12 m6">
                          
                          <select required name="categoriaProducto"class="initialized scrollspy">
                            <option value disabled selected>Seleciona una categoría</option>
                            
                            <?php    while ($row = $resultadocategorias->fetch_assoc()) { ?>
                              <option value="<?php echo $row['id'];?>"><?php echo $row['nombre_categoria'];?></option>
                              <?php  } ?>
                              
                            </select>
                            <label>Categoría del producto:</label>
                          </div>
                        </div>
                        
                        <div class='row'>
                          <div class='input-field col s12 m4' >
                            <input required class='validate tooltipped'data-position="top" data-delay="50" data-tooltip="Código numérico" type='number'min="1" name='codProducto'  />
                            <label for='codProducto'data-error="Código no válido, debe ser mayor a 1">Código del producto</label>
                          </div>
                          <div class='input-field col s12 m4' >
                            <input required class='validate' type='number'min="0" name='cantidad'  />
                            <label for='cantidad' data-error="Cantidad no válida, debe ser mayor a 1">Cantidad disponible</label>
                          </div>
                          <div class='input-field col s12 m4' >
                            <input required class='validate' type='number' name='precio'min="1"  />
                            <label for='precio' data-error="Precio no válida, debe ser mayor a 1">Precio unitario </label>
                          </div>
                        </div>
                        
                        <div class='row'>
                          
                          <div class='input-field col s12 '>
                            <input required class='validate' type='text' name='descripcion' id='descripcion' />
                            <label for='descripcion'>Descripción del producto</label>
                          </div>
                          
                        </div>
                        
                        <div class="row">
                          <div class="file-field input-field col s12">
                            <div class="btn blue darken-4">
                              <i class="fa fa-file-image-o" aria-hidden="true"></i>
                              <input required name="imagenCargada" id="imagenCargada" type="file" accept="image/*">
                            </div>
                            <div class="file-path-wrapper">
                              <input required  name="photo_nombre" class="file-path validate" type="text" placeholder="Imágen del producto">
                            </div>
                          </div>
                        </div>  
                        <br />
                        <center>
                          <div class='row'>
                            
                            <button type='submit' id="agregarRow" class='col s12 btn btn-large waves-effect blue darken-4'>Agregar Producto</button>
                          </div>
                        </center>
                      </form>
                      
                      
                      
                      
                    </div>
                    <div class="row">
                      <h3>Productos</h3>
                      <table id="tabla"class="striped bordered">
                        
                        <thead>
                          <tr>
                            <th class="titulocolumnas" >Código</th>
                            <th class="titulocolumnas" >Categoría</th>
                            <th class="titulocolumnas" >Nombre del producto</th>
                            <th class="titulocolumnas" >Descripción del producto</th>
                            <th class="titulocolumnas" >Cantidad Disponible</th>
                            <th class="titulocolumnas" >Precio</th>
                            <th class="titulocolumnas" >Imagen ilustrativa</th>
                            <th class="titulocolumnas"  COLSPAN="2">Opciones</th>
                            
                          </tr>
                          
                        </thead>
                        <tbody>
                          
                          <?php    while ($row = $resultadoproductos->fetch_assoc()) { 
                            $imagenPro = base64_encode($row['imagen']);
                            
                            
                            ?>
                            
                            
                            <tr >
                              <td><?php echo $row['codProducto'];?></td>
                              <td><?php echo $row['categoria'];?></td>
                              <td><?php echo $row['nombreProducto'];?></td>
                              <td><?php echo $row['descripcion'];?></td>
                              <td><?php echo $row['cantidad'];?></td>
                              <td><?php echo $row['precio'];?></td>
                              
                              
                              
                              
                              <td><img class="materialboxed responsive-img" width="80px" height="80px"src="data:image/jpg;base64,<?php echo $imagenPro;?>" > </td>
                              
                              <!-- aqui se edita-->
                              <td> 
                                
                                
                                <button id="botonEliminar" type="" class="waves-effect blue waves-light btn" onclick="mostrar(<?php echo $row['id'];?>)" name="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                
                                
                              </form> 
                              
                              
                            </td> 
                            <!-- aqui se elimina-->
                            <td> 
                              
                              <form class="" action="<?php echo base_url('/Producto/eliminarProducto'); ?>" method="post">
                                <div class="inputsInvisibles">
                                  <input class="inputsInvisibles"type="text" name="idProducto" value="<?php echo $row['id'];?>">
                                </div>
                                
                                <button id="botonEliminar" type="submit" class="waves-effect red waves-light btn" name="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                
                                
                              </form> 
                              
                              
                              
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td id="editFade<?php echo $row['id'];?>"style="display: none "colspan="8">
                              <form class="" action="<?php echo base_url('/Producto/editarProducto'); ?>" method="post">
                                <div class="row">
                                  <div class="input-field col s3">
                                    <input id="nombre_product" name="nombre_product" type="text" value="<?php echo $row['nombreProducto'] ?>"required>
                                    <label for="nombre_product" class="">Nombre Producto</label>
                                  </div>
                                  <div class="input-field col s3">
                                    <input id="descripcion" name="descripcion" type="text" value="<?php echo $row['descripcion'] ?>"required>
                                    <label for="descripcion" class="">Descripción</label>
                                  </div>
                                  <div class="input-field col s2">
                                    <input id="cantidadArt" name="cantidadArt" type="number" value="<?php echo $row['cantidad'] ?>"required>
                                    <label for="cantidadArt" class="">Disponibles</label>
                                  </div>
                                  <div class="input-field col s2">
                                    <input id="precioArt" name="precioArt"type="number" value="<?php echo $row['precio'] ?>"required>
                                    <label for="precioArt" class="">Precio</label>
                                  </div>
                                  <div class="input-field col s2">
                                    <div class="inputsInvisibles">
                                      <input class="inputsInvisibles"type="text" name="idProducto" value="<?php echo $row['id'];?>">
                                    </div>
                                    <button width="80px"class="btn cyan waves-effect waves-light" type="submit" name="action">Editar
                                      <i class="mdi-content-send"></i>
                                    </div>
                                    
                                  </button>
                                </div>
                              </form>
                              
                              
                            </td>
                          </tr>
                          
                          <?php  } ?>
                          
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
    
    
    
    
    <!--
    <?php 
    //$conexion =new mysqli("localhost", "root", "", "asoutn");
    //$query= "SELECT *FROM imagen_perfil ";
    //$resultado = $conexion->query($query);
    //while ($row = $resultado->fetch_assoc()) {
    
    
    ?>
    <tr>
    
    <td>  <img width="100px" height="100px"src="data:image/jpg;base64,<?php //echo base64_encode($row['imagen']);?>" ></td>
  </tr>
  <?php 
} 
?>
-->










