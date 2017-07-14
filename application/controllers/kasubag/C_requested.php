<?php defined('BASEPATH')OR exit('tidak ada akses diizinkan');
/**
 *
 */
class C_requested extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('attribute/header_kasubag');
    $this->load->view('kasubag/requested');
    $this->load->view('attribute/footer');
  }
}
 ?>
