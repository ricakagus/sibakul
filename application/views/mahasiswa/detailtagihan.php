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

            <div class="invoice p-3  ">
              <div class="row">
                <div class="col-sm-2 ml-2 text-center">
                  <img src="<?= base_url('assets/img/') . 'logo-sbb-bg-white.jpg'; ?>" class="rounded" height="50px">
                </div>
                <div class="col-sm-9">
                  <p class="h2 ml-4 mt-2"> STMIK BANDUNG BALI
                    <small class="float-right h6"><i><?= date('d F Y', $tagihan['created']); ?></i></small>
                  </p>
                </div>
              </div>

              <hr>

              <div class="row invoice-info mt-3 ">
                <div class="col-sm-2 invoice-col">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/profil/') . $user['image']; ?>">
                  </div>
                </div>
                <div class="col-sm-4 invoice-col">
                  Kepada:
                  <address>
                    <strong><?= $user['nama']; ?></strong><br>
                    <?= $user['nim']; ?><br>
                    <?= $user['prodi'] ?><br>
                    Phone: <?= $user['noHp'] ?><br>
                  </address>
                </div>
                <div class="col-sm-4 invoice-col">
                  <?php if (!$tagihan) : ?>

                    <b>No.Tagihan #-</b><br>
                    <small class="badge badge-success">tidak ada tagihan</small>

                  <?php else : ?>

                    <b>No.Tagihan #<?= $tagihan['id_tagihan'];  ?></b><br>
                    <b>Tagihan Bulan:</b> <?= $bulan_tagihan; ?> <br>
                    <!-- <?php if ($tagihan['status'] == 0) : ?>
                      <a href="<?= base_url('mahasiswa/bayarkuliah/'); ?>" class="btn btn-primary btn-block">bayar kuliah</a>
                    <?php elseif ($tagihan['status'] == 2) : ?>
                      <a href="<?= base_url('mahasiswa/bayarkuliah/'); ?>" class="badge badge-danger px-3 py-1">bukti pembayaran ditolak >> <u>upload ulang</u></a>
                    <?php else : ?>
                      <small class="badge badge-warning">menunggu konfirmasi admin</small>
                    <?php endif; ?> -->
                  <?php endif; ?>
                </div>
              </div> <!-- end row infoice-info -->

              <hr class="mb-0">

              <!-- row tabel -->
              <div class="row">
                <div class="col-sm-6 ">
                  <table class="table table-borderless table-striped table-sm">
                    <thead>
                      <tr>
                        <th width="1%">#</th>
                        <th width="20%" colspan="2">Komponen Biaya</th>
                        <th width="10%">Subtotal</th>
                      </tr>
                    </thead>
                    <?php if (!$tagihan) : ?>
                      <tbody>
                        <tr>
                          <td colspan="4">
                            tidak ada tagihan
                          </td>
                        </tr>
                      </tbody>
                    <?php else : ?>
                      <tbody>
                        <tr>
                          <td>1.</td>
                          <td>Cuti</td>
                          <td>:</td>
                          <td>Rp. <?= number_format($tagihan['cuti'], '0', ',', '.'); ?></td>
                        </tr>
                        <tr>
                          <td>2.</td>
                          <td>DPP</td>
                          <td>:</td>
                          <td>Rp. <?= number_format($tagihan['dpp'], '0', ',', '.'); ?></td>
                        </tr>
                        <tr>
                          <td>3.</td>
                          <td>Almamater</td>
                          <td>:</td>
                          <td>Rp. <?= number_format($tagihan['almamater'], '0', ',', '.'); ?></td>
                        </tr>
                        <tr>
                          <td>4.</td>
                          <td>PSPT</td>
                          <td>:</td>
                          <td>Rp. <?= number_format($tagihan['pspt'], '0', ',', '.'); ?></td>
                        </tr>
                        <tr>
                          <td>5.</td>
                          <td>Kerja Panjang (KP)</td>
                          <td>:</td>
                          <td>Rp. <?= number_format($tagihan['kp'], '0', ',', '.'); ?></td>
                        </tr>
                        <tr>
                          <td>7.</td>
                          <td>Denda</td>
                          <td>:</td>
                          <td>Rp. <?= number_format($tagihan['denda'], '0', ',', '.'); ?></td>
                        </tr>
                      </tbody>
                    <?php endif; ?>
                  </table>
                </div>
                <div class="col-sm-6 ">
                  <table class="table table-borderless table-striped table-sm">
                    <thead>
                      <tr>
                        <th width="1%">#</th>
                        <th width="20%" colspan="2">Komponen Biaya</th>
                        <th width="10%">Subtotal</th>
                      </tr>
                    </thead>
                    <?php if (!$tagihan) : ?>
                      <tbody>
                        <tr>
                          <td colspan="4">
                            tidak ada tagihan
                          </td>
                        </tr>
                      </tbody>
                    <?php else : ?>
                      <tbody>
                        <tr>
                          <td>7.</td>
                          <td>Perpanjang KP</td>
                          <td>:</td>
                          <td>Rp. <?= number_format($tagihan['pkp'], '0', ',', '.'); ?></td>
                        </tr>
                        <tr>
                          <td>8.</td>
                          <td>Tugas Akhir (TA)</td>
                          <td>:</td>
                          <td>Rp. <?= number_format($tagihan['ta'], '0', ',', '.'); ?></td>
                        </tr>
                        <tr>
                          <td>9.</td>
                          <td>Perpanjang TA</td>
                          <td>:</td>
                          <td>Rp. <?= number_format($tagihan['pta'], '0', ',', '.'); ?></td>
                        </tr>
                        <tr>
                          <td>10.</td>
                          <td>SPP</td>
                          <td>:</td>
                          <td>Rp. <?= number_format($tagihan['spp'], '0', ',', '.'); ?></td>
                        </tr>
                        <tr>
                          <td>11.</td>
                          <td>Konversi</td>
                          <td>:</td>
                          <td>Rp. <?= number_format($tagihan['konversi'], '0', ',', '.'); ?></td>
                        </tr>
                      </tbody>
                    <?php endif; ?>
                  </table>
                </div>
              </div> <!-- end row tabel -->
              <hr class="mt-0">
              <!-- row payment -->
              <div class="row">
                <div class="col-md-6">
                  <p class="lead">Metode Pembayaran:</p>

                  <img src="<?= base_url('assets/'); ?>img/BPD-BALI.jpg" alt="logo BPD Bali" width="auto" height="60px">
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    <ol>
                      <li>Mahasiswa melakukan setoran tunai pada Bank BPD Bali</li>
                      <li>Mahasiswa menyebutkan Nama Kampus dan NIM pada Teller</li>
                      <li>Kemudian Mahasiswa akan menerima slip (bukti setoran) dari bank</li>
                      <li>Slip (bukti setoran) diunggah (upload) sebagai bukti pembayaran biaya kuliah</li>
                      <li>Diharapkan mahasiswa menyimpan slip sebagai arsip pribadi</li>
                    </ol>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <p class="lead">Batas Pembayaran:
                    <?php if (!$tagihan) : ?>
                      <b>-</b>
                    <?php else : ?>
                      <b style="color: red;"><?= date('d/m/Y', $tagihan['deadline']); ?></b>
                    <?php endif; ?>
                  </p>
                  <hr class="m-0">

                  <table class="table table-borderless mb-0">
                    <tr class="h4">
                      <!-- <th style="width: 10%;"></th> -->
                      <td class="text-right font-weight-bold">Jumlah</td>
                      <td class="text-left">: Rp. <?= number_format($tagihan['jumlah'], '0', ',', '.'); ?></td>
                    </tr>
                  </table>
                </div>
                <hr class="m-0">
              </div>
            </div> <!-- end row payment -->

            <!-- row print -->
            <div class="row no-print d-flex justify-content-around">
              <div class="col-8">
              </div>
              <div class="col-4">
                <?php if (!$tagihan) : ?>
                  <button class="btn btn-block btn-primary" disabled><i class=" fas fa-print"></i> Cetak</button>
                <?php else : ?>
                  <a href="<?= base_url('mahasiswa/cetak_tagihan/') . $tagihan['id_tagihan']; ?>" class="btn btn-block btn-primary"><i class="fas fa-fw fa-print"></i> Cetak</a>
                <?php endif; ?>
              </div>
            </div>
          </div>

        </div> <!-- /. card -->

      </div>
    </div>



  </div><!-- /.container-fluid -->

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->