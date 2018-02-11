<?php

class User_model extends CI_Model{
	/**
	* METODO PARA AGREGAR USUARIO
	*
	*/
	function insertar($user)
	{
		$query = $this->db->insert('usuarios',$user);
		
		return $query;
	}
	/**
	* METODO PARA AGREGAR FOTO DEL USUARIO
	*
	*/
	function insertarfoto($foto)
	{
		$query= "INSERT INTO imagen_perfil (nombre, imagen, id_usuario) VALUES('$nombre', '$Imagen', 'ever')";
		
		$resultado =  $this->db->query($query);
	}
	
	/**
	* METODO PARA INICIAR SESION
	*
	*/
/*	function login($email, $password)
	{
		$this->db->select('id, email, password, name, photo, tipousuario');
		$this ->db-> from('usuarios');
		$this ->db-> where('email', $username);
		$this ->db-> where('pass', $password );
		$this ->db-> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1)
		{
		return $query->result();
	}
	else
	{
	return false;
}
}
**/
/**
* METODO PARA AUTENTICAR
*
*/
function authenticate($user, $pass) {
	$query = $this->db->get_where('usuarios', array('email' => $user, 'password' => $pass));
	
	return $query;
}


}