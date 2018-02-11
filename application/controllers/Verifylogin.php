<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifylogin extends CI_Controller {
  /**
  * METODO PARA CARGAR AUTENTICAR
  *
  */
  public function authenticate() {
    /*tomamos los 2 datos del from con el pass ya modificado*/
    $user = $this->input->post('email');
    $passever= md5($this->input->post('password'));
    /*cargamos el modelo y enviamos la consulta a la DB*/
    $this->load->model('User_model');
    $query = $this->User_model->authenticate($user, $passever);   
    $row = $query->row_array();
    if (isset($row))
    {
      $user = array(
        'id'            => $row['id'],
        'email'         => $row['email'],
        'password'      => $row['password'],
        'name'          => $row['name'],
        'tipo_usuario'  => $row['tipo_usuario']
      ); 
      $this->session->set_userdata('user', $user); 
      if ($row['tipo_usuario']==1) {
        
        $this->load->view('Logueado/index');
      }else {
        $this->load->view('Logueado/indexuser');
        
        
      }
    } else 
    { 
      $data['error'] = "Usuario o contraseña incorrecta, por favor vuelva a intentar";
      $this->load->view('/Inicio/login',$data);
    }
  }
  /**
  * METODO PARA CARGAR CERRAR SESION
  *
  */
  public function cerrar_sesion() {
    session_destroy();
    $this->load->view('Logearse/index');
  }
  
}