<?php defined('BASEPATH')OR exit('akses tidak dapat diterima');

class C_profileMhs extends CI_Controller
{

	var $limit=10;
	var $offset=10;
	function __construct(){
		parent::__construct();
		$this->load->model("mahasiswa/Profile",'model');
		$this->load->library('upload');
		$this->load->helper(array('url'));
	}
	public function index()
	{

	}
	public function simpan()
	{ 	
		$nmfile = "file_".time();
		$path   = './assets/img/profile/';
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|png|jpeg|bmp|gif';
		/*$config['allowed_types'] = 'gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp';*/
		$config['max_size'] = '100';
		$config['max_width']  = '900';
		$config['max_height']  = '900';
		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);
		$key		= $this->input->post('nimm');
		$exp   = $this->input->post('filelama');

		if($_FILES['filefoto']['name'])
		{
			if ($this->upload->do_upload('filefoto'))
			{	
				$gbr = $this->upload->data();
				$data = array(
					'fotoMhs' 		=> $gbr['file_name'],
					'nimMhs'		=> $this->input->post('nim'),
					'angkatan' 		=> $this->input->post('angkatan'),
					'namaLengkap' 	=> $this->input->post('namaMhs'),
					'tempatLahir' 	=> $this->input->post('tempatLahir'),
					'tglLahir' 		=> $this->input->post('tglLahir'),
					'asalKota' 		=> $this->input->post('asalKota'),
					'namaOrtu' 		=> $this->input->post('namaOrtu'),
					'alamatOrtu' 	=> $this->input->post('alamatOrtu'),
					'kotaOrtu' 		=> $this->input->post('kotaOrtu'),
					'propinsiOrtu' 	=> $this->input->post('provinsiOrtu'),
					'alamatLengkap'	=> $this->input->post('alamat'),
					'emailAktif' 	=> $this->input->post('email'),
					'noTelp'		=> $this->input->post('noTelp')
					);

				$row = $this->db->where('nimMhs',$key)->get('identitas_mhs')->row();
				unlink('assets/img/profile/'.$row->fotoMhs);

				$where =array('nimMhs'=>$key);
				$this->model->get_update($data,$where);

				// echo json_encode($data);

				/*$config2['image_library'] = 'gd2'; 
				$config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$config2['new_image'] = './assets/img/profile/hasil_resize/';
				$config2['maintain_ratio'] = TRUE;
				$config2['width'] = 100;
				$config2['height'] = 100;
				$this->load->library('image_lib',$config2); 
				if ( !$this->image_lib->resize()){
					$this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
				}*/

				$this->session->set_flashdata("pesan", "<div class=\"card-panel success\">Data Berhasil Disimpan</div>");
				redirect('mahasiswa/C_mahasiswa/profile');
			}else{
				$this->session->set_flashdata("pesan", "<div class=\"card-panel alert\">Gagal Upload Gambar [Max.Size 100Kb] [Types : jpg, png, jpeg, bmp, gif ]</div>");
				redirect('mahasiswa/C_mahasiswa/profile');
			}
		}else if(empty($_FILES['filefoto']['name']))
		{
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

			$this->model->getupdate($key,$data);
			$this->session->set_flashdata("pesan", "<div class=\"card-panel success col s12 m4 l6\">Data Berhasil Disimpan</div>");
			redirect('mahasiswa/C_mahasiswa/profile');
		}
	}
	public function simpanPassword()
	{ 	
		$key=$this->input->post('id');
		$data['id']=$this->input->post('id');
		$data['userId'] = $this->input->post('userid');
		$data['password'] = md5($this->input->post('password'));
		$this->model->getupdatePass($key,$data);
		$this->session->set_flashdata('info','Data Sukses di Update');
		redirect('Login');
	}
}


