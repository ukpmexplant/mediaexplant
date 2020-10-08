<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Takmir extends CI_Controller {
function __construct() {
		parent::__construct();


		$this->load->model('laporan_model');
    $this->load->model('artikel_model');
    $this->load->model('admin_model');

	}

	public function index()
	{
    $this->cek();

    $date = getdate();
    $tahun = $date['year'];
    $bulan = $date['mon'];
    
    $data_galeri = array(
      'penerimaan'  => $this->laporan_model->getPenerimaan($bulan, $tahun)->result(),
      'pengeluaran'   => $this->laporan_model->getPengeluaran($bulan, $tahun)->result(),
      'saldo'   => $this->laporan_model->getSaldo($bulan, $tahun)->result(),
      'artikel'  => $this->admin_model->jumlah_artikel()->result(),
      'kegiatan'  => $this->admin_model->jumlah_kegiatan()->result(),
      );
    
		
		$this->load->view('takmir/theme/header');
		$this->load->view('takmir/content/beranda', $data_galeri);
		$this->load->view('takmir/theme/footer');
	}


/////////////////////////////////////////////////////////////////////////////////////////////////////


 public function form_login()
  {
    

    $this->load->view('takmir/content/form_login');
 
  }


public function cek() {
    if(!(@$this->session->takmir)) { 
        redirect(base_url('takmir/form_login'));
      }
  }



public function masuk() {
    if(@$this->session->userdata('takmir')) { 
        redirect(base_url('takmir'));
      }

    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $where = array(
      'username' => $username,
      'password' => $password,
      'hak_akses' => '0',
      );
    $cek = $this->admin_model->cek_login('tbl_user', $where)->num_rows();
    $result = $this->admin_model->cek_login('tbl_user', $where)->row();
    if($cek > 0){
 
      $data_session = array(
        'id_user' => $result->id_user,
        'takmir' => $username,
        'username' => $result->username,
        'hak_akses' => $result->hak_akses
        );
 
      $this->session->set_userdata($data_session);
      redirect(base_url('takmir'));
    } else {
      $this->session->set_flashdata('error', 'Username dan Password Salah!');
      redirect(base_url('takmir/form_login'));
    }
  }

public function logout(){
  $this->cek();

    $this->session->sess_destroy();
    redirect(base_url('takmir'));
  }

////////////////////////////////////////////////////////////////////////////////////////////////////////////
 public function data_artikel()
  {
    $this->cek();

    $artikel = array(
      'artikel'   => $this->admin_model->data_artikel()->result(),
      );
    
    $this->load->view('takmir/theme/header');
    $this->load->view('takmir/content/post_artikel',$artikel);
    $this->load->view('takmir/theme/footer');
  }

  public function detail_artikel($id_artikel)
  {
$this->cek();
  $artikel = array(
      'artikel' => $this->artikel_model->getWhere('tbl_artikel', 
          array('id_artikel' => $this->uri->segment(3))
          )->row(),
      );

    $this->load->view('takmir/theme/header');
    $this->load->view('takmir/content/detail_artikel',$artikel);
    $this->load->view('takmir/theme/footer');
  }


////////////////////////////////////////////////////////////////////////////////////////////////////////////
   public function post_artikel_takmir()
  {
    $this->cek();

    $artikel = array(
      'artikel'   => $this->admin_model->data_artikel_takmir()->result(),
      );
    
    $this->load->view('takmir/theme/header');
    $this->load->view('takmir/content/post_artikel_takmir',$artikel);
    $this->load->view('takmir/theme/footer');
  }

////////////////////////////////////////////////////////////////////////////////////////////////////////////

  public function tambah_post_artikel()
  {

    $this->cek();

    $this->load->view('takmir/theme/header');
    $this->load->view('takmir/content/tambah_post_artikel_takmir');
    $this->load->view('takmir/theme/footer');
  }

public function tambah_artikel(){
     $this->cek();

    $jenis_artikel = $this->input->post('jenis_artikel');
    $judul = $this->input->post('judul');
    $isi = $this->input->post('editor1');
    $penulis = "takmir";
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d');

     $data = array(
      'id_jenis_artikel' => $jenis_artikel,
      'tanggal_artikel' => $tanggal,
      'judul' =>$judul,
      'isi' =>$isi,
      'penulis' =>$penulis,
      );
    $this->admin_model->simpan('tbl_artikel', $data);
    redirect(base_url('takmir/post_artikel_takmir'));
  }

  public function hapus_artikel(){
      $this->cek();

        $id_artikel=$this->input->post('id_artikel');
        $this->admin_model->hapus_artikel($id_artikel);
        redirect('takmir/post_artikel_takmir');
    }

    public function edit_artikel_takmir($id_artikel){
    $this->cek();

    
    $artikel = array(
      'artikel' => $this->artikel_model->getWhere('tbl_artikel', 
          array('id_artikel' => $this->uri->segment(3))
          )->row(),
      );
     $this->load->view('takmir/theme/header');
    $this->load->view('takmir/content/edit_artikel_takmir', $artikel);
    $this->load->view('takmir/theme/footer');
  }

  public function update_artikel(){
    $this->cek();
    $id_artikel = $this->input->post('id_artikel');
    $jenis_artikel = $this->input->post('jenis_artikel');
    $judul = $this->input->post('judul');
    $isi = $this->input->post('editor1');
     $data = array(
      'id_jenis_artikel' =>$jenis_artikel,
      'judul' =>$judul,
      'isi' =>$isi,
      );
    $this->admin_model->update('tbl_artikel', array('id_artikel' => $id_artikel), $data);
    
    $this->session->set_flashdata('success', 'Data berhasil diupdate!');
    redirect(base_url('takmir/post_artikel_takmir'));
  }
////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function data_video()
  {
    $this->cek();
    $x['data']=$this->admin_model->show_video();

    

    $this->load->view('takmir/theme/header');
    $this->load->view('takmir/content/data_video', $x);
    $this->load->view('takmir/theme/footer');
  }


////////////////////////////////////////////////////////////////////////////////////////////////////////////

  public function post_video_takmir()
  {
     $this->cek();
    $x['data']=$this->admin_model->data_video_takmir();

    
   
    $this->load->view('takmir/theme/header');
    $this->load->view('takmir/content/post_video_takmir', $x);
    $this->load->view('takmir/theme/footer');
  }

  public function tambah_video()
  {
    $this->cek();

    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d');

    $judul = $this->input->post('judul');
    $deskripsi = $this->input->post('deskripsi');
    $diupload_oleh ="takmir";
    $gambar = $this->input->post('gambar');

    $this->load->library('upload');

    $config['upload_path'] = FCPATH.'assets_frontend/video_kajian/';
    $config['allowed_types'] = 'mp4|wmv|avi|mov';
    $config['overwrite']  = TRUE;
    $config['max_size']  = '300000';

    
    $this->upload->initialize($config);
    
    if ( ! $this->upload->do_upload('gambar')){
      $this->session->set_flashdata('error', 'Upload Video Gagal!'.$this->upload->display_errors());
      redirect(base_url('takmir/post_video_takmir'));
    }
    else{
      $data = array(
        'tanggal_video' => $tanggal,
        'judul' => $judul,
        'deskripsi' => $deskripsi,
        'diupload_oleh' => $diupload_oleh,
        'video' =>  $_FILES['gambar']['name'],

      );
    
      $this->admin_model->simpan('tbl_video', $data);
      
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
      redirect(base_url('takmir/post_video_takmir'));
    }   
  }

  public function hapus_video(){
      $this->cek();

        $id_video=$this->input->post('id_video');
        $this->admin_model->hapus_video($id_video);
        redirect('takmir/post_video_takmir');
    }

  public function update_video() {
  $this->cek();
    $id_video = $this->input->post('id_video');
    $judul = $this->input->post('judul');
    $deskripsi = $this->input->post('deskripsi');
    $gambar = $this->input->post('gambar');
   $tanggal_video = $this->input->post('tanggal_video');

    $data = array(
       
        'judul' => $judul,
        'deskripsi' => $deskripsi,
      
      );

     $this->admin_model->update('tbl_video', array('id_video' => $id_video), $data);

    $filename = $_FILES['gambar']['name'];
    if($filename != '') {
      $this->load->library('upload');

    $config['upload_path'] = FCPATH.'assets_frontend/video_kajian/';
    $config['allowed_types'] = 'mp4|wmv|avi|mov';
    $config['overwrite']  = TRUE;
    $config['max_size']  = '300000';
      
      $this->upload->initialize($config);
      
      if ( ! $this->upload->do_upload('gambar')){
        $this->session->set_flashdata('error', 'Upload Gambar Gagal!'.$this->upload->display_errors());
                redirect(base_url('takmir/post_video_takmir'));
      }
      else{
         $data_image = array(
                'video' => $filename,
              );
        $this->admin_model->update('tbl_video', array('id_video' => $id_video), $data_image);
      }
    }
    $this->session->set_flashdata('success', 'Data berhasil diupdate!');
    redirect(base_url('takmir/post_video_takmir'));
  }

////////////////////////////////////////////////////////////////////////////////////////////////////////////

 public function hasil_laporan_keuangan($index = 0)
  {
    $this->cek();

    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    
    $data = array(
      'laporan'   => $this->laporan_model->getLaporan($bulan, $tahun)->result(),
      );

    $this->load->view('takmir/theme/header');
    $this->load->view('takmir/content/hasil_laporan_keuangan', $data);
    $this->load->view('takmir/theme/footer');
  }

}