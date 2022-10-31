<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model
{

	public function valida_user($pc_user, $pc_password)
	{

		$query = $this->db->query("SELECT * 
								   FROM usuarios 
								   WHERE c_user = '".$pc_user."' 
								   AND c_password = '".$pc_password."'" );

		$res = $query->row();

		return $res;

	}

	public function logged()
	{

		if($this->session->userdata('logged'))
      	{

			$data = array();

			$data['c_user'] = $this->session->userdata('c_user');
			$data['n_nivel'] = $this->session->userdata('c_nivel');

			return $data;

		}
		else
		{

			redirect('');

		}

	}

	public function get_user($pc_user)
	{

		$query = $this->db->query("SELECT * 
								   FROM usuarios 
								   WHERE c_user = '".$pc_user."'");

		$res = $query->row();

		return $res;

	}

	public function update_user($data)
	{

		$this->db->query("UPDATE usuarios 
						  SET c_nombres = '".$data['c_nombres']."',
						  c_apellido_p = '".$data['c_apellido_p']."',
						  c_apellido_m = '".$data['c_apellido_m']."',
						  c_email = '".$data['c_email']."'  
						  WHERE n_coduser = ".$data['n_coduser']);
	

	}

	public function add_user($data)
	{

		$this->db->query("UPDATE codigos 
						  SET c_valido = 'N' 
						  WHERE c_code = '".$data['c_code']."' ");

		$this->db->query("INSERT INTO usuarios (c_user, c_password, c_nombres, c_apellido_p, c_apellido_m, c_email)
						  VALUES ('".$data['c_user']."', '".$data['c_password']."', '".$data['c_nombres']."', '".$data['c_apellido_p']."', '".$data['c_apellido_m']."', '".$data['c_email']."')");

	}

	public function valida_code($pc_code)
	{

		$query = $this->db->query("SELECT * 
								   FROM codigos 
								   WHERE c_code = '".$pc_code."' 
								   AND c_valido <> 'N'");

		$res = $query->row();

		return $res;

	}

	public function list_users()
	{

		$query = $this->db->query("SELECT * 
								   FROM usuarios 
								   WHERE n_nivel = 2");

		return $query;

	}

	public function update_saldo($data)
	{

		$this->db->query("UPDATE usuarios 
						   SET n_saldo = ".$data['n_saldo']."
						   WHERE n_coduser = ".$data['n_coduser']);

	}

	public function get_saldo($pn_coduser)
	{

		$query = $this->db->query("SELECT * 
								   FROM usuarios
								   WHERE n_coduser = ".$pn_coduser);

		$res = $query->row();

		return $res;

	}

	public function list_users_puntos()
	{

		$query = $this->db->query("SELECT * 
								   FROM usuarios 
								   WHERE n_nivel = 2 
								   ORDER BY n_puntos");

		return $query;

	}

}