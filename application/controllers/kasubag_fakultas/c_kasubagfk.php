<?php defined('BASEPATH')OR exit('tidak ada akses diizinkan');
/**
 *
 */
class C_kasubagfk extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('attribute/header_kasubag_fk');
    $this->load->view('kasubag_fk/dashboard');
    $this->load->view('attribute/footer');
  }
}
 ?>
