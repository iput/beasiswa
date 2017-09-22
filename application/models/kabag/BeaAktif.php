<?php defined('BASEPATH')OR exit('no direct script access allowed');

 class BeaAktif extends CI_Model
 {

   function get_all_data()
   {
     $this->db->select("*");
     $this->db->from($this->table);
     return $this->db->count_all_results();
   }

 }
 ?>
