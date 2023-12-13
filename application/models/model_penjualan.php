<?php

class Model_penjualan extends CI_Model
{

  public function tampil_data()
  {
    $this->db->select('penjualan.*, kasir.nama AS nama');
    $this->db->from('penjualan');
    $this->db->join('kasir', 'penjualan.id_kasir = kasir.id_kasir');
    $query = $this->db->get();
    return $query->result();
  }

  public function tambah_penjualan($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function edit_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  public function hapus_data($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }
}
