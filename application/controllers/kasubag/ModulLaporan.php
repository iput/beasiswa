<?php defined('BASEPATH')OR exit('no direct script access allowed');
/**
 * 
 */
 class ModulLaporan extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('Kasubag/Beasiswa');
 		$this->load->model('Kasubag/ReportBeasiswa');
 	}

 	public function index()
 	{
 		$data['fakultas']=$this->ReportBeasiswa->dataFakultas();
 		$data['jurusan']=$this->ReportBeasiswa->dataJurusan();
 		$data['beasiswa']=$this->Beasiswa->daftarBeasiswa();
 		$this->load->view('attribute/Header_kasubag');
 		$this->load->view('kasubag/ReportBeasiswa', $data);
 		$this->load->view('attribute/FooterKasubag');
 	}

 	public function penerimaBeaSiswa()
 	{
 		$data['fakultas']=$this->ReportBeasiswa->dataFakultas();
 		$data['jurusan']=$this->ReportBeasiswa->dataJurusan();
 		$data['beasiswa']=$this->Beasiswa->daftarBeasiswa();
 		$data['detail']=$this->ReportBeasiswa->dataPenerimaBeasiswa();
 		$this->load->view('attribute/Header_kasubag');
 		$this->load->view('kasubag/ReportBeasiswaPenerima', $data);
 		$this->load->view('attribute/FooterKasubag');
 	}
 } ?>