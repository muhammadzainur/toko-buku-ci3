<?php

class Registrasi extends CI_Controller
{
  public function index()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required', [
      'required'  => 'Nama wajib diisi!'
    ]);
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
      'required'  => 'Alamat wajib diisi!'
    ]);
    $this->form_validation->set_rules('telepon', 'No. Telepon', 'required', [
      'required'  => 'No. Telepon wajib diisi!'
    ]);
    $this->form_validation->set_rules('username', 'Username', 'required', [
      'required'  => 'Username wajib diisi'
    ]);
    $this->form_validation->set_rules('password_1', 'password', 'required|matches[password_2]', [
      'required'  => 'Password Wajib diisi!',
      'matches'   => 'Password Tidak cocok'
    ]);
    $this->form_validation->set_rules('password_2', 'password', 'required|matches[password_1]');
    $password = $this->input->post('password_1');
    $md5 = md5($password);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header');
      $this->load->view('registrasi');
      $this->load->view('templates/footer');
    } else {
      $data = array(
        'id_kasir'        => '',
        'nama'      => $this->input->post('nama'),
        'alamat'    => $this->input->post('alamat'),
        'telepon'   => $this->input->post('telepon'),
        'status'    => '1',
        'username'  => $this->input->post('username'),
        'password'  => $md5,
        'level'     => 'admin',
      );
      $this->db->insert('kasir', $data);
      redirect('auth/login');
    }
  }
}
