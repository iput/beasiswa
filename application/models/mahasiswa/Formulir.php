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
  public function getdataMhs($nim)
  { 
    $this->db->select('*');
    $this->db->from('identitas_mhs');
    $this->db->where('identitas_mhs.nimMhs',$nim);
    $hasil = $this->db->get();
    return $hasil->row();
  }

  public function getDataPendaftar($key)
  {
    $this->db->where('id',$key);
    $hasil = $this->db->get('pendaftar');
    return $hasil;
  }
  public function getInsert($data)
  {
    $this->db->insert('pendaftar',$data);
    return $this->db->insert_id();
  }

  public function pendaftarSkor($data)
  {
    $this->db->insert_batch('pendaftar_skor', $data);
    return $this->db->insert_id();
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
        <input type="hidden" name="idKategoriSkor[]" value="'.$res->idKategoriSkor.'">
        <div class="input-field col s12">
          <select name="score[]">
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
  
  public function FunctionName()
  {
   $query=$this->db->query("SELECT pendaftar.nim,bea.beasiswaTutup,CURRENT_DATE,datediff(CURRENT_DATE,bea.beasiswaTutup) FROM bea LEFT JOIN pendaftar ON bea.id=pendaftar.idBea WHERE pendaftar.nim=15650025 and ((YEAR(bea.beasiswaTutup) BETWEEN (YEAR(CURRENT_DATE)-1) AND (YEAR(CURRENT_DATE)+1)))");
 }

}
