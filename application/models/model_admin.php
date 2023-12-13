<?php

class Model_admin extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  public function tampil_data()
  {
    $this->db->select('penjualan.*, kasir.nama AS id_kasir, kasir.nama');
    $this->db->join('kasir', 'penjualan.id_kasir = kasir.id_kasir');
    $this->db->from('penjualan');
    $query = $this->db->get();
    return $query->result();
  }

  public function index()
  {
    date_default_timezone_set('Asia/Jakarta');
    $total = $this->input->post('total');
    $username = $this->session->userdata('username');

    // Ambil data nama kasir dari tabel kasir berdasarkan id_kasir
    $query = $this->db->query("SELECT id_kasir FROM kasir WHERE username = '$username'");
    if ($username) {
      $row = $query->row();
      $kasir = $row->id_kasir;
    } else {
      $kasir = 'Gagal mengambil data kasir';
    }

    $data = array(
      'total' => $total,
      'tanggal' => date('Y-m-d H:i:s'),
      'id_kasir' => $kasir,
    );

    $this->db->insert('penjualan', $data);
    $id_penjualan = $this->db->insert_id();

    foreach ($this->cart->contents() as $item) {
      $data = array(
        'id_penjualan' => $id_penjualan,
        'id_buku' => $item['id'],
        'jumlah' => $item['qty'],
        'harga' => $item['price'],
        'total' => $item['price'] * $item['qty'],
      );
      $this->db->insert('detail_penjualan', $data);
    }
    return TRUE;
  }

  public function ambil_data_penjualan($id_penjualan)
  {
    $result = $this->db->where('id_penjualan', $id_penjualan)->limit(1)->get('penjualan');
    if ($result->num_rows() > 0) {
      return $result->row();
    } else {
      return false;
    }
  }

  public function ambil_data_detail($id_penjualan)
  {
    $result = $this->db->where('id_penjualan', $id_penjualan)->get('detail_penjualan');
    if ($result->num_rows() > 0) {
      return $result->result();
    } else {
      return false;
    }
  }
}
