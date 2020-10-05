<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    login_role();
  }
  public function index()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();

    $data['judul'] = 'Profil Saya';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');
  }

  public function edit()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();

    $data['judul'] = 'Profil Saya';

    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('nohp', 'No HP', 'rquired|trim|numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('user/edit', $data);
      $this->load->view('templates/footer');
    } else {
      $nim = $this->input->post('nim');
      $nama = $this->input->post('nama');
      $nohp = $this->input->post('nohape');
 
      $upload_foto = $_FILES['foto']['name'];

      if ($upload_foto) {
        $config['allowed_types'] = 'jpg|JPG|JPEG';
        $config['max_size'] = '1024';
        $config['file_name'] = $nim;
        $config['overwrite'] = true;
        $config['upload_path'] = './assets/img/profil/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
          // $old_image = $data['user']['image'];
          // if ($old_image != 'default.jpg') {
          //   unlink(FCPATH . 'assets/img/profil/' . $old_image);
          // }
          $new_image = $this->upload->data('file_name');

          $this->db->set('image', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('nama', $nama);
      $this->db->set('noHp', $nohp);
      $this->db->where('nim', $nim);
      $this->db->update('tb_user');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated! </div>');
      redirect('user');
    }
  } // end controller edit profil


  public function gantipassword()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();

    $data['judul'] = 'Ganti Password';

    $this->form_validation->set_rules('password_sekarang', 'Password Sekarang', 'required|trim');
    $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[5]|matches[password_baru2]');
    $this->form_validation->set_rules('password_baru2', 'Ulangi Password Baru ', 'required|trim|min_length[5]|matches[password_baru1]');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('user/gantipassword', $data);
      $this->load->view('templates/footer');
    } else {
      $password_sekarang = $this->input->post('password_sekarang');
      $password_baru = $this->input->post('password_baru1');
      if (!password_verify($password_sekarang, $data['user']['password'])) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Sekarang Salah! </div>');
        redirect('user/gantipassword');
      } else {
        if ($password_sekarang == $password_baru) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru tidak boleh sama dengan Password Sekarang! </div>');
          redirect('user/gantipassword');
        } else {
          $passwrod_hash = password_hash($password_baru, PASSWORD_DEFAULT);

          $this->db->set('password', $passwrod_hash);
          $this->db->where('nim', $this->session->userdata('nim'));
          $this->db->update('tb_user');

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil dirubah! </div>');
          redirect('user/gantipassword');
        }
      }
    }
  }
}
