<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulir extends CI_Model {

  public function get_nama_bea($idBea)
  {
    $this->db->select('bea.id, bea.namaBeasiswa');
    $this->db->from('bea');
    $this->db->where('bea.id',$idBea);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_skor_bea($id)
  {
    $this->db->select('set_bea_kategori_skor.idKategoriSkor, set_bea_kategori_skor.id');
    $this->db->from('set_bea_kategori_skor');
    $this->db->where('set_bea_kategori_skor.idBea',$id);
    $result = $this->db->get()->result();
    $combo = "";
    foreach ($result as $res) {
      $namaKategori = $this->get_kategori($res->idKategoriSkor);
      $combo .= '
      <div class="row">
      <input type="hidden" value="'.$res->idKategoriSkor.'">
      <div class="input-field col s12">
      <select>
      <option value="" disabled selected>-Pilihan '.$namaKategori->nama.'</option>
      ';
      $subKategori = $this->get_sub_kategori($res->idKategoriSkor);
      foreach ($subKategori as $kat) {
        $combo .='
        <option value="'.$kat->id.'">'.$kat->nama.'</option>
        ';
      }
      $combo .='
      </select>
      <label>'.$namaKategori->nama.'</label>
      </div>
      </div>
      ';
    }

    return $combo;
  }

  public function get_kategori($id)
  {
    $this->db->select('kategori_skor.nama');
    $this->db->from('kategori_skor');
    $this->db->where('kategori_skor.id',$id);
    $res = $this->db->get();
    return $res->row();
  }

  public function get_sub_kategori($id)
  {
    $this->db->select('set_sub_kategori_skor.nama, set_sub_kategori_skor.id');
    $this->db->from('set_sub_kategori_skor');
    $this->db->where('set_sub_kategori_skor.idKategoriSkor',$id);
    $res = $this->db->get();
    return $res->result();
  }

  public function get_jurusan()
  {
    $this->db->select('jurusan.id, jurusan.namaJur');
    $this->db->from('jurusan');
    $res = $this->db->get()->result();
    return $res;
  }

}
