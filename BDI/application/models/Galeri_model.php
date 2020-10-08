<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

function __construct(){
        
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    //tampil gambar galeri
    function getGaleri($table, $where){
		$query = $this->db->query("SELECT * FROM $table WHERE id_kategori_kegiatan='$where' ORDER BY tanggal_kegiatan DESC");
		return $query;
	}
    
  
}
?>