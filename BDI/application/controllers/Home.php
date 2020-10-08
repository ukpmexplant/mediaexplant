<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
function __construct() {
		parent::__construct();

		$this->load->model('galeri_model');
		$this->load->model('download_model');
		$this->load->model('pesan_model');
		$this->load->model('video_model');
		$this->load->model('artikel_model');
		$this->load->model('laporan_model');
		$this->load->model('jadwal_tarawih_model');
		$this->load->helper('form');
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('string');
        $this->load->helper('text');
	}  

	public function index()
	{

		$date = getdate();
		$tahun = $date['year'];
		$bulan = $date['mon'];
 		
 		$data_galeri = array(
			'penerimaan' 	=> $this->laporan_model->getPenerimaan($bulan, $tahun)->result(),
			'pengeluaran' 	=> $this->laporan_model->getPengeluaran($bulan, $tahun)->result(),
			'saldo' 	=> $this->laporan_model->getSaldo($bulan, $tahun)->result(),
			);
		
		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/beranda', $data_galeri);
		$this->load->view('frontend/content/kritik_dan_saran');
		$this->load->view('frontend/theme/footer');
	}

	public function kritik()
	{
		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/kritik_dan_saran');
		$this->load->view('frontend/theme/footer');
	}

	public function input_kritik_saran()
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$pesan = $this->input->post('pesan');

		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		$waktu = date("h:i:s");
		

		$data_input = array(
			'nama' => $nama,
			'email' => $email,
			'pesan' => $pesan,
			'tanggal' => $tanggal,
			'waktu' => $waktu,
			);

		$this->pesan_model->insertPesan($data_input);

		$date = getdate();
		$tahun = $date['year'];
		$bulan = $date['mon'];
 		
 		$data_galeri = array(
			'penerimaan' 	=> $this->laporan_model->getPenerimaan($bulan, $tahun)->result(),
			'pengeluaran' 	=> $this->laporan_model->getPengeluaran($bulan, $tahun)->result(),
			'saldo' 	=> $this->laporan_model->getSaldo($bulan, $tahun)->result(),
			);

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/kritik_terkirim');
		$this->load->view('frontend/content/beranda', $data_galeri);
		$this->load->view('frontend/content/kritik_dan_saran');
		$this->load->view('frontend/theme/footer');
	}

	public function galeri_santunan_yatim_piatu()
	{
		
		$data_galeri = array(
			'galeri' 	=> $this->galeri_model->getGaleri('tbl_kegiatan', '1')->result(),
			);

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/galeri_santunan_yatim_piatu', $data_galeri);
		$this->load->view('frontend/theme/footer');
	}

	public function galeri_distribusi_zis()
	{
		
		$data_galeri = array(
			'galeri' 	=> $this->galeri_model->getGaleri('tbl_kegiatan', '2')->result(),
			);

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/galeri_distribusi_zis', $data_galeri);
		$this->load->view('frontend/theme/footer');
	}


	public function galeri_dokumentasi()
	{
		
		$data_galeri = array(
			'galeri' 	=> $this->galeri_model->getGaleri('tbl_kegiatan', '3')->result(),
			);

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/galeri_dokumentasi', $data_galeri);
		$this->load->view('frontend/theme/footer');
	}

	public function galeri_dokumentasi_romadhon()
	{
		
		$data_galeri = array(
			'galeri' 	=> $this->galeri_model->getGaleri('tbl_kegiatan', '4')->result(),
			);

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/galeri_dokumentasi_romadhon', $data_galeri);
		$this->load->view('frontend/theme/footer');
	}

	public function jadwal_imsakiyah()
	{
		
		$data_galeri = array(
			'galeri' 	=> $this->galeri_model->getGaleri('tbl_kegiatan', '5')->result(),
			);

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/jadwal_imsakiyah', $data_galeri);
		$this->load->view('frontend/theme/footer');
	}
	

	public function laporan_keuangan()
	{
		
		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/laporan_keuangan');
		$this->load->view('frontend/theme/footer');
	}



	public function hasil_laporan_keuangan($index = 0)
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		
		$data_galeri = array(
			'laporan' 	=> $this->laporan_model->getLaporan($bulan, $tahun)->result(),
			);

		

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/hasil_laporan_keuangan', $data_galeri);
		$this->load->view('frontend/theme/footer');
	}
	
	
	public function jadwal_tarawih()
	{
		$tanggal = getdate();
		$tahun = $tanggal['year'];


		$data_galeri = array(
			'jadwal' 	=> $this->jadwal_tarawih_model->getJadwal('tbl_jadwal_tarawih', $tahun)->result(),
			);

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/jadwal_tarawih', $data_galeri);
		$this->load->view('frontend/theme/footer');
	}

	public function hasil_jadwal_tarawih()
	{
		
		$tahun = $this->input->post('tahun');
		
		$data_galeri = array(
			'jadwal' 	=> $this->jadwal_tarawih_model->getJadwal('tbl_jadwal_tarawih', $tahun)->result(),
			);

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/jadwal_tarawih', $data_galeri);
		$this->load->view('frontend/theme/footer');
	}

	public function artikel_romadhon()
	{
		$artikel = array(
			'artikel' 	=> $this->artikel_model->getArtikel('tbl_artikel', '2')->result(),
			);

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/artikel_romadhon', $artikel);
		$this->load->view('frontend/theme/footer');
	}

	public function artikel_kajian()
	{
		$artikel = array(
			'artikel' 	=> $this->artikel_model->getArtikel('tbl_artikel', '1')->result(),
			);

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/artikel_kajian', $artikel);
		$this->load->view('frontend/theme/footer');
	}

	public function hasil_artikel_kajian()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$artikel = array(
			'artikel' 	=> $this->artikel_model->getArtikelFilter($bulan, $tahun)->result(),
			);

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/artikel_kajian', $artikel);
		$this->load->view('frontend/theme/footer');
	}

	public function detail_artikel($id_artikel)
	{

	$id_artikel = $this->input->post('id_artikel');


	$artikel = array(
			'artikel' => $this->artikel_model->getWhere('tbl_artikel', 
					array('id_artikel' => $this->uri->segment(3))
					)->row(),
			);

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/detail_artikel', $artikel);
		$this->load->view('frontend/theme/footer');
	}

	public function detail_artikel_romadhon($id_artikel)
	{

	$id_artikel = $this->input->post('id_artikel');


	$artikel = array(
			'artikel' => $this->artikel_model->getWhere('tbl_artikel', 
					array('id_artikel' => $this->uri->segment(3))
					)->row(),
			);

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/detail_artikel_romadhon', $artikel);
		$this->load->view('frontend/theme/footer');
	}

	public function video_kajian()
	{
		$video = array(
			'video' 	=> $this->video_model->getVideo('tbl_video')->result(),
			);

		$this->load->view('frontend/theme/header');
		$this->load->view('frontend/content/video_kajian', $video);
		$this->load->view('frontend/theme/footer');
	}


	public function download($id)
	{
        $this->load->helper('download');
        $fileinfo = $this->download_model->download($id);
        $file = 'assets_frontend/img/galeri_kegiatan/'.$fileinfo['gambar'];
        force_download($file, NULL);
	}
	
}

