<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
function __construct() {
		parent::__construct();


		$this->load->model('laporan_model');
    $this->load->model('artikel_model');
    $this->load->model('galeri_model');
    $this->load->model('jadwal_tarawih_model');
    $this->load->model('admin_model');
    $this->load->library('session');

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
		
		$this->load->view('backend/theme/header');
		$this->load->view('backend/content/beranda',$data_galeri);
		$this->load->view('backend/theme/footer');
	}

  public function peringatan(){
    $data=array(
      'pesan' => 'Halaman ini hanya bisa diakses oleh Takmir',
    );

    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/peringatan', $data);
    $this->load->view('backend/theme/footer');
  }


/////////////////////////////////////////////////////////////////////////////////////////////////////


  public function user_admin()
  {
    $this->cek();

    $data_admin = array(
      'admin'   => $this->admin_model->jumlah_admin()->result(),
      );

    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/user_admin', $data_admin);
    $this->load->view('backend/theme/footer');
  }

public function tambah_admin()
  {
    $this->cek();

    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $data = array(
      'username' => $username,
      'password' => $password,
      'hak_akses' =>'1',
      );
    $this->admin_model->simpan('tbl_user', $data);

    $data_admin = array(
      'admin'   => $this->admin_model->jumlah_admin()->result(),
      );

    redirect(base_url('admin/user_admin'));
  }

/////////////////////////////////////////////////////////////////////////////////////////////////////

  public function user_takmir($aksi=0)
  {
    $this->cek();

    if($aksi == '0') {
    $data_takmir = array(
      'takmir'   => $this->admin_model->jumlah_takmir()->result(),
      );
    
    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/user_takmir',$data_takmir);
    $this->load->view('backend/theme/footer');
    }

    elseif($aksi == 'delete'){
      $this->admin_model->delete('tbl_user', 
        array('id_user' => $this->uri->segment(4)));
      $this->session->set_flashdata('success', 'Data berhasil dihapus!');
      redirect(base_url('admin/user_takmir'));
    }
  }

  public function tambah_takmir()
  {
    $this->cek();

    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $data = array(
      'username' => $username,
      'password' => $password,
      'hak_akses' =>'0',
      );
    $this->admin_model->simpan('tbl_user', $data);

    $data_takmir = array(
      'takmir'   => $this->admin_model->jumlah_takmir()->result(),
      );

   redirect(base_url('admin/user_takmir'));
  }

public function hapus_takmir(){
  $this->cek();

        $id_user=$this->input->post('id_user');
        $this->admin_model->hapus_takmir($id_user);
        redirect('admin/user_takmir');
    }

public function hapus_admin(){
  $this->cek();

        $id_user=$this->input->post('id_user');
        $this->admin_model->hapus_takmir($id_user);
        redirect('admin/user_admin');
    }

public function edit_admin($id_user){
  $this->cek();

  $data = array(
        'admin' => $this->admin_model->getWhere('tbl_user', 
          array('id_user' => $this->uri->segment(3))
          )->row(),
        );
}

public function edit_takmir($id_user){
  $this->cek();

  $data = array(
        'admin' => $this->admin_model->getWhere('tbl_user', 
          array('id_user' => $this->uri->segment(3))
          )->row(),
        );    
}

public function update_admin() {
  $this->cek();
   
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $id_user = $this->input->post('id_user');
    $data = array(
      'username' => $username,
      'password' => $password,
      'hak_akses' =>'1',
    );
    
    $this->admin_model->update('tbl_user', array('id_user' => $id_user), $data);
    
    $this->session->set_flashdata('success', 'Data berhasil diupdate!');
    redirect(base_url('admin/user_admin'));
  }

public function update_takmir() {
  $this->cek();
   
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $id_user = $this->input->post('id_user');
    $data = array(
      'username' => $username,
      'password' => $password,
      'hak_akses' =>'0',
    );
    
    $this->admin_model->update('tbl_user', array('id_user' => $id_user), $data);
    
    $this->session->set_flashdata('success', 'Data berhasil diupdate!');
    redirect(base_url('admin/user_takmir'));
  }

/////////////////////////////////////////////////////////////////////////////////////////////////////
public function cek() {
    if(!(@$this->session->admin)) { 
        redirect(base_url('admin/form_login'));
      }
  }


public function form_login()
  {
    
    $this->load->view('backend/content/form_login');
 
  }

