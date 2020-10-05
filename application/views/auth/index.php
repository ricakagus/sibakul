<div class="login-box">
  <div class="login-logo">
    <img src="<?= base_url('assets/img/') . 'logo-sbb.jpg' ?>" width="180px" height="auto" class="mb-3">
    <a href="<?= base_url(); ?>">
      <h3><b>SIBAKUL</b></h3>
      <p class="h5">Sistem Informasi Bayar Kuliah</p>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Selamat datang, silahkan sign in</p>
      <?= $this->session->flashdata('pesan'); ?>
      <form action="<?= base_url('auth'); ?>" method="POST">
        <?= form_error('nim', '<small class="text-danger pl-3 mb-3">', '</small>'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="NIM" id="nim" name="nim">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-graduate"></span>
            </div>
          </div>
        </div>
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block ">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->

      <p class="mb-1 mt-3">
        <a href="<?= base_url('auth/lupaPassword') ?>"><small>Saya lupa password </small></a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->