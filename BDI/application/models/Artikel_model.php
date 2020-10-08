<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_model extends CI_Model {

function __construct(){
        
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    //tampil gambar galeri
    function getArtikel($table, $where){
		$query = $this->db->query("SELECT * FROM $table WHERE id_jenis_artikel='$where' ORDER BY tanggal_artikel DESC");
		return $query;
	}

	public function getArtikelFilter($bulan, $tahun){
        $query = $this->db->query("SELECT * FROM `tbl_artikel` WHERE month(tanggal_artikel)='$bulan' AND year(tanggal_artikel)='$tahun' AND id_jenis_artikel=1 ORDER BY tanggal_artikel DESC");
		return $query;
      
    }

    function getWhere($table, $where){      
        return $this->db->get_where($table, $where);
    }
    
  
}
?>