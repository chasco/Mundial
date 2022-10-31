<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
	
		parent::__construct();
		$this->load->model('users_model');

		$this->load->view('view_cabecera_login');

	}

	public function index()
	{
		
		$this->session->sess_destroy();
		$this->load->view('welcome_message');
	}

	public function add_user($pc_code)
	{

		if ($pc_code != '1111')
		{
			$data['c_code'] = $pc_code;
		}
		else
		{
			$data['c_code'] = '';			
		}

		$this->load->view('view_newuser',$data);



	}

	public function valida()
	{

		$resuser = $this->users_model->valida_user($_POST['c_user'],$_POST['c_password']);

		if ($resuser)
		{
			$user_data = array(
               'c_user' => $resuser->c_user,
               'n_nivel' => $resuser->n_nivel,
               'logged' => TRUE
            );
            $this->session->set_userdata($user_data);

			redirect('principal/menu');
		}
		else
		{
			redirect('');
		}		

	}	


}