public function masuk() {
    if(@$this->session->userdata('admin')) { 
        redirect(base_url('admin'));
      }

    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $where = array(
      'username' => $username,
      'password' => $password,
      'hak_akses' => '1',
      );
    $cek = $this->admin_model->cek_login('tbl_user', $where)->num_rows();
    $result = $this->admin_model->cek_login('tbl_user', $where)->row();
    if($cek > 0){
 
      $data_session = array(
        'id_user' => $result->id_user,
        'admin' => $username,
        'username' => $result->username,
        'hak_akses' => $result->hak_akses
        );
 
      $this->session->set_userdata($data_session);
      redirect(base_url('admin'));
    } else {
      $this->session->set_flashdata('error', 'Username dan Password Salah!');
      redirect(base_url('admin/form_login'));
    }
  }

public function logout(){
  $this->cek();

    $this->session->sess_destroy();
    redirect(base_url('admin'));
  }

////////////////////////////////////////////////////////////////////////////////////////////////////////////

  public function post_artikel()
  {
    $this->cek();

    $artikel = array(
      'artikel'   => $this->admin_model->data_artikel()->result(),
      );

    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/post_artikel', $artikel);
    $this->load->view('backend/theme/footer');
  }

  public function tambah_post_artikel()
  {

    $this->cek();

    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/tambah_post_artikel');
    $this->load->view('backend/theme/footer');
  }

  public function tambah_artikel(){
     $this->cek();

    $jenis_artikel = $this->input->post('jenis_artikel');
    $judul = $this->input->post('judul');
    $isi = $this->input->post('editor1');
    $penulis = "admin";
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
    redirect(base_url('admin/post_artikel'));
  }

  public function hapus_artikel(){
      $this->cek();

        $id_artikel=$this->input->post('id_artikel');
        $this->admin_model->hapus_artikel($id_artikel);
        redirect('admin/post_artikel');
    }

  public function edit_artikel($id_artikel){
    $this->cek();

    $id_artikel = $this->input->post('id_artikel');
    
    $artikel = array(
      'artikel' => $this->artikel_model->getWhere('tbl_artikel', 
          array('id_artikel' => $this->uri->segment(3))
          )->row(),
      );
     $this->load->view('backend/theme/header');
    $this->load->view('backend/content/edit_artikel', $artikel);
    $this->load->view('backend/theme/footer');


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
    redirect(base_url('admin/post_artikel'));
  }



////////////////////////////////////////////////////////////////////////////////////////////////////////////

  public function post_video()
  {
    $this->cek();
    $x['data']=$this->admin_model->show_video();

    

    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/post_video', $x);
    $this->load->view('backend/theme/footer');
  }

  public function tambah_video()
  {
    $this->cek();

    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d');

    $judul = $this->input->post('judul');
    $deskripsi = $this->input->post('deskripsi');
    $diupload_oleh ="admin";
    $gambar = $this->input->post('gambar');

    $this->load->library('upload');

    $config['upload_path'] = FCPATH.'assets_frontend/video_kajian/';
    $config['allowed_types'] = 'mp4|wmv|avi|mov';
    $config['overwrite']  = TRUE;
    $config['max_size']  = '300000';

    
    $this->upload->initialize($config);
    
    if ( ! $this->upload->do_upload('gambar')){
      $this->session->set_flashdata('error', 'Upload Video Gagal!'.$this->upload->display_errors());
      redirect(base_url('admin/post_video'));
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
      redirect(base_url('admin/post_video'));
    }   
  }

  public function hapus_video(){
      $this->cek();

        $id_video=$this->input->post('id_video');
        $this->admin_model->hapus_video($id_video);
        redirect('admin/post_video');
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
                redirect(base_url('admin/post_video'));
      }
      else{
         $data_image = array(
                'video' => $filename,
              );
        $this->admin_model->update('tbl_video', array('id_video' => $id_video), $data_image);
      }
    }
    $this->session->set_flashdata('success', 'Data berhasil diupdate!');
    redirect(base_url('admin/post_video'));
  }

////////////////////////////////////////////////////////////////////////////////////////////////////////////

   public function input_galeri()
  {
    $this->cek();

    $galeri = array(
      'galeri'   => $this->admin_model->data_galeri()->result(),
      );

    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/input_galeri', $galeri);
    $this->load->view('backend/theme/footer');
  }

  public function tambah_galeri()
  {
    $this->cek();

    $jenis_kegiatan = $this->input->post('jenis_kegiatan');
    $tanggal = $this->input->post('tanggal');
    $keterangan = $this->input->post('keterangan');
    $gambar = $this->input->post('gambar');

    $this->load->library('upload');

    $config['upload_path'] = FCPATH.'assets_frontend/img/galeri_kegiatan/';
    $config['allowed_types'] = 'jpg|png';
    $config['overwrite']  = TRUE;
    $config['max_size']  = '2048';
    
    $this->upload->initialize($config);
    
    if ( ! $this->upload->do_upload('gambar')){
      $this->session->set_flashdata('error', 'Upload Gambar Gagal!'.$this->upload->display_errors());
      redirect(base_url('admin/input_galeri'));
    }
    else{
      $data = array(
        'tanggal_kegiatan' => $tanggal,
        'id_kategori_kegiatan' => $jenis_kegiatan,
        'keterangan' => $keterangan,
        'gambar' =>  $_FILES['gambar']['name'],

      );
    
      $this->admin_model->simpan('tbl_kegiatan', $data);
      
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
      redirect(base_url('admin/input_galeri'));
    }   
  }

