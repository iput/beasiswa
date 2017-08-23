<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileKasubag extends CI_Model {
	public function __construct()
	{	
		parent::__construct();
	}

	public function getdata($key)
	{
		$this->db->where('id',$key);
		$hasil = $this->db->get('profil_admin');
		return $hasil;
	}

	var $table='akses';
	public function getProfile($user,$pass){
		// $query= $this->db->query("SELECT * FROM akses a,profil_admin p,levellog l where a.id=p.idAkses and a.idLevel=l.id and a.userId=? and a.password=?", array($user,$pass));
		// return $query;

		$this->db->select('*');
		$this->db->from('profil_admin as p');
		$this->db->where('a.userId', $user);
		$this->db->where('a.password', $pass);
		$this->db->join('akses as a', 'a.id = p.idAkses', 'LEFT');
		$this->db->join('levellog as l', 'a.idLevel=l.id', 'LEFT');
		$query=$this->db->get('profil_admin');

		return $query;
	}

	public function getupdate($key,$data)
	{
		$this->db->where('id',$key);
		$this->db->update('profil_admin',$data);
	}

	function get_update($data,$where){
		$this->db->where($where);
		$this->db->update('profil_admin', $data);
		return TRUE;
	}

	public function getupdatePass($key,$data)
	{
		$this->db->where('id',$key);
		$this->db->update('akses',$data);
	}
	public function getInsert($data)
	{
		$this->db->insert('profil_admin',$data);
	}
	public function getdelete($key)
	{
		$this->db->where('id',$key);
		$this->db->delete('profil_admin');
	}
}
