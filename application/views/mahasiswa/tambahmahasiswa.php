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
        <div class="col-md-4">
          <div class="card card-primary card-outline">
            <div class="card-header">
              
              <h3 class="card-title">Tambah Data Mahasiswa</h3>

              <div class="float-right">
                <a class="btn btn-primary btn-sm" href="<?= base_url('admin/mahasiswa/'); ?>" role="button">
                  <i class="fas fa-arrow-left">
                  </i>
                </a>
              </div>
            </div>
            <?= $this->session->flashdata('pesan'); ?>

            <form role="form" class="projects" method="POST" action="<?= base_url('admin/tambahmahasiswa/'); ?>">
              <div class="card-body">
                <div class="form-group">
                  <!-- <label for="nim">NIM</label> -->
                  <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM">
                  <?= form_error('nim', '<small class=text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <!-- <label for="nama">Nama Lengkap</label> -->
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                  <?= form_error('nama', '<small class=text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <!-- <label for="prodi">Program Studi</label> -->
                  <select class="form-control" id="prodi" name="prodi">
                    <option value="-"><span class="text-muted">Program Studi</span> </option>
                    <?php foreach ($prodi as $p) : ?>
                      <option value="<?= $p; ?>"><?= $p; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <!-- <label for="nohp">No HP</label> -->
                  <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No HP">
                  <?= form_error('nohp', '<small class=text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block">simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>



    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->