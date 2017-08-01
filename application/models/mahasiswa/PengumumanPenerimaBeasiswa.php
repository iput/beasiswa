<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengumumanPenerimaBeasiswa extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	public function getdata()
	{
		$data="SELECT pb.nim,im.namaLengkap, j.namaJur,f.namaFk, b.namaBeasiswa, pb.tahun FROM penerima_bea pb,identitas_mhs im,jurusan j,bea b,fakultas f where pb.nim=im.nimMhs and im.idJrs=j.id and b.id=pb.idBea and f.id=j.idFk";
		return $this->db->query($data);
	}

	var $table = "penerima_bea";
	var $select_column = array("penerima_bea.nim", "identitas_mhs.namaLengkap", "jurusan.namaJur", "fakultas.namaFk", "bea.namaBeasiswa", "penerima_bea.tahun");
	var $order_column = array("penerima_bea.nim", "identitas_mhs.namaLengkap", "jurusan.namaJur", "fakultas.namaFk", "bea.namaBeasiswa", null);


	function make_query()
	{
		$this->db->select($this->select_column);
		$this->db->from($this->table);
		$this->db->join('identitas_mhs', 'identitas_mhs.nimMhs = penerima_bea.nim', 'left');
		$this->db->join('jurusan', 'identitas_mhs.idJrs = jurusan.id', 'left');
		$this->db->join('bea', 'bea.id = penerima_bea.idBea', 'left');
		$this->db->join('fakultas', 'fakultas.id = jurusan.idFk', 'left');

		if(isset($_POST["search"]["value"]))
		{
			$this->db->like("penerima_bea.nim", $_POST["search"]["value"]);
			$this->db->or_like("identitas_mhs.namaLengkap", $_POST["search"]["value"]);
			$this->db->or_like("jurusan.namaJur", $_POST["search"]["value"]);
			$this->db->or_like("fakultas.namaFk", $_POST["search"]["value"]);
			$this->db->or_like("bea.namaBeasiswa", $_POST["search"]["value"]);
			$this->db->or_like("penerima_bea.tahun", $_POST["search"]["value"]);
		}
		if(isset($_POST["order"]))
		{
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else
		{
			$this->db->order_by('penerima_bea.nim', 'DESC');
		}
	}

	function make_datatables(){
		$this->make_query();
		if($_POST["length"] != -1)
		{
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	function get_filtered_data(){
		$this->make_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_all_data()
	{
		$this->db->select("*");
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id_bea($id)
	{
		$this->db->from($this->table);
		$this->db->where('bea.id',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_scoring()
	{
		$this->db->select('*');
		$this->db->from('kategori_skor');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_jurusan($fakultas)
	{
		$getjur ="select j.id,j.namaJur,f.namaFk from jurusan j,fakultas f where j.idFk=f.id and f.id='$fakultas' order by j.namaJur asc";
		return $this->db->query($getjur)->result();
	}

}