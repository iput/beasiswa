<?php defined('BASEPATH')OR exit('no direct script access allowed');
/**
 * 
 */
 class ReportBeasiswa extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function dataFakultas()
 	{
 		$data = $this->db->query("SELECT * from fakultas");
 		if ($data) {
 			return $data->result_array();
 		}else{
 			return false;
 		}
 	}

 	public function dataJurusan()
 	{
 		$data = $this->db->query("SELECT * from jurusan");
 		if ($data) {
 			return $data->result_array();
 		}else{
 			return false;
 		}
 	}

 	public function dataPenerimaBeasiswa()
 	{
 		$this->db->select("*");
 		$this->db->from("penerima_bea");
 		$this->db->join("bea","penerima_bea.idBea=bea.id");
 		$this->db->join("identitas_mhs","penerima_bea.nim=identitas_mhs.nimMhs");
 		$this->db->join("jurusan","identitas_mhs.idJrs=jurusan.id");
 		$this->db->join("fakultas","jurusan.idFk=fakultas.id");
 		$detailDiri	= $this->db->get();
 		if ($detailDiri) {
 			return $detailDiri->result_array();
 		}else{
 			return false;
 		}
 		unset($detailDiri);

 	}


 } ?>