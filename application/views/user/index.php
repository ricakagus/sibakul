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
      <div class="row">
        <div class="col-md-4">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/profil/') . $user['image']; ?>">
              </div>

              <h3 class="profile-username text-center"><?= $user['nama']; ?></h3>

              <p class="text-muted text-center font-weight-bold h6"># <?= $user['nim']; ?> #</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Program Studi</b> <a class="float-right"><?= $user['prodi']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>No HP</b> <a class="float-right"><?= $user['noHp']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Status Aktif</b>
                  <?php if ($user['actived'] == 1) : ?>
                    <span class="float-right badge badge-success text-white">Active</span>
                  <?php else : ?>
                    <span class="float-right badge badge-danger text-white">Deactive</span>
                  <?php endif; ?>

                </li>
              </ul>

              <a href="<?= base_url('user/edit/'); ?>" class="btn btn-primary btn-block"><b>ubah profil</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->