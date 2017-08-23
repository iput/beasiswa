<?php defined('BASEPATH') OR exit('akses tidak dapat diterima');

class C_mahasiswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("mahasiswa/PengumumanPenerimaBeasiswa", 'model');
        $this->load->model("mahasiswa/Formulir", 'm_aplikasi');
    }
    public function data_pendaftar()
    {   
        
        // mengambils hanya satu baris (menggunakan fungsi row()) 
        // di model m_aplikasi function daftar_tugas dengan parameter $nim
        $data['pendaftar'] = $this->m_aplikasi->data_pendaftar();
        
        $this->load->view('mahasiswa/pdfreport',$data);
        unset($data);
    }

    public function index()
    {
        $this->load->view('attribute/header_mhs');
        $this->load->view('mahasiswa/dashboard');
        $this->load->view('attribute/footer');
    }

    function pdf()
    {

        $this->load->view('mahasiswa/pdfreport');
    }

    public function profile()
    {
        $this->load->view('attribute/header_mhs');
        $this->load->view('mahasiswa/v_profile_mhs');
        $this->load->view('attribute/footer');
    }


    public function pengumuman_penerima_beasiswa()
    {
        $isi['fakultas'] = $this->db->get('fakultas')->result();
        $isi['tahun'] = $this->db->get('penerima_bea')->result();
        $isi['beasiswa'] = $this->db->get('bea')->result();
        $isi['data'] = $this->model->getdata()->result();
        $this->load->view('attribute/header_mhs');
        $this->load->view('mahasiswa/v_pengumuman_penerima_beasiswa', $isi);
        $this->load->view('attribute/footer');
    }

    public function datatable()
    {
        $fetch_data = $this->model->make_datatables();
        $data = array();
        $nmr = 0;

        foreach ($fetch_data as $row) {
            $nmr += 1;
            $sub_array = array();
            $sub_array[] = $nmr;
            $sub_array[] = $row->nim;
            $sub_array[] = $row->namaLengkap;
            $sub_array[] = $row->namaFk;
            $sub_array[] = $row->namaJur;
            $sub_array[] = $row->namaBeasiswa;
            $sub_array[] = $row->tahun;
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->model->get_all_data(),
            "recordsFiltered" => $this->model->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function getjurusan()
    {
        $fakultas = $_GET['fakultas'];
        $getjur = $this->model->get_jurusan($fakultas);
        echo json_encode($getjur);
    }

    public function searchFilter()
    {
        $id_tahun = htmlentities($_POST['tahun']);
        $id_fakultas = htmlentities($_POST['fakultas']);
        $id_jurusan = htmlentities($_POST['jurusan']);
        $id_beasiswa = htmlentities($_POST['beasiswa']);

        if ($id_tahun !== "0") {
            $filter_tahun = "and pb.tahun='$id_tahun'";
        } else {
            $filter_tahun = "";
        }

        if ($id_fakultas !== "0") {
            $filter_fakultas = "and f.id='$id_fakultas'";
        } else {
            $filter_fakultas = "";
        }
        if ($id_jurusan !== "0") {
            $filter_jurusan = "and j.id='$id_jurusan'";
        } else {
            $filter_jurusan = "";
        }
        if ($id_beasiswa !== "0") {
            $filter_beasiswa = "and b.id='$id_beasiswa'";
        } else {
            $filter_beasiswa = "";
        }

        $view = "SELECT pb.nim,im.namaLengkap, j.namaJur,f.namaFk, b.namaBeasiswa, pb.tahun FROM penerima_bea pb,identitas_mhs im,jurusan j,bea b,fakultas f where pb.nim=im.nimMhs and im.idJrs=j.id and b.id=pb.idBea and f.id=j.idFk $filter_tahun $filter_fakultas $filter_jurusan $filter_beasiswa order by nim asc";

        print_r($this->db->query($view)->result());
    }
}

