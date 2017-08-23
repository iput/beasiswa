<?php defined('BASEPATH')OR exit('akses tidak dapat diterima');

class C_profileKasubagFk extends CI_Controller
{

	var $limit=10;
	var $offset=10;
	function __construct(){
		parent::__construct();
		$this->load->model("kasubag_fk/ProfileKasubagFk",'model');
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
		$key		= $this->input->post('id');
		$exp   		= $this->input->post('filelama');

		if($_FILES['filefoto']['name'])
		{
			if ($this->upload->do_upload('filefoto'))
			{	
				$gbr = $this->upload->data();
				$data = array(
					'foto' 		=> $gbr['file_name'],
					'id'		=> $this->input->post('id'),
					'nama' 		=> $this->input->post('nama'),
					'alamat' 	=> $this->input->post('alamat'),
					'noTelp' 	=> $this->input->post('noTelp'),
					'email' 	=> $this->input->post('email')
					);

				$row = $this->db->where('id',$key)->get('profil_admin')->row();
				unlink('assets/img/profile/'.$row->foto);

				$where =array('id'=>$key);
				$this->model->get_update($data,$where);

				$this->session->set_flashdata("pesan", "<div class=\"card-panel success\">Data Berhasil Disimpan</div>");
				redirect('kasubag_fakultas/C_kasubagfk/profile');
			}else{
				$this->session->set_flashdata("pesan", "<div class=\"card-panel alert\">Gagal Upload Foto [Max.Size 100Kb] [Types : jpg, png, jpeg, bmp, gif ]</div>");
				redirect('kasubag/C_kasubagfk/profile');
			}
		}else if(empty($_FILES['filefoto']['name']))
		{
			$data = array(
				'id'			=> $this->input->post('id'),
				'nama' 			=> $this->input->post('nama'),
				'alamat' 		=> $this->input->post('alamat'),
				'noTelp' 		=> $this->input->post('noTelp'),
				'email' 		=> $this->input->post('email')
				);

			$this->model->getupdate($key,$data);
			$this->session->set_flashdata("pesan", "<div class=\"card-panel success col s12 m4 l6\">Data Berhasil Disimpan</div>");
			redirect('kasubag_fakultas/C_kasubagfk/profile');
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