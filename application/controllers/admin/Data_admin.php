<?php

class Data_admin extends CI_Controller
{
  public  function __construct()
  {
    parent::__construct();
    $this->load->model(array('model_admin'));
  }

  public function index()
  {
    $data['admin'] = $this->model_admin->tampil_data();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_admin', $data);
    $this->load->view('templates_admin/footer');
  }

  public function detail($id_penjualan)
  {
    $data['penjualan'] = $this->model_admin->ambil_data_penjualan($id_penjualan);
    $data['detail'] = $this->model_admin->ambil_data_detail($id_penjualan);
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/detail_transaksi', $data);
    $this->load->view('templates_admin/footer');
  }
}
