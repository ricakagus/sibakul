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
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="row">
                <div class="col-md-6">
                  <form method="POST" action="<?= base_url('admin/form_importTagihan'); ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="datatagihan" class="col-sm-3 col-form-label">Upload Data</label>
                      <div class="custom-file col-sm-6">
                        <input type="file" class="custom-file-input" id="datatagihan" name="datatagihan">
                        <label class="custom-file-label" for="datatagihan">pilih file</label>
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
                <div class="col-md-6 text-right">
                  <a href="<?= base_url('excel/format_tagihan.xlsx') ?>" class="badge badge-success px-2 py-1"><i class="fas fa-file-download"></i> download format</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <?php
              if (isset($_POST['preview'])) {
                if (isset($upload_error)) {
                  echo "<div style='color: red;'>" . $upload_error . "</div>"; // Muncul pesan error upload

                } else { ?>
                  <form method="POST" action="<?= base_url('admin/importTagihan'); ?>">
                    <div style='color: red;' id='kosong'>
                      Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                    </div>

                    Jumlah import : <b><?= $baris; ?></b> Tagihan.
                    <!-- /.card-header -->
                    <!--
                    dimatikan dulu karena belum bisa paginatioan dan cek duplikasi data

                    <table class="table table-bordered table-responsive table-sm table-striped">
                      <thead class="bg-secondary" style="font-size: 14px;">
                        <tr>
                          <th>#</th>
                          <th>Bulan</th>
                          <th>Tahun</th>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>Jumlah</th>
                          <th>Cuti</th>
                          <th>DPP</th>
                          <th>Almamater</th>
                          <th>PSPT</th>
                          <th>KP</th>
                          <th>Ppj. KP</th>
                          <th>TA</th>
                          <th>Ppj. TA</th>
                          <th>SPP</th>
                          <th>Denda</th>
                        </tr>
                      </thead>
                      <tbody style="font-size: 14px;">
                        <?php
                        $numrow = 1;
                        $kosong = 0;

                        // Lakukan perulangan dari data yang ada di excel
                        // $sheet adalah variabel yang dikirim dari controller
                        foreach ($sheet as $row) :
                          // Ambil data pada excel sesuai Kolom
                          $nomor = $row['A'];
                          $bulan = $row['B'];
                          $tahun = $row['C'];
                          $nim = $row['D'];
                          $nama = $row['E'];
                          $jumlah = $row['F'];
                          $cuti = $row['G'];
                          $dpp = $row['H'];
                          $almamater = $row['I'];
                          $pspt = $row['J'];
                          $kp = $row['K'];
                          $pkp = $row['L'];
                          $ta = $row['M'];
                          $pta = $row['N'];
                          $spp = $row['O'];
                          $denda = $row['P'];

                          // Cek jika semua data tidak diisi
                          if ($bulan == "" && $tahun == "" && $nim == "" && $nama == "" && $jumlah == "") continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                          // Cek $numrow apakah lebih dari 1
                          // Artinya karena baris pertama adalah nama-nama kolom
                          // Jadi dilewat saja, tidak usah diimport
                          if ($numrow > 1) {

                            $bulan_td = (!empty($bulan)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                            $tahun_td = (!empty($tahun)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                            $nim_td = (!empty($nim)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                            $nama_td = (!empty($nama)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                            $jumlah_td = (!empty($jumlah)) ? "" : " style='background: #E07171;'";


                            // Jika salah satu data ada yang kosong
                            if ($bulan == "" or $tahun == "" or $nim == "" or $nama == "" or $jumlah == "") {
                              $kosong++; // Tambah 1 variabel $kosong
                            }

                            echo "<tr>";
                            echo "<td>" . $nomor . "</td>";
                            echo "<td" . $bulan_td . ">" . $bulan . "</td>";
                            echo "<td" . $tahun_td . ">" . $tahun . "</td>";
                            echo "<td" . $nim_td . ">" . $nim . "</td>";
                            echo "<td" . $nama_td . ">" . $nama . "</td>";
                            echo "<td" . $jumlah_td . ">" . $jumlah . "</td>";
                            echo "<td>" . $cuti . "</td>";
                            echo "<td>" . $dpp . "</td>";
                            echo "<td>" . $almamater . "</td>";
                            echo "<td>" . $pspt . "</td>";
                            echo "<td>" . $kp . "</td>";
                            echo "<td>" . $pkp . "</td>";
                            echo "<td>" . $ta . "</td>";
                            echo "<td>" . $pta . "</td>";
                            echo "<td>" . $spp . "</td>";
                            echo "<td>" . $denda . "</td>";
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
                      <a href="<?= base_url('import/uploadTagihan'); ?>"></a>
                  <?php }
                  } ?>
                  </form>
                <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div><!-- /.container-fluid -->
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->