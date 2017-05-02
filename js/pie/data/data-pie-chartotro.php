<?php
#Pie Chart
require '../../conn/connection.php';
$conexion =new mysqli("localhost", "root", "", "asoutn");
$query= "SELECT  productos.nombreProducto as name, SUM(usuario_producto.cantidad) as val from usuario_producto Join productos on  usuario_producto.id_producto = productos.id  and usuario_producto.estado = 'comprado' GROUP by productos.nombreProducto ORDER by  productos.nombreProducto ASC  ";
 $result = $conexion->query("$query");
 
 
//$result = mysql_query("");

//$rows = array();
$rows['type'] = 'pie';
$rows['name'] = 'Revenue';
//$rows['innerSize'] = '50%';
while ($r = $result->fetch_assoc()) {
    $rows['data'][] = array($r['name'], $r['val']);    
}
$rslt = array();
array_push($rslt,$rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysql_close($con);


