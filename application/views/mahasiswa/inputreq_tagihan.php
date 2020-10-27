<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-0">
        <div class="col-sm-8">
          <h1 class="m-0 text-dark"><?= $judul; ?></h1>
          <?= $this->session->flashdata('pesan'); ?>
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

            <form action="<?= base_url('mahasiswa/inputReqTagihan'); ?>" method="POST">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Periode</label>
                      <?php foreach ($bulan as $b) :
                        if ($b['id'] == $totaltgh['bulan']) :
                          $namabulan = $b['bulan'];
                        endif;
                      endforeach;
                      ?>
                      <input type="text" class="form-control" name="periode" readonly value="<?= $namabulan . ' ' . $totaltgh['tahun']; ?>">
                    </div>
                    <div class="form-group">
                      <label>NIM</label>
                      <input type="text" class="form-control" name="nim" readonly value="<?= $totaltgh['nim']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama" readonly value="<?= $totaltgh['nama']; ?>">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <label for="">Request Tagihan</label>


                    <div class="row">
                      <div class="col-sm-8">
                        <?= form_error('pesan_req', '<small class=text-danger pl-3">', '</small>'); ?>
                        <span class="d-block">Menjadi:</span>
                        <div class="input-group input-group-sm">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                          </div>
                          <input type="number" class="form-control" name="pesan_req" placeholder="0">
                          <small class="ml-1 font-italic text-danger">hanya input angka tanpa tanda titik atau koma</small>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label>Pesan untuk Admin:</label>
                          <textarea class="form-control" rows="3" name="pesan_mhs" placeholder="isi pesan ..."></textarea>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row d-flex justify-content-between">
                  <div class="col-4 float-left">
                    <a href="<?= base_url('mahasiswa/tagihan'); ?>" type="button" class="btn btn-block btn-danger float-right"><i class="fas fa-undo-alt"></i> Batal</a>
                  </div>

                  <div class="col-4">
                    <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-fw fa-paper-plane"></i>kirim</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.card-body -->

      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->