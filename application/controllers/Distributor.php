<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/autoload.php';

use Dompdf\Dompdf;

class Distributor extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['distributor'] = $this->model_distributor->tampil_data()->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('data_distributor/distributor', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $nama_distributor = $this->input->post('nama_distributor');
    $alamat = $this->input->post('alamat');
    $telepon = $this->input->post('telepon');

    $data = array(
      'nama_distributor' => $nama_distributor,
      'alamat' => $alamat,
      'telepon' => $telepon
    );
    $this->model_distributor->tambah_produk($data, 'distributor');
    redirect('distributor/index');
  }

  public function edit($id)
  {
    $where = array('id_distributor' => $id);
    $data['distributor'] = $this->model_distributor->edit_data($where, 'distributor')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('data_distributor/edit_distributor', $data);
    $this->load->view('templates/footer');
  }

  public function update()
  {
    $id                 = $this->input->post('id_distributor');
    $nama_distributor   = $this->input->post('nama_distributor');
    $alamat             = $this->input->post('alamat');
    $telepon            = $this->input->post('telepon');

    $data = array(
      'nama_distributor' => $nama_distributor,
      'alamat' => $alamat,
      'telepon' => $telepon
    );

    $where = array(
      'id_distributor' => $id
    );
    $this->model_distributor->update_data($where, $data, 'distributor');
    redirect('distributor/index');
  }

  public function hapus($id)
  {
    $where = array('id_distributor' => $id);
    $this->model_distributor->hapus_data($where, 'distributor');
    redirect('distributor/index');
  }

  public function pdf()
  {

    $data['distributor'] = $this->model_distributor->tampil_data('distributor')->result();
    $this->load->view('data_distributor/pdf_distributor', $data);

    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();

    $pdf = new Dompdf();

    $pdf->setPaper($paper_size, $orientation);
    $pdf->loadHtml($html);
    $pdf->render();
    $pdf->stream("laporan_distributor.pdf", [
      'Attachment' => 0
    ]);
  }
}
