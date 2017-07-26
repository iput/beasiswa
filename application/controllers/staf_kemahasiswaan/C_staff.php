<?php defined('BASEPATH')OR exit('akses ditolak');
/**
 *
 */
class C_staff extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->view('attribute/header_staff');
    $this->load->view('staff_kemahasiswaan/dashboard');
    $this->load->view('attribute/footer');
  }
}
 ?>
