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
  public function historial()
  {
    $this->load->view('/Producto/historial');
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
    redirect( base_url('productos'));

}
  public function eliminarItemCarrito()
 {
   $idElim = $this->input->post('idProductoCarrito');
   $this->load->model('Producto_model');
 $this->Producto_model->deleteItem($idElim);
     redirect( base_url('itemEliminado'));
 }

 public function eliminarProducto()
{
  $idElim = $this->input->post('idProducto');
  $this->load->model('Producto_model');
$this->Producto_model->deleteProducto($idElim);
    redirect( base_url('mantenimiento'));
}



}





