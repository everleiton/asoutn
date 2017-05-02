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
	function deleteProducto($producto)
	{
		$this->db->WHERE('id', $producto);
		$query = $this->db->delete('productos');
	
		return $query;	
	}
	
	function updateCompra($id){
		$data = array(
            'estado' => 'Comprado'  
        );
        $this->db->where('id_usuario', $id);
return $this->db->update('usuario_producto', $data);
	
	}
	
	
	
	
	function updateProducto($data,$id){
	
				$this->db->where('id', $id);
return $this->db->update('productos', $data);
	
	}
	
}