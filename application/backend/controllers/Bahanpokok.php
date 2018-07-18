<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bahanpokok extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('login');
		}elseif ($this->session->userdata('role')=='staff') {
			redirect('home');
		}
		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}


	public function index()
	{

			$crud = new grocery_CRUD();

			$crud->set_theme('bootstrap');
			$crud->set_table('tb_bahanpokok');
			$crud->set_subject('Bahan');

			$output = $crud->render();

			$data['content'] 	= 'master/index';
			$data['tablecrud'] = $output;

			$data['js_files'] = $output->js_files;
			$data['css_files'] = $output->css_files;

      		$this->load->view('layout/main_grocery',$data);
      		
	}

	
}