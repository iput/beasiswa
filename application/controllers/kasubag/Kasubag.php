<?php defined('BASEPATH')OR exit('tidak ada akses diizinkan');
/**
 *
 */
class Kasubag extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('kasubag/Berita');
  }

  public function index()
  {
    $this->load->view('attribute/hKasubag');
    $this->load->view('kasubag/dashboard');
    $this->load->view('attribute/FooterKasubag');
  }

  public function daftarBerita()
  {
    $data['berita']=$this->Berita->daftarBerita();
    $this->load->view('attribute/hKasubag');
    $this->load->view('kasubag/Berita', $data);
    $this->load->view('attribute/FooterKasubag'); 
  }
}
 ?>
