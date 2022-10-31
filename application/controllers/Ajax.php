<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
	
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('partidos_model');
		$this->load->model('apuestas_model');			
			
	}

	public function valida_login()
	{

		$resuser = $this->users_model->valida_user($_POST['c_user'],$_POST['c_password']);

		if ($resuser)
		{
			echo 'VAL';
		}
		else
		{
			echo 'INV';
		}			

	}

	public function update_user()
	{

		$str = $this->users_model->update_user($_POST);

		echo $str;

	}

	public function valida_user()
	{

		$resuser = $this->users_model->get_user($_POST['c_user']);

		if ($resuser)
		{

			echo 'INV';

		}
		else
		{

			echo 'VAL';

		}

	}

	public function valida_code()
	{

		$rescode = $this->users_model->valida_code($_POST['c_code']);

		if ($rescode)
		{
			echo 'VAL';
		}
		else
		{
			echo 'INV';
		}

	}

	public function add_user()
	{

		$this->users_model->add_user($_POST);

	}

	public function update_saldo()
	{

		$this->users_model->update_saldo($_POST);

	}

	public function update_partido()
	{

		$this->partidos_model->update_partido($_POST);

	}

	public function add_partido()
	{

		$this->partidos_model->add_partido($_POST);

	}

	public function add_apuesta()
	{

		$this->apuestas_model->add_apuesta($_POST);

	}

	public function get_saldo()
	{

		$resuser = $this->users_model->get_saldo($_POST['n_coduser']);

		echo $resuser->n_saldo;

	}

	public function show_apuestas_partido()
	{

		$queryapu = $this->apuestas_model->list_apuestas_partido($_POST['n_codpartido'],$_POST['n_coduser']);



		$str = '';

		$i = 1;

		foreach ($queryapu->result() as $row):

			$str =  $str.'<form class="form-inline">
							<input type="hidden" id="n_codpartido_'.$i.'" value="'.$row->n_codpartido.'">
							<input type="hidden" id="n_seqapuesta_'.$i.'" value="'.$row->n_seqapuesta.'">
							<label class="mb-2 ml-2 mr-sm-2" for="n_goles1_'.$i.'">'.$row->c_equipo1.'</label>
							<input type="number" id="n_goles1_'.$i.'" class="form-control w-25 mb-2 ml-2 mr col-2" value="'.$row->n_goles1.'">
							<label class="mb-2 ml-2 mr-sm-2" for="n_goles2_'.$i.'">'.$row->c_equipo2.'</label>
							<input type="number" id="n_goles2_'.$i.'" class="form-control w-25 mb-2 ml-2 mr col-2" value="'.$row->n_goles2.'">							

						  	<input type="button" id="update-apuesta" class="btn mb-2 ml-2 mr-sm-2" value="Actualizar" onClick="passUpdate('.$i.')">
						  	<input type="button" id="delete-appuesta" class="btn btn-danger mb-2 ml-2 mr-sm-2" value="Borrar" onClick="passDelete('.$i.')">  
						  </form>';

			$i = $i + 1;

		endforeach;

		echo $str;

	}

	public function update_apuesta()
	{

		$this->apuestas_model->update_apuesta($_POST);

	}

	public function delete_apuesta()
	{

		$this->apuestas_model->delete_apuesta($_POST);

	}

	public function show_ganadores_partido()
	{

		$querygan = $this->apuestas_model->list_ganadores_partido($_POST['n_codpartido']);

		$str = '';

		foreach($querygan->result() as $row):

			$str = $str.'<p> '.$row->c_nombre.' </p> 
						 <hr>';

		endforeach;

		echo $str;

	}

	public function get_apuesta()
	{

		$resseq = $this->apuestas_model->seqapuesta($_POST['n_codpartido'], $_POST['n_coduser']);

		echo $resseq->count;

	}

	public function get_estado_partido()
	{


		$respartido = $this->partidos_model->get_partido($_POST['n_codpartido']);

		echo $respartido->c_estado;

	}		

}