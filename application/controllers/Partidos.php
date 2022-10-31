<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partidos extends CI_Controller {

	public function __construct()
	{
	
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('partidos_model');


		$data = $this->users_model->logged();

		$data['resuser'] = $this->users_model->get_user($data['c_user']);

		$this->load->view('view_cabecera',$data);			
			
	}

	public function list_partidos()
	{

		$querypart = $this->partidos_model->list_partidos();
		$queryequi = $this->partidos_model->list_equipos();

		$data['querypart'] = $querypart;
		$data['queryequi'] = $queryequi;

		$this->load->view('view_list_partidos',$data);

	}

	public function list_partidos_finalizados()
	{

		$querypart = $this->partidos_model->list_partidos_finalizados();

		$data['querypart'] = $querypart;

		$this->load->view('view_list_partidos_finalizados',$data);

	}

	public function list_partidos_all_apuestas()
	{

		$querypart = $this->partidos_model->list_partidos();

		$data['querypart'] = $querypart;

		$this->load->view('view_list_partidos_all_apuestas',$data);

	}

}