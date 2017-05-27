<?php defined('BASEPATH')OR exit('akses tidak dapat diterima');
/**
 *
 */
class C_mahasiswa extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('attribute/header_mhs');
    $this->load->view('mahasiswa/dashboard');
    $this->load->view('attribute/footer');
  }
  public function profile()
  { 
    $this->load->view('attribute/header_mhs');
    $this->load->view('mahasiswa/v_profile_mhs');
    $this->load->view('attribute/footer');
  }
  public function pengumuman_penerima_beasiswa()
  {
    $this->load->view('attribute/header_mhs');
    $this->load->view('mahasiswa/v_pengumuman_penerima_besiswa');
    $this->load->view('attribute/footer');
  }
}
?>
