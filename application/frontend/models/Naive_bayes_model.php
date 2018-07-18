<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Naive_bayes_model extends CI_model {

	public function countData($where=''){
        return $this->db->query("SELECT * FROM mahasiswa $where;");
    }

    public function tampil(){
        return $this->db->query("SELECT * FROM mahasiswa ORDER BY noid DESC LIMIT 1");
    }

    public function get_prediksi(){
        return $this->db->query("SELECT * FROM tb_hasil_prediksi ORDER BY id DESC LIMIT 1");
    }

    public function get_tepat()
    {
        $query = $this->db->query("SELECT count(*) as jml FROM mahasiswa WHERE keterangan='TEPAT'");
       	return $query;
    }

    public function get_terlambat()
    {
        $query = $this->db->query("SELECT count(*) as jml FROM mahasiswa WHERE keterangan='TERLAMBAT'");
       	return $query;
    }

    public function get_total()
    {
        $query = $this->db->query("SELECT count(*) as jml FROM mahasiswa");
       	return $query;
    }

    public function get_kelamin_tepat($kelamin)
    {
        $query = $this->db->query("SELECT count(*) as jml FROM mahasiswa WHERE kelamin like '$kelamin' and keterangan='TEPAT'");
       	return $query;
    }

    public function get_kelamin_terlambat($kelamin)
    {
        $query = $this->db->query("SELECT count(*) as jml FROM mahasiswa WHERE kelamin like '$kelamin' and keterangan='TERLAMBAT'");
       	return $query;
    }

    public function get_status_tepat($status)
    {
        $query = $this->db->query("SELECT count(*) as jml FROM mahasiswa WHERE status like '$status'  and keterangan='TEPAT'");
       	return $query;
    }

    public function get_status_terlambat($status)
    {
        $query = $this->db->query("SELECT count(*) as jml FROM mahasiswa WHERE status like '$status'  and keterangan='TERLAMBAT'");
       	return $query;
    }

    public function get_pernikahan_tepat($pernikahan)
    {
        $query = $this->db->query("SELECT count(*) as jml FROM mahasiswa WHERE pernikahan like '$pernikahan'  and keterangan='TEPAT'");
       	return $query;
    }

    public function get_pernikahan_terlambat($pernikahan)
    {
        $query = $this->db->query("SELECT count(*) as jml FROM mahasiswa WHERE pernikahan like '$pernikahan'  and keterangan='TERLAMBAT'");
       	return $query;
    }

    public function get_ipk_tepat($ipk)
    {
        $query = $this->db->query("SELECT count(*) as jml FROM mahasiswa WHERE ipk like '$ipk'  and keterangan='TEPAT'");
       	return $query;
    }

    public function get_ipk_terlambat($ipk)
    {
        $query = $this->db->query("SELECT count(*) as jml FROM mahasiswa WHERE ipk like '$ipk'  and keterangan='TERLAMBAT'");
       	return $query;
    }

    public function insert($data)
	{
		$this->db->insert('mahasiswa',$data);
	}

	

	
}