public function hapus_kegiatan(){
      $this->cek();

        $id_kegiatan=$this->input->post('id_kegiatan');
        $this->admin_model->hapus_galeri($id_kegiatan);
        redirect('admin/input_galeri');
    }

public function update_kegiatan() {
  $this->cek();
    $id_kegiatan = $this->input->post('id_kegiatan');
    $jenis_kegiatan = $this->input->post('jenis_kegiatan');
    $tanggal_kegiatan = $this->input->post('tanggal_kegiatan');
    $keterangan = $this->input->post('keterangan');
    $gambar = $this->input->post('gambar');

    $data = array(
        'id_kegiatan' => $this->input->post('id_kegiatan'),
        'id_kategori_kegiatan' => $this->input->post('jenis_kegiatan'),
        'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
        'keterangan' => $this->input->post('keterangan'),
      );

     $this->admin_model->update('tbl_kegiatan', array('id_kegiatan' => $id_kegiatan), $data);

    $filename = $_FILES['gambar']['name'];
    if($filename != '') {
      $this->load->library('upload');

      $config['upload_path'] = FCPATH . "assets_frontend/img/galeri_kegiatan/";
      $config['allowed_types'] = 'gif|jpg|png';
      $config['overwrite']  = TRUE;
      $config['max_size']  = '2048';
      
      $this->upload->initialize($config);
      
      if ( ! $this->upload->do_upload('gambar')){
        $this->session->set_flashdata('error', 'Upload Gambar Gagal!'.$this->upload->display_errors());
                redirect(base_url('admin/index'));
      }
      else{
         $data_image = array(
                'gambar' => $filename,
              );
        $this->admin_model->update('tbl_kegiatan', array('id_kegiatan' => $id_kegiatan), $data_image);
      }
    }
    $this->session->set_flashdata('success', 'Data berhasil diupdate!');
    redirect(base_url('admin/input_galeri'));
  }

////////////////////////////////////////////////////////////////////////////////////////////////////////////

  public function kritik_saran()
  {
    $this->cek();

     $data= array(
      'pesan' => $this->admin_model->getData('tbl_pesan', 'tanggal')->result(),
      );
    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/kritik_saran', $data);
    $this->load->view('backend/theme/footer');
  }

  public function hasil_pesan($index = 0)
  {
    $this->cek();

    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    
    $data = array(
      'pesan'   => $this->admin_model->getPesan($bulan, $tahun)->result(),
      );

    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/kritik_saran', $data);
    $this->load->view('backend/theme/footer');

  }

////////////////////////////////////////////////////////////////////////////////////////////////////////////

 



