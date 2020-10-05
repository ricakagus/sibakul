<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
  public function getAllPembayaran()
  {
    return $this->db->get('tb_pembayaran')->result_array();
  }

  public function cariDataPembayaran()
  {
    $keyword = $this->input->post('keyword', true);
    $this->db->or_like('nim', $keyword);
    $this->db->or_like('jumlah', $keyword);
    $this->db->or_like('status', $keyword);
    return $this->db->get('tb_tagihan')->result_array();
  }
}
