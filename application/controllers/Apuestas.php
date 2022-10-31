<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apuestas extends CI_Controller {

	public function __construct()
	{
	
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('partidos_model');
		$this->load->model('apuestas_model');

		$data = $this->users_model->logged();

		$data['resuser'] = $this->users_model->get_user($data['c_user']);

		$this->load->view('view_cabecera',$data);			
			
	}

	public function list_partidos_apuestas()
	{

		$data = $this->users_model->logged();

		$resuser = $this->users_model->get_user($data['c_user']);

		$querypart = $this->partidos_model->list_partidos_apuestas_puntos($resuser->n_coduser);

		$data['querypart'] = $querypart;

		$this->load->view('view_list_partidos_apuestas',$data);

	}

}