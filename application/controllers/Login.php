<?php defined('BASEPATH')OR exit('tidak ada akses di izinkan');
/**
 *
 */
class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('Loginauth');
		$this->load->library('Recaptcha');
		$this->loginauth->view_page();
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
			$data =array(
			'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag() // javascript recaptcha ditaruh di head
            );
			$this->load->view('login',$data);
		}
	}
}
?>