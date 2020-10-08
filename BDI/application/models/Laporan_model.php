<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

function __construct(){
        
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
  
    public function getLaporan($bulan, $tahun){
        $query = $this->db->query("SELECT * FROM `tbl_laporan_keuangan` WHERE month(tanggal_pembukuan)='$bulan' AND year(tanggal_pembukuan)='$tahun'");
		return $query;
      
    }

    public function getLaporanAll(){
        $query = $this->db->query("SELECT * FROM `tbl_laporan_keuangan`");
        return $query;
      
    }

    public function getPenerimaan($bulan, $tahun){
        $query = $this->db->query("SELECT SUM(penerimaan)AS total_penerimaan FROM tbl_laporan_keuangan WHERE month(tanggal_pembukuan)='$bulan' AND year(tanggal_pembukuan)='$tahun'");
		return $query;
      
    }

    public function getPengeluaran($bulan, $tahun){
        $query = $this->db->query("SELECT SUM(pengeluaran)AS total_pengeluaran FROM tbl_laporan_keuangan WHERE month(tanggal_pembukuan)='$bulan' AND year(tanggal_pembukuan)='$tahun'");
		return $query;
      
    }

    public function getSaldo($bulan, $tahun){
        $query = $this->db->query("SELECT SUM(penerimaan)- SUM(pengeluaran) AS saldo FROM tbl_laporan_keuangan WHERE month(tanggal_pembukuan)='$bulan' AND year(tanggal_pembukuan)='$tahun'");
		return $query;
      
    }
    
}
?>