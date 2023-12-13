<?php
class Model_pasok extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function tampil_data()
  {
    $this->db->select('pasok.*, distributor.nama_distributor AS nama_distributor, buku.judul AS judul');
    $this->db->from('pasok');
    $this->db->join('distributor', 'pasok.id_distributor = distributor.id_distributor');
    $this->db->join('buku', 'pasok.id_buku = buku.id_buku');
    $query = $this->db->get();
    return $query->result();
  }

  public function tambah_pasok($data, $table)
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
