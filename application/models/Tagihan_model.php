<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan_model extends CI_Model
{
  public function getAllTagihan()
  {
    return $this->db->get('tb_tagihan')->result_array();
  }

  public function cariDataTagihan()
  {
    $keyword = $this->input->post('keyword', true);
    $this->db->like('nama', $keyword);
    $this->db->or_like('nim', $keyword);
    $this->db->or_like('bulan', $keyword);
    $this->db->or_like('tahun', $keyword);
    $this->db->or_like('jumlah', $keyword);
    $this->db->or_like('status', $keyword);
    return $this->db->get('tb_tagihan')->result_array();
  }

  public function upload_file($filename)
  {
    $this->load->library('upload');

    $config['upload_path'] = './excel/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size'] = '2048';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;

    $this->upload->initialize($config);
    if ($this->upload->do_upload('datatagihan')) {
      // jika berhasil
      $return = array('result' => 'success', 'datatagihan' => $this->upload->data(), 'error' => '');
      return $return;
    } else {
      $return = array('result' => 'failed', 'datatagihan' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }

  public function insert_multiple($data)
  {
    $this->db->insert_batch('tb_tagihan', $data);
  }
}
