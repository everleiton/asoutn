<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifylogin extends CI_Controller {
  
  public function authenticate() {
    
    /*tomamos los 2 datos del from con el pass ya modificado*/
    $user = $this->input->post('email');
    $passever= md5($this->input->post('password'));
    
    /*cargamos el modelo y enviamos la consulta a la DB*/
    $this->load->model('User_model');
    
    $query = $this->User_model->authenticate($user, $passever); /* <<<<<<<<<<<<<<<<<<<<<<<<<<<<<NO TOCAR*/
    
    
    $row = $query->row_array();
    
    if (isset($row))
    {
  
    
      /*  echo $row['id'];
      echo base64_encode($row['photo']);
      echo "-------------";
     */
      $user = array(
        'id'            => $row['id'],
        'email'         => $row['email'],
        'password'      => $row['password'],
        'name'          => $row['name'],
        'tipo_usuario'  => $row['tipo_usuario']
      ); 
  
      
    $this->session->set_userdata('user', $user); /* <<<<<<<<<<<<<<<<<<<<<<<<<<<<<NO TOCAR*/
      
      
      //  redirect( base_url('inicio'));
      if ($row['tipo_usuario']==1) {
        # code...
        $this->load->view('Logueado/index');
      }else {
        $this->load->view('Logueado/indexuser');
      //  $this->load->view('Logueado/login');

      }
      
      //  $this->session->set_userdata('user', $r[0]);  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<NO TOCAR
  } else 
    { 
      $data['error'] = "Usuario o contraseña incorrecta, por favor vuelva a intentar";
      $this->load->view('/Inicio/login',$data);
    }
  }
  public function cerrar_sesion() {
    session_destroy();
    $this->load->view('Logearse/index');
  }

}