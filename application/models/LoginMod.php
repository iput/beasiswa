<?php defined('BASEPATH')OR exit('no direct script access allowed');
/**
 * 
 */
class LoginMod extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function actLogin($username, $password, $level)
	{	

		if($level==1){
			$query = $this->db->query("SELECT * FROM akses WHERE userId=? AND password=? AND idLevel=?", array($username, $password, $level));
		}
		else if($level==2){
			$query = $this->db->query("SELECT * FROM akses WHERE userId=? AND password=? AND idLevel=?", array($username, $password, $level));
		}
		else if($level==3){
			$query = $this->db->query("SELECT * FROM akses WHERE userId=? AND password=? AND idLevel=?", array($username, $password, $level));
		}
		else if($level==4){
			$query = $this->db->query("SELECT * FROM akses WHERE userId=? AND password=? AND idLevel=?", array($username, $password, $level));
		}
		else if($level==5){
			$query = $this->db->query("SELECT * FROM akses a,identitas_mhs im WHERE userId=? AND password=? AND idLevel=? and a.userId=im.nimMhs", array($username, $password, $level));
		}
		// return $query;
		// }


		if ($query) {
			return $query;
		}else{
			return false;
		}
		$query =null;

		unset($username, $password, $level);

	}

	public function putus_koneksi()
	{	
		$this->db = null;
	}
} ?>