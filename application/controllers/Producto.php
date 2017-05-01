<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Producto extends CI_Controller {
  /**
  * Index Page for this controller.
  *
  * Maps to the following URL
  * 		http://example.com/index.php/welcome
  *	- or -
  * 		http://example.com/index.php/welcome/index
  *	- or -
  * Since this controller is set as the default controller in
  * config/routes.php, it's displayed at http://example.com/
  *
  * So any other public methods not prefixed with an underscore will
  * map to /index.php/welcome/<method_name>
  * @see https://codeigniter.com/user_guide/general/urls.html
  */
  
  
  
  public function carrito()
  {
    $this->load->view('/Carrito/carro');
  }
  
  
  public function insert()
  {
  
  
    $nombreProducto= $this->input->post('nombreProducto');
    $categoria = $this->input->post('categoriaProducto');
    $codProducto = $this->input->post('codProducto');
    $cantidad = $this->input->post('cantidad');
    $precio = $this->input->post('precio');
    $descripcion = $this->input->post('descripcion');
    $imagen = addslashes(file_get_contents($_FILES['imagenCargada']['tmp_name']));
  

  
  
 $nombre =  $this->input->post('photo_nombre');;
  $Imagen= addslashes(file_get_contents($_FILES['imagenCargada']['tmp_name']));
$idU = $this->input->post('codProducto');

  $conexion =new mysqli("localhost", "root", "", "asoutn");
        $query= "INSERT INTO productos (nombreProducto, categoria, codProducto, cantidad, precio, descripcion, imagen) 
        VALUES('$nombreProducto', '$categoria', '$codProducto', '$cantidad', '$precio', '$descripcion', '$imagen')";

        $resultado = $conexion->query($query);
        
        
    if (isset($resultado))
    {
    
      $data['msj'] = "Se ha insertado exitosamente el nuevo producto.";
      
        redirect( base_url('mantenimiento'),$data);
    //  $this->load->view('/Maintenance/mantenimientoProductos',$data);
  }
    
   else 
  { 
    $data['msj'] = "No se ha insertado";
    $this->load->view('/Maintenance/mantenimientoProductos',$data);
 }
}

public function insertCompra()
{
  
  $this->load->model('Producto_model');
  $producto['id_usuario'] = $this->input->post('id_usuario');
  $producto['id_producto'] = $this->input->post('id_producto');
  $producto['cantidad'] = $this->input->post('cantidadDeseada');

  $this->Producto_model->insertarProductousuario($producto);
// $this->load->view('/Logueado/indexuser');
    redirect( base_url('compraRealizada'));

}
  public function eliminarItemCarrito()
 {
   $idElim = $this->input->post('idProductoCarrito');
   $this->load->model('Producto_model');
 $this->Producto_model->deleteItem($idElim);
     redirect( base_url('itemEliminado'));
 }



public function enviarCorreo(){
$nombre  = $this->input->post('nombreUsuario');
 $correoU= $this->input->post('correoUsuario');
 var_dump($nombre);
  $ci = get_instance();
$ci->load->library('email');
$config['protocol'] = "smtp";
$config['smtp_host'] = "ssl://smtp.gmail.com";
$config['smtp_port'] = "465";
$config['smtp_user'] = "everleitonm@gmail.com"; 
$config['smtp_pass'] = "Everleiton1997";
$config['charset'] = "utf-8";
$config['mailtype'] = "html";
$config['newline'] = "\r\n";

$ci->email->initialize($config);

$ci->email->from('asoutn@utn.ac.cr', 'ASOUTN');
$list = array($correoU);
$ci->email->to($list);
$this->email->reply_to('no-reply@gmail.com', 'ASOUTN');
$ci->email->subject('Tu pedido de ASOUTN viene en camino '.$nombre);
$stringMessage= '<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td style="padding: 10px 0 30px 0;"><table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;"><tr><td align="center" bgcolor="#70bbd9" style="; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"><img src="https://raw.githubusercontent.com/everleiton/asoutn/master/slider2/3.png" alt="Creating Email Magic" width="800" height="201" style="display: block;" /></td></tr><tr><td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td style="color: #f87600; font-family: Arial, sans-serif; font-size: 24px;"><b>ASOUTN | Confirmación de Pedido</b></td></tr><tr><td style="padding: 20px 0 30px 0; color: #1B3069; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">Hola '.$nombre.',  el pedido ha sido realizado con éxito, la entrega se realizará en un plazo de 3 días.Gracias por preferirnos</td></tr><tr><td><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td width="260" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td><img src="https://raw.githubusercontent.com/everleiton/asoutn/master/images/img2.png" alt="" width="100%" height="50%" style="display: block;" /></td></tr><tr><td style="padding: 25px 0 0 0; color: #1B3069; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">Visita nuestra tienda oficial. Estamos ubicados en la Universidad Técnica Nacional, Sede Central, Alajuela, Costa Rica.</td></tr></table></td></tr></table></td></tr></table></td></tr><tr><td bgcolor="#f87600" style="padding: 30px 30px 30px 30px;"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">&reg; 2017, Ever Leitón, Proyecto Programación en Ambiente Web I<br/></td></tr></table></td></tr></table></td></tr></table>';
  

  
$ci->email->message($stringMessage);





if($ci->email->send()) {
    echo 'Sent';
} else {
    $this->email->print_debugger();
    echo "No send";
}

}


}





