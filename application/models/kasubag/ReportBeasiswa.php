<?php

defined('BASEPATH')OR exit('no direct script access allowed');

/**
 * 
 */
class ReportBeasiswa extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function dataFakultas() {
        $data = $this->db->query("SELECT * from fakultas");
        if ($data) {
            return $data->result_array();
        } else {
            return false;
        }
    }

    public function dataJurusan() {
        $data = $this->db->query("SELECT * from jurusan");
        if ($data) {
            return $data->result_array();
        } else {
            return false;
        }
    }
    
    public function dataPenerimaBeasiswa($tahun, $jurusan, $fakultas, $bea) {
        $this->db->select("*");
        $this->db->from("pendaftar");
        $this->db->join("bea", "pendaftar.idBea=bea.id");
        $this->db->join("identitas_mhs", "pendaftar.nim=identitas_mhs.nimMhs");
        $this->db->join("jurusan", "identitas_mhs.idJrs=jurusan.id");
        $this->db->join("fakultas", "jurusan.idFk=fakultas.id");
        $this->db->where("pendaftar.status=1");
        $this->db->where("identitas_mhs.angkatan",$tahun);
        $this->db->where("jurusan.id",$jurusan);
        $this->db->where("fakultas.id",$fakultas);
        $this->db->where("bea.id",$bea);
        $detailDiri = $this->db->get();
        if ($detailDiri) {
            return $detailDiri->result_array();
        } else {
            return false;
        }
        unset($detailDiri);
    }
    
    public function semuaPenerimaBeasiswa() {
        $this->db->select("*");
        $this->db->from("pendaftar");
        $this->db->join("bea", "pendaftar.idBea=bea.id");
        $this->db->join("identitas_mhs", "pendaftar.nim=identitas_mhs.nimMhs");
        $this->db->join("jurusan", "identitas_mhs.idJrs=jurusan.id");
        $this->db->join("fakultas", "jurusan.idFk=fakultas.id");
        $this->db->where("pendaftar.status=1");
        $detailDiri = $this->db->get();
        if ($detailDiri) {
            return $detailDiri->result_array();
        } else {
            return false;
        }
        unset($detailDiri);
    }
    
    public function semuaPemohonBeasiswa() {
        $this->db->select("*");
        $this->db->from("pendaftar");
        $this->db->join("bea", "pendaftar.idBea=bea.id");
        $this->db->join("identitas_mhs", "pendaftar.nim=identitas_mhs.nimMhs");
        $this->db->join("jurusan", "identitas_mhs.idJrs=jurusan.id");
        $this->db->join("fakultas", "jurusan.idFk=fakultas.id");
        $this->db->where("pendaftar.status=0");
        $detailDiri = $this->db->get();
        if ($detailDiri) {
            return $detailDiri->result_array();
        } else {
            return false;
        }
        unset($detailDiri);
    }

    public function filterPemohon($tahun, $jurusan, $fakultas, $bea) {
        $this->db->select("*");
        $this->db->from("pendaftar");
        $this->db->join("bea", "pendaftar.idBea=bea.id");
        $this->db->join("identitas_mhs", "pendaftar.nim=identitas_mhs.nimMhs");
        $this->db->join("jurusan", "identitas_mhs.idJrs=jurusan.id");
        $this->db->join("fakultas", "jurusan.idFk=fakultas.id");
        $this->db->where("pendaftar.status=0");
        $this->db->where("identitas_mhs.angkatan",$tahun);
        $this->db->where("jurusan.id",$jurusan);
        $this->db->where("fakultas.id",$fakultas);
        $this->db->where("bea.id",$bea);
        $detailDiri = $this->db->get();
        if ($detailDiri) {
            return $detailDiri->result_array();
        } else {
            return false;
        }
        unset($detailDiri);
    }
    public function grafikPenerima() {
        $query = $this->db->query("select namaBeasiswa,count(status) as penerima  from pendaftar join bea on pendaftar.idBea=bea.id where status=1 group by namaBeasiswa");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $result) {
                $datahasil[] = $result;
            }
            return $datahasil;
        }
    }

    public function grafikPemohon() {
        $query = $this->db->query("select namaBeasiswa,count(status) as pemohon  from pendaftar join bea on pendaftar.idBea=bea.id where status=0 group by namaBeasiswa");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $result) {
                $datahasil[] = $result;
            }
            return $datahasil;
        }
    }

}

?>