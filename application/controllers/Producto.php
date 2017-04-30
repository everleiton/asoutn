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
  
  
  
  
  
  
  public function insert()
  {
    /*
    $this->load->model('Producto_model');
    $producto['nombreProducto'] = $this->input->post('nombreProducto');
    $producto['categoria'] = $this->input->post('categoriaProducto');
    $producto['codProducto'] = $this->input->post('codProducto');
    $producto['cantidad'] = $this->input->post('cantidad');
    $producto['precio'] = $this->input->post('precio');
    $producto['descripcion'] = $this->input->post('descripcion');
    $producto['imagen'] = addslashes(file_get_contents($_FILES['imagenCargada']['tmp_name']));
  */
  
    $nombreProducto= $this->input->post('nombreProducto');
    $categoria = $this->input->post('categoriaProducto');
    $codProducto = $this->input->post('codProducto');
    $cantidad = $this->input->post('cantidad');
    $precio = $this->input->post('precio');
    $descripcion = $this->input->post('descripcion');
    $imagen = addslashes(file_get_contents($_FILES['imagenCargada']['tmp_name']));
  
  
    
  //$row = $this->Producto_model->insertar($producto);
  
  
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

public function enviarCorreo(){
  
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

$ci->email->from('everleitonm@gmail.com', 'ASOUTN');
$list = array('everleitonm@gmail.com');
$ci->email->to($list);
$this->email->reply_to('everleitonm@gmail.com', 'ASOUTN');
$ci->email->subject('Confirmación de pedido');
$ci->email->message('Su pedido fué procesado. La entrega se realizará en los próximos 3 días.');





if($ci->email->send()) {
    echo 'Sent';
} else {
    $this->email->print_debugger();
    echo "No send";
}
}


}





