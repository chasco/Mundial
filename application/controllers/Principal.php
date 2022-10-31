<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct()
	{
	
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('partidos_model');

		$data = $this->users_model->logged();

		$data['resuser'] = $this->users_model->get_user($data['c_user']);

		$this->load->view('view_cabecera',$data);			
			
	}

	public function menu()
	{

		$querypart = $this->partidos_model->list_nextpartidos();

		$data['querypart'] = $querypart;

		$this->load->view('view_principal',$data);

	}

}