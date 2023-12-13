<?php

class Auth extends CI_Controller
{

  public function login()
  {
    $this->form_validation->set_rules('username', 'Username', 'required', [
      'required' => 'Username Wajib Diisi!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required', [
      'required' => 'Password Wajib Diisi!'
    ]);
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header');
      $this->load->view('login');
      $this->load->view('templates/footer');
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $auth = $this->model_auth->cek_login($username, $password);
      if ($auth == FALSE) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Username Atau Password Anda Salah!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('auth/login');
      } else {
        $level = $auth->level;
        if ($level == 'admin') {
          $this->session->set_userdata('username', $username);
          $this->session->set_userdata('level', $level);
          redirect('dashboard');
        } elseif ($level == 'pemilik') {
          $this->session->set_userdata('username', $username);
          $this->session->set_userdata('level', $level);
          redirect('admin/dashboard_admin');
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Username Atau Password Anda Salah!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
          redirect('auth/login');
        }
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth/login');
  }
}
