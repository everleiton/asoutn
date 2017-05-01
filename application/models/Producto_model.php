<?php

class Producto_model extends CI_Model{

	function insertar($productos)
	{
		$query = $this->db->insert('productos',$productos);

		return $query;	
	}
	function insertarProductousuario($productos)
	{
		$query = $this->db->insert('usuario_producto',$productos);

		return $query;	
	}
	

	function deleteItem($producto)
	{
		$this->db->WHERE('id', $producto);
		$query = $this->db->delete('usuario_producto');
	
		return $query;	
	}
	
}