///////////////////////////////////////////////////////////////////////////////////////////////////////////
  public function input_jadwal_tarawih()
  {
    $this->cek();

    $tanggal = getdate();
    $tahun = $tanggal['year'];


    $data_galeri = array(
      'jadwal'  => $this->jadwal_tarawih_model->getJadwal('tbl_jadwal_tarawih', $tahun)->result(),
      );
    
    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/input_jadwal_tarawih', $data_galeri);
    $this->load->view('backend/theme/footer');
  }

  public function hasil_jadwal_tarawih()
  {
    $this->cek();

    $tahun = $this->input->post('tahun');
    
    $data_galeri = array(
      'jadwal'  => $this->jadwal_tarawih_model->getJadwal('tbl_jadwal_tarawih', $tahun)->result(),
      );

    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/input_jadwal_tarawih', $data_galeri);
    $this->load->view('backend/theme/footer');
  }

  public function tambah_jadwal_tarawih()
  {
    $this->cek();

    $data = array(
      'hari' => $this->input->post('hari'),
      'tanggal_tarawih' => $this->input->post('tanggal_tarawih'),
      'imam_penceramah' => $this->input->post('imam_penceramah'),
      'hp' => $this->input->post('hp'),
      'tema' => $this->input->post('tema'),
      );
    $this->admin_model->simpan('tbl_jadwal_tarawih', $data);

   redirect(base_url('admin/input_jadwal_tarawih'));
  }

  public function update_jadwal_tarawih() {
  $this->cek();
   
    $id_tarawih = $this->input->post('id_tarawih');
    $data = array(
      'hari' => $this->input->post('hari'),
      'tanggal_tarawih' => $this->input->post('tanggal_tarawih'),
      'imam_penceramah' => $this->input->post('imam_penceramah'),
      'hp' => $this->input->post('hp'),
      'tema' => $this->input->post('tema'),
    );
    
    $this->admin_model->update('tbl_jadwal_tarawih', array('id_tarawih' => $id_tarawih), $data);
    
    $this->session->set_flashdata('success', 'Data berhasil diupdate!');
    redirect(base_url('admin/input_jadwal_tarawih'));
  }

  public function hapus_jadwal_tarawih(){
    $this->cek();

        $id_tarawih=$this->input->post('id_tarawih');
        $this->admin_model->hapus_jadwal_tarawih($id_tarawih);
        redirect('admin/input_jadwal_tarawih');
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////

  public function input_jadwal_imsakiyah()
  {
    $this->cek();

    $data_galeri = array(
      'galeri'  => $this->galeri_model->getGaleri('tbl_kegiatan', '5')->result(),
      );
    
    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/input_jadwal_imsakiyah', $data_galeri);
    $this->load->view('backend/theme/footer');
  }

public function update_jadwal_imsakiyah() {
  $this->cek();
    $id_kegiatan = $this->input->post('id_kegiatan');
    $keterangan = $this->input->post('keterangan');
    $gambar = $this->input->post('gambar');

    $data = array(
        'id_kegiatan' => $this->input->post('id_kegiatan'),
        'keterangan' => $this->input->post('keterangan'),
      );

     $this->admin_model->update('tbl_kegiatan', array('id_kegiatan' => $id_kegiatan), $data);

    $filename = $_FILES['gambar']['name'];
    if($filename != '') {
      $this->load->library('upload');

      $config['upload_path'] = FCPATH . "assets_frontend/img/galeri_kegiatan/";
      $config['allowed_types'] = 'gif|jpg|png';
      $config['overwrite']  = TRUE;
      $config['max_size']  = '2048';
      
      $this->upload->initialize($config);
      
      if ( ! $this->upload->do_upload('gambar')){
        $this->session->set_flashdata('error', 'Upload Gambar Gagal!'.$this->upload->display_errors());
                redirect(base_url('admin/index'));
      }
      else{
         $data_image = array(
                'gambar' => $filename,
              );
        $this->admin_model->update('tbl_kegiatan', array('id_kegiatan' => $id_kegiatan), $data_image);
      }
    }
    $this->session->set_flashdata('success', 'Data berhasil diupdate!');
    redirect(base_url('admin/input_jadwal_imsakiyah'));
  }
////////////////////////////////////////////////////////////////////////////////////////////////////////////

   public function input_keuangan()
  {
    $this->cek();

    $data = array(
      'laporan'   => $this->laporan_model->getLaporanAll()->result(),
      );   

    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/input_keuangan', $data);
    $this->load->view('backend/theme/footer');
  }

  public function keuangan_filter()
  {
    $this->cek();

    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    
    $data = array(
      'laporan'   => $this->laporan_model->getLaporan($bulan, $tahun)->result(),
      );   

    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/input_keuangan', $data);
    $this->load->view('backend/theme/footer');
  }

  public function tambah_kas()
  {
    $this->cek();

    $data = array(
      'tanggal_pembukuan' => $this->input->post('tanggal_pembukuan'),
      'uraian' => $this->input->post('uraian'),
      'penerimaan' => $this->input->post('penerimaan'),
      'pengeluaran' => $this->input->post('pengeluaran'),      
      );

    $this->admin_model->simpan('tbl_laporan_keuangan', $data);

   redirect(base_url('admin/input_keuangan'));
  }

  public function hapus_kas(){
  $this->cek();

        $id_laporan_keuangan=$this->input->post('id_laporan_keuangan');
        $this->admin_model->hapus_kas($id_laporan_keuangan);
        redirect('admin/input_keuangan');
    }

  public function update_kas() {
  $this->cek();
   
   
    $id_laporan_keuangan = $this->input->post('id_laporan_keuangan');
     $data = array(
      'tanggal_pembukuan' => $this->input->post('tanggal_pembukuan'),
      'uraian' => $this->input->post('uraian'),
      'penerimaan' => $this->input->post('penerimaan'),
      'pengeluaran' => $this->input->post('pengeluaran'),      
      );
    
    $this->admin_model->update('tbl_laporan_keuangan', array('id_laporan_keuangan' => $id_laporan_keuangan), $data);
    
    $this->session->set_flashdata('success', 'Data berhasil diupdate!');
    redirect(base_url('admin/input_keuangan'));
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

    $this->load->view('backend/theme/header');
    $this->load->view('backend/content/hasil_laporan_keuangan', $data);
    $this->load->view('backend/theme/footer');
  }

////////////////////////////////////////////////////////////////////////////////////////////////////////////
}