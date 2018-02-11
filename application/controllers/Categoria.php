<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Categoria extends CI_Controller {
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
  

  
  /**
  * METODO PARA INSERTAR CATEGORIAS
  *
  */
  public function insert()
  {
    $this->load->model('Categoria_model');
    $categoria['nombre_categoria'] = $this->input->post('nuevaCategoria');
    $row = $this->Categoria_model->insertar($categoria);
    if (isset($row))
    {
      $data['msj'] = "Se ha insertado exitosamente";
      $this->load->view('/Maintenance/mantenimientoProductos',$data);
    }
   else 
  { 
    $data['msj'] = "No se ha insertado";
    $this->load->view('/Maintenance/mantenimientoProductos',$data);
  }
}




}





