<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model {

function __construct(){
        
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    //tampil gambar galeri
    function getVideo($table){
		$query = $this->db->query("SELECT * FROM $table ORDER BY tanggal_video DESC");
		return $query;
	}
    
  
}
?>