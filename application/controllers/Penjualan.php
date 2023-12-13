<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/autoload.php';

use Dompdf\Dompdf;

class Penjualan extends CI_Controller
{
  public  function __construct()
  {
    parent::__construct();
    $this->load->model(array('model_penjualan'));
  }

  public function index()
  {
    $data['kasir'] = $this->db->get('kasir')->result();
    $data['penjualan'] = $this->model_penjualan->tampil_data();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('data_penjualan/penjualan', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $kasir = $this->input->post('nama');
    $total = $this->input->post('total');
    $tanggal = $this->input->post('tanggal');

    $data = array(
      'id_kasir' => $kasir,
      'total'    => $total,
      'tanggal'  => $tanggal
    );

    $this->model_penjualan->tambah_penjualan($data, 'penjualan');
    redirect('penjualan/index');
  }

  public function edit($id)
  {
    $data['kasir'] = $this->db->get('kasir')->result();
    $where = array('id_penjualan' => $id);
    $data['penjualan'] = $this->model_penjualan->edit_data($where, 'penjualan')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('data_penjualan/edit_penjualan', $data);
    $this->load->view('templates/footer');
  }

  public function update()
  {
    $id                 = $this->input->post('id_penjualan');
    $nama              = $this->input->post('nama');
    $total              = $this->input->post('total');
    $tanggal            = $this->input->post('tanggal');

    $data = array(
      'id_kasir' => $nama,
      'total'    => $total,
      'tanggal'  => $tanggal
    );

    $where = array(
      'id_penjualan' => $id
    );

    $this->model_penjualan->update_data($where, $data, 'penjualan');
    redirect('penjualan/index');
  }

  public function hapus($id)
  {
    $where = array('id_penjualan' => $id);
    $this->model_penjualan->hapus_data($where, 'penjualan');
    redirect('penjualan/index');
  }

  public function pdf()
  {
    $data['kasir'] = $this->model_admin->tampil_data('kasir');
    $data['penjualan'] = $this->model_penjualan->tampil_data('penjualan');
    $this->load->view('data_penjualan/pdf_penjualan', $data);

    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();

    $pdf = new Dompdf();

    $pdf->setPaper($paper_size, $orientation);
    $pdf->loadHtml($html);
    $pdf->render();
    $pdf->stream("laporan_Penjualan.pdf", [
      'Attachment' => 0
    ]);
  }
}
