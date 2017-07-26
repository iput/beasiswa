<?php defined('BASEPATH')OR exit('tidak ada akses di izinkan');
/**
 *
 */
class C_dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('m_dashboard');
        $data['daftar_bea']= $this->m_dashboard->daftar_bea();
        $this->load->view('Dashboard',$data);
        unset($data);
    }
    public function logout()
    {
        $this->load->view('login');
    }
    public function daftar_bea(){

    }
}

