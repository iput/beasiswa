<?php

defined('BASEPATH')OR exit('no direct script access allowed');

/**
 *
 */
class ModulLaporan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('kasubag/Beasiswa');
        $this->load->model('kasubag/ReportBeasiswa');
    }

    public function penerimaBeaSiswa() {
        $tahun = $this->input->post('filTahun');
        $jurusan = $this->input->post('filJurusan');
        $fakultas = $this->input->post('filFakultas');
        $beasiswa = $this->input->post('filBeasiswa');
        $data['fakultas'] = $this->ReportBeasiswa->dataFakultas();
        $data['jurusan'] = $this->ReportBeasiswa->dataJurusan();
        $data['beasiswa'] = $this->Beasiswa->daftarBeasiswa();
        $data['detail'] = $this->ReportBeasiswa->dataPenerimaBeasiswa($tahun, $jurusan, $fakultas, $beasiswa);
        $this->load->view('attribute/header_kasubag');
        $this->load->view('kasubag/ReportBeasiswaPenerima', $data);
        $this->load->view('attribute/footerKasubag');
    }

    public function semuaDataPemohon() {
        $data['databea'] = $this->ReportBeasiswa->semuaPemohonBeasiswa();
        $this->load->view('kasubag/masterDataBeaPDF', $data);
    }

    public function semuaDataPenerima() {
        $data['databea'] = $this->ReportBeasiswa->semuaPenerimaBeasiswa();
        $this->load->view('kasubag/masterDataPenerima', $data);
    }

    public function filterLaporan() {
        $tahun = $this->input->post('filTahun');
        $jurusan = $this->input->post('filJurusan');
        $fakultas = $this->input->post('filFakultas');
        $beasiswa = $this->input->post('filBea');
        $data['fakultas'] = $this->ReportBeasiswa->dataFakultas();
        $data['jurusan'] = $this->ReportBeasiswa->dataJurusan();
        $data['beasiswa'] = $this->Beasiswa->daftarBeasiswa();
        $data['datafill'] = $this->ReportBeasiswa->filterPemohon($tahun, $jurusan, $fakultas, $beasiswa);

        $this->load->view('attribute/header_kasubag');
        $this->load->view('kasubag/ReportBeasiswaFilter', $data);
        $this->load->view('attribute/footerKasubag');
    }
}
?>
