<?php defined('BASEPATH')OR exit('tidak ada akses diizinkan');
class C_ubahStatus extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("kasubag/Seleksi",'mdl');
  }

  public function index()
  {
    $this->load->view('attribute/header_kasubag');
    $this->load->view('kasubag/ubahStatus');
    $this->load->view('attribute/footer');
  }

  public function datatable($idBea){
    $fetch_data = $this->mdl->make_datatables($idBea);
    $data = array();
    $nmr = 0;
    foreach($fetch_data as $row)
    {
      $nmr+=1;
      $sub_array = array();
      $sub_array[] = $nmr;
      $sub_array[] = $row->nimMhs;
      $sub_array[] = $row->namaLengkap;
      $sub_array[] = $row->ipk;
      $sub_array[] = '<a href="#" onclick="view_detail_score('.$row->idPendaftar.','.$row->idBeasiswa.')">'.$row->skor.'</a>';
      $sub_array[] = number_format($row->jumlah,2);
      $sub_array[] = $row->updated;
      if ($row->status==1) {
        $sub_array[] = '
          <button class="btn-floating waves-effect waves-light primary-color" title="Confirmed" type="submit" name="idPengaturan" onclick="seleksi('."'".$row->idPendaftar."'".','."'".$row->status."'".');"><i class="mdi-action-done"></i></button>
        ';
      }elseif ($row->status==0) {
        $sub_array[] = '
          <button class="btn-floating waves-effect waves-light red" title="Not Confirmed" type="submit" name="idPengaturan" onclick="seleksi('."'".$row->idPendaftar."'".','."'".$row->status."'".');"><i class="mdi-content-clear"></i></button>
        ';
      }


      $data[] = $sub_array;
    }
    $output = array(
      "draw"            =>  intval($_POST["draw"]),
      "recordsTotal"    =>  $this->mdl->get_all_data(),
      "recordsFiltered" =>  $this->mdl->get_filtered_data($idBea),
      "data"            =>  $data
    );
    echo json_encode($output);
  }

  public function view_detail_score($idPendaftar, $idBea)
  {
    $data = $this->mdl->view_detail_score($idPendaftar, $idBea);
    echo json_encode($data);
  }

  public function seleksi($idPendaftar, $status)
  {
    $change_status;
    if ($status=="1") {
      $change_status = "0";
    }elseif ($status=="0") {
      $change_status = "1";
    }
    $data = array(
      'status' => $change_status
    );
    $this->mdl->seleksi_penerima(array('id' => $idPendaftar), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function getDiterima($idBea)
  {
    $data = $this->mdl->infoDiterima($idBea);
    echo json_encode($data);
  }

}
 ?>
