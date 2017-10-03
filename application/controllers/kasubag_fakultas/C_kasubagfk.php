<?php defined('BASEPATH')OR exit('tidak ada akses diizinkan');
/**
 *
 */
class C_kasubagfk extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->library('Loginauth');
    $this->loginauth->view_page();
    
    $this->load->model("kasubag_fk/ProfileKasubagFk",'mdl');
    $this->load->model('kasubag/Beasiswa');
    $this->load->model('kasubag/ReportBeasiswa');
  }

  public function index()
  {
    $this->load->view('attribute/header_kasubag_fk');
    $this->load->view('kasubag_fk/dashboard');
    $this->load->view('attribute/footer');
  }
  public function profile()
  { 
    $user = $this->session->userdata('id');
    $cek = $this->mdl->getdata($user);
    if($this->mdl->getIdentitasAdmin($user) != 0){
      $fk = $this->mdl->getdata($user)->idFakultas;
      if ($fk != null) {
        $data=array(
          'id'   => $this->mdl->getFak($fk)->namaFk,
          // 'user' => $this->mdl->getdata($user)
          'foto'    => $cek->foto,
          'idpr'      => $cek->id,
          'nama'    => $cek->nama,
          'alamat'  => $cek->alamat,
          'noTelp'  => $cek->noTelp,
          'email'   => $cek->email
          );  
      }else{
        $data=array(
          'id'   => "",
          // 'user' => $this->mdl->getdata($user)
          'foto'    => "",
          'idpr'      => "",
          'nama'    => "",
          'alamat'  => "",
          'noTelp'  => "",
          'email'   => ""
          ); 
      }
    }
    else{
      $data=array(
        'id'   => "",
          // 'user' => $this->mdl->getdata($user)
        'foto'    => "",
        'idpr'      => "",
        'nama'    => "",
        'alamat'  => "",
        'noTelp'  => "",
        'email'   => ""
        ); 
    }

    $this->load->view('attribute/header_kasubag_fk');
    $this->load->view('kasubag_fk/profileKasubagFk',$data);
    $this->load->view('attribute/footer');
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

    $this->load->view('attribute/header_kasubag_fk');
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
    $this->load->view('attribute/header_kasubag_fk');
    $this->load->view('kasubag/ReportBeasiswaPenerima', $data);
    $this->load->view('attribute/footer');
  }
  public function GrafikBeasiswa() {
    $data['grafis'] = $this->ReportBeasiswa->grafikPenerima();
    $data['pemohon'] = $this->ReportBeasiswa->grafikPemohon();
    $this->load->view('attribute/header_kasubag_fk');
    $this->load->view('kasubag/Grafik', $data);
    $this->load->view('attribute/footerKasubag');
  }
}
?>
