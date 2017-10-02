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
      redirect('Login');
    }
  }

}
?>
