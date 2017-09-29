<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengumumanPenerimaBeasiswa extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	public function getdata()
	{
		$data="SELECT pb.nim,im.namaLengkap, j.namaJur,f.namaFk, b.namaBeasiswa, pb.waktuDiubah FROM pendaftar pb,identitas_mhs im,jurusan j,bea b,fakultas f where pb.nim=im.nimMhs and im.idJrs=j.id and b.id=pb.idBea and f.id=j.idFk and pb.status=1";
		return $this->db->query($data);
	}

	var $table = "pendaftar";
	var $select_column = array("pendaftar.nim", "identitas_mhs.namaLengkap", "jurusan.namaJur", "fakultas.namaFk", "bea.namaBeasiswa", "pendaftar.waktuDiubah");
	var $order_column = array("pendaftar.nim", "identitas_mhs.namaLengkap", "jurusan.namaJur", "fakultas.namaFk", "bea.namaBeasiswa", null);
	var $column_search = array("pendaftar.nim", "identitas_mhs.namaLengkap", "jurusan.namaJur", "fakultas.namaFk", "bea.namaBeasiswa", "pendaftar.waktuDiubah");


	function make_query($tahun, $fakultas, $jurusan, $bea)
	{	
		$this->db->select($this->select_column);
		$this->db->from($this->table);
		$this->db->join('identitas_mhs', 'identitas_mhs.nimMhs = pendaftar.nim', 'left');
		$this->db->join('jurusan', 'identitas_mhs.idJrs = jurusan.id', 'left');
		$this->db->join('bea', 'bea.id = pendaftar.idBea', 'left');
		$this->db->join('fakultas', 'fakultas.id = jurusan.idFk', 'left');
		$this->db->where("pendaftar.status=1");		

		if ($tahun!=0 && $fakultas==0 && $jurusan==0 && $bea==0) {
			$this->db->where("identitas_mhs.angkatan",$tahun);	
		}
		elseif ($tahun == 0 && $fakultas != 0 && $jurusan == 0 && $bea == 0) {
			$this->db->where("fakultas.id",$fakultas);	
		}elseif ($tahun == 0 && $fakultas == 0 && $jurusan != 0 && $bea == 0) {
			$this->db->where("jurusan.id",$jurusan);
		}elseif ($tahun == 0 && $fakultas == 0 && $jurusan == 0 && $bea != 0) {
			$this->db->where("bea.id",$bea);
		}elseif ($tahun != 0 && $fakultas != 0 && $jurusan == 0 && $bea == 0) {
			$this->db->where("identitas_mhs.angkatan",$tahun);
			$this->db->where("fakultas.id",$fakultas);		
		}elseif ($tahun != 0 && $fakultas == 0 && $jurusan != 0 && $bea == 0) {
			$this->db->where("identitas_mhs.angkatan",$tahun);
			$this->db->where("jurusan.id",$jurusan);
		}elseif ($tahun != 0 && $fakultas == 0 && $jurusan == 0 && $bea != 0) {
			$this->db->where("identitas_mhs.angkatan",$tahun);
			$this->db->where("bea.id",$bea);		
		}elseif ($tahun == 0 && $fakultas != 0 && $jurusan != 0 && $bea == 0) {
			$this->db->where("jurusan.id",$jurusan);
			$this->db->where("fakultas.id",$fakultas);		
		}elseif ($tahun == 0 && $fakultas != 0 && $jurusan == 0 && $bea != 0) {
			$this->db->where("fakultas.id",$fakultas);
			$this->db->where("bea.id",$bea);
		}elseif ($tahun == 0 && $fakultas == 0 && $jurusan != 0 && $bea != 0) {
			$this->db->where("jurusan.id",$jurusan);
			$this->db->where("bea.id",$bea);
		}elseif ($tahun != 0 && $fakultas != 0 && $jurusan != 0 && $bea == 0) {
			$this->db->where("identitas_mhs.angkatan",$tahun);
			$this->db->where("fakultas.id",$fakultas);	
			$this->db->where("jurusan.id",$jurusan);
		}elseif ($tahun != 0 && $fakultas != 0 && $jurusan == 0 && $bea != 0) {
			$this->db->where("identitas_mhs.angkatan",$tahun);
			$this->db->where("bea.id",$bea);
			$this->db->where("jurusan.id",$jurusan);
		}elseif ($tahun != 0 && $fakultas == 0 && $jurusan != 0 && $bea != 0) {
			$this->db->where("fakultas.id",$fakultas);	
			$this->db->where("bea.id",$bea);
			$this->db->where("identitas_mhs.angkatan",$tahun);
		}elseif ($tahun == 0 && $fakultas != 0 && $jurusan != 0 && $bea != 0) {
			$this->db->where("fakultas.id",$fakultas);	
			$this->db->where("bea.id",$bea);
			$this->db->where("jurusan.id",$jurusan);
		}elseif ($tahun != 0 && $fakultas != 0 && $jurusan != 0 && $bea != 0) {
			$this->db->where("identitas_mhs.angkatan",$tahun);
			$this->db->where("fakultas.id",$fakultas);	
			$this->db->where("bea.id",$bea);
			$this->db->where("jurusan.id",$jurusan);
		}

		$i = 0;
	    foreach ($this->column_search as $item) // loop column
	    {
	      if($_POST['search']['value']) // if datatable send POST for search
	      {

	        if($i===0) // first loop
	        {
	          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
	          $this->db->like($item, $_POST['search']['value']);
	      }
	      else
	      {
	      	$this->db->or_like($item, $_POST['search']['value']);
	      }

	        if(count($this->column_search) - 1 == $i) //last loop
	        $this->db->group_end(); //close bracket
	    }
	    $i++;
	}

	if(isset($_POST["order"]))
	{
		$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	}
	else
	{
		$this->db->order_by('pendaftar.nim', 'DESC');
	}
}

function make_datatables($tahun, $fakultas, $jurusan, $bea){
	$this->make_query($tahun, $fakultas, $jurusan, $bea);
	if($_POST["length"] != -1)
	{
		$this->db->limit($_POST['length'], $_POST['start']);
	}
	$query = $this->db->get();
	return $query->result();
}

function get_filtered_data($tahun, $fakultas, $jurusan, $bea){
	$this->make_query($tahun, $fakultas, $jurusan, $bea);
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