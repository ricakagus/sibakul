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
          <div class="card card-secondary card-outline">
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


              <a href="#" class="btn btn-primary btn-block disabled"><b>ubah profil</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title"> Edit Profil</h3>
            </div>
            <?= form_open_multipart('user/edit'); ?>
            <div class="card-body">
              <div class="form-group row">
                <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="<?= $user['nim']; ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="nim" class="col-sm-3 col-form-label">Program Studi</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Program Studi" value="<?= $user['prodi']; ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $user['nama']; ?>">
                  <?= form_error('nama', '<small class=text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="nphp" class="col-sm-3 col-form-label">No HP</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nohape" name="nohape" placeholder="No HP" value="<?= $user['noHp']; ?>">
                  <?= form_error('nohape', '<small class=text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                <div class="col-sm-9">
                  <div class="row">
                    <div class="col-sm-12">
                      <input type="file" class="form-control-file col-sm-9 pb-0" id="foto" name="foto">
                      <small class="pl-2 text-danger">*format: *jpg, max: 1Mb, 1:1</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="offset-sm-2 col-sm-10">
                  <div class="row mt-2 mb-0 ">
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-success btn-block">simpan</button>
                    </div>
                    <div class="col-sm-4">
                      <a href="<?= base_url('user'); ?>" type="reset" class="btn btn-danger btn-block">batal</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>

    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->