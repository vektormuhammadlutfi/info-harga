<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
			$crud->set_table('tb_user');
			$crud->set_subject('Pasar');
			$crud->unset_fields('activation_code', 'forgot_password_code', 'forgot_password_time', 'created_at');
			$crud->columns('role', 'username', 'email', 'first_name', 'last_name', 'active', 'created_at');
			$crud->callback_before_insert(array($this, 'callback_before_create_user'));

			$output = $crud->render();

			$data['content'] 	= 'master/index';
			$data['tablecrud'] = $output;

			$data['js_files'] = $output->js_files;
			$data['css_files'] = $output->css_files;

      		$this->load->view('layout/main_grocery',$data);
      		
	}
	
	/**
	 * Grocery Crud callback functions
	 */
	public function callback_before_create_user($post_array)
	{
		$post_array['password'] = md5($post_array['password']);
		return $post_array;
	}
	
}