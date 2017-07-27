<?php defined('BASEPATH')OR exit('tidak ada akses di izinkan');
/**
 *
 */
class C_dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard');
    }

    public function index()
    {

        $data['daftar_bea']= $this->m_dashboard->daftar_bea();
        $data['daftar_berita']=$this->m_dashboard->daftar_berita();
        $this->load->view('Dashboard',$data);
        unset($data);
    }
    public function logout()
    {
        $this->load->view('login');
    }

}

