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

        <div class="col-md-10">
          <?= $this->session->flashdata('pesan'); ?>
          <div class="card card-primary card-outline">

            <div class="card-header pb-0">

              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-sm">
                <i class="fas fa-plus"></i>
                Tambah Data Tagihan
              </button>
              <!-- <a href="<?= base_url('admin/uploadTagihan'); ?>" class="btn btn-success btn-sm" role="button">
                <i class="fas fa-upload"></i>
                Import Data Tagihan
              </a> -->

              <div class="float-right">
                <form class="form-inline ml-3 mb-0" action="<?= base_url('admin/tagihan'); ?>" method="POST">
                  <div class="input-group input-group-sm">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                      <input class="btn btn-primary" type="submit" name="cari" value="Cari">
                      <!-- <i class="fas fa-search"></i> -->
                      </input>
                    </div>
                  </div>
                </form>
                <small class="ml-4 mt-0 text-danger " style="font-size: 11px;"><i>pencarian bulan gunakan angka</i></small>
              </div>

            </div> <!-- /.end card-header -->

            <div class="card-body p-0">
              <table id="example2" class="table table-hover projects table-sm table-striped">
                <thead>
                  <tr class="bg-dark">
                    <th style="width: 1%">#</th>
                    <th style="width: 16%">Periode Tagihan</th>
                    <th style="width: 10%">NIM</th>
                    <th style="width: 30%">Nama</th>
                    <th style="width: 14%">Total</th>
                    <th style="width: 8%" class="text-center">Status</th>
                    <th style="width: 10%">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($tagihan as $tgh) : ?>
                    <tr>
                      <td><?= ++$start; ?></td>

                      <?php
                      foreach ($bulan as $b) :
                        if ($tgh['bulan'] == $b['id']) :
                          $namabulan = $b['bulan'];
                        endif;
                      endforeach;
                      ?>
                      <td>
                        <?= $namabulan . ' ' . $tgh['tahun']; ?>
                      </td>

                      <td><?= $tgh['nim']; ?></td>
                      <td><?= $tgh['nama']; ?></td>
                      <td>Rp. <?= number_format($tgh['total'], '0', ',', '.'); ?></td>

                      <td class="project-state">
                        <?php if ($tgh['status'] == 0) : ?>
                          <span class="badge badge-pill badge-success">bill</span>
                        <?php elseif ($tgh['status'] == 2) : ?>
                          <span class="badge badge-pill badge-danger">rejected</span>
                        <?php else : ?>
                          <a href="<?= base_url('admin/pembayaran/'); ?>" class="badge badge-pill badge-warning">paid</a>
                        <?php endif; ?>
                      </td>
                      <td class="project-actions text-left">
                        <a class="btn btn-primary btn-sm" href="<?= base_url('admin/rincianTagihan/') . $tgh['nim']; ?>" title="detail">
                          <i class="fas fa-eye"></i>
                        </a>
                        <!-- <a class="btn btn-info btn-sm" href="#">
                          <i class="fas fa-pencil-alt"></i>
                        </a> -->

                        <a class="btn btn-danger btn-sm" href="<?= base_url('admin/hapusTagihan/') . $tgh['nim']; ?>" onclick="return confirm('hapus data tagihan, yakin?');" title="hapus">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <br>
              <nav aria-label="Page navigation example">
                <?= $this->pagination->create_links(); ?>
              </nav>
            </div> <!-- /.card-body -->

          </div> <!-- /end card-primary -->

        </div>
      </div>
    </div> <!-- end container fluid -->
  </div> <!-- end content -->

</div> <!-- end content-wrapper -->



<!-- modal -->
<div class="modal fade" id="modal-sm">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-secondary">

      <div class="modal-body">
        <form class="form-inline ml-4" action="<?= base_url('admin/cariMahasiswa/'); ?>" method="POST">
          <div class="input-group">
            <input class="form-control" type="search" placeholder="Search NIM..." aria-label="Search" name="searchNIM">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- end modal -->