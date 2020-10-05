<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    login_role();
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $nim = $this->session->userdata('nim');
    $data['judul'] = 'Dashboard';

    $data['mahasiswa'] = $this->db->get_where('tb_user', ['nim' => $nim])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('mahasiswa/dashboardmhs', $data);
    $this->load->view('templates/footer');
  }

  public function Tagihan()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $nim = $this->session->userdata('nim');
    $data['judul'] = 'Tagihan';
    $data['bulan'] = $this->db->get('tb_bulan')->result_array();

    $data['mahasiswa'] = $this->db->get_where('tb_tagihan', ['nim' => $nim])->row_array();
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $nim])->row_array();

    $data['reqTagihan'] = $this->db->get_where('tb_req_tagihan', ['id_tagihan' => $data['mahasiswa']['id_tagihan']])->row_array();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('mahasiswa/detailtagihan', $data);
    $this->load->view('templates/footer');
  } // end function detailTagihan

  public function cetak_tagihan($nim)
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Cetak Tagihan-' . $nim;
    $data['bulan'] = $this->db->get('tb_bulan')->result_array();

    $data['mahasiswa'] = $this->db->get_where('tb_tagihan', ['nim' => $nim])->row_array();
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $nim])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('mahasiswa/cetak_tagihan', $data);
  } // end function cetak taguhan


  public function bayarkuliah()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Bayar Kuliah';

    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|numeric');

    $data['tagihan'] = $this->db->get_where('tb_tagihan', ['nim' => $this->session->userdata('nim')])->row_array();
    if ($this->form_validation->run() == FALSE) {
      $idtagihan = $data['tagihan']['id_tagihan'];
      $data['pembayaran'] = $this->db->get_where('tb_pembayaran', ['id_tagihan' => $idtagihan])->row_array();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('mahasiswa/bayar_kuliah', $data);
      $this->load->view('templates/footer');
    } else {
      // ambil data idtagihan
      $idtagihan = $data['tagihan']['id_tagihan'];
      // ambil data foto bukti bayar
      $upload_bukti = $_FILES['bukti']['name'];
      // periksa foto bukti bayar
      // 1. jika foto butki tidak ada
      if (!$upload_bukti) {
        // 1.a. tampilan pesan foto bukti masih kosong
        // 1.a. redirect ke 'mahasiswa/bayarkuliah'
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Bukti bayar belum ada! </div>');
        redirect('mahasiswa/bayarkuliah');
      } else { // 2. jika foto bukti ada
        // 2.a. periksa apakah ada pembayaran di tabel pembayaran dari idtagihan

        $pembayaran = $this->db->get_where('tb_pembayaran', ['id_tagihan' => $idtagihan])->row_array();

        $config['allowed_types'] = 'jpg|JPG';
        $config['max_size'] = '1024';
        $config['file_name'] = $idtagihan;
        $config['upload_path'] = './assets/img/buktibayar/';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('bukti')) {
          $old_image = $pembayaran['bukti'];
          if ($old_image != 'buktikosong.jpg') {
            unlink(FCPATH . 'assets/img/buktibayar/' . $old_image);
          }
          $bukti_image = $this->upload->data('file_name');
          $this->db->set('bukti', $bukti_image);

          // 2.a.*. jika TIDAK ADA data pembayaran di tabel pembayaran maka, SIMPAN Bukti Bayar
          if (!$pembayaran) {
            $this->db->set('id_tagihan', $idtagihan);
            $this->db->set('nim', $this->session->userdata['nim']);
            $this->db->set('jumlah', $this->input->post('jumlah'));
            $this->db->set('tgl_bayar', time());
            $this->db->set('status', '0');
            $this->db->insert('tb_pembayaran');
          } else {
            // 2.a.#. jika ADA data pembayaran di tabel pembayaran maka, UPDATE Bukti Bayar
            $this->db->set('tgl_bayar', time());
            $this->db->set('status', '0');
            $this->db->where('id_tagihan', $idtagihan);
            $this->db->update('tb_pembayaran');
          }

          $this->db->set('status', '1');
          $this->db->where('id_tagihan', $idtagihan);
          $this->db->update('tb_tagihan');

          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Bukti bayar <b>TERSIMPAN</b>! Menunggu konfirmasi dari admin. </div>');
          redirect('mahasiswa/bayarkuliah');
        } else {
          // or =  $this->upload->display_errors();
          $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>'
          );
          redirect('mahasiswa/bayarkuliah');
        }
      }
    }
  } // end function bayar kuliah

  public function inputReqTagihan()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Pengajuan Tagihan';

    $this->form_validation->set_rules('pesan_req', 'Pesan', 'required');

    if ($this->form_validation->run() == FALSE) {
      $data['tagihan'] = $this->db->get_where('tb_tagihan', ['nim' => $this->session->userdata('nim')])->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('mahasiswa/inputreq_tagihan', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'date_req' => time(),
        'id_tagihan' => $this->input->post('idtagihan'),
        'nim' => $this->input->post('nim'),
        'nama' => $this->input->post('nama'),
        'pesan_req' => $this->input->post('pesan_req'),
        'status' => 0,
        'date_resp' => 0
      ];
      $this->db->insert('tb_req_tagihan', $data);
      redirect('mahasiswa/tagihan');
    }
  }

  public function editReqTagihan($idtagihan)
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Pengajuan Tagihan';

    $this->form_validation->set_rules('pesan_req', 'Pesan', 'required');

    if ($this->form_validation->run() == FALSE) {
      $data['tagihan'] = $this->db->get_where('tb_tagihan', ['nim' => $this->session->userdata('nim')])->row_array();
      $data['reqTagihan'] = $this->db->get_where('tb_req_tagihan', ['id_tagihan' => $idtagihan])->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('mahasiswa/editreq_tagihan', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'date_req' => time(),
        'nim' => $this->input->post('nim'),
        'nama' => $this->input->post('nama'),
        'pesan_req' => $this->input->post('pesan_req'),
        'status' => 0,
        'sisa_req' => 2,
        'date_resp' => 0
      ];
      $this->db->where('id_tagihan', $idtagihan);
      $this->db->update('tb_req_tagihan', $data);
      redirect('mahasiswa/tagihan');
    }
  }

  public function viewReqTagihan($idtagihan)
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Pengajuan Tagihan';

    $data['tagihan'] = $this->db->get_where('tb_tagihan', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['reqTagihan'] = $this->db->get_where('tb_req_tagihan', ['id_tagihan' => $idtagihan])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('mahasiswa/viewreq_tagihan', $data);
    $this->load->view('templates/footer');
  }
}
