<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('login');
		}
		$this->load->helper('text');
		$this->load->model('Komoditas_model');
	}
	public function index()
	{
		$data['content'] 	= 'dashboard';
		$data['bahanpokok']	= $this->Komoditas_model->countbahanpokok();
		$data['jenisbahanpokok']	= $this->Komoditas_model->countjenisbahanpokok();
		$data['pasar']	= $this->Komoditas_model->countpasar();
		$data['user']	= $this->Komoditas_model->countuser();
		$this->load->view('layout/main', $data);
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('login');
	}
}
