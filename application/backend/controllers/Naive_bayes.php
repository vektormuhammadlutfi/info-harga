<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Naive_bayes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')==="") {
			redirect('login');
		}
		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
		$this->load->model('Naive_bayes_model');
	}


	public function index()
	{

			$crud = new grocery_CRUD();

			$crud->set_theme('bootstrap');
			$crud->set_table('mahasiswa');
			$crud->set_subject('Data training');

			$output = $crud->render();

			$data['content'] 	= 'master/index';
			$data['tablecrud'] = $output;

			$data['js_files'] = $output->js_files;
			$data['css_files'] = $output->css_files;

      		$this->load->view('layout/main_grocery',$data);
      		
	}

	public function prediksi()
	{

			$crud = new grocery_CRUD();

			$crud->set_theme('bootstrap');
			$crud->set_table('tb_prediksi');
			$crud->set_subject('Data training Prediksi');
			
			$crud->field_type('kondisi_bahan_pokok','enum',array('Baik','Rusak'));
			$crud->field_type('cuaca','enum',array('Baik','Buruk'));
			$crud->field_type('kondisi_kendaraan','enum',array('Baik','Rusak'));
			$crud->field_type('persediaan','enum',array('Banyak','kurang'));
			$crud->field_type('keterangan','enum',array('Naik','Turun'));

			$output = $crud->render();

			$data['content'] 	= 'master/index';
			$data['tablecrud'] = $output;

			$data['js_files'] = $output->js_files;
			$data['css_files'] = $output->css_files;

      		$this->load->view('layout/main_grocery',$data);
      		
	}

	public function metode_naive_bayes() 
    {
		$data = array(
		'bahan_pokok' => set_value('bahan_pokok',TRUE),
		'cuaca' => set_value('cuaca',TRUE),
		'kebijakan' => set_value('kebijakan',TRUE),
		'kondisi_kendaraan' => set_value('kondisi_kendaraan',TRUE),
		'persediaan' => set_value('persediaan',TRUE),
	    );

        $data['content'] 	= 'metode_naive_bayes/index';
		$this->load->view('layout/main', $data);
    }

	public function hasil_prediksi()
	{	
		$bahan_pokok 	= $this->input->post('kondisi_bahan_pokok');
		$cuaca 			= $this->input->post('cuaca');
		$kondisi_kendaraan 	= $this->input->post('kondisi_kendaraan');
		$persediaan 		= $this->input->post('persediaan');

		$naik = $this->Naive_bayes_model->Count("WHERE keterangan='Naik'")->num_rows();
		$turun = $this->Naive_bayes_model->Count("WHERE keterangan='Turun'")->num_rows();
		$total     = $this->Naive_bayes_model->Count("")->num_rows();

		$bahan_pokok_naik	= $this->Naive_bayes_model->Count("WHERE kondisi_bahan_pokok like '$bahan_pokok' and keterangan='Naik'")->num_rows();
		$bahan_pokok_turun	= $this->Naive_bayes_model->Count("WHERE kondisi_bahan_pokok like '$bahan_pokok' and keterangan='Turun'")->num_rows();

		$cuaca_naik	= $this->Naive_bayes_model->Count("WHERE cuaca like '$cuaca' and keterangan='Naik'")->num_rows();
		$cuaca_turun	= $this->Naive_bayes_model->Count("WHERE cuaca like '$cuaca' and keterangan='Turun'")->num_rows();

		$kondisi_kendaraan_naik	= $this->Naive_bayes_model->Count("WHERE kondisi_kendaraan like '$kondisi_kendaraan' and keterangan='Naik'")->num_rows();
		$kondisi_kendaraan_turun	= $this->Naive_bayes_model->Count("WHERE kondisi_kendaraan like '$kondisi_kendaraan' and keterangan='Turun'")->num_rows();

		$persediaan_naik	= $this->Naive_bayes_model->Count("WHERE persediaan like '$persediaan' and keterangan='Naik'")->num_rows();
		$persediaan_turun	= $this->Naive_bayes_model->Count("WHERE persediaan like '$persediaan' and keterangan='Turun'")->num_rows();

		$p= ($naik/$total)*($bahan_pokok_naik/$naik)*($cuaca_naik/$naik)*($kondisi_kendaraan_naik/$naik)*($persediaan_naik/$naik);

		$p2= ($turun/$total)*($bahan_pokok_turun/$naik)*($cuaca_turun/$naik)*($kondisi_kendaraan_turun/$naik)*($persediaan_turun/$naik);

		if ( $p >= $p2 ){
			$data['keterangan'] = "Naik";
		}
		else {
			$data['keterangan'] = "Turun";
		}

		$data['kondisi_bahan_pokok']	= $this->input->post('kondisi_bahan_pokok');
		$data['cuaca']	= $this->input->post('cuaca');
		$data['kondisi_kendaraan']	= $this->input->post('kondisi_kendaraan');
		$data['persediaan']	= $this->input->post('persediaan');
		
	    $this->Naive_bayes_model->insertData($data);

		$data['content'] 	= 'metode_naive_bayes/tampil';
		$this->load->view('layout/main', $data);

	}

	public function metode() 
    {
		$data = array(
		'kelamin' => set_value('kelamin',TRUE),
		'status' => set_value('status',TRUE),
		'pernikahan' => set_value('pernikahan',TRUE),
		'ipk' => set_value('ipk',TRUE),
		'keterangan' => set_value('keterangan',TRUE),
	    );

        $data['content'] 	= 'naive_bayes/index';
		$this->load->view('layout/main', $data);
    }

	public function metode_view()
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

		$data['content'] 	= 'naive_bayes/tampil';
		$this->load->view('layout/main', $data);

	}
}