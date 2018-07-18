<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function cek_admin($data) {
		$query = $this->db->get_where('tb_user', $data);
		return $query;
	}

	public function getsequrity()
	{
		$username = $this->session->userdata('username');
		if(empty($username))
		{
			$this->session->sess_destroy();
			redirect('login/index');
		}
	}

}
	

?>