<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

function __construct(){
        
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    function cek_login($table, $where){     
        return $this->db->get_where($table, $where);
    }

    function getWhere($table, $where){      
        return $this->db->get_where($table, $where);
    }

    function getData($table, $order){
        $this->db->order_by($order, 'DESC');
        return $this->db->get($table);
    }

    function simpan($table, $data){
        $this->db->insert($table, $data);
    }

    function update($table, $where, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete($table, $where){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function jumlah_artikel(){
        $query = $this->db->query("SELECT COUNT(*) AS hasil FROM `tbl_artikel`");
        return $query;
    }

    function jumlah_kegiatan(){
        $query = $this->db->query("SELECT COUNT(*) AS hasil FROM `tbl_kegiatan`");
        return $query;
    }

    function jumlah_admin(){
        $query = $this->db->query("SELECT *  FROM `tbl_user` WHERE hak_akses='1'");
        return $query;
    }

    function jumlah_takmir(){
        $query = $this->db->query("SELECT *  FROM `tbl_user` WHERE hak_akses='0'");
        return $query;
    }  

    function data_artikel(){
        $query = $this->db->query("SELECT tbl_artikel.id_artikel, tbl_artikel.id_jenis_artikel, tbl_jenis_artikel.jenis_artikel, tbl_artikel.tanggal_artikel, tbl_artikel.judul, tbl_artikel.isi, tbl_artikel.penulis FROM tbl_artikel, tbl_jenis_artikel WHERE tbl_artikel.id_jenis_artikel=tbl_jenis_artikel.id_jenis_artikel ORDER BY `tbl_artikel`.`tanggal_artikel`  DESC");
        return $query;
    }   

function data_artikel_takmir(){
        $query = $this->db->query("SELECT tbl_artikel.id_artikel, tbl_artikel.id_jenis_artikel, tbl_jenis_artikel.jenis_artikel, tbl_artikel.tanggal_artikel, tbl_artikel.judul, tbl_artikel.isi, tbl_artikel.penulis FROM tbl_artikel, tbl_jenis_artikel WHERE tbl_artikel.id_jenis_artikel=tbl_jenis_artikel.id_jenis_artikel AND tbl_artikel.penulis ='takmir' ORDER BY `tbl_artikel`.`tanggal_artikel`  DESC");
        return $query;
    }   
    function data_artikel_edit($id_artikel){
        $query = $this->db->query("SELECT tbl_artikel.id_artikel, tbl_artikel.id_jenis_artikel, tbl_jenis_artikel.jenis_artikel, tbl_artikel.tanggal_artikel, tbl_artikel.judul, tbl_artikel.isi FROM tbl_artikel, tbl_jenis_artikel WHERE tbl_artikel.id_jenis_artikel=tbl_jenis_artikel.id_jenis_artikel AND tbl_artikel.id_artikel='$id_artikel'");
        return $query;
    }  

    function data_galeri(){
        $query = $this->db->query("SELECT tbl_kegiatan.id_kegiatan, tbl_kegiatan.id_kategori_kegiatan,tbl_kategori_kegiatan.jenis_kegiatan, tbl_kegiatan.tanggal_kegiatan, tbl_kegiatan.gambar, tbl_kegiatan.keterangan FROM tbl_kegiatan, tbl_kategori_kegiatan WHERE tbl_kategori_kegiatan.id_kategori_kegiatan = tbl_kegiatan.id_kategori_kegiatan ORDER BY tanggal_kegiatan DESC");
        return $query;
    }   

    function hapus_takmir($id_user){
        $hasil=$this->db->query("DELETE FROM tbl_user WHERE id_user='$id_user'");
        return $hasil;
    }

    function hapus_galeri($id_kegiatan){
        $hasil=$this->db->query("DELETE FROM tbl_kegiatan WHERE id_kegiatan='$id_kegiatan'");
        return $hasil;
    }

    function hapus_artikel($id_artikel){
        $hasil=$this->db->query("DELETE FROM tbl_artikel WHERE id_artikel='$id_artikel'");
        return $hasil;
    }
    function hapus_video($id_video){
        $hasil=$this->db->query("DELETE FROM tbl_video WHERE id_video='$id_video'");
        return $hasil;
    }

    function hapus_jadwal_tarawih($id_tarawih){
        $hasil=$this->db->query("DELETE FROM tbl_jadwal_tarawih WHERE id_tarawih='$id_tarawih'");
        return $hasil;
    }

     public function getPesan($bulan, $tahun){
        $query = $this->db->query("SELECT * FROM `tbl_pesan` WHERE month(tanggal)='$bulan' AND year(tanggal)='$tahun'");
        return $query;
      
    }

    function hapus_kas($id_laporan_keuangan){
        $hasil=$this->db->query("DELETE FROM tbl_laporan_keuangan WHERE id_laporan_keuangan='$id_laporan_keuangan'");
        return $hasil;
    }

    function data_video(){
        $query = $this->db->query("SELECT *  FROM `tbl_video` ORDER BY tanggal_video DESC");
        return $query;
    }
    function data_video_takmir(){
        $query = $this->db->query("SELECT *  FROM `tbl_video` WHERE diupload_oleh='takmir' ORDER BY tanggal_video DESC");
        return $query;
    }

    function show_video(){
        $hasil=$this->db->query("SELECT * FROM tbl_video");
        return $hasil;
    }

  
}
?>