<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prediksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Naive_bayes_model');
		$this->load->model('Komoditas_model');
	}

	public function index() 
    {	
    	$data['data_prediksi'] = $this->Naive_bayes_model->get_prediksi();
        $data['content'] 	= 'prediksi/index';
		$this->load->view('layout/main_single', $data);
    }

	public function mahasiswa() 
    {	

		$data = array(
		'kelamin' => set_value('kelamin',TRUE),
		'status' => set_value('status',TRUE),
		'pernikahan' => set_value('pernikahan',TRUE),
		'ipk' => set_value('ipk',TRUE),
		'keterangan' => set_value('keterangan',TRUE),
	    );

    	$data['data_prediksi'] = $this->Naive_bayes_model->tampil();
        $data['content'] 	= 'prediksi/index';
		$this->load->view('layout/main_single', $data);
    }

	public function metode()
	{	
		$kelamin 	= $this->input->post('kelamin');
		$status 	= $this->input->post('status');
		$pernikahan = $this->input->post('pernikahan');
		$ipk 		= $this->input->post('ipk');

		$tepat     = $this->Naive_bayes_model->countData("where keterangan='TEPAT'")->num_rows();
		$terlambat = $this->Naive_bayes_model->countData("WHERE keterangan='TERLAMBAT'")->num_rows();
		$total     = $this->Naive_bayes_model->countData("")->num_rows();
		$kelamin_tepat		= $this->Naive_bayes_model->countData("WHERE kelamin like '$kelamin' and keterangan='TEPAT'")->num_rows();
		$kelamin_terlambat	= $this->Naive_bayes_model->countData("WHERE kelamin like '$kelamin' and keterangan='TERLAMBAT'")->num_rows();
		$status_tepat		= $this->Naive_bayes_model->countData("WHERE status like '$status'  and keterangan='TEPAT'")->num_rows();
		$status_terlambat	= $this->Naive_bayes_model->countData("WHERE status like '$status'  and keterangan='TERLAMBAT'")->num_rows();
		$pernikahan_tepat		= $this->Naive_bayes_model->countData("WHERE pernikahan like '$pernikahan'  and keterangan='TEPAT'")->num_rows();
		$pernikahan_terlambat	= $this->Naive_bayes_model->countData("WHERE pernikahan like '$pernikahan'  and keterangan='TERLAMBAT'")->num_rows();
		$ipk_tepat 			= $this->Naive_bayes_model->countData("WHERE ipk like '$ipk'  and keterangan='TEPAT'")->num_rows();
		$ipk_terlambat		= $this->Naive_bayes_model->countData("WHERE ipk like '$ipk'  and keterangan='TERLAMBAT'")->num_rows();
		
		
		$p = ($tepat/$total)*($kelamin_tepat/$tepat)*($status_tepat/$tepat)*($pernikahan_tepat/$tepat)*($ipk_tepat/$tepat);
		$p2= ($terlambat/$total)*($kelamin_terlambat/$terlambat)*($status_terlambat/$terlambat)*($pernikahan_terlambat/$terlambat) * ($ipk_terlambat/$terlambat);
		
		if ( $p >= $p2 ){
			$data['keterangan'] = "TEPAT";
		}
		else {
			$data['keterangan'] = "TERLAMBAT";
		}


		$data['kelamin']	= $this->input->post('kelamin');
		$data['status']	= $this->input->post('status');
		$data['pernikahan'] = $this->input->post('pernikahan');
		$data['ipk']	= $this->input->post('ipk');
	    $this->Naive_bayes_model->insert($data);
		
		redirect(site_url('prediksi'));

	}

	
}