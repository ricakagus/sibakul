<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    login_role();
    $this->load->model('Mahasiswa_model');
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


  public function tagihan()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Tagihan';

    $nim = $this->session->userdata('nim');
    $bulan = date('m');
    $tahun = date('Y');

    $config['total_rows'] = $this->db->count_all_results();
    $config['per_page'] = 10;
    $config['num_links'] = 2; // nomor halaman di kiri 2 dan kanan 2    

    //styling 
    $config['full_tag_open'] = '<div class="card-footer clearfix"> <ul class="pagination m-0 float-right">';
    $config['full_tag_close'] = '</ul></div>';

    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '<li>';

    $config['next_link'] = '&raquo;';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '<li>';

    $config['prev_link'] = '&laquo;';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '<li>';

    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class=" page-item">';
    $config['num_tag_close'] = '</li>';

    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);

    $data['start'] = $this->uri->segment(3);
    $data['tagihan'] = $this->Mahasiswa_model->getDataPageTagihan($config['per_page'], $data['start'], $this->session->userdata('nim'));

    $data['bulan'] = $this->db->get('tb_bulan')->result_array();

    $data['reqtgh'] = $this->db->get_where('tb_req_tagihan', ['nim' => $nim, 'bulan' => $bulan, 'tahun' => $tahun])->row_array();

    $data['totaltgh'] = $this->db->get_where('tb_total_tagihan', ['nim' => $nim])->row_array();



    // var_dump("Data Tagihan: " . $data['tagihan']);


    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('mahasiswa/tagihan', $data);
    $this->load->view('templates/footer');
  }


  public function detailtagihan($idtagihan)
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $nim = $this->session->userdata('nim');
    $data['judul'] = 'Tagihan';
    $data['bulan'] = $this->db->get('tb_bulan')->result_array();

    $data['tagihan'] = $this->db->get_where('tb_tagihan', ['id_tagihan' => $idtagihan])->row_array();
    $data['bulan_tagihan'] = $this->db->get_where('tb_bulan', ['id' => $data['tagihan']['bulan']])->row_array()['bulan'] . ' ' . $data['tagihan']['tahun'];

    $data['user'] = $this->db->get_where('tb_user', ['nim' => $nim])->row_array();



    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('mahasiswa/detailtagihan', $data);
    $this->load->view('templates/footer');
  } // end function detailTagihan

  public function cetak_tagihan($idtagihan)
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Cetak Tagihan-' . $idtagihan;
    $data['bulan'] = $this->db->get('tb_bulan')->result_array();

    $data['tagihan'] = $this->db->get_where('tb_tagihan', ['id_tagihan' => $idtagihan])->row_array();
    $nim = $data['tagihan']['nim'];
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $nim])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('mahasiswa/cetak_tagihan', $data);
  } // end function cetak taguhan


  public function bayarkuliah()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Bayar Kuliah';

    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');

    $data['bulan'] = $this->db->get('tb_bulan')->result_array();
    $data['tagihan'] = $this->db->get_where('tb_total_tagihan', ['nim' => $this->session->userdata('nim')])->row_array();

    $nim = $this->session->userdata('nim');
    $bulan = $data['tagihan']['bulan'];
    $tahun = $data['tagihan']['tahun'];

    $data['pembayaran'] = $this->db->get_where('tb_pembayaran', ['nim' => $nim, 'bulan' => $bulan, 'tahun' => $tahun])->row_array();

    if ($this->form_validation->run() == FALSE) {
      // $idtagihan = $this->db->get_where('tb_tagihan', ['nim' => $nim, 'bulan' => $bulan, 'tahun' => $tahun])->row_array()['id_tagihan'];
      // 
      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('mahasiswa/bayar_kuliah', $data);
      $this->load->view('templates/footer');
    } else {
      $pembayaran = $this->db->get_where('tb_pembayaran', ['nim' => $nim, 'bulan' => $bulan, 'tahun' => $tahun])->row_array();
      // ambil data idtagihan
      // $idtagihan = $data['tagihan']['id_tagihan'];
      // ambil data foto bukti bayar
      $total = preg_replace('/[.]/', '', $this->input->post('jumlah')); // menghilangkan format titik di php
      $upload_bukti = $_FILES['buktib']['name'];

      // periksa foto bukti bayar
      // 1. jika foto butki tidak ada
      if (!$upload_bukti) {
        // 1.a. tampilan pesan foto bukti masih kosong
        // 1.a. redirect ke 'mahasiswa/bayarkuliah'
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Bukti bayar belum ada! </div>');
        redirect('mahasiswa/bayarkuliah');
      } else { // 2. jika foto bukti ada
        // 2.a. periksa apakah ada pembayaran di tabel pembayaran dari idtagihan


        $config['allowed_types'] = 'jpg|pdf';
        $config['max_size'] = '1024';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $tahun . $bulan . $nim;
        $config['upload_path'] = './assets/img/buktibayar/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('buktib')) {
          $old_image = $pembayaran['bukti'];
          if ($old_image != 'buktikosong.jpg') {
            unlink(FCPATH . 'assets/img/buktibayar/' . $old_imagege);
          }
          $bukti_image = $this->upload->data('file_name');
          $this->db->set('bukti', $bukti_image);
        } else {
          // or =  $this->upload->display_errors();
          $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>'
          );
          redirect('mahasiswa/bayarkuliah');
        }

        // 2.a.*. jika TIDAK ADA data pembayaran di tabel pembayaran maka, SIMPAN Bukti Bayar
        if (!$pembayaran) {
          $this->db->set('bulan', $bulan);
          $this->db->set('tahun', $tahun);
          $this->db->set('nim', $nim);
          $this->db->set('total', $total);
          $this->db->set('tgl_upload', time());
          $this->db->set('status', '0');
          $this->db->insert('tb_pembayaran');
        } else {
          // 2.a.#. jika ADA data pembayaran di tabel pembayaran maka, UPDATE Bukti Bayar
          $this->db->set('tgl_upload', time());
          $this->db->set('status', '0');
          $this->db->where('nim', $nim);
          $this->db->where('bulan', $bulan);
          $this->db->where('tahun', $tahun);
          $this->db->update('tb_pembayaran');
        }

        $this->db->set('status', '1');
        $this->db->where('nim', $nim);
        $this->db->update('tb_total_tagihan');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Bukti bayar <b>TERSIMPAN</b>! Menunggu konfirmasi dari admin. </div>');
        redirect('mahasiswa/bayarkuliah');
      }
    }
  } // end function bayar kuliah 

  public function inputReqTagihan()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Pengajuan Tagihan';

    $this->form_validation->set_rules('pesan_req', 'jumlah request', 'required');


    $data['bulan'] = $this->db->get('tb_bulan')->result_array();
    $data['totaltgh'] = $this->db->get_where('tb_total_tagihan', ['nim' => $this->session->userdata('nim')])->row_array();
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('mahasiswa/inputreq_tagihan', $data);
      $this->load->view('templates/footer');
    } else {
      if ($this->input->post('pesan_req') < $data['totaltgh']['total']) :
        $jenis = 'minus';
      elseif ($this->input->post('pesan_req') > $data['totaltgh']['total']) :
        $jenis = 'plus';
      endif;

      $data = [
        'bulan' => $data['totaltgh']['bulan'],
        'tahun' => $data['totaltgh']['tahun'],
        'date_req' => time(),
        'nim' => $this->input->post('nim'),
        'nama' => $this->input->post('nama'),
        'jenis' => $jenis,
        'pesan_req' => $this->input->post('pesan_req'),
        'pesan_mhs' => $this->input->post('pesan_mhs'),
        'status' => 0,
        'sisa_req' => 2,
        'date_resp' => 0
      ];
      $this->db->insert('tb_req_tagihan', $data);
      redirect('mahasiswa/tagihan');
    }
  }

  public function editReqTagihan($id)
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Pengajuan Tagihan';

    $this->form_validation->set_rules('pesan_req', 'jumlah request', 'required');

    $data['bulan'] = $this->db->get('tb_bulan')->result_array();
    $data['totaltgh'] = $this->db->get_where('tb_total_tagihan', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['reqTagihan'] = $this->db->get_where('tb_req_tagihan', ['nim' => $this->session->userdata('nim')])->row_array();

    if ($this->form_validation->run() == FALSE) {

      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('mahasiswa/editreq_tagihan', $data);
      $this->load->view('templates/footer');
    } else {


      if ($this->input->post('pesan_req') < $data['totaltgh']['total']) :
        $jenis = 'minus';
      elseif ($this->input->post('pesan_req') > $data['totaltgh']['total']) :
        $jenis = 'plus';
      endif;
      $bulan = $data['reqTagihan']['bulan'];
      $tahun = $data['reqTagihan']['tahun'];
      $data = [
        'bulan' => $bulan,
        'tahun' => $tahun,
        'date_req' => time(),
        'nim' => $this->input->post('nim'),
        'nama' => $this->input->post('nama'),
        'jenis' => $jenis,
        'pesan_req' => $this->input->post('pesan_req'),
        'pesan_mhs' => $this->input->post('pesan_mhs'),
        'status' => 0,
        'date_resp' => 0
      ];
      $this->db->where('id', $id);
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
