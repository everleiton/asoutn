<?php

class Producto_model extends CI_Model{

	function insertar($productos)
	{
		$query = $this->db->insert('productos',$productos);

		return $query;	
	}
	
	


	
}