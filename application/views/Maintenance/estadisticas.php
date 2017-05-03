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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>slider2/style.css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>slider2/jquery.js"></script>
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
  ?>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    var options = {
      chart: {
        renderTo: 'containerGrafico',
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false  
      },
      title: {
        text: 'Resumen de ingresos por ventas'
      },
      tooltip: {
        formatter: function() {
          return '<b>' + this.point.name + '</b>: ' + this.y;
        }
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            color: '#1B3069',
            connectorColor: '#f87600',
            formatter: function() {
              return '<b>' + this.point.name + '</b>: ' +'₡'+ this.y;
            }
          },
          showInLegend: true
        }
      },
      series: []
    };
    $.getJSON("<?php echo base_url() ?>js/pie/data/data-pie-chart.php", function(json) {
      options.series = json;
      chart = new Highcharts.Chart(options);
    });
  });
  </script>
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="http://code.highcharts.com/modules/exporting.js"></script>
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
          <a href="<?php echo base_url('inicioAdministrador') ?>" id="logo-container" class="brand-logo">ASOUTN</a>
          <ul class="right hide-on-med-and-down ">
            <li><a class="hoverable" href="<?php echo base_url('mantenimiento'); ?>">Mantenimiento</a></li>
            <li><a class="hoverable" href=""onmouseDown="alert('La opción seleccionada, hace referencia a la página actual.')">Estadísticas</a></li>
            <li ><a  id="rowPerfil"class="dropdown-button hoverable" data-activates="dropdown1">            
              <img class="circle responsive-img" width="50px" height="50px"src="data:image/jpg;base64,<?php echo $imagenPerfil;?>" > 
              <?php echo $user['name']; ?>
              <i class="material-icons right">arrow_drop_down</i>
            </a>
            <ul id="dropdown1" class="dropdown-content">
              <li><a class="hoverable" href="<?php echo base_url('mantenimiento'); ?>">Mantenimiento</a></li>
              <li><a class="hoverable" href=""onmouseDown="alert('La opción seleccionada, hace referencia a la página actual.')">Estadísticas</a></li>
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
<div id="intro" class="section scrollspy">
  <div class=""><img src="<?php echo base_url(); ?>img/parallax6.png"></div>
  <div class="container">
    <div id="containerGrafico" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
  </div>
  <div class=""><img src="<?php echo base_url(); ?>img/parallax7.png"></div>
  <div class="container">  
    <script type="text/javascript">
    $(document).ready(function() {
      var options = {
        chart: {
          renderTo: 'containerGrafico2',
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false
          
        },
        title: {
          text: 'Resumen de ventas'
        },
        tooltip: {
          formatter: function() {
            return '<b>' + this.point.name + '</b>: ' + this.y;
          }
        },
        plotOptions: {
          pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: true,
              color: '#1B3069',
              connectorColor: '#f87600',
              formatter: function() {
                return '<b>' + this.point.name + '</b>: ' + this.y;
              }
            },
            showInLegend: true
          }
        },
        series: []
      };
      $.getJSON("<?php echo base_url() ?>js/pie/data/data-pie-chartotro.php", function(json) {
        options.series = json;
        chart = new Highcharts.Chart(options);
      });  
    });
    </script>
    <div id="containerGrafico2" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
  </div>
</div>
<div class="myfooter"  id="contact"></div>
<script src="<?php echo base_url(); ?>min/plugin-min.js"></script>
<script src="<?php echo base_url(); ?>min/custom-min.js"></script>
<script src="<?php echo base_url(); ?>js/js.js"></script>
<script src="https://use.fontawesome.com/df85f162da.js"></script>
</body>
</html>
