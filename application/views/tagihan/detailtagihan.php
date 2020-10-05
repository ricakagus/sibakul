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
        <div class="col-12">

          <div class="invoice p-3 mb-3">
            <div class="row">
              <div class="col-sm-2 ml-2 text-center">
                <img src="<?= base_url('assets/img/') . 'logo-sbb-bg-white.jpg'; ?>" class="rounded" height="50px">
              </div>
              <div class="col-sm-9">
                <p class="h2 ml-4 mt-2"> STMIK BANDUNG BALI
                  <small class="float-right">Date: <?= date('d F Y', $mahasiswa['created']); ?></small>
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
                <b>No.Tagihan #</b><span class="text-danger"><?= $mahasiswa['id_tagihan'];  ?></span><b>#</b>
                <?php if ($mahasiswa['status'] == 0) : ?>
                  <span class="badge badge-danger">bill</span>
                <?php else : ?>
                  <a href="<?= base_url('admin/cek_pembayaran/') . $mahasiswa['id_tagihan']; ?>" class="badge badge-warning">paid</a>
                <?php endif; ?>
                <br>
                <b>Tagihan Bulan:</b> <?= date('F Y'); ?> <br>
                <?php if ($mahasiswa['status'] == 0) : ?>
                  <a href="" class="btn btn-info btn-block disabled">Cek Pembayaran</a>
                <?php else : ?>
                  <a href="<?= base_url('admin/cek_pembayaran/') . $mahasiswa['id_tagihan']; ?>" class="btn btn-info btn-block">Cek Pembayaran</a>
                <?php endif; ?>

                <a href="<?= base_url('admin/ubahTagihan/') . $mahasiswa['nim']; ?>" onclick="return confirm('ubah data, yakin?');" class="btn btn-warning btn-block ">Ubah Tagihan</a>
              </div>
              <div class="col-md-4 invoice-col">

              </div>
            </div> <!-- end row infoice-info -->

            <hr class="mb-0">

            <!-- row tabel -->
            <div class="row">
              <div class="col-sm-6">
                <table class="table table-borderless table-striped table-sm">
                  <thead>
                    <tr>
                      <th width="1%">#</th>
                      <th width="20%" colspan="2">Komponen Biaya</th>
                      <th width="10%">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Cuti</td>
                      <td>:</td>
                      <td>Rp. <?= $mahasiswa['cuti']; ?></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>DPP</td>
                      <td>:</td>
                      <td>Rp. <?= $mahasiswa['dpp']; ?></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Almamater</td>
                      <td>:</td>
                      <td>Rp. <?= $mahasiswa['almamater']; ?></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>PSPT</td>
                      <td>:</td>
                      <td>Rp. <?= $mahasiswa['pspt']; ?></td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>Kerja Panjang (KP)</td>
                      <td>:</td>
                      <td>Rp. <?= $mahasiswa['kp']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-sm-6">
                <table class="table table-borderless table-striped table-sm">
                  <thead>
                    <tr>
                      <th width="1%">#</th>
                      <th width="20%" colspan="2">Komponen Biaya</th>
                      <th width="10%">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>6.</td>
                      <td>Perpanjang KP</td>
                      <td>:</td>
                      <td>Rp. <?= $mahasiswa['pkp']; ?></td>
                    </tr>
                    <tr>
                      <td>7.</td>
                      <td>Tugas Akhir (TA)</td>
                      <td>:</td>
                      <td>Rp. <?= $mahasiswa['ta']; ?></td>
                    </tr>
                    <tr>
                      <td>8.</td>
                      <td>Perpanjang TA</td>
                      <td>:</td>
                      <td>Rp. <?= $mahasiswa['pta']; ?></td>
                    </tr>
                    <tr>
                      <td>9.</td>
                      <td>SPP</td>
                      <td>:</td>
                      <td>Rp. <?= $mahasiswa['spp']; ?></td>
                    </tr>
                    <tr>
                      <td>10.</td>
                      <td>Denda</td>
                      <td>:</td>
                      <td>Rp. <?= $mahasiswa['denda']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div> <!-- end row tabel -->

            <!-- row payment -->
            <div class="row">
              <div class="col-6">
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
              <div class="col-6">
                <p class="lead">Batas Pembayaran: <?php if (!$mahasiswa) : ?>
                    <b>-</b>
                  <?php else : ?>
                    <b style="color: red;"><?= date('t') . '/' . date('m') . '/' . date('Y'); ?></b></p>
              <?php endif; ?></p>

              <div class="table-responsive">
                <table class="table">
                  <tr class="h4">
                    <th style="width: 30%;"></th>
                    <th style="width:25%">Total</th>
                    <td>: Rp. <?= $mahasiswa['jumlah']; ?></td>
                  </tr>
                </table>
              </div>
              </div>
            </div> <!-- end row payment -->

            <!-- row print -->
            <div class="row no-print">
              <div class="col-9"></div>
              <div class="col-2">
                <a href="<?= base_url('mahasiswa/cetak_tagihan/') . $mahasiswa['nim']; ?>" target="_blank" class="btn btn-primary btn-block float-right"><i class="fas fa-print"></i> Cetak</a>
              </div>
            </div>
          </div>


        </div>
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->