<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_model extends CI_Model {

function __construct(){
        
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    //insert pesan to pesan table
    public function insertPesan($data){
        return $this->db->insert('tbl_pesan',$data);
      
    }
    
}
?>