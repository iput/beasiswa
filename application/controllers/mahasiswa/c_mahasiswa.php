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
    $this->load->view('attribute/Header_mhs');
    $this->load->view('mahasiswa/Dashboard');
    $this->load->view('attribute/Footer');
  }
}
 ?>
