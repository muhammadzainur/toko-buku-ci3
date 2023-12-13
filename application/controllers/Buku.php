<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/autoload.php';

use Dompdf\Dompdf;

class Buku extends CI_Controller
{

  public function index()
  {
    $data['buku'] = $this->model_buku->tampil_data()->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('data_buku/buku', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $judul        = $this->input->post('judul');
    $noisbn       = $this->input->post('noisbn');
    $penulis      = $this->input->post('penulis');
    $penerbit     = $this->input->post('penerbit');
    $tahun        = $this->input->post('tahun');
    $stok         = $this->input->post('stok');
    $harga_pokok  = $this->input->post('harga_pokok');
    $harga_jual   = $this->input->post('harga_jual');
    $gambar       = $_FILES['gambar']['name'];
    if ($gambar = '') {
    } else {
      $config['upload_path'] = './uploads';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('gambar')) {
        echo "Gambar Gagal diUpload!";
      } else {
        $gambar = $this->upload->data('file_name');
      }
    }
    $data = array(
      'judul'        => $judul,
      'noisbn'       => $noisbn,
      'penulis'      => $penulis,
      'penerbit'     => $penerbit,
      'tahun'        => $tahun,
      'stok'         => $stok,
      'harga_pokok'  => $harga_pokok,
      'harga_jual'   => $harga_jual,
      'gambar'       => $gambar
    );

    $this->model_buku->tambah_buku($data, "buku");
    redirect('buku/index');
  }

  public function edit($id)
  {
    $where = array('id_buku' => $id);
    $data['buku'] = $this->model_buku->edit_buku($where, 'buku')->result();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('data_buku/edit_buku', $data);
    $this->load->view('templates/footer');
  }

  public function update()
  {
    $id           = $this->input->post('id_buku');
    $judul        = $this->input->post('judul');
    $noisbn       = $this->input->post('noisbn');
    $penulis      = $this->input->post('penulis');
    $penerbit     = $this->input->post('penerbit');
    $tahun        = $this->input->post('tahun');
    $stok         = $this->input->post('stok');
    $harga_pokok  = $this->input->post('harga_pokok');
    $harga_jual   = $this->input->post('harga_jual');
    $gambar       = $this->input->post('gambar');

    $data = array(

      'judul'        => $judul,
      'noisbn'       => $noisbn,
      'penulis'      => $penulis,
      'penerbit'     => $penerbit,
      'tahun'        => $tahun,
      'stok'         => $stok,
      'harga_pokok'  => $harga_pokok,
      'harga_jual'   => $harga_jual,
      'gambar'       => $gambar
    );

    $where = array(
      'id_buku' => $id
    );

    $this->model_buku->update_data($where, $data, 'buku');
    redirect('buku/index');
  }

  public function hapus($id)
  {
    $where = array('id_buku' => $id);
    $this->model_buku->hapus_data($where, 'buku');
    redirect('buku/index');
  }

  public function pdf()
  {
    $data['buku'] = $this->model_buku->tampil_data('buku')->result();
    $this->load->view('data_buku/pdf_buku', $data);

    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();

    $pdf = new Dompdf();

    $pdf->setPaper($paper_size, $orientation);
    $pdf->loadHtml($html);
    $pdf->render();
    $pdf->stream("laporan_buku.pdf", [
      'Attachment' => 0
    ]);
  }
}
