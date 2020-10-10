<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
  public function getAllMahasiswa()
  {
    $qMhs = "SELECT * FROM `tb_user` WHERE `role_id`=2 ORDER BY `nim`";
    return $this->db->query($qMhs)->result_array();
  }

  public function tambahDataMahasiswa()
  {
    $data = [
      'nim' => $this->input->post('nim', true),
      'nama' => $this->input->post('nama', true),
      'image' => 'default.jpg',
      'password' => password_hash($this->input->post('nim'), PASSWORD_DEFAULT),
      'prodi' => $this->input->post('prodi', true),
      'nohp' => $this->input->post('nohp', true),
      'role_id' => 2,
      'actived' => 1
    ];
    $this->db->insert('tb_user', $data);
  }

  public function cariDataMahasiswa()
  {
    $keyword = $this->input->post('keyword', true);
    $this->db->like('nama', $keyword);
    $this->db->or_like('prodi', $keyword);
    $this->db->or_like('nim', $keyword);
    $this->db->or_like('nohp', $keyword);
    return $this->db->get('tb_user')->result_array();
  }

  public function getMahasiswaByNIM($nim)
  {
    return $this->db->get_where('tb_user', ['nim' => $nim])->row_array();
  }

  public function hapusDataMahasiswa($nim)
  {
    $this->db->where('nim', $nim);
    $this->db->delete('tb_user');
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
    if ($this->upload->do_upload('datamhs')) {
      // jika berhasil
      $return = array('result' => 'success', 'datamhs' => $this->upload->data(), 'error' => '');
      return $return;
    } else {
      $return = array('result' => 'failed', 'datamhs' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }

  public function insert_multiple($data)
  {
    $this->db->insert_batch('tb_user', $data);
  }

  public function getDataPageTagihan($limit, $start, $nim)
  {
    $this->db->where('nim', $nim);
    return $this->db->get('tb_tagihan', $limit, $start, $nim)->result_array();
  }

  public function getTotalTagihan($nim)
  {
    $this->db->select_sum('jumlah');
    $this->db->where('nim', $nim);
    return $this->db->get('tb_tagihan')->row_array();
  }
}
