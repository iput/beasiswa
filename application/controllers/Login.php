<?php defined('BASEPATH')OR exit('tidak ada akses di izinkan');
/**
 *
 */
class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('username') and 
			$this->session->userdata('password') and
			$this->session->userdata('level'))
		{	
			redirect('FunctLogin/prosesLogin',$data);
		} else
		{	
			$this->load->view('login');
		}
	}
}
?>
