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
}
 ?>
