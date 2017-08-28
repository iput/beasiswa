<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model
{	function __construct()



{	parent::__construct();
}



    function daftar_bea()
    {	$query = $this->db->query("SELECT namaBeasiswa,penyelenggaraBea,beasiswadibuka,beasiswatutup,statusbeasiswa,kuota FROM bea LIMIT 4");

        // mengembalikan hasil query
        return $query->result();

        // menghapus query dari memory
        $query = null;
    }
    function daftar_berita()
    {	$query = $this->db->query("SELECT idBerita, judulBerita,topikBerita,penulisBerita,kontenBerita,tglInBerita FROM berita");

        // mengembalikan hasil query
        return $query->result();

        // menghapus query dari memory
        $query = null;
    }

    public function detailBerita($id) {
        $data = $this->db->query("select * from berita where idBerita=?", array($id));
        if ($data) {
            return $data;
        } else {
            return false;
        }
        unset($data);
    }




}
// End of file M_aplikasi.php
// Location: ./application/models/M_aplikasi.php
