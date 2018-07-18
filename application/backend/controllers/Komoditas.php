<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komoditas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')==="") {
			redirect('login');
		}
		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
		$this->load->model('Komoditas_model');
	}


	public function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('bootstrap');
		$crud->set_table('tb_hargakomoditas');
		$crud->set_subject('Data Komoditas');

		$crud->set_relation('id_bahanpokok','tb_bahanpokok','nama_bahan_pokok');
		$crud->display_as('id_bahanpokok','Nama Bahan Pokok');
		$crud->set_relation('id_jenisbahanpokok','tb_jenisbahanpokok','nama_jenis_bahan_pokok');
		$crud->display_as('id_jenisbahanpokok','Jenis');
		$crud->set_relation('id_pasar','tb_pasar','nama_pasar');
		$crud->display_as('id_pasar','Pasar');
		$crud->required_fields('id_bahanpokok','id_jenisbahanpokok','id_pasar','satuan','tgl_update','harga');
		$output = $crud->render();

		$data['content'] 	= 'master/index';
		$data['tablecrud'] = $output;
		$data['js_files'] = $output->js_files;
		$data['css_files'] = $output->css_files;

  		$this->load->view('layout/main_grocery',$data);
  		
	}



	

}