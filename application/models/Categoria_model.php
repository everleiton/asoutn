<?php

class Categoria_model extends CI_Model{
	/**
  * METODO PARA INSERTAR CATEGORIAS
  *
  */
	function insertar($categoria)
	{
		$query = $this->db->insert('lista_categoria',$categoria);

		return $query;	
	}
	
	


	
}