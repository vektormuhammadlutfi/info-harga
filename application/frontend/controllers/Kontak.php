<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Komoditas_model');
	}
	public function index()
	{
		

		$data['content'] 	= 'kontak/index';
		$this->load->view('layout/main_single', $data);
	}
}
