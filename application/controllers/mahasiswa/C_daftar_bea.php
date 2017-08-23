<?php defined('BASEPATH')OR exit('tidak ada akses diizinkan');
class C_daftar_bea extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("mahasiswa/DaftarBeasiswa",'mdl');
  }

  public function index()
  {
    $this->load->view('attribute/header_mhs');
    $this->load->view('mahasiswa/daftar_beaaa');
    $this->load->view('attribute/footer');
  }

  public function pengaturan()
  {
    $id = $this->input->post('idPengaturan');
    // $id = 6;
    if ($id != null) {
      $detailBea= $this->mdl->get_by_id_bea($id);
      $data = array(
        'idSetBea' => $id,
        'nama' => $detailBea->namaBeasiswa,
        'penyelenggara' => $detailBea->penyelenggaraBea,
        'selektor' => $detailBea->selektor,
        'keterangan' => $detailBea->keterangan,
        'dibuka' => $detailBea->beasiswaDibuka,
        'ditutup' => $detailBea->beasiswaTutup,
        'kuota' => $detailBea->kuota,
        'skor' => $this->mdl->get_skor_by_idBea($id),
        'combo' => $this->mdl->get_scoring()
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
    // $this->load->view('attribute/header_mhs');
    $this->load->view('mahasiswa/formulir', $data);
    // $this->load->view('attribute/footer');
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
        $alamat = base_url('mahasiswa/C_formulir');
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

  public function update_data()
  {
    $data_bea = array(
      'namaBeasiswa' => $this->input->post('nama'),
      'penyelenggaraBea' => $this->input->post('penyelenggara'),
      'beasiswaDibuka' => $this->input->post('dibuka'),
      'beasiswaTutup' => $this->input->post('ditutup'),
      'kuota' => $this->input->post('kuota'),
      'selektor' => $this->input->post('selektor')
      );
    $idSetBea = $this->input->post('idSetBea');
    $this->mdl->update_setting_bea(array('id' => $idSetBea), $data_bea);

    $count_score = count($this->input->post('score'));
    for ($i=0;$i<$count_score;$i++) {
      $skor = $this->input->post('score['.$i.']');
      $idSet = $this->input->post('idSet['.$i.']');
      if ($skor != null && $idSet == null && $skor != "HAPUS") {
        # insert kategori
        $data= array(
          'idBea' => $idSetBea,
          'idKategoriSkor' => $skor,
          );
        $this->mdl->insert_setting_sub_bea($data);
      }elseif ($skor != null && $idSet != null && $skor != "HAPUS") {
        # update kategori
        $data= array(
          'idBea' => $idSetBea,
          'idKategoriSkor' => $skor,
          );
        $this->mdl->update_setting_sub_bea(array('id' => $idSet), $data);
      }elseif ($skor != null && $idSet != null && $skor == "HAPUS") {
        # delete kategori
        $this->mdl->delete_setting_sub_bea($idSet);
      }
    }
    echo json_encode(array("status" => TRUE));
  }

  public function delete_data()
  {
    $id = $this->input->post('idSetBea');
    $this->mdl->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
  }

}
?>
