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
            <!-- <div class="card-header">
            </div> -->
            <form action="" method="POST">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>ID Tagihan</label>
                      <input type="text" class="form-control" name="idtagihan" readonly value="<?= $tagihan['id_tagihan']; ?>">
                    </div>
                    <div class="form-group">
                      <label>NIM</label>
                      <input type="text" class="form-control" name="nim" readonly value="<?= $tagihan['nim']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama" readonly value="<?= $tagihan['nama']; ?>">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Pesan Pengajuan</label>
                      <?= form_error('pesan_req', '<small class="font-italic text-danger pl-2">', '</small>'); ?>
                      <textarea class="form-control" rows="8" name="pesan_req" placeholder="Enter ..." readonly><?= $reqTagihan['pesan_req']; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="row d-flex justify-content-between">
                  <div class="col-4 float-left">
                    <a href="<?= base_url('mahasiswa/tagihan'); ?>" type="button" class="btn btn-block btn-danger float-right"><i class="fas fa-undo-alt"></i> Kembali</a>
                  </div>

                  <div class="col-4 float-right">
                    <small class="font-italic text-success">*ajuan telah disetujui admin</small>
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