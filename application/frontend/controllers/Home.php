<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Komoditas_model');
	}

	public function index()
	{
		$data['data_rataratahariini']     = $this->Komoditas_model->get_rataratahariini();
		$data['data_ratarataharikemarin'] = $this->Komoditas_model->get_ratarataharikemarin();

		$data['content'] 	= 'home/index';
		$this->load->view('layout/main', $data);
	}
}
