<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->
        <!-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div> -->
        <!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-8">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8">
                  <form method="POST" action="<?= base_url('admin/form_importMahasiswa'); ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="datamhs" class="col-sm-3 col-form-label">Upload Data</label>
                      <div class="custom-file col-sm-6">
                        <input type="file" class="custom-file-input" id="datamhs" name="datamhs">
                        <label class="custom-file-label" for="datamhs">pilih file</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-3">
                      </div>
                      <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-block" name="preview"><i class="fas fa-fw fa-upload"></i> Preview Data</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-4 text-right">
                  <a href="<?= base_url('excel/format_mahasiswa.xlsx') ?>" class="badge badge-success px-2 py-1"><i class="fas fa-file-download"></i> download format</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <?php if (isset($_POST['preview'])) {
                if (isset($upload_error)) {
                  echo "<div style='color: red;'>" . $upload_error . "</div>"; // Muncul pesan error upload
                  //die; // stop skrip
                } else { ?>
                  <form method="POST" action="<?= base_url('admin/importMahasiswa'); ?>">
                    <div style='color: red;' id='kosong'>
                      Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                    </div>

                    Jumlah import : <b><?= $baris; ?></b> Mahasiswa.

                    <!-- 
                    dimatikan dulu karena belum bisa paginatioan dan cek duplikasi data  
                    
                    <table class="table table-bordered table-responsive">
                    <thead class="bg-secondary">
                      <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $numrow = 1;
                      $kosong = 0;
                      foreach ($sheet as $row) :
                        // Ambil data pada excel sesuai Kolom
                        $nomor = $row['A']; // Ambil data NIM
                        $nama = $row['B']; // Ambil data NIM
                        $nim = $row['C']; // Ambil data nama
                        $prodi = $row['D']; // Ambil data program studi

                        // Cek jika semua data tidak diisi
                        if ($nim == "" && $nama == "" && $prodi == "") continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)


                        // Cek $numrow apakah lebih dari 1
                        // Artinya karena baris pertama adalah nama-nama kolom
                        // Jadi dilewat saja, tidak usah diimport
                        if ($numrow > 1) {
                          $no_td = (!empty($nomor)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                          $nim_td = (!empty($nim)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                          $nama_td = (!empty($nama)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                          $prodi_td = (!empty($prodi)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah

                          // Jika salah satu data ada yang kosong
                          if ($nim == "" or $nama == "" or $prodi == "") {
                            $kosong++; // Tambah 1 variabel $kosong
                          } // endif nim=="" dst...
                          echo "<tr>";
                          echo "<td" . $no_td . ">" . $nomor . "</td>";
                          echo "<td" . $nim_td . ">" . $nim . "</td>";
                          echo "<td" . $nama_td . ">" . $nama . "</td>";
                          echo "<td" . $prodi_td . ">" . $prodi . "</td>";
                          echo "</tr>";
                        } // endif numrow > 1
                        $numrow++; // Tambah 1 setiap kali looping
                      endforeach;
                      ?>

                    </tbody>
                  </table> 
                
                -->

                    <?php if ($kosong > 0) { ?>
                      <script>
                        $(document).ready(function() {
                          // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                          $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                          $("#kosong").show(); // Munculkan alert validasi kosong
                        });
                      </script>
                    <?php } else { ?>
                      <hr>
                      <button type="submit" name="import" class="btn btn-primary">IMPORT</button>
                      <a href="<?= base_url('import/uploadMahasiswa'); ?>"></a>
                    <?php } ?>
                  </form>
              <?php }
              } ?>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>

  </div><!-- /.container-fluid -->
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->