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
        $this->load->library('pagination');
        $config['base_url'] = base_url()    .'C_dashboard/index/';
        $config['total_rows'] = $this->m_dashboard->total_record();
        $config['per_page'] = 4;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config); 
        $start = $this->uri->segment(3, 0);
        $rows = $this->m_dashboard->user_limit($config['per_page'],$start)->result();
      
        
        // $data['daftar_bea']= $this->m_dashboard->daftar_bea();
        // $data['daftar_berita']=$this->m_dashboard->daftar_berita();
        $data = array(
            'daftar_berita' => $this->m_dashboard->daftar_berita(),
            'daftar_bea' => $rows,
            'pagination' => $this->pagination->create_links(),
            'start' => $start
        );
        $this->load->view('Dashboard',$data);
        unset($data);
    }
    public function logout()
    {
        $this->load->view('login');
    }
    
    public function DetailBerita($id) {
        $data['berita']= $this->m_dashboard->detailBerita($id)->row();
        $this->load->view('moreInfo', $data);
    }

}

