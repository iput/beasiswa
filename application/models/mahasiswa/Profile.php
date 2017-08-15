<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Model {
	public function __construct()
	{	
		parent::__construct();
	}

	public function getdata($key)
	{
		$this->db->where('nimMhs',$key);
		$hasil = $this->db->get('identitas_mhs');
		return $hasil;
	}
	public function getupdate($key,$data)
	{
		$this->db->where('nimMhs',$key);
		$this->db->update('identitas_mhs',$data);
	}
	public function getInsert($data)
	{
		$this->db->insert('identitas_mhs',$data);
	}
	public function getdelete($key)
	{
		$this->db->where('nimMhs',$key);
		$this->db->delete('identitas_mhs');
	}
}
