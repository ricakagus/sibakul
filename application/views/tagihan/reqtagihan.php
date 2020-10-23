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
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">

              <table id="example2" class="table table-hover projects table-bordered table-sm ">
                <thead>
                  <tr class="bg-dark">
                    <th style="width: 1%;">#</th>
                    <th style="width: 10%;">Date Req</th>
                    <th style="width: 14%;">Periode</th>
                    <th style="width: 8%;">NIM</th>
                    <th style="width: 25%;">Nama</th>
                    <th style="width: auto;">Request</th>
                    <th style="width: 8%;" class="text-center">Sisa Req</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($reqTagihan as $rtg) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= date('d/m/Y', $rtg['date_req']); ?></td>
                      <td>
                        <?php
                        foreach ($bulan as $b) :
                          if ($b['id'] == $rtg['bulan']) :
                            $namabulan = $b['bulan'];
                          endif;
                        endforeach;
                        ?>
                        <?= $namabulan . ' ' . $rtg['tahun']; ?>
                      </td>
                      <td><?= $rtg['nim']; ?></td>
                      <td><?= $rtg['nama']; ?></td>
                      <td>
                        <?php if ($rtg['jenis'] == 'minus') : ?>
                          <i class="fas fa-minus-circle text-danger"></i> Rp. <?= number_format($rtg['pesan_req'], '0', ',', '.'); ?>
                        <?php elseif ($rtg['jenis'] == 'plus') : ?>
                          <i class="fas fa-plus-circle text-success"></i> Rp. <?= number_format($rtg['pesan_req'], '0', ',', '.'); ?>
                        <?php endif; ?>
                      </td>
                      <td class="text-center"><?= $rtg['sisa_req']; ?></td>
                      <td>
                        <?php if ($rtg['status'] == 0) : ?>
                          <span class="badge badge-warning m-0">request</span>
                        <?php elseif ($rtg['status'] == 1) : ?>
                          <span class="badge badge-success m-0">approve</span>
                        <?php else : ?>
                          <span class="badge badge-danger m-0">reject</span>
                        <?php endif; ?>
                      </td>
                      <td class="project-actions text-right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default<?= $rtg['nim']; ?>">
                          <i class="fas fa-eye"></i>
                        </button>
                        <a class="btn btn-danger btn-sm" href="" onclick="return confirm('hapus data, yakin?');">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div> <!-- /.card-outline -->
          </div> <!-- /.card-outline -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div> <!-- /. content -->

</div> <!-- /. content-wrapper -->


<!-- Awal Modal View -->
<?php $i = 1; ?>
<?php foreach ($reqTagihan as $rtg) : ?>
  <div class="modal fade" id="modal-default<?= $rtg['nim']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <h4 class="modal-title">Request Tagihan: # <?= $rtg['nim']; ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('admin/responReq/') . $rtg['id']; ?>" method="POST">
            <div class="card">
              <ul class="list-group">
                <li class="list-group-item">
                  <strong>Data Request:</strong>
                  <?php
                  $totaltgh = $this->db->get_where('tb_total_tagihan', ['nim' => $rtg['nim']])->row_array()['total'];
                  ?>
                  <ul class="list-unstyled">
                    <li><b><?= $rtg['nim'] . ' - ' . $rtg['nama']; ?></b></li>
                    <li>Total Tagihan: <b>Rp.<?= number_format($totaltgh, '0', ',', '.'); ?></b></li>
                    <?php if ($rtg['jenis'] == 'minus') : ?>
                      <li>Pesan: <span class="text-danger font-weight-bold">kurangi tagihan</span>, menjadi <b>Rp.<?= number_format($rtg['pesan_req'], '0', ',', '.'); ?></b></li>
                    <?php elseif ($rtg['jenis'] == 'plus') : ?>
                      <li>Pesan: <span class="text-success font-weight-bold">tambah tagihan</span>, menjadi <b>Rp.<?= number_format($rtg['pesan_req'], '0', ',', '.'); ?></b></li>
                    <?php endif; ?>
                  </ul>
                </li>
                <li class="list-group-item list-group-item-secondary">
                  <div class="form-group">
                    <span>Respon Untuk Mahasiswa:</span>
                    <input type="text" class="form-control" name="pesan_resp" value="<?= $rtg['pesan_resp']; ?>">
                  </div>
                </li>
                <li class="list-group-item ">
                  <div class="form-group">
                    <span>Catatan Admin:</span>
                    <input type="text" class="form-control" name="keterangan" value="<?= $rtg['keterangan']; ?>">
                  </div>
                </li>
                <li class="list-group-item list-group-item-secondary">
                  <?php if ($rtg['status'] == '0') : ?>
                    <div class="row d-flex justify-content-around">
                      <div class="col-4 ">
                        <button type="submit" class="btn btn-danger btn-sm btn-block" name="btn_resp" value="2"><i class="fas fa-fw fa-times"></i> Reject</button>
                      </div>
                      <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-sm btn-block" name="btn_resp" value="1"><i class="fas fa-fw fa-check"></i> Approve</button>
                      </div>
                    </div>
                  <?php endif; ?>
                </li>
              </ul>

            </div>
          </form>
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