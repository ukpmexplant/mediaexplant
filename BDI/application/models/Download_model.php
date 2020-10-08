<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download_model extends CI_Model {

function __construct(){
        
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    public function download($id)
    {
			$query = $this->db->get_where('tbl_kegiatan',array('id_kegiatan'=>$id));
			return $query->row_array();
	}
    
}
?>