<?php defined('BASEPATH')OR exit('akses di tolak');
/**
 *
 */
class C_kabag extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->view('attribute/Header_kabag');
    $this->load->view('kabag/Kabag');
    $this->load->view('attribute/Footer');

  }
}
 ?>
