<?php defined('BASEPATH')OR exit('akses ditolak');

class C_staff extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('staff_kemahasiswaan/Berita');
    $this->load->model("staff_kemahasiswaan/Profile",'mdl');
    $this->load->model('kasubag/Beasiswa');
    $this->load->model('kasubag/ReportBeasiswa');
    $this->load->library('Loginauth');
    $this->loginauth->view_page();
  }
  public function index()
  {
    $this->load->view('attribute/header_staff');
    $this->load->view('staff_kemahasiswaan/dashboard');
    $this->load->view('attribute/footer');
  }
  public function profile()
  { 
    $user = $this->session->userdata('id');
    $cek = $this->mdl->getdata($user);
    if($this->mdl->getIdentitasAdmin($user) != 0){
      $data =array(
        'foto'    => $cek->foto,
        'id'      => $cek->id,
        'nama'    => $cek->nama,
        'alamat'  => $cek->alamat,
        'noTelp'  => $cek->noTelp,
        'email'   => $cek->email
        );
    }else{
      $data=array(
      'foto'    => "",
      'id'      => "",
      'nama'    => "",
      'alamat'  => "",
      'noTelp'  => "",
      'email'   => ""
      );
    }
    $this->load->view('attribute/header_staff');
    $this->load->view('staff_kemahasiswaan/v_profile_staff',$data);
    $this->load->view('attribute/footer');
  }

  public function daftarBerita()
  {
    $data['berita']=$this->Berita->daftarBerita();
    $this->load->view('attribute/header_staff');
    $this->load->view('staff_kemahasiswaan/Berita', $data);
    $this->load->view('attribute/footerKasubag');
  }
  public function filterLaporan() {
        $tahun = $this->input->post('filTahun');
        $jurusan = $this->input->post('filJurusan');
        $fakultas = $this->input->post('filFakultas');
        $beasiswa = $this->input->post('filBea');
        $data['fakultas'] = $this->ReportBeasiswa->dataFakultas();
        $data['jurusan'] = $this->ReportBeasiswa->dataJurusan();
        $data['beasiswa'] = $this->Beasiswa->daftarBeasiswa();
        $data['datafill'] = $this->ReportBeasiswa->filterPemohon($tahun, $jurusan, $fakultas, $beasiswa);

        $this->load->view('attribute/header_staff');
        $this->load->view('kasubag/ReportBeasiswaFilter', $data);
        $this->load->view('attribute/footer');
    }
    public function penerimaBeaSiswa() {
        $tahun = $this->input->post('filTahun');
        $jurusan = $this->input->post('filJurusan');
        $fakultas = $this->input->post('filFakultas');
        $beasiswa = $this->input->post('filBeasiswa');
        $data['fakultas'] = $this->ReportBeasiswa->dataFakultas();
        $data['jurusan'] = $this->ReportBeasiswa->dataJurusan();
        $data['beasiswa'] = $this->Beasiswa->daftarBeasiswa();
        $data['detail'] = $this->ReportBeasiswa->dataPenerimaBeasiswa($tahun, $jurusan, $fakultas, $beasiswa);
        $this->load->view('attribute/header_staff');
        $this->load->view('kasubag/ReportBeasiswaPenerima', $data);
        $this->load->view('attribute/footer');
    }
  public function GrafikBeasiswa() {
        $data['grafis'] = $this->ReportBeasiswa->grafikPenerima();
        $data['pemohon'] = $this->ReportBeasiswa->grafikPemohon();
        $this->load->view('attribute/header_staff');
        $this->load->view('kasubag/Grafik', $data);
        $this->load->view('attribute/footerKasubag');
    }
}
?>
