<?php defined('BASEPATH')OR exit('tidak ada akses diizinkan');
/**
 *
 */
class Kasubag extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("kasubag/ProfileKasubag",'mdl');
  }

  public function index()
  {
    $data['oke'] ='kamu';
    $this->load->view('attribute/header_kasubag');
    $this->load->view('kasubag/dashboard',$data);
    $this->load->view('attribute/footer');
  }

  public function profile()
  {
    $user = $this->session->userdata('id');
    $data['user'] = $this->mdl->getdata($user);
    $data['oke'] ='kamu';
    $this->load->view('attribute/header_kasubag');
    $this->load->view('kasubag/v_profile_kasubag',$data);
    $this->load->view('attribute/footer');
  }
}
?>
