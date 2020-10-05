<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notfound extends CI_Controller
{

  public function index()
  {
    $data['judul'] = 'Page Not Found';
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/404');
    $this->load->view('templates/auth_footer');
  }
}
