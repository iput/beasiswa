<?php defined('BASEPATH')OR exit('tidak ada akses diizinkan');
/**
 *
 */
class C_kasubag extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('attribute/Header_kasubag');
    $this->load->view('kasubag/Dashboard');
    $this->load->view('attribute/Footer');
  }
}
 ?>
