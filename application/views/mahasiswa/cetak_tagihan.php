<div class="wrapper">
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row pt-5">
        <div class="col-12">

          <div class="invoice p-3 mb-3">
            <div class="row">
              <div class="col-1 ml-2">
                <img src="<?= base_url('assets/img/') . 'logo-sbb-bg-white.jpg'; ?>" class="rounded" height="50px">
              </div>
              <div class="col-10">
                <p class="h2 ml-4 mt-2"> STMIK BANDUNG BALI
                  <small class="float-right h6"><?= date('d F Y', $mahasiswa['created']); ?></small>
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
                <b>No.Tagihan #<?= $mahasiswa['id_tagihan'];  ?></b><br>
                <b>Batas Pembayaran:</b> <?= date('t') . '/' . date('m') . '/' . date('Y'); ?> <br>
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
                <p class="lead">Batas Pembayaran:
                  <b style="color: red;"><?= date('t') . '/' . date('m') . '/' . date('Y'); ?></b>
                </p>

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

          </div>


        </div>
      </div>
      <hr>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

  <!-- ./wrapper -->

  <script type="text/javascript">
    window.addEventListener("load", window.print());
  </script>
  </body>

  </html>