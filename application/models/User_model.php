<?php

class User_model extends CI_Model{

	function insertar($user)
	{
		$query = $this->db->insert('usuarios',$user);

		return $query;
	}
	
	function insertarfoto($foto)
	{
		$query= "INSERT INTO imagen_perfil (nombre, imagen, id_usuario) VALUES('$nombre', '$Imagen', 'ever')";
	 
	  $resultado =  $this->db->query($query);
	}
	function login($email, $password)
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
	 function authenticate($user, $pass) {
		 $query = $this->db->get_where('usuarios', array('email' => $user, 'password' => $pass));
		
	//return $query->result_object();
	  return $query;
  }

	/*
	Actualizar datos
	*/
    function actualizar_user($id, $email, $password, $name, $photo) {
        $data = array(
             'fullname' => $name,
           'username' => $username,
            'pass' => $pass,
            'email' => $email,
            'address' => $address
        );
        $this->db->where('id', $id);
        return $this->db->update('usuarios', $data);
    }
}