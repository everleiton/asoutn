<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Email extends CI_Controller {
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
  
  
  
  public function enviarCorreo(){

    $this->load->model('Producto_model');
    
    
    $nombre  = $this->input->post('nombreUsuario');
    $idUsuario  = $this->input->post('idUsuario');
    $correoU = $this->input->post('correoUsuario');
    $direccion = $this->input->post('direccion');
    $monto = $this->input->post('montocancelar');
    
    
    $var1 = $this->input->post('var1');
    $var2 = $this->input->post('var2');

    
    $arrayId = explode(",", $var1);
    $arrayCant = explode(",", $var2 );

    for ($i=0; $i < count($arrayId) ; $i++) { 
$data = array(  
      'cantidad' => $arrayCant[$i] 
     );
  $this->Producto_model->updateProducto($data, $arrayId[$i]);
    
    }
    

    
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
    $msjParte1= '<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td style="padding: 10px 0 30px 0;"><table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;"><tr><td align="center" bgcolor="#70bbd9" style="; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"><img src="https://raw.githubusercontent.com/everleiton/asoutn/master/slider2/3.png" alt="Creating Email Magic" width="800" height="201" style="display: block;" /></td></tr><tr><td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td style="color: #f87600; font-family: Arial, sans-serif; font-size: 24px;"><b>ASOUTN | Confirmación de Pedido </b></td></tr><tr><td style="padding: 20px 0 30px 0; color: #1B3069; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">Hola '.$nombre.', el pago del pedido ha sido realizado con éxito por un monto total de';
      
      
  
      $msjParte2=' , la entrega se realizará en un plazo de 3 días a la dirección: ';
      $msjParte3 = ' Gracias por preferirnos</td></tr><tr><td><br></td></tr><tr><td><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td width="260" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td style="padding: 25px 5px 5px 5px; text-align:center; color: #1B3069; font-family: Arial, sans-serif; font-size: 16px; line-height: 25px;">Visita nuestra tienda oficial. Estamos ubicados en la Universidad Técnica Nacional, Sede Central, Alajuela, Costa Rica.</td><td style="display:flex; justify-content:center;align-items:center"><img src="https://raw.githubusercontent.com/everleiton/asoutn/master/images/img2.png" alt="" width="80%" height="30%" style="display: block;" /></td></tr></table></td></tr></table></td></tr></table></td></tr><tr><td bgcolor="#f87600" style="padding: 30px 30px 30px 30px;"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">&reg; 2017, Ever Leitón, Proyecto Programación en Ambiente Web I<br/></td></tr></table></td></tr></table></td></tr></table>';
      
      $stringMessage= $msjParte1.  $monto. $msjParte2. $direccion . $msjParte3;
      
      $ci->email->message($stringMessage);
      
    
      $this->Producto_model->updateCompra($idUsuario);
      
      
      if($ci->email->send()) {
        $msj['msj'] = "Se ha realado exitosamente su compra, puede revisar la confirmación en su correo.";
        
          redirect( base_url('Producto/carrito'),$msj);
      } else {
        $msj['msj'] = "No se  ha realado exitosamente su compra, puede revisar la confirmación en su correo.";
        
         redirect( base_url('Producto/carrito'),$msj);
      }
      
      
      
      
    }
    
    
  }
  
  
  
  
  
