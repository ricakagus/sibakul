<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  public function getQtyMahasiswa()
  {
    $qtyquery = "SELECT COUNT('nim') as 'banyak' FROM tb_user WHERE role_id='2'";
    return $this->db->query($qtyquery)->row_array();
  }

  public function getSumTagihan()
  {
    $sumquery = "SELECT SUM(jumlah) as jumlah FROM tb_tagihan WHERE status='0'";
    return $this->db->query($sumquery)->row_array();
  }

  public function getQtyPembayaran()
  {
    $bayarquery = "SELECT COUNT('id_tagihan') as 'bayar' FROM tb_pembayaran WHERE status='0'";
    return $this->db->query($bayarquery)->row_array();
  }

  public function getQtyRequestTagihan()
  {
    $this->db->where('status', 0);

    return $this->db->get('tb_req_tagihan')->num_rows();
  }

  public function getDataPageMahasiswa($limit, $start, $keyword = null)
  {
    $this->db->like('role_id', 2);
    if ($keyword) {
      $this->db->like('nama', $keyword);
      $this->db->or_like('prodi', $keyword);
      $this->db->or_like('nim', $keyword);
      $this->db->or_like('nohp', $keyword);
    }

    return $this->db->get('tb_user', $limit, $start)->result_array();
  }

  public function getDataPageTagihan($limit, $start, $keyword = null)
  {
    if ($keyword) {
      $this->db->like('id_tagihan', $keyword);
      $this->db->or_like('nim', $keyword);
      $this->db->or_like('nama', $keyword);
      $this->db->or_like('status', $keyword);
    }
    return $this->db->get('tb_tagihan', $limit, $start)->result_array();
  }

  public function getTotalTagihanByNIM($nim)
  {
    $this->db->select_sum('jumlah');
    $this->db->where('nim', $nim);
    return $this->db->get('tb_tagihan')->row_array();
  }
}
