<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Komoditas_model');
	}
	
	public function index()
	{
		$data['data_pasar'] = $this->Komoditas_model->get_pasar();
		$data['content'] 	= 'pasar/index';
		$this->load->view('layout/main_single', $data);
	}

	public function data($id)
	{
		$data['data_rataratahariini']     = $this->Komoditas_model->get_rataratapasarterakhir($id);
		$data['data_ratarataharikemarin'] = $this->Komoditas_model->get_rataratapasarkemarin($id);
		$data['data_komoditas']     = $this->Komoditas_model->get_namakomoditas($id);
		$data['data_tanggal']   = $this->Komoditas_model->get_tanggal_pasar($id);
		
		$data['content'] 	= 'pasar/index';
		$this->load->view('layout/main_single', $data);
	}

	public function cari_tanggal($id)
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$data['data_rataratahariini']     = $this->Komoditas_model->get_rataratapasarterakhir($id);
		$data['data_ratarataharikemarin'] = $this->Komoditas_model->get_rataratapasarkemarin($id);
		$data['data_komoditas']     = $this->Komoditas_model->get_carinamakomoditas($id,$tgl_awal,$tgl_akhir);
		$data['tgl_awal']       = $tgl_awal;
		$data['tgl_akhir']       = $tgl_akhir;
		$data['data_tanggal']   = $this->Komoditas_model->get_tanggal_pasar($id);
		$data['content'] 	= 'home/detail';
		$this->load->view('layout/main_single', $data);
	}
}
