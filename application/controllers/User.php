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
  
  public function principal()
  {
    $this->load->view('/Inicio/index');
  }
  
  
  public function entrar()
  {
    $this->load->view('/Inicio/login');
  }
  
  public function registro()
  {
    $this->load->view('/Inicio/register');
  }

  public function insert()
  {

      //$this->load->library('form_validation');
    //  $this->form_validation->set_rules('name','name','trim|required|min_length[10]');
    //  $this->form_validation->set_rules('email','email','trim|required');
    //  $this->form_validation->set_rules('password','password','trim|required');
        //$this->form_validation->set_rules('photo','photo','trim|required');
      
    //  $this->form_validation->set_message('required', 'Campo %s es obligatorio');
    //  $this->form_validation->set_message('min_length', 'Campo %s debe tener al menos %s car&aacute;cteres');	
      
    /*  if (!$this->form_validation->run())
      {
        $this->load->view('/Inicio/register');
      }
    else{*/
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

  //  $query= "INSERT INTO imagen_perfil (nombre, imagen, id_usuario) VALUES('$nombre', '$Imagen', 'ever')";

  //  $resultado = $conexion->query($query);

//   $this->User_model->insertarfoto($nombre, $Imagen, $idU);
    
  $data['user'] = $this->User_model->insertar($user);

  redirect( base_url('inicioSesion'));
  }
  
  


}
  
  
  
  
  
