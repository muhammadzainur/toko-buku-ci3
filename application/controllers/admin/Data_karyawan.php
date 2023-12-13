<?php

class Data_karyawan extends CI_Controller
{
  public  function __construct()
  {
    parent::__construct();
    $this->load->model(array('model_karyawan'));
  }
  public function index()
  {
    $data['karyawan'] = $this->model_karyawan->tampil_data();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_karyawan', $data);
    $this->load->view('templates_admin/footer');
  }
}
