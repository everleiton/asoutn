<?php

class Producto_model extends CI_Model{
	/**
	* METODO PARA INSERTAR PRODUTOS
	*
	*/
	function insertar($productos)
	{
		$query = $this->db->insert('productos',$productos);
		
		return $query;	
	}
	/**
	* METODO PARA INSERTAR PRODUTOS EN TABLA DE COMPRAS
	*
	*/
	function insertarProductousuario($productos)
	{
		$query = $this->db->insert('usuario_producto',$productos);
		
		return $query;	
	}
	
	/**
	* METODO PARA ELIMINAR PRODUTOS EN TABLA usuario_producto
	*
	*/
	function deleteItem($producto)
	{
		$this->db->WHERE('id', $producto);
		$query = $this->db->delete('usuario_producto');
		
		return $query;	
	}
	/**
	* METODO PARA ELIMINAR PRODUTOS EN TABLA PRODUCTOS
	*
	*/
	function deleteProducto($producto)
	{
		$this->db->WHERE('id', $producto);
		$query = $this->db->delete('productos');
		
		return $query;	
	}
	/**
	* METODO PARA ACTUALIZAR LAS COMPRAS
	*
	*/
	function updateCompra($id){
		$data = array(
			'estado' => 'Comprado'  
		);
		$this->db->where('id_usuario', $id);
		return $this->db->update('usuario_producto', $data);
		
	}
	
	/**
	* METODO PARA ACTUALIZAR PRODUCTOS
	*
	*/
	function updateProducto($data,$id){
		
		$this->db->where('id', $id);
		return $this->db->update('productos', $data);
		
	}
	
}