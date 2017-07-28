<?php defined('BASEPATH')OR exit('tidak ada akses diizinkan');
class C_seleksi extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("kasubag/Requested",'mdl');
  }

  public function index()
  {
    $this->load->view('attribute/header_kasubag');
    $this->load->view('kasubag/seleksi');
    $this->load->view('attribute/footer');
  }

}
 ?>
