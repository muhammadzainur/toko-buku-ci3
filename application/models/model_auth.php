<?php

class Model_auth extends CI_Model
{

  public function cek_login($username, $password)
  {
    $this->db->where('username', $username);
    $this->db->where('password', md5($password));
    $query = $this->db->get('kasir');
    if ($query->num_rows() == 1) {
      return $query->row();
    } else {
      return false;
    }
  }
}
