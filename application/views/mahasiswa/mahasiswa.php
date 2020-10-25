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
        <div class="col-md-8">
          <?= $this->session->flashdata('pesan'); ?>
          <div class="card card-primary card-outline">
            <div class="card-header">

              <a href="<?= base_url('admin/tambahMahasiswa'); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Mahasiswa</a>

              <a href="<?= base_url('admin/uploadMahasiswa'); ?>" class="btn btn-success btn-sm"><i class="fas fa-upload"></i> Import Data Mahasiswa</a>

              <div class="float-right">
                <form class="form-inline ml-3 mb-0" action="<?= base_url('admin/mahasiswa'); ?>" method="POST">
                  <div class="input-group input-group-sm">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                      <input class="btn btn-primary" type="submit" name="cari" value="Cari">
                      <!-- <i class="fas fa-search"></i> -->
                      </input>
                    </div>
                  </div>
                </form>
              </div>


            </div>

            <div class="card-body p-0">
              <table id="example2" class="table table-hover projects table-sm table-striped">
                <thead class="bg-gray-dark">
                  <tr>
                    <th style="width: 1%">#</th>
                    <th style="width: 10%;">Image</th>
                    <th style="width: 10%">NIM</th>
                    <th style="width: 30%">Nama</th>
                    <th style="width: 8%">Aktif</th>
                    <th style="width: 10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($mahasiswa as $m) : ?>
                    <tr>
                      <td><?= ++$start; ?></td>
                      <td class="text-center">
                        <img alt="Avatar" class="table-avatar" src="<?= base_url('assets/img/profil/') . $m['image']; ?>">
                      </td>
                      <td><?= $m['nim']; ?></td>
                      <td><?= $m['nama']; ?></td>
                      <?php if ($m['actived'] == '1') : ?>
                        <td><span class="badge badge-success">active</span></td>
                      <?php else : ?>
                        <td><span class="badge badge-danger">deactive</span></td>
                      <?php endif; ?>
                      <td class="project-state">
                        <a class="btn btn-primary btn-sm" href="<?= base_url('admin/detailMahasiswa/') . $m['nim']; ?>"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-danger btn-sm" href="<?= base_url('admin/hapusMahasiswa/') . $m['nim']; ?>" onclick="return confirm('hapus data mahasiswa, yakin?');" title="hapus"><i class="fas fa-trash-alt"></i></a>

                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <br>
              <nav aria-label="Page navigation example">
                <?= $this->pagination->create_links(); ?>
              </nav>
            </div> <!-- end card body-->
          </div> <!-- end card-primary -->
        </div> <!-- end col-md-8 -->
      </div> <!-- end row -->





    </div> <!-- end container fluid -->
  </div> <!-- end container main content -->
</div> <!-- end content wrepper -->