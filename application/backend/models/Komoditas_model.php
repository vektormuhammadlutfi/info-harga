<?php 

class Komoditas_model extends CI_Model {

   

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function countbahanpokok()
    {
        $query = $this->db->query("SELECT COUNT(id_bahanpokok) as jumlah FROM `tb_bahanpokok`");
        return $query->result();
    }

    function countjenisbahanpokok()
    {
        $query = $this->db->query("SELECT COUNT(id_jenisbahanpokok) as jumlah FROM `tb_jenisbahanpokok`");
        return $query->result();
    }

    function countpasar()
    {
        $query = $this->db->query("SELECT COUNT(id_pasar) as jumlah FROM `tb_pasar`");
        return $query->result();
    }

    function countuser()
    {
        $query = $this->db->query("SELECT COUNT(id) as jumlah FROM `tb_user`");
        return $query->result();
    }

    function get_detailhargapasar($id_jenisbahanpokok,$id_pasar)
    {
        $query = $this->db->query("SELECT *
                                    FROM
                                    tb_hargakomoditas
                                    INNER JOIN tb_bahanpokok ON tb_hargakomoditas.id_bahanpokok = tb_bahanpokok.id_bahanpokok
                                    INNER JOIN tb_pasar ON tb_hargakomoditas.id_pasar = tb_pasar.id_pasar
                                    INNER JOIN tb_jenisbahanpokok ON tb_hargakomoditas.id_jenisbahanpokok = tb_jenisbahanpokok.id_jenisbahanpokok
                                    where tb_hargakomoditas.id_jenisbahanpokok = $id_jenisbahanpokok 
                                    AND tb_hargakomoditas.id_pasar = $id_pasar 
                                    AND MONTH(tgl_update) = MONTH(CURDATE())");
       return $query->result();
    }

    function get_detailhargapasar1($id_pasar,$id_jenisbahanpokok)
    {
        $query = $this->db->query("SELECT *
                                    FROM
                                    tb_hargakomoditas
                                    INNER JOIN tb_bahanpokok ON tb_hargakomoditas.id_bahanpokok = tb_bahanpokok.id_bahanpokok
                                    INNER JOIN tb_pasar ON tb_hargakomoditas.id_pasar = tb_pasar.id_pasar
                                    INNER JOIN tb_jenisbahanpokok ON tb_hargakomoditas.id_jenisbahanpokok = tb_jenisbahanpokok.id_jenisbahanpokok
                                    where tb_hargakomoditas.id_jenisbahanpokok = $id_jenisbahanpokok AND tb_hargakomoditas.id_pasar = $id_pasar AND MONTH(tgl_update) = MONTH(CURDATE())");
       return $query->result();
    }

    function get_caridetailhargapasar1($id_pasar,$id_jenisbahanpokok, $tgl_awal, $tgl_akhir)
    {
        $query = $this->db->query("SELECT *
                                    FROM
                                    tb_hargakomoditas
                                    INNER JOIN tb_bahanpokok ON tb_hargakomoditas.id_bahanpokok = tb_bahanpokok.id_bahanpokok
                                    INNER JOIN tb_pasar ON tb_hargakomoditas.id_pasar = tb_pasar.id_pasar
                                    INNER JOIN tb_jenisbahanpokok ON tb_hargakomoditas.id_jenisbahanpokok = tb_jenisbahanpokok.id_jenisbahanpokok
                                    where tb_hargakomoditas.id_jenisbahanpokok = $id_jenisbahanpokok AND tb_hargakomoditas.id_pasar = $id_pasar
                                    AND tb_hargakomoditas.tgl_update BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                    ");
       return $query->result();
    }

    function get_caritanggal($id_jenisbahanpokok,$id_pasar,$tgl_awal,$tgl_akhir)
    {
        $query = $this->db->query("SELECT *
                                    FROM
                                    tb_hargakomoditas
                                    INNER JOIN tb_bahanpokok ON tb_hargakomoditas.id_bahanpokok = tb_bahanpokok.id_bahanpokok
                                    INNER JOIN tb_pasar ON tb_hargakomoditas.id_pasar = tb_pasar.id_pasar
                                    INNER JOIN tb_jenisbahanpokok ON tb_hargakomoditas.id_jenisbahanpokok = tb_jenisbahanpokok.id_jenisbahanpokok
                                    where tb_hargakomoditas.id_jenisbahanpokok = $id_jenisbahanpokok 
                                    AND tb_hargakomoditas.id_pasar = $id_pasar 
                                    AND tb_hargakomoditas.tgl_update BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                    ");

        return $query->result();
    }

    function get_caridetailharga($id,$tgl_awal,$tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from('tb_hargakomoditas');
        $this->db->where('tb_hargakomoditas.id_jenisbahanpokok',$id);
        $this->db->where('tgl_update >=', $tgl_awal);
        $this->db->where('tgl_update <=', $tgl_akhir);
        $this->db->join('tb_bahanpokok', 'tb_bahanpokok.id_bahanpokok = tb_hargakomoditas.id_bahanpokok','inner');
        $this->db->join('tb_pasar', 'tb_pasar.id_pasar = tb_hargakomoditas.id_pasar','inner');
        $this->db->join('tb_jenisbahanpokok', 'tb_jenisbahanpokok.id_jenisbahanpokok = tb_hargakomoditas.id_jenisbahanpokok','inner');
        //$this->db->group_by('tb_hargakomoditas.id_pasar');
        $query = $this->db->get();
        return $query->result();
    }

    function get_detailharga($id)
    {
        $this->db->select('*');
        $this->db->from('tb_hargakomoditas');
        $this->db->where('tb_hargakomoditas.id_jenisbahanpokok',$id);
        $this->db->join('tb_bahanpokok', 'tb_bahanpokok.id_bahanpokok = tb_hargakomoditas.id_bahanpokok','inner');
        $this->db->join('tb_pasar', 'tb_pasar.id_pasar = tb_hargakomoditas.id_pasar','inner');
        $this->db->join('tb_jenisbahanpokok', 'tb_jenisbahanpokok.id_jenisbahanpokok = tb_hargakomoditas.id_jenisbahanpokok','inner');
        $this->db->group_by('tb_hargakomoditas.id_pasar');
        $query = $this->db->get();
        return $query->result();
    }


    function get_tanggal($id)
    {
        $query = $this->db->query("SELECT DISTINCT(tgl_update) from tb_hargakomoditas WHERE MONTH(tgl_update) = MONTH(CURDATE()) AND id_jenisbahanpokok = $id ORDER BY tgl_update ASC");
        return $query->result();   
    }

    function get_tanggal_pasar($id)
    {
        $query = $this->db->query("SELECT DISTINCT(tgl_update) from tb_hargakomoditas WHERE MONTH(tgl_update) = MONTH(CURDATE()) AND id_pasar = $id ORDER BY tgl_update ASC");
        return $query->result();   
    }

    function get_max($id)
    {
        $query = $this->db->query("SELECT MAX(a.harga) as harga_max,a.tgl_update,b.nama_pasar, a.satuan from tb_hargakomoditas a, tb_pasar b where a.id_pasar = b.id_pasar AND a.id_jenisbahanpokok = $id AND MONTH(a.tgl_update) = MONTH(CURDATE())");
        return $query->row();
    }

    function get_min($id)
    {
        $query = $this->db->query("SELECT MIN(a.harga) as harga_min,a.tgl_update,b.nama_pasar, a.satuan from tb_hargakomoditas a, tb_pasar b where a.id_pasar = b.id_pasar AND a.id_jenisbahanpokok = $id AND MONTH(a.tgl_update) = MONTH(CURDATE())");
        return $query->row();
    }

    function get_avg($id)
    {
        $query = $this->db->query("SELECT AVG(a.harga) as harga_avg, a.satuan from tb_hargakomoditas a WHERE a.id_jenisbahanpokok = $id AND MONTH(a.tgl_update) = MONTH(CURDATE())");
        return $query->row();
    }

    function get_pasar()
    {
        return $this->db->get('tb_pasar')->result();
    }

    function get_pasar_tabel()
    {
        $this->db->select('*');
        $this->db->from('tb_pasar');
        $this->db->order_by('nama_pasar','ASC');
        return $this->db->get()->result();
    }

    function get_namapasar_tabel($id)
    {
        $this->db->select('*');
        $this->db->from('tb_pasar');
        $this->db->where('id_pasar',$id);
        $this->db->order_by('nama_pasar','ASC');
        return $this->db->get()->row();
    }

    function get_tentang()
    {
        return $this->db->get('tb_tentang')->row();
    }

    function get_kontak()
    {
        return $this->db->get('tb_kontak')->row();
    }

    function get_rataratahariini()
    {
        $query = $this->db->query("SELECT a.id_jenisbahanpokok, b.nama_bahan_pokok, c.nama_jenis_bahan_pokok, 
                                ROUND(AVG(a.harga)) AS harga_ratarata, a.tgl_update, c.foto_jenis_bahan_pokok, a.satuan
                                FROM
                                tb_hargakomoditas a, tb_bahanpokok b, tb_jenisbahanpokok c
                                WHERE
                                b.`id_bahanpokok` = a.`id_bahanpokok` 
                                AND c.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`
                                AND a.`tgl_update` = (SELECT MAX(tb_hargakomoditas.`tgl_update`) 
                                FROM 
                                tb_hargakomoditas 
                                WHERE 
                                tb_hargakomoditas.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`)
                                GROUP BY a.id_jenisbahanpokok");
        return $query->result();
    }

    function get_ratarataharikemarin()
    {
        $query = $this->db->query("SELECT a.id_jenisbahanpokok, b.nama_bahan_pokok, c.nama_jenis_bahan_pokok, ROUND(AVG(a.harga)) AS harga_ratarata, a.tgl_update, c.foto_jenis_bahan_pokok
                                FROM
                                tb_hargakomoditas a, tb_bahanpokok b, tb_jenisbahanpokok c
                                WHERE
                                b.`id_bahanpokok` = a.`id_bahanpokok` 
                                AND 
                                c.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`
                                AND 
                                a.`tgl_update` = (SELECT MAX(tb_hargakomoditas.`tgl_update`) 
                                    FROM tb_hargakomoditas 
                                    WHERE tb_hargakomoditas.`tgl_update` 
                                    NOT IN (SELECT MAX(tb_hargakomoditas.`tgl_update`) 
                                        FROM tb_hargakomoditas 
                                        WHERE tb_hargakomoditas.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`) 
                                            AND tb_hargakomoditas.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`)
                                GROUP BY a.id_jenisbahanpokok

                                ");
        return $query->result();
    }

    function get_ratarataharikemarin_tabel()
    {
        $query = $this->db->query("SELECT a.id_jenisbahanpokok, b.nama_bahan_pokok, c.nama_jenis_bahan_pokok, ROUND(AVG(a.harga)) AS harga_ratarata, a.tgl_update, c.foto_jenis_bahan_pokok
                                FROM
                                tb_hargakomoditas a, tb_bahanpokok b, tb_jenisbahanpokok c
                                WHERE
                                b.`id_bahanpokok` = a.`id_bahanpokok` 
                                AND 
                                c.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`
                                AND 
                                a.`tgl_update` = (SELECT MAX(tb_hargakomoditas.`tgl_update`) 
                                    FROM tb_hargakomoditas 
                                    WHERE tb_hargakomoditas.`tgl_update` 
                                    NOT IN (SELECT MAX(tb_hargakomoditas.`tgl_update`) 
                                        FROM tb_hargakomoditas 
                                        WHERE tb_hargakomoditas.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`) 
                                            AND tb_hargakomoditas.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`)
                                GROUP BY a.id_jenisbahanpokok


                                ");
        return $query->result();
    }
    
    function get_rataratahariini_tabel()
    {
        $query = $this->db->query("SELECT b.nama_bahan_pokok, a.id_jenisbahanpokok, b.nama_bahan_pokok, c.nama_jenis_bahan_pokok, ROUND(AVG(a.harga)) AS harga_ratarata, a.tgl_update, c.foto_jenis_bahan_pokok, a.satuan
                                FROM
                                tb_hargakomoditas a, tb_bahanpokok b, tb_jenisbahanpokok c
                                WHERE
                                b.`id_bahanpokok` = a.`id_bahanpokok` 
                                AND c.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`
                                AND a.`tgl_update` = (SELECT MAX(tb_hargakomoditas.`tgl_update`) 
                                FROM 
                                tb_hargakomoditas 
                                WHERE 
                                tb_hargakomoditas.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`)
                                GROUP BY a.id_jenisbahanpokok
                                ");
        return $query->result();
    }

    function get_rataratahariini_tabel_cari($tgl_awal,$id_pasar)
    {
        $query = $this->db->query("SELECT a.id_pasar, b.nama_bahan_pokok, a.id_jenisbahanpokok, b.nama_bahan_pokok, c.nama_jenis_bahan_pokok, ROUND(AVG(a.harga)) AS harga_ratarata, a.tgl_update, c.foto_jenis_bahan_pokok, a.satuan
                                FROM
                                tb_hargakomoditas a, tb_bahanpokok b, tb_jenisbahanpokok c
                                WHERE
                                b.`id_bahanpokok` = a.`id_bahanpokok` 
                                AND c.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`
                                AND a.`tgl_update` = '$tgl_awal'
                                AND a.id_pasar = $id_pasar
                                GROUP BY a.id_jenisbahanpokok
                                ");
        return $query->result();
    }
    
    function get_ratarataharikemarin_tabel_cari($tgl_awal,$id_pasar)
    {
        $query = $this->db->query("SELECT a.id_jenisbahanpokok, b.nama_bahan_pokok, c.nama_jenis_bahan_pokok, ROUND(AVG(a.harga)) AS harga_ratarata, a.tgl_update, c.foto_jenis_bahan_pokok
                                FROM
                                tb_hargakomoditas a, tb_bahanpokok b, tb_jenisbahanpokok c
                                WHERE
                                b.`id_bahanpokok` = a.`id_bahanpokok` AND c.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`
                                AND a.`tgl_update` = (SELECT MAX(tb_hargakomoditas.`tgl_update`) FROM tb_hargakomoditas WHERE tb_hargakomoditas.`tgl_update` NOT BETWEEN '$tgl_awal' AND (SELECT MAX(tb_hargakomoditas.`tgl_update`) FROM tb_hargakomoditas WHERE tb_hargakomoditas.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`) AND tb_hargakomoditas.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`)
                                AND a.id_pasar = $id_pasar
                                GROUP BY a.id_jenisbahanpokok
                                ");
        return $query->result();
    }

    function get_rataratapasarterakhir($id)
    {
        $query = $this->db->query("SELECT a.id_jenisbahanpokok, a.id_pasar, b.nama_bahan_pokok, c.nama_jenis_bahan_pokok, a.harga AS harga_ratarata, a.tgl_update, c.foto_jenis_bahan_pokok, a.satuan, d.foto_pasar, d.nama_pasar,d.alamat_pasar, d.biografi_pasar
                                FROM
                                tb_hargakomoditas a, tb_bahanpokok b, tb_jenisbahanpokok c, tb_pasar d
                                WHERE
                                b.`id_bahanpokok` = a.`id_bahanpokok` AND c.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`
                                AND
                                d.`id_pasar` = a.`id_pasar`
                                AND a.`tgl_update` = (SELECT MAX(tb_hargakomoditas.`tgl_update`) FROM tb_hargakomoditas WHERE tb_hargakomoditas.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`)
                                AND a.id_pasar = $id
                                GROUP BY a.id_jenisbahanpokok
");
        return $query->result();
    }

    function get_rataratapasarkemarin($id)
    {
        $query = $this->db->query("SELECT a.id_jenisbahanpokok, a.id_pasar, b.nama_bahan_pokok, c.nama_jenis_bahan_pokok, a.harga AS harga_ratarata, a.tgl_update, c.foto_jenis_bahan_pokok, d.nama_pasar,d.alamat_pasar, d.biografi_pasar
                                    FROM
                                    tb_hargakomoditas a, tb_bahanpokok b, tb_jenisbahanpokok c,tb_pasar d
                                    WHERE
                                    b.`id_bahanpokok` = a.`id_bahanpokok` AND c.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`
                                    
                                    AND a.`tgl_update` = (SELECT MAX(tb_hargakomoditas.`tgl_update`) FROM tb_hargakomoditas WHERE tb_hargakomoditas.`tgl_update` NOT IN (SELECT MAX(tb_hargakomoditas.`tgl_update`) FROM tb_hargakomoditas WHERE tb_hargakomoditas.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`) AND tb_hargakomoditas.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`)
                                    AND a.id_pasar = $id
                                    GROUP BY a.id_jenisbahanpokok");
        return $query->result();
    }

     function get_namakomoditas($id)
    {
        $query = $this->db->query("SELECT a.id_jenisbahanpokok, c.nama_jenis_bahan_pokok
                                FROM
                                tb_hargakomoditas a, tb_bahanpokok b, tb_jenisbahanpokok c, tb_pasar d
                                WHERE
                                b.`id_bahanpokok` = a.`id_bahanpokok` AND c.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`
                                AND
                                d.`id_pasar` = a.`id_pasar`
                                AND a.id_pasar = $id
                                GROUP BY a.id_jenisbahanpokok
                                ");
        return $query->result();
    }

    function get_carinamakomoditas($id,$tgl_awal,$tgl_akhir)
    {
        $query = $this->db->query("SELECT a.id_jenisbahanpokok, c.nama_jenis_bahan_pokok
                                FROM
                                tb_hargakomoditas a, tb_bahanpokok b, tb_jenisbahanpokok c, tb_pasar d
                                WHERE
                                b.`id_bahanpokok` = a.`id_bahanpokok` AND c.`id_jenisbahanpokok` = a.`id_jenisbahanpokok`
                                AND
                                d.`id_pasar` = a.`id_pasar`
                                AND a.id_pasar = $id
                                
                                ");
        return $query->result();
    }

    

}