<?php defined('BASEPATH')OR exit('tidak ada akses diizinkan');
/**
 *
 */
class C_master_scoring extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("kasubag/Master_scoring",'mdl');
  }

  public function index()
  {
    $this->load->view('attribute/header_kasubag');
    $this->load->view('kasubag/master_scoring');
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
      $sub_array[] = $row->nama;
      $sub_array[] = $this->mdl->get_sub_score($row->id);
      $sub_array[] = '
        <button type="button" name="update" id="'.$row->id.'" class="btn-floating waves-effect waves-light yellow accent-4" title="Edit"><i class="material-icons">mode_edit</i></button>
        <button type="button" name="delete" id="'.$row->id.'" class="btn-floating waves-effect waves-light red" title="Hapus"><i class="material-icons">delete</i></button>
        ';
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

  public function add_data()
  {
    $data_kategori = array(
      'nama' => $this->input->post('jenisScoring'),
    );
    $insert_kategori = $this->mdl->save_kategori($data_kategori);

    $count_score = count($this->input->post('score'));
    $data = array();
    for ($i=0;$i<$count_score;$i++) {
      $data[$i]= array(
        'idKategoriSkor' => $insert_kategori,
        'nama' => $this->input->post('score['.$i.']'),
        'skor' => $this->input->post('bobot['.$i.']'),
      );
    }
    $insert_sub_kategori = $this->mdl->save_sub_kategori($data);

    echo json_encode(array("status" => TRUE));
  }
}
 ?>
