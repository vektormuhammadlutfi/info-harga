<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	// Login Form

	public function index()
	{
		$this->load->view('login');
	}


	public function auth(){
		$data = array('username' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE))
			);
		$this->load->model('admin_model');
		$hasil = $this->admin_model->cek_admin($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['username'] = $sess->username;
				$sess_data['role'] = $sess->role;
				$sess_data['full_name'] = $sess->full_name;
				$this->session->set_userdata($sess_data);
			}

			set_alert('success', 'Login success');
			redirect('home');
			// if ($this->session->userdata('role')=='admin') {
			// 	redirect('home');
			// }
			// elseif ($this->session->userdata('role')=='staff') {
			// 	redirect('komoditas');
			// }		
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}
}