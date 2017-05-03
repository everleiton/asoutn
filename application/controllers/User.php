<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class User extends CI_Controller {
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
  * METODO PARA CARGAR PAGINA PRINCIPAL
  *
  */
  public function principal()
  {
    $this->load->view('/Inicio/index');
  }
  
  /**
  * METODO PARA CARGAR PAGINA DE LOGIN
  *
  */
  public function entrar()
  {
    $this->load->view('/Inicio/login');
  }
  /**
  * METODO PARA CARGAR PAGINA DE REGISTRO
  *
  */
  public function registro()
  {
    $this->load->view('/Inicio/register');
  }
  
  /**
  * METODO PARA INSERTAR USUARIO EN TABLA DE USUARIO
  *
  */
  public function insert()
  {
    $passEncript= md5($this->input->post('password'));
    $this->load->model('User_model');
    $user['email'] = $this->input->post('email');
    $user['password'] = $passEncript;
    $user['name'] = $this->input->post('name');
    $user['tipo_usuario'] = 2;
    $nombre =  $this->input->post('photo_nombre');;
    $Imagen= addslashes(file_get_contents($_FILES['imagenCargada']['tmp_name']));
    $idU = $this->input->post('email');
    $conexion =new mysqli("localhost", "root", "", "asoutn");
    $query= "INSERT INTO imagen_perfil (nombre, imagen, id_usuario) VALUES('$nombre', '$Imagen', '$idU')";
    $resultado = $conexion->query($query);
    
    $data['user'] = $this->User_model->insertar($user);
    redirect( base_url('inicioSesion'));
  }
  
  
}





