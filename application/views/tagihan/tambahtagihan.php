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
            <div class="card-header bg-secondary">
              <div class="row">
                <div class="col-md-4">
                  <h3 class="card-title">Tambah Data Tagihan</h3>
                </div>
                <div class="col-md-6">
                  <p class="card-title">NO.TAGIHAN : <b><?= $idTgh; ?></b></p>
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
            <form role="form" class="projects" method="POST" action="<?= base_url('admin/tambahTagihan/') . $mahasiswa['nim'] ?>">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="<?= $mahasiswa['nim']; ?>">
                        <?= form_error('nim', '<small class=text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $mahasiswa['nama']; ?>">
                        <?= form_error('nama', '<small class=text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <select name="bulan" id="bulan" class="form-control">
                          <option value="">-pilih bulan-</option>
                          <?php foreach ($bulan as $b) : ?>
                            <?php if ($noBulan == $b['id']) : ?>
                              <option value="<?= $b['bulan']; ?>" selected><?= $b['bulan']; ?></option>
                            <?php else : ?>
                              <option value="<?= $b['bulan']; ?>"><?= $b['bulan']; ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="<?= $noTahun; ?>">
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item bg-secondary">
                  <div class="card-title">Komponen Biaya</div>
                  <!-- <div class="col-md-6 float-right">
                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="JUMLAH">
                  </div> -->
                </li>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Cuti</label>
                        <input type="text" class="form-control" id="cuti" name="cuti" placeholder="0">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">DPP</label>
                        <input type="text" class="form-control" id="dpp" name="dpp" placeholder="0">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Almamater</label>
                        <input type="text" class="form-control" id="almamater" name="almamater" placeholder="0">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">PSPT</label>
                        <input type="text" class="form-control" id="pspt" name="pspt" placeholder="0">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Kerja Praktek (KP)</label>
                        <input type="text" class="form-control" id="kp" name="kp" placeholder="0">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Denda</label>
                        <input type="text" class="form-control" id="denda" name="denda" placeholder="0">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Perpanjang KP</label>
                        <input type="text" class="form-control" id="pkp" name="pkp" placeholder="0">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Tugas Akhir (TA)</label>
                        <input type="text" class="form-control" id="ta" name="ta" placeholder="0">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Perpanjang TA</label>
                        <input type="text" class="form-control" id="pta" name="pta" placeholder="0">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">SPP</label>
                        <input type="text" class="form-control" id="spp" name="spp" placeholder="0">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Konversi</label>
                        <input type="text" class="form-control" id="konversi" name="konversi" placeholder="0">
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="col-md-4 float-right">
                    <button type="submit" class="btn btn-primary btn-block ">simpan</button>
                  </div>

                </li>

              </ul>


            </form>
          </div>
        </div>
        <!-- / end rincian tagihan -->


        <!-- begin rekap tagihan -->
        <div class="col-lg-4 col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header bg-secondary">
              <div class="row">
                Rekap Tagihan
              </div>
      
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


<!-- SCRIPT untuk membuat input otomatis menjulah -->
<!-- <script type="text/javascript" src="<?= base_url('assets'); ?>/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#jumlah, #harga").keyup(function() {
      var cuti = $("#cuti").val();
      var almamater = $("#almamater").val();

      var jumlah = parseInt(cuti) + parseInt(almamater);
      $("#jumlah").val(jumlah);
    });
  });
</script> -->