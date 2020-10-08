<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_tarawih_model extends CI_Model {

function __construct(){
        
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    //insert pesan to pesan table
    public function getJadwal($table, $tahun){
        $query = $this->db->query("SELECT * FROM $table WHERE year(tanggal_tarawih)='$tahun' ORDER BY tanggal_tarawih ASC ");
		return $query;
      
    }
    
}
?>