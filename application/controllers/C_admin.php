<?php defined('BASEPATH')OR exit('tidak ada akses diizinkan');
/**
 *
 */
class C_admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("admin/M_admin",'mdl');
  }

  public function index()
  {
    $this->load->view('attribute/header_admin');
    $this->load->view('admin/dashboard');
    $this->load->view('attribute/footer');
  }
  public function mjm_user()
  {
    $this->load->view('attribute/header_admin');
    $this->load->view('admin/mjm_user');
    $this->load->view('attribute/footer');
  }
  public function datatable(){
    $fetch_data = $this->mdl->make_datatables();
    $data = array();
    $nmr = 0;
    $hai = null;
    $hai2 = null;
    foreach($fetch_data as $row)
    {
      $nmr+=1;
      $pilih_hitung = $row->idLevel;
      $status=   $row->status;
      if ($pilih_hitung == 1){
        $hai = "Staff kemahasiswaan";
      }
      else if ($pilih_hitung == 2){
        $hai = "Kasubag";
      }
      else if ($pilih_hitung == 3){
        $hai = "Kasubag Fakultas";
      }
      else if ($pilih_hitung == 4){
        $hai = "Kabag";
      }
      else if ($pilih_hitung == 5){
        $hai = "Mahasiswa";
      }

      if ($status == "open"){
        $hai2 = "<div class='chip blue accent-1 white-text'>
		Aktif
	</div>";
      }
      else {
        $hai2 = "<div class='chip red accent-1 white-text'>Tidak&nbsp;Aktif</div>";
      }

      $sub_array = array();
      $sub_array[] = $nmr;
      $sub_array[] = $row->userId;
      $sub_array[] = $row->password;
      $sub_array[] = $hai;
      $sub_array[] = $hai2;
      $sub_array[] = '
        <button type="button" name="edit" id="'.$row->id.'" onclick="edit('."'".$row->id."'".')" class="btn-floating waves-effect waves-light yellow accent-4" title="Edit"><i class="mdi-editor-mode-edit"></i></button>
        <button type="button" name="remove" id="'.$row->id.'" onclick="remove('."'".$row->id."','".$row->userId."'".')" class="btn-floating waves-effect waves-light red" title="Hapus"><i class="mdi-action-delete">delete</i></button>
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
  public function ajax_add()
  {
    $data = array(
        'userId' => $this->input->post('userId'),
        'password' => md5($this->input->post('password')),
        'idLevel' => $this->input->post('idLevel'),
        'status' => $this->input->post('status'),
    );
    $insert = $this->mdl->save($data);
    echo json_encode(array("status" => TRUE));
  }
  public function ajax_edit($id)
  {
    $data = $this->mdl->get_by_id($id);
    echo json_encode($data);
  }
  private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('userId') == '')
    {
      $data['inputerror'][] = 'userId';
      $data['error_string'][] = 'User Id harus diisi';
      $data['status'] = FALSE;
    }

    if($this->input->post('password') == '')
    {
      $data['inputerror'][] = 'password';
      $data['error_string'][] = 'Password harus diisi';
      $data['status'] = FALSE;
    }

    if($this->input->post('idLevel') == '')
    {
      $data['inputerror'][] = 'idLevel';
      $data['error_string'][] = 'Posisi user harus diisi';
      $data['status'] = FALSE;
    }

    if($this->input->post('status') == '')
    {
      $data['inputerror'][] = 'status';
      $data['error_string'][] = 'Silahkan pilih status user';
      $data['status'] = FALSE;
    }



    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }
  public function ajax_update()
  {
    $data = array(
        'userId' => $this->input->post('userId'),
        'password' => $this->input->post('password'),
        'idLevel' => $this->input->post('idLevel'),
        'status' => $this->input->post('status'),

    );
    $this->mdl->update(array('id' => $this->input->post('id')), $data);
    echo json_encode(array("status" => TRUE));
  }
  public function ajax_delete($id)
  {
    $this->mdl->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
  }
}
 ?>
