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
        <!-- begin rincian tagihan -->
        <div class="col-lg-8 col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header  bg-secondary">
              <div class="row">
                <div class="col-md-4">
                  <h3 class="card-title">Ubah Data Tagihan</h3>
                </div>
                <div class="col-md-6">
                  <p class="card-title">NO.TAGIHAN : <b><?= $tagihan['id_tagihan']; ?></b></p>
                </div>
                <div class="col-md-2">
                  <div class="float-right">
                    <a class="btn btn-primary btn-sm" href="<?= base_url('admin/tagihan/'); ?>" role="button">
                      <i class="fas fa-arrow-left">
                      </i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <?= $this->session->flashdata('pesan'); ?>
            <form role="form" class="projects" method="POST" action="<?= base_url('admin/ubahtagihan/') . $tagihan['id_tagihan'] ?>">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="<?= $tagihan['nim']; ?>" readonly>
                        <?= form_error('nim', '<small class=text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $tagihan['nama']; ?>" readonly>
                        <?= form_error('nama', '<small class=text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <!-- <label for="nim">NIM</label> -->
                        <select name="bulan" id="bulan" class="form-control" disabled>
                          <option value="">-pilih bulan-</option>
                          <?php foreach ($bulan as $b) : ?>
                            <?php if ($tagihan['bulan'] == $b['id']) : ?>
                              <option value="<?= $b['id']; ?>" selected><?= $b['bulan']; ?></option>
                            <?php else : ?>
                              <option value="<?= $b['id']; ?>"><?= $b['bulan']; ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="<?= $tagihan['tahun']; ?>" readonly>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item bg-secondary">
                  <div class="card-title">Komponen Biaya</div>

                  <div class="col-md-6 float-right">Jumlah: Rp. <span class="h4 font-weight-bold"><?= number_format($tagihan['jumlah'], '0', ',', '.'); ?>,-</span></div>


                </li>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Cuti</label>
                        <input type="text" class="form-control" id="cuti" name="cuti" placeholder="Cuti" value="<?= $tagihan['cuti']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">DPP</label>
                        <input type="text" class="form-control" id="dpp" name="dpp" placeholder="DPP" value="<?= $tagihan['dpp']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Almamater</label>
                        <input type="text" class="form-control" id="almamater" name="almamater" placeholder="Almamater" value="<?= $tagihan['almamater']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">PSPT</label>
                        <input type="text" class="form-control" id="pspt" name="pspt" placeholder="PSPT" value="<?= $tagihan['pspt']; ?>"">
                      </div>
                      <div class=" form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Kerja Praktek (KP)</label>
                        <input type="text" class="form-control" id="kp" name="kp" placeholder="KP" value="<?= $tagihan['kp']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Denda</label>
                        <input type="text" class="form-control" id="denda" name="denda" placeholder="Denda" value="<?= $tagihan['denda']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Perpanjang KP</label>
                        <input type="text" class="form-control" id="pkp" name="pkp" placeholder="Perpanjang KP" value="<?= $tagihan['pkp']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Tugas Akhir (TA)</label>
                        <input type="text" class="form-control" id="ta" name="ta" placeholder="TA" value="<?= $tagihan['ta']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Perpanjang TA</label>
                        <input type="text" class="form-control" id="pta" name="pta" placeholder="Perpanjang TA" value="<?= $tagihan['pta']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">SPP</label>
                        <input type="text" class="form-control" id="spp" name="spp" placeholder="SPP" value="<?= $tagihan['spp']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Konversi</label>
                        <input type="text" class="form-control" id="konversi" name="konversi" placeholder="konversi" value="<?= $tagihan['konversi']; ?>">
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="row justify-content-between align-item-end">
                    <div class="col-md-8">
                      <p><b>date created:</b> <i><?= date('d F Y', $tagihan['created']); ?></i></p>
                    </div>
                    <div class="col-md-4 float-right">
                      <button type="submit" class="btn btn-primary btn-block ">ubah</button>
                    </div>
                  </div>

                </li>

              </ul>


            </form>
          </div>
        </div>

        <!-- begin rekap tagihan -->
        <div class="col-lg-4 col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header bg-secondary">
              <div class="row">
                Rekap Tagihan
              </div>
              <!-- <div class="row">
                <small>
                  <b> <?= $mahasiswa['nim'] . ' - ' . $mahasiswa['nama']; ?></b>
                </small>
              </div> -->
            </div>
            <div class="card-body pt-2">
              <div class="row d-flex align-items-end pb-2">
                <div class="col-md-4 ">
                  <span class="h4">Total:</span>
                </div>
                <div class="col-md-8 text-right">
                  <span class="h3 text-danger">Rp. <?= number_format($total['jumlah'], '0', ',', '.'); ?> </span>
                </div>
              </div>
              <div class="row">
                <table class="table table-borderless table-striped table-sm ">
                  <tbody>
                    <?php foreach ($rincian as $r) : ?>
                      <tr>
                        <?php foreach ($bulan as $b) :
                          if ($r['bulan'] == $b['id']) :
                            $namabulan = $b['bulan'];
                          endif;
                        endforeach;
                        ?>

                        <td style="width: 40%;"><?= $namabulan . ' ' . $r['tahun'];; ?></td>
                        <td style="width: 10%;">:</td>
                        <td class="text-right"><?= number_format($r['jumlah'], '0', ',', '.');  ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- / end rekap tagihan -->
      </div>


    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->