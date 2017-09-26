<?php defined('BASEPATH')OR exit('tidak ada akses diizinkan');
class C_daftar_bea extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("mahasiswa/DaftarBeasiswa",'mdl');
    $this->load->model("mahasiswa/Formulir",'mod');
  }

  public function index()
  {
    $nim                  = $this->session->userdata('username');
    $penerima_bea         = $this->mdl->get_penerimaBea($nim);
    $berakhirPeriode      = $penerima_bea->berakhirPeriode;
    $berakhirPendaftaran  = $penerima_bea->berakhirPendaftaran;
    $nimMhs               = $penerima_bea->nimMhs;
    if(($berakhirPeriode <= 0 && $nimMhs==$nim)){
     $this->statusDiterimaBea();
   }else{
    $this->load->view('attribute/header_mhs');
    $this->load->view('mahasiswa/daftar_bea');
    $this->load->view('attribute/footer');
  }
}

public function statusDiterimaBea(){
  $nim = $this->session->userdata('username');
  $penerima_bea = $this->mdl->get_penerimaBea($nim);
  $berakhirPeriode = $penerima_bea->berakhirPeriode;
  $nimMhs = $penerima_bea->nimMhs;
  if ($berakhirPeriode <=0 && $nimMhs == $nim ) {
    $data = array(
      'nim'   => $nim,
      'nama'  => $penerima_bea->namaLengkap,
      'bea'   => $penerima_bea->namaBeasiswa,
      'tglBuka' => $penerima_bea->beasiswaDibuka,
      'periodeBerakhir' => $penerima_bea->periodeBerakhir
      );
  }else{
    $data = array(
      'bea'     => "",
      'nama'    => "",
      'tglBuka' => "",
      'periodeBerakhir' => ""
      );
  }

  $this->load->view('attribute/header_mhs');
  $this->load->view('mahasiswa/statusDiterimaBea',$data);
  $this->load->view('attribute/footer');
}

public function pengaturan()
{
  $nim = $this->session->userdata('username');
  $id = $this->input->post('idPengaturan');
  if ($id != null) {
    $dataMhs = $this->mod->getdataMhs_byId($nim);
    $data = array(
      'idBea' => $id,
      'namaBea' => $this->mod->get_nama_bea($id),
      'combo' => $this->mod->get_skor_bea($id),
      'jurusan' => $this->mod->get_jurusan(),
      'nim' => $dataMhs->nimMhs,
      'nama' => $dataMhs->namaLengkap,
      'tempatLahir' => $dataMhs->tempatLahir,
      'tglLahir' => $dataMhs->tglLahir,
      'asalKota' => $dataMhs->asalKota,
      'noTelp' => $dataMhs->noTelp
      );
  }else {
    $data = array(
      'idSetBea' => "",
      'nama' => "",
      'penyelenggara' => "",
      'selektor' => "",
      'keterangan' => "",
      'dibuka' => "",
      'ditutup' => "",
      'kuota' => "",
      'skor' => null
      );
  }
  $this->load->view('mahasiswa/formulir', $data);
  $this->load->view('attribute/footer');
}

public function datatable(){
  $fetch_data = $this->mdl->make_datatables();
  $data = array();
  $nmr = 0;
  foreach($fetch_data as $row)
  {
    $nmr+=1;
    $sub_array = array();
    $sub_array[] = $nmr;
    $sub_array[] = $row->namaBeasiswa;
    $sub_array[] = $row->penyelenggaraBea;
    $sub_array[] = $row->beasiswaDibuka;
    $sub_array[] = $row->beasiswaTutup;

    $status = $row->status;

    if ($status=="1") {
        # aktif/confirmed
      $sub_array[] = '<span class="success-text">Anda Sudah Terdaftar</span>';
      $sub_array[] = '
      <a class="btn-floating waves-effect waves-light primary-color z-depth-0" title="Daftar"><i class="mdi-action-done"></i></a>
      ';
    }else{
        # ditolak
      $sub_array[] = '<span class="alert-text">'.$row->keterangan.'</span>';
      $alamat = base_url('mahasiswa/C_daftar_bea/pengaturan');
      $sub_array[] = '
      <form action="'.$alamat.'" method="post">
        <button class="btn-floating waves-effect waves-light red" title="Daftar" type="submit" name="idPengaturan" value="'.$row->id.'"><i class="mdi-action-account-balance-wallet"></i></button>
      </form>
      ';
    }
    $data[] = $sub_array;
  }
  $output = array(
    "draw"            =>  intval($_POST["draw"]),
    "recordsTotal"    =>  $this->mdl->get_all_data(),
    "recordsFiltered" =>  $this->mdl->get_filtered_data(),
    "data"            =>  $data
    );
  echo json_encode($output);
}

public function get_scoring_data()
{
  $data = $this->mdl->get_scoring();
  echo json_encode($data);
}

public function add_data()
{
  $data_bea = array(
    'namaBeasiswa' => $this->input->post('nama'),
    'penyelenggaraBea' => $this->input->post('penyelenggara'),
    'beasiswaDibuka' => $this->input->post('dibuka'),
    'beasiswaTutup' => $this->input->post('ditutup'),
    'kuota' => $this->input->post('kuota'),
    'selektor' => $this->input->post('selektor')
    );
  $insert_bea = $this->mdl->save_bea($data_bea);

  $count_score = count($this->input->post('score'));
  $data = array();
  for ($i=0;$i<$count_score;$i++) {
    $skor = $this->input->post('score['.$i.']');
    if ($skor != "HAPUS") {
      $data[]= array(
        'idBea' => $insert_bea,
        'idKategoriSkor' => $skor,
        );
    }
  }
  $insert_sub_bea = $this->mdl->save_sub_bea($data);
  echo json_encode(array("status" => TRUE));
}



}
?>
