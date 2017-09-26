<?php defined('BASEPATH')OR exit('akses di tolak');

class C_kabag extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("kabag/ProfileKabag",'mdl');
    $this->load->model('kasubag/Beasiswa');
        $this->load->model('kasubag/ReportBeasiswa');
    // $this->load->model('kasubag/Berita');
  }

  public function index()
  {
    $this->load->view('attribute/header_kabag');
    $this->load->view('kabag/kabag');
    $this->load->view('attribute/footer');

  }

  public function profile()
  {
    $user = $this->session->userdata('id');
    $data['user'] = $this->mdl->getdata($user);
    $this->load->view('attribute/header_kabag');
    $this->load->view('kabag/profileKabag',$data);
    $this->load->view('attribute/footer');
  }

  public function Berita()
  {
    $data['berita']=$this->Berita->daftarBerita();
    $this->load->view('attribute/header_kabag');
    $this->load->view('kabag/Berita',$data);
    $this->load->view('attribute/footer');

  }

  public function bea_aktif()
  {
    $this->load->model("kabag/beaaktif",'mdl_beaAktif');
    $fetch_data = $this->mdl_beaAktif->make_datatables();
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

        $this->load->view('attribute/header_kabag');
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
        $this->load->view('attribute/header_kabag');
        $this->load->view('kasubag/ReportBeasiswaPenerima', $data);
        $this->load->view('attribute/footer');
    }
    public function GrafikBeasiswa() {
        $data['grafis'] = $this->ReportBeasiswa->grafikPenerima();
        $data['pemohon'] = $this->ReportBeasiswa->grafikPemohon();
        $this->load->view('attribute/header_kabag');
        $this->load->view('kasubag/Grafik', $data);
        $this->load->view('attribute/footerKasubag');
    }
}
?>
