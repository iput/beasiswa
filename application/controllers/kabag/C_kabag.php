<?php defined('BASEPATH')OR exit('akses di tolak');
/**
 *
 */
class C_kabag extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
     $this->load->model("kabag/ProfileKabag",'mdl');
  }

  public function index()
  {
    $this->load->view('attribute/header_kabag');
    $this->load->view('kabag/kabag');
    $this->load->view('attribute/footer');

  }
    public function profile()
  { 
    $user = $this->session->userdata('id');
    $data['user'] = $this->mdl->getdata($user);
    $this->load->view('attribute/header_kabag');
    $this->load->view('kabag/profileKabag',$data);
    $this->load->view('attribute/footer');
  }
}
?>
