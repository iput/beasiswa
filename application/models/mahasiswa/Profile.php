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

	function get_update($data,$where){
		$this->db->where($where);
		$this->db->update('identitas_mhs', $data);
		return TRUE;
	}

	function get_byimage($where) {
		$this->db->from('identitas_mhs');
		$this->db->where($where);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query;
		}
	}

	public function getupdatePass($key,$data)
	{
		$this->db->where('id',$key);
		$this->db->update('akses',$data);
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
