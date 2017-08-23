<?php defined('BASEPATH')OR exit('akses ditolak');

class C_staff extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("staff_kemahasiswaan/Profile",'mdl');
  }
  public function index()
  {
    $this->load->view('attribute/header_staff');
    $this->load->view('staff_kemahasiswaan/dashboard');
    $this->load->view('attribute/footer');
  }
  public function profile()
  { 
    /*$user = $this->session->userdata('username');
    $pass = $this->session->userdata('pass');
    $data['user'] = $this->mdl->getProfile($user,$pass);*/

    $user = $this->session->userdata('id');
    $data['user'] = $this->mdl->getdata($user);
    $this->load->view('attribute/header_staff',$data);
    $this->load->view('staff_kemahasiswaan/v_profile_staff',$data);
    $this->load->view('attribute/footer');
  }
}
?>
