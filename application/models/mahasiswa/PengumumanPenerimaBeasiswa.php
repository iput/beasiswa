<?php defined('BASEPATH')OR exit('akses tidak dapat diterima');

class PengumumanPenerimaBeasiswa extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getdata()
	{
		$data="SELECT pb.nim,im.namaLengkap, j.namaJur,f.namaFk, b.namaBeasiswa, pb.tahun FROM penerima_bea pb,identitas_mhs im,jurusan j,bea b,fakultas f where pb.nim=im.nimMhs and im.idJrs=j.id and b.id=pb.idBea and f.id=j.idFk";
		return $this->db->query($data);
	}
}
