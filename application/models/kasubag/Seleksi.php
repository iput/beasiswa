<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seleksi extends CI_Model {

  var $table = "skor_mahasiswa";
  var $select_column = array("skor_mahasiswa.nimMhs", "skor_mahasiswa.namaLengkap", "skor_mahasiswa.namaBeasiswa", "skor_mahasiswa.ipk", "skor_mahasiswa.skor", "skor_mahasiswa.jumlah", "skor_mahasiswa.idBea");
  var $order_column = array("skor_mahasiswa.nimMhs", "skor_mahasiswa.namaLengkap", "skor_mahasiswa.ipk", "skor_mahasiswa.skor", "skor_mahasiswa.jumlah", null);
  var $column_search = array("skor_mahasiswa.nimMhs", "skor_mahasiswa.namaLengkap", "skor_mahasiswa.ipk", "skor_mahasiswa.skor", "skor_mahasiswa.jumlah");

  function make_query($idBea)
  {
    $this->db->select($this->select_column);
    $this->db->from($this->table);
    $this->db->where('idBea', $idBea);
    
    $i = 0;
    foreach ($this->column_search as $item) // loop column
    {
      if($_POST['search']['value']) // if datatable send POST for search
      {

        if($i===0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        }
        else
        {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if(count($this->column_search) - 1 == $i) //last loop
        $this->db->group_end(); //close bracket
      }
      $i++;
    }

    if(isset($_POST["order"]))
    {
      $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    }
    else
    {
      $this->db->order_by('skor_mahasiswa.jumlah', 'DESC');
    }
  }

  function make_datatables($idBea){
    $this->make_query($idBea);
    if($_POST["length"] != -1)
    {
        $this->db->limit($_POST['length'], $_POST['start']);
    }
    $query = $this->db->get();
    return $query->result();
  }

  function get_filtered_data($idBea){
    $this->make_query($idBea);
    $query = $this->db->get();
    return $query->num_rows();
  }

  function get_all_data()
  {
    $this->db->select("*");
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }

  //combobox
  public function getComboBea()
  {
    $sql = "SELECT * FROM bea WHERE (selektor='1' || selektor='3') && statusBeasiswa='0'";
    $query = $this->db->query($sql);
    return $query->result();
  }

  // public function get_by_id_bea($id)
	// {
	// 	$this->db->from($this->table);
	// 	$this->db->where('bea.id',$id);
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }
  //
  // public function get_scoring()
  // {
  //   $this->db->select('*');
  //   $this->db->from('kategori_skor');
  //   $query = $this->db->get();
  //   return $query->result();
  // }
  //
  // public function save_bea($data)
  // {
  //   $this->db->insert($this->table, $data);
	// 	return $this->db->insert_id();
  // }
  //
  // public function save_sub_bea($data)
  // {
  //   $this->db->insert_batch('set_bea_kategori_skor', $data);
	// 	return $this->db->insert_id();
  // }
  //
  // public function get_skor_by_idBea($id)
  // {
  //   $this->db->select('set_bea_kategori_skor.idKategoriSkor, set_bea_kategori_skor.id');
  //   $this->db->from('set_bea_kategori_skor');
	// 	$this->db->where('set_bea_kategori_skor.idBea',$id);
	// 	$query = $this->db->get();
	// 	return $query->result();
  // }
  //
  // public function update_setting_bea($where, $data)
  // {
  //   $this->db->update($this->table, $data, $where);
	// 	return $this->db->affected_rows();
  // }
  //
  // public function update_setting_sub_bea($where, $data)
  // {
  //   $this->db->update('set_bea_kategori_skor', $data, $where);
	// 	return $this->db->affected_rows();
  // }
  //
  // public function insert_setting_sub_bea($data)
  // {
  //   $this->db->insert('set_bea_kategori_skor', $data);
	// 	return $this->db->insert_id();
  // }
  //
  // public function delete_setting_sub_bea($id)
  // {
  //   $this->db->where('id', $id);
	// 	$this->db->delete('set_bea_kategori_skor');
  // }
  //
  // public function delete_by_id($id)
  // {
  //   $this->db->where('id', $id);
	// 	$this->db->delete($this->table);
  //
  //   $this->db->where('idBea', $id);
	// 	$this->db->delete('set_bea_kategori_skor');
  // }

}
