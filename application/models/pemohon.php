<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
class pemohon extends CI_Model  
{
  function get_data_pemohon(){
  	$this->db->select('*');
    $this->db->from('ptsl_database');
    $this->db->where($data);
    return $this->db->get()->result();
  }

  function tampil_data(){
		return $this->db->get('nama');
	}
}