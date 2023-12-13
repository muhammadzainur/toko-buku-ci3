<?php

class model_karyawan extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function tampil_data()
  {
    $this->db->select('*');
    $this->db->from('kasir');
    $this->db->where('level', 'admin');
    $query = $this->db->get();
    return $query->result();
  }
}
