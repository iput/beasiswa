<?php defined('BASEPATH')OR exit('akses di tolak');
/**
 *
 */
class C_request extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('attribute/header_kabag');
    $this->load->view('kabag/request');
    $this->load->view('attribute/footer');

  }
}
?>
