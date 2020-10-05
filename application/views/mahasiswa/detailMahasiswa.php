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
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Detail Data Mahasiswa</h3>

                <div class="float-right">
                  <a class="btn btn-primary btn-sm" href="<?= base_url('admin/mahasiswa/'); ?>" role="button">
                    <i class="fas fa-arrow-left">
                    </i>
                  </a>
                </div>
              </div>
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/profil/') . $mahasiswa['image']; ?>">
                </div>

                <h3 class="profile-username text-center"><?= $mahasiswa['nama']; ?></h3>

                <p class="text-muted text-center"><?= $mahasiswa['nim']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Program Studi</b> <a class="float-right"><?= $mahasiswa['prodi']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>No HP</b> <a class="float-right"><?= $mahasiswa['noHp']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Status Aktif</b>
                    <?php if ($mahasiswa['actived'] == 1) : ?>
                      <a class="float-right badge badge-success text-white" href="<?= base_url('admin/rubahStatusMahasiswa/') . $mahasiswa['nim']; ?>" onclick="return confirm('rubah status, yakin?');">Active</a>
                    <?php else : ?>
                      <a class="float-right badge badge-danger text-white" href="<?= base_url('admin/rubahStatusMahasiswa/') . $mahasiswa['nim']; ?>" onclick="return confirm('reset status, yakin?');">Deactive</a>
                    <?php endif; ?>

                  </li>
                </ul>
                <?php if ($mahasiswa['actived'] == 2) : ?>
                  <a href="<?= base_url('admin/resetPasswordMahasiswa/') . $mahasiswa['nim']; ?>" class="btn btn-warning btn-block" onclick="return confirm('reset password, yakin?');"><b>reset password</b></a>
                <?php else : ?>
                  <a href="<?= base_url('admin/resetPasswordMahasiswa/') . $mahasiswa['nim']; ?>" class="btn btn-primary btn-block disable" onclick="return confirm('reset password, yakin?');"><b>reset password</b></a>
                <?php endif; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->