<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
	
		parent::__construct();
		$this->load->model('users_model');		

		$data = $this->users_model->logged();

		$data['resuser'] = $this->users_model->get_user($data['c_user']);

		$this->load->view('view_cabecera',$data);			
			
	}

	public function list_users()
	{

		$queryusers = $this->users_model->list_users();
		$data['queryusers'] = $queryusers;

		$this->load->view('view_list_users',$data);

	}

	public function list_puntos()
	{

		$queryusers = $this->users_model->list_users_puntos();
		$data['queryusers'] = $queryusers;

		$this->load->view('view_list_puntos',$data);

	}

}	