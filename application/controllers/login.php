<?php defined('BASEPATH')OR exit('tidak ada akses di izinkan');
/**
 *
 */
class Login extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('login');
  }
}
 ?>
