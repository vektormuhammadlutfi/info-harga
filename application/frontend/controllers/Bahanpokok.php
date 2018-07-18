<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bahanpokok extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Komoditas_model');
	}
	public function index()
	{
		redirect('home','refresh');
	}

	public function detail($id)
	{
		$data['data_komoditas'] = $this->Komoditas_model->get_detailharga($id);
		$data['data_komoditi'] = $this->Komoditas_model->get_prediksi($id);
		$data['data_pasar']     = $this->Komoditas_model->get_pasar();
		$data['data_tanggal']   = $this->Komoditas_model->get_tanggal($id);
		$data['data_max']       = $this->Komoditas_model->get_max($id);
		$data['data_min']       = $this->Komoditas_model->get_min($id);
		$data['data_avg']       = $this->Komoditas_model->get_avg($id);

		$data['content'] 	= 'home/detail';
		$this->load->view('layout/main_single', $data);
	}

	public function cari_tanggal($id)
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		
		$data['data_komoditas'] = $this->Komoditas_model->get_caridetailharga($id,$tgl_awal,$tgl_akhir);
		$data['data_komoditi'] = $this->Komoditas_model->get_prediksi($id);
		$data['data_pasar']     = $this->Komoditas_model->get_pasar();
		$data['data_tanggal']   = $this->Komoditas_model->get_tanggal($id);
		$data['data_max']       = $this->Komoditas_model->get_max($id);
		$data['data_min']       = $this->Komoditas_model->get_min($id);
		$data['data_avg']       = $this->Komoditas_model->get_avg($id);
		$data['tgl_awal']       = $tgl_awal;
		$data['tgl_akhir']       = $tgl_akhir;

		$data['content'] 	= 'home/detail';
		$this->load->view('layout/main_single', $data);
	}




}
