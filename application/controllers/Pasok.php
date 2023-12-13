<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/autoload.php';

use Dompdf\Dompdf;

class Pasok extends CI_Controller
{
  public  function __construct()
  {
    parent::__construct();
    $this->load->model(array('model_pasok'));
  }

  public function index()
  {
    $data['buku'] = $this->db->get('buku')->result();
    $data['distributor'] = $this->db->get('distributor')->result();
    $data['pasok'] = $this->model_pasok->tampil_data();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('data_pasok/pasok', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $distributor = $this->input->post('distributor');
    $buku = $this->input->post('buku');
    $jumlah = $this->input->post('jumlah');
    $tanggal = $this->input->post('tanggal');

    $data = array(
      'id_distributor' => $distributor,
      'id_buku'        => $buku,
      'jumlah'         => $jumlah,
      'tanggal'        => $tanggal
    );

    $this->model_pasok->tambah_pasok($data, 'pasok');
    redirect('pasok/index');
  }

  public function edit($id)
  {
    $data['buku'] = $this->db->get('buku')->result();
    $data['distributor'] = $this->db->get('distributor')->result();
    $where = array('id_pasok' => $id);
    $data['pasok'] = $this->model_pasok->edit_data($where, 'pasok')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('data_pasok/edit_pasok', $data);
    $this->load->view('templates/footer');
  }

  public function update()
  {
    $id                 = $this->input->post('id_pasok');
    $distributor        = $this->input->post('distributor');
    $buku               = $this->input->post('buku');
    $jumlah             = $this->input->post('jumlah');
    $tanggal            = $this->input->post('tanggal');

    $data = array(
      'id_distributor' => $distributor,
      'id_buku'        => $buku,
      'jumlah'         => $jumlah,
      'tanggal'        => $tanggal
    );

    $where = array(
      'id_pasok' => $id
    );
    $this->model_pasok->update_data($where, $data, 'pasok');
    redirect('pasok/index');
  }

  public function hapus($id)
  {
    $where = array('id_pasok' => $id);
    $this->model_pasok->hapus_data($where, 'pasok');
    redirect('pasok/index');
  }

  public function pdf()
  {
    $data['pasok'] = $this->model_pasok->tampil_data('pasok');
    $data['buku'] = $this->model_buku->tampil_data('pasok');
    $data['distributor'] = $this->model_distributor->tampil_data('pasok')->result();
    $this->load->view('data_pasok/pdf_pasok', $data);

    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();

    $pdf = new Dompdf();

    $pdf->setPaper($paper_size, $orientation);
    $pdf->loadHtml($html);
    $pdf->render();
    $pdf->stream("laporan_Pasok.pdf", [
      'Attachment' => 0
    ]);
  }
}
