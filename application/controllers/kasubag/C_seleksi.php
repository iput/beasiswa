<?php defined('BASEPATH')OR exit('tidak ada akses diizinkan');
class C_seleksi extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("kasubag/Seleksi",'mdl');
  }

  public function index()
  {
    $this->load->view('attribute/header_kasubag');
    $this->load->view('kasubag/seleksi');
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
      if ($row->selektor == "1") {
        # kasubag kemahasiswaan
        $sub_array[] = '<i class="mdi-toggle-radio-button-on" title="Kasubag. Kemahasiswaan"></i> Kms';
      }elseif ($row->selektor == "2") {
        # kasubag kemahasiswaan fakultas
        $sub_array[] = '<i class="mdi-toggle-radio-button-off" title="Kasubag. Kemahasiswaan Fakultas"></i> Fks';
      }elseif ($row->selektor == "3") {
        # keduanya
        $sub_array[] = '<i class="mdi-action-stars" title="Keduanya"></i> 2K';
      }

      $sub_array[] = '<span class="blue-text">'.$row->kuota.'</span>';
      $status = $row->statusBeasiswa;
      if ($status=="0" || $status=="1" ||$status=="3") {
        # aktif/confirmed
        $sub_array[] = '
          <a class="btn-floating waves-effect waves-light primary-color z-depth-0" title="Confirmed"><i class="mdi-action-done"></i></a>
          ';
      }else{
        # ditolak
        $alamat = base_url('kasubag/C_requested/pengaturan');
        $sub_array[] = '
            <form action="'.$alamat.'" method="post">
              <button class="btn-floating waves-effect waves-light red" title="Not Confirmed" type="submit" name="idPengaturan" value="'.$row->id.'"><i class="mdi-action-settings"></i></button>
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

}
 ?>
