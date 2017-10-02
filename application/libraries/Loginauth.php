<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginauth{

  // public $favicon = 'assets/template/img/favicon.png';

  protected $ci;

  public function __construct()
  {
    $this->ci =& get_instance();
  }

  public function view_page()
  {
    if($this->ci->session->userdata('level')=='1'){
      redirect('staf_kemahasiswaan/C_staff');
    }elseif ($this->ci->session->userdata('level')=='2') {
      redirect('kasubag/Kasubag');
    }elseif ($this->ci->session->userdata('level')=='3') {
      redirect('kasubag_fakultas/C_kasubagfk');
    }elseif ($this->ci->session->userdata('level')=='4') {
      redirect('kabag/C_kabag');
    }elseif ($this->ci->session->userdata('level')=='5') {
      redirect('mahasiswa/C_mahasiswa');
    }elseif ($this->ci->session->userdata('level')=='6') {
      redirect('C_admin');
    }else{
      $url =  $_SERVER["REQUEST_URI"];
      if ($url!='/beasiswa/Login') {
        redirect('Login');
      }
    }
  }

  function curPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
      $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
      $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
  }

}
?>
