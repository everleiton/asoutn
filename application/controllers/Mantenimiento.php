<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Mantenimiento extends CI_Controller {
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
   * METODO PARA CARGAR PAGINA DE MANTENIMIENTO
   *
   */
  public function pagmantenimiento()
  {
    $this->load->view('/Maintenance/mantenimiento');
  }
  /**
  * METODO PARA CARGAR PAGINA DE ESTADISTICAS
  *
  */
  public function estadisticas()
  {
    $this->load->view('/Maintenance/estadisticas');
  }
  


}
  
  
  
  
  
