<?php defined('BASEPATH')OR exit('tidak ada akses diizinkan');
/**
 *
 */
class C_kasubagfk extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("kasubag_fk/ProfileKasubagFk",'mdl');
  }

  public function index()
  {
    $this->load->view('attribute/header_kasubag_fk');
    $this->load->view('kasubag_fk/dashboard');
    $this->load->view('attribute/footer');
  }
  public function profile()
  { 
    $user = $this->session->userdata('id');
    $data['user'] = $this->mdl->getdata($user);
    $this->load->view('attribute/header_kasubag_fk');
    $this->load->view('kasubag_fk/profileKasubagFk',$data);
    $this->load->view('attribute/footer');
  }
}
?>
