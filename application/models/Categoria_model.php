<?php

class Categoria_model extends CI_Model{

	function insertar($categoria)
	{
		$query = $this->db->insert('lista_categoria',$categoria);

		return $query;	
	}
	
	


	
}