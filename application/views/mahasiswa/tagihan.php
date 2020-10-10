<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-0">
        <div class="col-sm-8">
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
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="row d-flex justify-content-end">
                <div class="col-md-8   text-right">
                  <span class="h5">Total Tagihan:</span>
                  <span class="h1 px-2 rounded bg-danger"> Rp. <?= number_format($totaltgh['jumlah'], '0', ',', '.'); ?> </span>
                </div>
              </div>

            </div>

            <div class="card-body p-0">
              <table id="example2" class="table table-hover projects table-sm table-striped">
                <thead class="bg-gray-dark">
                  <tr>
                    <th style="width: 1%">#</th>
                    <th style="width: 10%;">ID Tagihan</th>
                    <th style="width: 16%">Periode Tagihan</th>
                    <th style="width: 14%">Jumlah</th>
                    <th style="width: 8%" class="text-center">Status</th>
                    <th style="width: 10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($tagihan as $tgh) : ?>
                    <tr>
                      <td><?= ++$start; ?></td>
                      <td><?= $tgh['id_tagihan']; ?></td>
                      <?php
                      foreach ($bulan as $b) :
                        if ($tgh['bulan'] == $b['id']) :
                          $namabulan = $b['bulan'];
                        endif;
                      endforeach;
                      ?>
                      <td><?= $namabulan . ' ' . $tgh['tahun']; ?></td>
                      <td>Rp. <?= number_format($tgh['jumlah'], '0', ',', '.'); ?></td>
                      <td class="project-state">
                        <?php if ($tgh['status'] == 0) : ?>
                          <span class="badge badge-warning">bill</span>
                        <?php elseif ($tgh['status'] == 2) : ?>
                          <span class="badge badge-danger">rejected</span>
                        <?php else : ?>
                          <span class="badge badge-success">paid</span>
                        <?php endif; ?>
                      </td>
                      <td class="project-actions text-left">
                        <a class="btn btn-primary btn-sm " href="<?= base_url('mahasiswa/detailtagihan/') . $tgh['id_tagihan']; ?>">
                          <i class="fas fa-eye">
                          </i>
                        </a>
                        <!-- <a class="btn btn-info btn-sm" href="#">
                          <i class="fas fa-pencil-alt"></i>
                        </a> -->
                        <!-- <a class="btn btn-danger btn-sm" href="<?= base_url('admin/hapusMahasiswa/') . $mhs['nim']; ?>" onclick="return confirm('hapus data, yakin?');">
                          <i class="fas fa-trash-alt">
                          </i>
                        </a> -->
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