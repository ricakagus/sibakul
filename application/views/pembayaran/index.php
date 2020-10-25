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
            <div class="card-header">

              <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-sm">
                <i class="fas fa-plus"></i>
                Tambah Data Tagihan
              </button> -->

              <div class="float-right">
                <form class="form-inline ml-3" action="" method="POST">
                  <div class="input-group input-group-sm">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="keyword">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">

              <table id="example2" class="table table-hover projects table-sm table-striped">
                <thead>
                  <tr class="bg-dark">
                    <th style="width: 1%">#</th>
                    <th style="width: 10%">Periode</th>
                    <th style="width: 10%">NIM</th>
                    <th style="width: 10%">Total</th>
                    <th style="width: 10%" class="text-center">Status</th>
                    <!-- <th style="width: 10%">Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($pembayaran as $pby) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td>
                        <?php
                        foreach ($bulan as $b) :
                          if ($pby['bulan'] == $b['id']) :
                            $namabulan = $b['bulan'];
                          endif;
                        endforeach;
                        ?>
                        <?= $namabulan . ' ' . $pby['tahun']; ?>
                      </td>
                      <td><?= $pby['nim']; ?></td>
                      <td class="">Rp. <?= number_format($pby['total'], '0', ',', '.'); ?></td>

                      <td class="project-state">
                        <?php if ($pby['status'] == 0) : ?>
                          <a href="<?= base_url('admin/cek_pembayaran/') . $pby['id']; ?>" class="badge badge-pill badge-warning">paid</a>
                        <?php elseif ($pby['status'] == '2') : ?>
                          <span class="badge badge-pill badge-danger">rejected</span>
                        <?php else : ?>
                          <span class="badge badge-pill badge-success">paid off</span>
                        <?php endif; ?>
                      </td>

                      <!-- TOMBOL ACTION -->
                      <!-- <td class="project-actions text-left">
                        <a class="btn btn-info btn-sm" href="<?= base_url('admin/ubahTagihan/') . $pby['nim']; ?>" onclick="return confirm('ubah data, yakin?');">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="<?= base_url('admin/hapusTagihan/') . $pby['nim']; ?>" onclick="return confirm('hapus data, yakin?');">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td> -->
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>

              </table>
            </div>
          </div>
        </div>




      </div> <!-- end Row -->

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
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->