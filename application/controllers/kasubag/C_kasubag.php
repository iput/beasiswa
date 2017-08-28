<?php

defined('BASEPATH')OR exit('tidak ada akses diizinkan');

/**
 *
 */
class C_kasubag extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        if (($this->session->userdata('id'))
                AND( $this->session->userdata('username'))) {
            $this->load->view('attribute/header_kasubag');
            $this->load->view('kasubag/dashboard');
            $this->load->view('attribute/footer');
        }else{
            $this->session->set_flashdata('gagal', 'anda tidak bisa login tanpa akses dari sistem');
            redirect('Login');
        }
    }

}

?>
