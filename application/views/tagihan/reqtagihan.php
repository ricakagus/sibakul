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
        <div class="col-md-12">
          <?= $this->session->flashdata('pesan'); ?>
          <div class="card card-primary card-outline">
            <div class="card-header">

              <div class="float-right">
                <form class="form-inline ml-3" action="<?= base_url('admin/tagihan'); ?>" method="POST">
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

              <table id="example2" class="table table-hover projects table-bordered ">
                <thead>
                  <tr class="bg-dark">
                    <th style="width: 1%;">#</th>
                    <th style="width: 10%;">Date Req</th>
                    <th style="width: 10%;">ID Tagihan</th>
                    <th style="width: 20%;">Nama</th>
                    <th style="width: 30%;">Pesan</th>
                    <th style="width: 9%;">Sisa Req</th>
                    <th class="text-center" style="width:1%">Status</th>
                    <th style="width: 12%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($reqTagihan as $rtg) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= date('d/m/Y', $rtg['date_req']); ?></td>
                      <td><?= $rtg['id_tagihan']; ?></td>
                      <td><?= $rtg['nama']; ?></td>
                      <td><?= $rtg['pesan_req']; ?></td>
                      <td><?= $rtg['sisa_req']; ?></td>
                      <td>
                        <?php if ($rtg['status'] == 0) : ?>
                          <span class="badge badge-warning m-0">request</span>
                        <?php elseif ($rtg['status'] == 1) : ?>
                          <span class="badge badge-success m-0">approve</span>
                        <?php else : ?>
                          <span class="badge badge-danger m-0">reject</span>
                        <?php endif; ?>
                      </td>
                      <td class="project-actions text-left">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default<?= $rtg['id_tagihan']; ?>">
                          <i class="fas fa-eye"></i>
                        </button>
                        <!-- <a class="btn btn-info btn-sm" href="#">
                          <i class="fas fa-pencil-alt"></i>
                        </a> -->
                        <a class="btn btn-danger btn-sm" href="" onclick="return confirm('hapus data, yakin?');">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
          </div> <!-- /.card-outline -->
        </div>
      </div>

    </div><!-- /.container-fluid -->


    <!-- Awal Modal View -->
    <?php $i = 1; ?>
    <?php foreach ($reqTagihan as $rtg) : ?>
      <div class="modal fade" id="modal-default<?= $rtg['id_tagihan']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-secondary">
              <h4 class="modal-title">Request Tagihan: # <?= $rtg['id_tagihan']; ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md">
                  <div class="form-group">
                    <label for="inputNama">Nama</label>
                    <input type="text" class="form-control" id="inputNama" placeholder="nama" value="<?= $rtg['nama']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Pesan Pengajuan</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." readonly><?= $rtg['pesan_req']; ?></textarea>
                  </div>
                </div>

              </div>
              <div class="row d-flex justify-content-around">
                <div class="col-4 ">
                  <a href="<?= base_url('admin/rejectReq/') . $rtg['id_tagihan']; ?>" type="button" class="btn btn-danger btn-sm btn-block"><i class="fas fa-fw fa-times"></i> Reject</a>
                </div>
                <div class="col-4">
                  <a href="<?= base_url('admin/approveReq/') . $rtg['id_tagihan']; ?>" type="button" class="btn btn-primary btn-sm btn-block"><i class="fas fa-fw fa-check"></i> Approve</a>
                </div>
              </div>
            </div>
            <div class="modal-footer float-right">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <?php $i++; ?>
    <?php endforeach; ?>
    <!-- Akhir Modal View -->


  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->