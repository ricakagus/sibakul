<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    login_role();
    $this->load->model('Admin_model');
    $this->load->model('Mahasiswa_model');
    $this->load->model('Tagihan_model');
    $this->load->model('Pembayaran_model');
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();

    $data['judul'] = 'Dashboard';
    $data['qtyMhs'] = $this->Admin_model->getQtyMahasiswa();
    $data['sumTgh'] = $this->Admin_model->getSumTagihan();
    $data['qtyBayar'] = $this->Admin_model->getQtyPembayaran();
    $data['qtyReq'] = $this->Admin_model->getQtyRequestTagihan();

    // var_dump($data['sumTgh']);
    // die;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function mahasiswa()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Master Mahasiswa';

    if ($this->input->post('cari')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    $config['base_url'] = base_url('admin/mahasiswa');
    $this->db->like('role_id', 2);
    $this->db->like('nama', $data['keyword']);
    $this->db->or_like('prodi', $data['keyword']);
    $this->db->or_like('nim', $data['keyword']);
    $this->db->or_like('nohp', $data['keyword']);
    $this->db->from('tb_user');
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
    $data['mahasiswa'] = $this->Admin_model->getDataPageMahasiswa($config['per_page'], $data['start'], $data['keyword']);

    $data['prodi'] = ['Teknik Informatika', 'Sistem Informasi'];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('mahasiswa/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambahMahasiswa()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();

    $this->form_validation->set_rules('nim', 'NIM', 'required|trim|numeric');
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('nohp', 'No HP', 'required|trim|numeric');

    if ($this->form_validation->run() == FALSE) {
      $data['judul'] = 'Master Mahasiswa';

      $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
      $data['prodi'] = ['Teknik Informatika', 'Sistem Informasi'];
      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('mahasiswa/tambahmahasiswa', $data);
      $this->load->view('templates/footer');
    } else {
      $nim1 = $this->input->post('nim');
      $hasil = $this->db->get_where('tb_user', ['nim' => $nim1]);

      if ($hasil->num_rows() > 0) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Duplikasi NIM</div');
      } else {
        $this->Mahasiswa_model->tambahDataMahasiswa();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Ditambahkan</div');
      }
      redirect('admin/mahasiswa');
    }
  }

  public function detailMahasiswa($nim)
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Master Mahasiswa';

    $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaByNIM($nim);
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('mahasiswa/detailmahasiswa', $data);
    $this->load->view('templates/footer');
  }

  public function hapusMahasiswa($nim)
  {
    $this->Mahasiswa_model->hapusDataMahasiswa($nim);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Dihapus</div');
    redirect('admin/mahasiswa');
  }

  public function resetPasswordMahasiswa($nim)
  {
    $this->db->where('nim', $nim);
    $this->db->set('password', password_hash($nim, PASSWORD_DEFAULT));
    $this->db->set('actived', 1);
    $this->db->update('tb_user');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Direset</div');
    redirect('admin/mahasiswa');
  }

  public function rubahStatusMahasiswa($nim)
  {
    $status = $this->db->get_where('tb_user', ['nim' => $nim])->row_array();

    $this->db->where('nim', $nim);
    if ($status['actived'] == '1') :
      $this->db->set('actived', '2');
    elseif ($status['actived'] == '2') :
      $this->db->set('actived', '1');
    endif;
    $this->db->update('tb_user');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Dirubah</div');
    redirect('admin/mahasiswa');
  }
  // end COntroller MAHSISWA


  // Mulai Controller IMPORT DATA MAHASISWA

  private $filenameMhs = "data_mhs";

  public function uploadMahasiswa()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Master Mahasiswa';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('mahasiswa/formImport', $data);
    $this->load->view('templates/footer');
  }

  public function form_importMahasiswa()
  {
    $data = array();

    if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php

      $upload = $this->Mahasiswa_model->upload_file($this->filenameMhs);


      if ($upload['result'] == "success") {

        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/' . $this->filenameMhs . '.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet;
        if ($sheet) :
          $baris = -1;
          foreach ($sheet as $s) :
            $baris++;
          endforeach;
          $data['baris'] = $baris;
        else :
          $data['baris'] = 0;
        endif;
      } else {
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }

    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Master Mahasiswa';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('mahasiswa/formImport', $data);
    $this->load->view('templates/footer');
  }

  public function importMahasiswa()
  {

    // $filedata = $_FILES['datamhs']['name'];
    include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/' . $this->filenameMhs . '.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();

    $numrow = 1;
    foreach ($sheet as $row) {
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if ($numrow > 1) {
        // Kita push (add) array data ke variabel data
        array_push($data, array(
          'nama' => $row['B'], // Insert data nis dari kolom A di excel
          'nim' => $row['C'], // Insert data nama dari kolom B di excel
          'image' => 'default.jpg',
          'password' => password_hash($row['C'], PASSWORD_DEFAULT),
          'prodi' => $row['D'],
          'noHp' => '0',
          'role_id' => '2',
          'actived' => '1'
        ));
      }

      $numrow++;
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->Mahasiswa_model->insert_multiple($data);

    redirect('admin/mahasiswa');
  }
  // end CONTROLLER IMPORT DATA MAHASISWA

  // Mulai Controller TAGIHAN
  public function tagihan()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Master Tagihan';

    if ($this->input->post('cari')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    $config['base_url'] = base_url('admin/tagihan');
    $this->db->like('id_tagihan', $data['keyword']);
    $this->db->or_like('nim', $data['keyword']);
    $this->db->or_like('nama', $data['keyword']);
    $this->db->or_like('status', $data['keyword']);
    $this->db->from('tb_tagihan');


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
    $data['tagihan'] = $this->Admin_model->getDataPageTagihan($config['per_page'], $data['start'], $data['keyword']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('tagihan/index', $data);
    $this->load->view('templates/footer');
  }

  public function cariMahasiswa()
  {
    $nim = $this->input->post('searchNIM');
    if ($nim) {
      $dataUser =  $this->db->get_where('tb_user', ['nim' => $nim]);
      if ($dataUser->num_rows() > 0) {
        var_dump($dataUser->row_array()['nim'] . '-' . $dataUser->row_array()['nama']);
        $tghUser = $this->db->get_where('tb_tagihan', ['nim' => $dataUser->row_array()['nim']]);
        if ($tghUser->num_rows() > 0) {
          redirect('admin/ubahtagihan/' . $nim);
        } else {
          redirect('admin/tambahtagihan/' . $nim);
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Mahasiswa Tidak Ditemukan</div');
        redirect('admin/tagihan');
      }
    } else {
      redirect('admin/tagihan');
    }
  }

  public function tambahTagihan($nim)
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['bulan'] = $this->db->get('tb_bulan')->result_array();

    $data['mahasiswa'] = $this->db->get_where('tb_user', ['nim' => $nim])->row_array();

    $this->form_validation->set_rules('nim', 'NIM', 'required|trim|numeric');
    $this->form_validation->set_rules('nama', 'Nama', 'required');

    $data['noBulan'] = date('m');
    $data['noTahun'] = date('Y');
    $data['idTgh'] = $data['noTahun'] . $data['noBulan'] . $nim;;

    if ($this->form_validation->run() == FALSE) {
      $data['judul'] = 'Master Tagihan';

      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('tagihan/tambahtagihan', $data);
      $this->load->view('templates/footer');
    } else {
      $cuti = (int)$this->input->post('cuti');
      $dpp = (int)$this->input->post('dpp');
      $almamater = (int)$this->input->post('almamater');
      $pspt = (int)$this->input->post('pspt');
      $kp = (int)$this->input->post('kp');
      $pkp = (int)$this->input->post('pkp');
      $ta = (int)$this->input->post('ta');
      $pta = (int)$this->input->post('pta');
      $spp = (int)$this->input->post('spp');
      $konversi = (int)$this->input->post('konversi');
      $denda = (int)$this->input->post('denda');

      $jumlah = $cuti + $dpp + $almamater + $pspt + $kp + $pkp + $ta + $pta + $pta + $spp + $konversi + $denda;

      $data = [
        'id_tagihan' => $data['idTgh'],
        'created' => time(),
        'bulan' => $this->input->post('bulan'),
        'tahun' => $this->input->post('tahun'),
        'nim' => $this->input->post('nim'),
        'nama' => $this->input->post('nama'),
        'jumlah' => $jumlah,
        'cuti' => $cuti,
        'dpp' => $dpp,
        'almamater' => $almamater,
        'pspt' => $pspt,
        'kp' => $kp,
        'pkp' => $pkp,
        'ta' => $ta,
        'pta' => $pta,
        'spp' => $spp,
        'konversi' => $konversi,
        'denda' => $denda,
        'status' => '0'
      ];

      $this->db->insert('tb_tagihan', $data);

      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Ditambahkan</div');
      redirect('admin/tagihan');
    }
  } // end function tambahtagihan


  public function ubahTagihan($nim)
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();

    $data['bulan'] = $this->db->get('tb_bulan')->result_array();

    $data['noBulan'] = date('m');
    $data['noTahun'] = date('Y');
    $data['idTgh'] = $data['noTahun'] . $data['noBulan'] . $nim;

    $data['mahasiswa'] = $this->db->get_where('tb_tagihan', ['nim' => $nim])->row_array();

    $this->form_validation->set_rules('nim', 'NIM', 'required|trim|numeric');
    $this->form_validation->set_rules('nama', 'Nama', 'required');

    if ($this->form_validation->run() == FALSE) {
      $data['judul'] = 'Master Tagihan';
      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('tagihan/ubahtagihan', $data);
      $this->load->view('templates/footer');
    } else {
      $cuti = (int)$this->input->post('cuti');
      $dpp = (int)$this->input->post('dpp');
      $almamater = (int)$this->input->post('almamater');
      $pspt = (int)$this->input->post('pspt');
      $kp = (int)$this->input->post('kp');
      $pkp = (int)$this->input->post('pkp');
      $ta = (int)$this->input->post('ta');
      $pta = (int)$this->input->post('pta');
      $spp = (int)$this->input->post('spp');
      $konversi = (int)$this->input->post('konversi');
      $denda = (int)$this->input->post('denda');

      $jumlah = $cuti + $dpp + $almamater + $pspt + $kp + $pkp + $ta + $pta + $pta + $spp + $konversi + $denda;
      $data = [
        'id_tagihan' => $data['idTgh'],
        'bulan' => $this->input->post('bulan'),
        'tahun' => $this->input->post('tahun'),
        'nim' => $this->input->post('nim'),
        'nama' => $this->input->post('nama'),
        'jumlah' => $jumlah,
        'cuti' => $cuti,
        'dpp' => $dpp,
        'almamater' => $almamater,
        'pspt' => $pspt,
        'kp' => $kp,
        'pkp' => $pkp,
        'ta' => $ta,
        'pta' => $pta,
        'spp' => $spp,
        'konversi' => $konversi,
        'denda' => $denda,
        'status' => '0'
      ];

      $this->db->where('nim', $nim);
      $this->db->update('tb_tagihan', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Dirubah</div');
      redirect('admin/tagihan');
    }
  } // end function ubahTagihan


  public function detailTagihan($nim)
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Master Tagihan';
    $data['bulan'] = $this->db->get('tb_bulan')->result_array();

    $data['mahasiswa'] = $this->db->get_where('tb_tagihan', ['nim' => $nim])->row_array();
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $nim])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('tagihan/detailtagihan', $data);
    $this->load->view('templates/footer');
  } // end function detailTagihan


  // end controller tagihan


  // Mulai Controller IMPORT DATA TAGIHAN

  private $filenameTagihan = "data_tagihan";

  public function uploadTagihan()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Master Tagihan';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('tagihan/formImport', $data);
    $this->load->view('templates/footer');
  }

  public function form_importTagihan()
  {
    $data = array();

    if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php

      $upload = $this->Tagihan_model->upload_file($this->filenameTagihan);


      if ($upload['result'] == "success") {

        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/' . $this->filenameTagihan . '.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet;
        if ($sheet) :
          $baris = -1;
          foreach ($sheet as $s) :
            $baris++;
          endforeach;
          $data['baris'] = $baris;
        else :
          $data['baris'] = 0;
        endif;
      } else {
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Master Tagihan';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('tagihan/formImport', $data);
    $this->load->view('templates/footer');
  }

  public function importTagihan()
  {

    // $filedata = $_FILES['datamhs']['name'];
    include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/' . $this->filenameTagihan . '.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();

    $numrow = 1;
    foreach ($sheet as $row) {
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom

      // Jadi dilewat saja, tidak usah diimport
      if ($numrow > 1) {
        // Kita push (add) array data ke variabel data
        $idTagihan = date('Y') . date('m') . $row['D'];
        // var_dump($idTagihan);
        // die;
        array_push($data, array(
          'id_tagihan' => $idTagihan,
          'created' => time(),
          'bulan' => $row['B'],
          'tahun' => $row['C'],
          'nim' => $row['D'], // Insert data nama dari kolom B di excel
          'nama' => $row['E'],
          'jumlah' => $row['F'],
          'cuti' => $row['G'],
          'dpp' => $row['H'],
          'almamater' => $row['I'],
          'pspt' => $row['J'],
          'kp' => $row['K'],
          'pkp' => $row['L'],
          'ta' => $row['M'],
          'pta' => $row['N'],
          'spp' => $row['O'],
          'denda' => $row['P']
        ));
      }

      $numrow++;
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->Tagihan_model->insert_multiple($data);

    redirect('admin/tagihan');
  }
  // end CONTROLLER IMPORT DATA MAHASISWA



  // mulai COntroller PEMBAYARAN
  public function pembayaran()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Master Pembayaran';

    if ($this->input->post('keyword')) {
      $data['pembayaran'] = $this->Pembayaran_model->cariDataPembayaran();
    } else {
      $data['pembayaran'] = $this->Pembayaran_model->getAllPembayaran();
    }
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('pembayaran/index', $data);
    $this->load->view('templates/footer');
  }


  public function cek_pembayaran($idtagihan)
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Master Pembayaran';

    $data['pembayaran'] = $this->db->get_where('tb_pembayaran', ['id_tagihan' => $idtagihan])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('pembayaran/cekpembayaran', $data);
    $this->load->view('templates/footer');
  }

  public function konfirm_pembayaran($idtagihan)
  {
    $this->db->set('status', $this->input->post('rStatus'));
    $this->db->where('id_tagihan', $idtagihan);
    $this->db->update('tb_pembayaran');

    if ($this->input->post('rStatus') == '1') {
      // hapus data tagihan
      $this->db->where('id_tagihan', $idtagihan);
      $this->db->delete('tb_tagihan');

      $this->db->set('status', '1');
      $this->db->where('id_tagihan', $idtagihan);
      $this->db->update('tb_pembayaran');
    } else { //jika status == 2 artinya reject
      // update status tagihan rejected
      $this->db->set('status', '2');
      $this->db->where('id_tagihan', $idtagihan);
      $this->db->update('tb_tagihan');

      $this->db->set('status', '2');
      $this->db->where('id_tagihan', $idtagihan);
      $this->db->update('tb_pembayaran');
    }
    redirect('admin/pembayaran');
  } // 


  public function reqTagihan()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Request Tagihan';

    $queryReq = "SELECT * FROM tb_req_tagihan ORDER BY date_req DESC";
    $data['reqTagihan'] = $this->db->query($queryReq)->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('tagihan/reqtagihan', $data);
    $this->load->view('templates/footer');
  }

  public function approveReq($idtagihan)
  {
    $reqTagihan = $this->db->get_where('tb_req_tagihan', ['id_tagihan' => $idtagihan])->row_array();
    $sisa = $reqTagihan['sisa_req'] - 1;

    $this->db->where('id_tagihan', $idtagihan);
    $this->db->set('status', 1);
    $this->db->set('sisa_req', $sisa);
    $this->db->set('date_resp', time());
    $this->db->update('tb_req_tagihan');

    redirect('admin/reqTagihan');
  }

  public function rejectReq($idtagihan)
  {
    $reqTagihan = $this->db->get_where('tb_req_tagihan', ['id_tagihan' => $idtagihan])->row_array();
    $sisa = $reqTagihan['sisa_req'] - 1;

    $this->db->where('id_tagihan', $idtagihan);
    $this->db->set('status', 2);
    $this->db->set('sisa_req', $sisa);
    $this->db->set('date_resp', time());
    $this->db->update('tb_req_tagihan');

    redirect('admin/reqTagihan');
  }
} // end controler
