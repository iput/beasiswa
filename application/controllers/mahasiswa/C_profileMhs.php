<?php defined('BASEPATH')OR exit('akses tidak dapat diterima');

class C_profileMhs extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->model("mahasiswa/Profile",'model');
	}

	public function index()
	{

	}
	public function simpan()
	{
		$key= $this->input->post('nim');
		$data['nimMhs'] = $this->input->post('nim');
		$data['angkatan'] = $this->input->post('angkatan');
		$data['namaLengkap'] = $this->input->post('namaMhs');
		$data['tempatLahir'] = $this->input->post('tempatLahir');
		$data['tglLahir'] = $this->input->post('tglLahir');
		$data['asalKota'] = $this->input->post('asalKota');
		$data['namaOrtu'] = $this->input->post('namaOrtu');
		$data['alamatOrtu'] = $this->input->post('alamatOrtu');
		$data['kotaOrtu'] = $this->input->post('kotaOrtu');
		$data['propinsiOrtu'] = $this->input->post('provinsiOrtu');
		$data['alamatLengkap'] = $this->input->post('alamat');
		$data['emailAktif'] = $this->input->post('email');
		$data['noTelp'] = $this->input->post('noTelp');
		
		
		$query = $this->model->getdata($key);
		if($query->num_rows()>0)
		{
			$this->model->getupdate($key,$data);
			$this->session->set_flashdata('info','Data Sukses di Update');
		}
		else
		{
			$this->model->getInsert($data);
			$this->session->set_flashdata('info','Data Sukses di Simpan');
		}
		redirect('mahasiswa/C_mahasiswa/profile');
	}

}
