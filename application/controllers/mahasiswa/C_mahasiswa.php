<?php defined('BASEPATH')OR exit('akses tidak dapat diterima');

class C_mahasiswa extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("mahasiswa/PengumumanPenerimaBeasiswa",'model');
    $this->load->model("mahasiswa/Profile",'mdl');
    $this->load->model("mahasiswa/Formulir", 'm_aplikasi');
  }

  public function index()
  {
    $this->load->view('attribute/header_mhs');
    $this->load->view('mahasiswa/dashboard');
    $this->load->view('attribute/footer');
  }
  public function data_pendaftar($id)
  {   
    $data['pendaftar'] = $this->m_aplikasi->data_pendaftar($id);
    $data['kategori'] = $this->m_aplikasi->data_kategori($id);


    $this->load->view('mahasiswa/buktipendaftaran',$data);
    unset($data);
  }
  function pdf($id)
  {
    $data['pendaftar'] = $this->m_aplikasi->data_pendaftar($id);
    $data['kategori'] = $this->m_aplikasi->data_kategori($id);
    $date['tanggal'] = date("Y-m-d");

    $this->load->view('mahasiswa/pdfreport',$data);
    unset($data);
  }

  public function profile()
  { 
    $key = $this->session->userdata('username');
    
    $data['user'] = $this->mdl->getdata($key);
    $this->load->view('attribute/header_mhs');
    $this->load->view('mahasiswa/v_profile_mhs',$data);
    $this->load->view('attribute/footer');
  }

  public function pengumuman_penerima_beasiswa()
  {
    $isi['fakultas']  =$this->db->get('fakultas')->result();
    $isi['tahun']     =$this->db->get('pendaftar')->result();
    $isi['beasiswa']  =$this->db->get('bea')->result();
    $isi['data']      =$this->model->getdata()->result();
    $this->load->view('attribute/header_mhs');
    $this->load->view('mahasiswa/v_pengumuman_penerima_beasiswa',$isi);
    $this->load->view('attribute/footer');
  }

  public function datatable(){
    $tahun =$this->input->post('tahun')?$this->input->post('tahun'):0;
    $fakultas =$this->input->post('fakultas')?$this->input->post('fakultas'):0;
    $jurusan =$this->input->post('jurusan')?$this->input->post('jurusan'):0;
    $bea =$this->input->post('beasiswa')?$this->input->post('beasiswa'):0;

    $fetch_data = $this->model->make_datatables($tahun, $fakultas, $jurusan, $bea);
    $data = array();
    $nmr = 0;

    foreach($fetch_data as $row)
    {
      $nmr +=1;
      $sub_array = array();
      $sub_array[] = $nmr;
      $sub_array[] = $row->nim;
      $sub_array[] = $row->namaLengkap;
      $sub_array[] = $row->namaFk;
      $sub_array[] = $row->namaJur;
      $sub_array[] = $row->namaBeasiswa;
      $sub_array[] = $row->waktuDiubah;
      $data[] = $sub_array;
    }
    
    $output = array(
      "draw"            =>  intval($_POST["draw"]),
      "recordsTotal"    =>  $this->model->get_all_data(),
      "recordsFiltered" =>  $this->model->get_filtered_data($tahun, $fakultas, $jurusan, $bea),
      "data"            =>  $data
      );
    echo json_encode($output);
    // echo "<br/>".$tahun."<br/>".$fakultas."<br/>".$jurusan."<br/>".$bea;
  }

  public function getjurusan()
  {
    $fakultas = $_GET['fakultas'];
    $getjur = $this->model->get_jurusan($fakultas);
    echo json_encode($getjur); 
  }

  public function coba()
  {
   $this->load->view('attribute/header_mhs');
   $this->load->view('mahasiswa/coba');
   $this->load->view('attribute/footer');
 }
}