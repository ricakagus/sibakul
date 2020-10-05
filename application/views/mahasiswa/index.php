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
            <div class="card-header">
              <!-- <h3 class="card-title">Daftar Mahasiswa</h3> -->
              <a class="btn btn-primary btn-sm" href="<?= base_url('admin/tambahMahasiswa/'); ?>" role="button">
                <i class="fas fa-plus"></i>
                Tambah Data Mahasiswa
              </a>
              <a class="btn btn-success btn-sm" href="<?= base_url('admin/uploadMahasiswa'); ?>" role="button">
                <i class="fas fa-upload"></i>
                Import Data Mahasiswa
              </a>
              <div class="float-right">
                <form class="form-inline ml-3" action="<?= base_url('admin/mahasiswa'); ?>" method="POST">
                  <div class="input-group input-group-sm">
                    <input class="form-control" placeholder="Search" type="search " aria-label="Search" name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                      <input class="btn btn-primary" type="submit" name="cari" value="Cari">
                      <!-- <i class='fas fa-search'></i> -->
                      </input>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <table id="example2" class="table table-hover projects table-sm">
                <thead class="bg-gray-dark">
                  <tr>
                    <th style="width: 1%">#</th>
                    <th style="width: 14%">NIM</th>
                    <th style="width: 30%">Nama</th>
                    <th style="width: 10%">Foto</th>
                    <th style="width: 8%" class="text-center">Status</th>
                    <th style="width: 14%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($mahasiswa as $mhs) : ?>
                    <tr>
                      <td><?= ++$start; ?></td>
                      <td><?= $mhs['nim']; ?></td>
                      <td><?= $mhs['nama']; ?></td>
                      <td>
                        <img alt="Avatar" class="table-avatar" src="<?= base_url('assets/img/profil/') . $mhs['image']; ?>">
                      </td>
                      <td class="project-state">
                        <?php if ($mhs['actived'] == 1) : ?>
                          <span class="badge badge-success">Active</span>
                        <?php elseif ($mhs['actived'] == 2) : ?>
                          <span class="badge badge-warning">Request</span>
                        <?php else : ?>
                          <span class="badge badge-danger">Deactive</span>
                        <?php endif; ?>
                      </td>
                      <td class="project-actions text-left">
                        <a class="btn btn-primary btn-sm " href="<?= base_url('admin/detailMahasiswa/') . $mhs['nim']; ?>">
                          <i class="fas fa-eye">
                          </i>
                        </a>
                        <!-- <a class="btn btn-info btn-sm" href="#">
                          <i class="fas fa-pencil-alt"></i>
                        </a> -->
                        <a class="btn btn-danger btn-sm" href="<?= base_url('admin/hapusMahasiswa/') . $mhs['nim']; ?>" onclick="return confirm('hapus data, yakin?');">
                          <i class="fas fa-trash-alt">
                          </i>

                        </a>
                      </td>
                    </tr>
                    <?php //$i++; 
                    ?>
                  <?php endforeach; ?>
                </tbody>
              </table>

              <nav aria-label="Page navigation example">
                <?= $this->pagination->create_links(); ?>
              </nav>
            </div>
          </div>
        </div>
      </div>



    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->