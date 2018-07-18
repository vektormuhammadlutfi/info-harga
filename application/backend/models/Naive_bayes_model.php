<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Naive_bayes_model extends CI_model {

	public function countData($where=''){
        return $this->db->query("SELECT * FROM mahasiswa $where;");
    }

    public function insert($data)
	{
		$this->db->insert('mahasiswa',$data);
	}

    public function Count($where=''){
        return $this->db->query("SELECT * FROM tb_prediksi $where;");
    }

    public function insertData($data)
    {
        $this->db->insert('tb_hasil_prediksi',$data);
    }

	

	
}