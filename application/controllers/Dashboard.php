<?php

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('level') != 'admin') {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Anda Belom Login!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>');
      redirect('auth/login');
    }
  }

  public function index()
  {
    $data['buku'] = $this->model_buku->tampil_data()->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('dashboard', $data);
    $this->load->view('templates/footer');
  }

  public function keranjang($id)
  {
    $buku = $this->model_buku->ambil_data($id);

    $data = array(
      'id'      => $id,
      'qty'     => 1,
      'price'   => $buku->harga_jual,
      'name'    => $buku->judul,
    );

    $this->cart->insert($data);
    redirect('dashboard');
  }

  public function detail_keranjang()
  {
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('keranjang');
    $this->load->view('templates/footer');
  }

  public function hapus_keranjang()
  {
    $this->cart->destroy();
    redirect('dashboard/index');
  }

  public function pembayaran()
  {
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('pembayaran');
    $this->load->view('templates/footer');
  }

  public function proses_pesanan()
  {
    $is_processed = $this->model_admin->index();
    if ($is_processed) {
      $this->cart->destroy();
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('proses_pesanan');
      $this->load->view('templates/footer');
    } else {
      echo "Maaf, Pesanan Anda Gagal di Proses";
    }
  }

  public function detail($id_buku)
  {
    $data['buku'] = $this->model_buku->detail_buku($id_buku);
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('detail_buku', $data);
    $this->load->view('templates/footer');
  }
}
