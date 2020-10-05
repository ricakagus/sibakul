<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function index()
  {


    if ($this->session->userdata('nim')) {
      redirect('user');
    }
    $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $data['judul'] = 'Sign in';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/index', $data);
      $this->load->view('templates/auth_footer');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $nim = $this->input->post('nim');
    $password = $this->input->post('password');

    $user = $this->db->get_where('tb_user', ['nim' => $nim])->row_array();

    if ($user) {
      if ($user['actived'] == 1) {
        if (password_verify($password, $user['password'])) {
          // if ($password == $user['password']) {
          $data = [
            'nim' => $user['nim'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) :
            redirect('admin');
          else :
            redirect('mahasiswa');
          endif;
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah </div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">NIM ini tidak aktif</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">NIM ini tidak terdaftar</div>');
      redirect('auth');
    }
  }


  public function lupaPassword()
  {
    $this->form_validation->set_rules('nim', 'NIM', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $data['judul'] = 'Lupa Password';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/lupaPassword', $data);
      $this->load->view('templates/auth_footer');
    } else {
      $nim = $this->input->post('nim');
      $this->db->where('nim', $nim);
      $this->db->update('tb_user', ['actived' => 2]);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">request reset password berhasil</div>');
      redirect('auth');
    }
  }


  public function signout()
  {
    $this->session->unset_userdata('nim');
    $this->session->unset_userdata('role_id');
    $this->session->unset_userdata('keyword');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil sign out</div>');
    redirect('auth');
  }

  public function blocked()
  {
    $data['judul'] = 'Access Blocked';
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/403');
    $this->load->view('templates/auth_footer');
  }
}
