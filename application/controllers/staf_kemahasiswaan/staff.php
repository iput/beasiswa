<?php defined('BASEPATH')OR exit('akses ditolak');
/**
 *
 */
class Staff extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->view('attribute/Header_staff');
    $this->load->view('staff_kemahasiswaan/Dashboard');
    $this->load->view('attribute/Footer');
  }
}
 ?>
