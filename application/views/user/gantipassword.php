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
        <div class="col-lg-6">
          <?= $this->session->flashdata('message'); ?>
          <div class="card card-primary card-outline">
            <div class="card-body">
              <form action="<?= base_url('user/gantipassword'); ?>" method="POST">
                <div class="form-group">
                  <label for="password_sekarang">Password Sekarang</label>
                  <input type="password" class="form-control" id="password_sekarang" name="password_sekarang">
                  <?= form_error('password_sekarang', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="password_baru1">Password Baru</label>
                  <input type="password" class="form-control" id="password_baru1" name="password_baru1">
                  <?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="password_baru2">Ulangi Password Baru</label>
                  <input type="password" class="form-control" id="password_baru2" name="password_baru2">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Ganti Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->