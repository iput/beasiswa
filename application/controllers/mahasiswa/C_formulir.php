<?php defined('BASEPATH')OR exit('akses tidak dapat diterima');

class C_formulir extends CI_Controller
{

  function __construct(){
    parent::__construct();
    $this->load->model("mahasiswa/Formulir",'mdl');
  }

  public function index()
  {
    $idBea = 12;

    $data = array(
      'idBea' => $idBea,
      'namaBea' => $this->mdl->get_nama_bea($idBea),
      'combo' => $this->mdl->get_skor_bea($idBea),
      'jurusan' => $this->mdl->get_jurusan()
    );
    $this->load->view('mahasiswa/formulir', $data);
  }

}
