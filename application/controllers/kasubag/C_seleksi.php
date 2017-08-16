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
    $data['comboBea'] = $this->mdl->getComboBea();
    $this->load->view('kasubag/seleksi',$data);
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
      $sub_array[] = $row->skor;
      $sub_array[] = number_format($row->jumlah,2);
      $sub_array[] = "aksi";

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

}
 ?>
