<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tabel_komoditas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Komoditas_model');
	}

	public function index()
	{
		
		$data['data_rataratahariini']     = $this->Komoditas_model->get_rataratahariini_tabel();
		$data['data_ratarataharikemarin'] = $this->Komoditas_model->get_ratarataharikemarin_tabel();
		$data['data_pasar']              = $this->Komoditas_model->get_pasar_tabel();
		$data['content'] 	= 'tabel-komoditas/index';
		$this->load->view('layout/main_single', $data);
	}

	public function cari()
	{
		$tgl_awal                                    = $this->input->post('tgl_awal');
		$id_pasar                                    = $this->input->post('id_pasar');
		
		$data['data_rataratahariini']     = $this->Komoditas_model->get_rataratahariini_tabel_cari($tgl_awal,$id_pasar);
		$data['data_ratarataharikemarin'] = $this->Komoditas_model->get_ratarataharikemarin_tabel_cari($tgl_awal,$id_pasar);
		$data['data_pasar']               = $this->Komoditas_model->get_pasar_tabel();
		$data['tgl_awal']                 = $tgl_awal;
		$data['nama_pasar']                 = $this->Komoditas_model->get_namapasar_tabel($id_pasar);
		
		$data['content'] 	= 'tabel-komoditas/index';
		$this->load->view('layout/main_single', $data);

	}
	
}