<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-0">
        <div class="col-sm-8">
          <h1 class="m-0 text-dark d-inline"><?= $judul; ?></h1>
          <small>
            <?php if ($totaltgh['status'] == '1') : ?>
              <span class="badge badge-warning">paid</span>
            <?php elseif ($totaltgh['status'] == '2') : ?>
              <span class="badge badge-danger">rejected</span>
            <?php endif; ?>
          </small>
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
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="row d-flex justify-content-between">

                <?php if (!$totaltgh) : ?>
                  <div class="col-md-7 col-lg-5 d-flex align-items-end">
                    <span class="text-success font-italic font-weight-bold">* tidak ada tagihan</span>
                  </div>
                <?php else : ?>
                  <?php if ($totaltgh['tahun'] == date('Y')) : ?>
                    <?php if ($totaltgh['bulan'] == date('m')) : ?>
                      <div class="col-md-7 col-lg-5 text-center">
                        <?php
                        if ($reqtgh) :

                          $id = $reqtgh['id'];
                          $sisa = $reqtgh['sisa_req'];
                          $status = $reqtgh['status'];
                        ?>
                          <?php if ($sisa == '2' and $status == '0') : ?>
                            <small class="text-dark ml-2">sedang diproses, sisa request <?= $sisa ?> kali</small>
                            <a href="<?= base_url('mahasiswa/editReqTagihan/') . $id; ?>" class="btn btn-warning btn-sm btn-block"><i class="far fa-fw fa-envelope"></i> Ubah Request</a>
                          <?php elseif ($sisa == '2' and $status == '1') : ?>
                            <small class="text-success ml-2">request disetujui, sisa request <?= $sisa ?> kali. <i><a href="" class="small" data-toggle="modal" data-target="#modal-pesanResp">lihat pesan admin</a></i></small>
                            <a href="<?= base_url('mahasiswa/editReqTagihan/') . $id; ?>" class="btn btn-success btn-sm btn-block"><i class="far fa-fw fa-envelope"></i> Request Tagihan</a>
                          <?php elseif ($sisa == '2' and $status == '2') : ?>
                            <small class="text-danger ml-2">request ditolak, sisa request <?= $sisa ?> kali. <i><a href="" class="small" data-toggle="modal" data-target="#modal-pesanResp">lihat pesan admin</a></i></small>
                            <a href="<?= base_url('mahasiswa/editReqTagihan/') . $id; ?>" class="btn btn-success btn-sm btn-block"><i class="far fa-fw fa-envelope"></i> Request Tagihan</a>
                          <?php elseif ($sisa == '1' and $status == '0') : ?>
                            <small class="text-dark ml-2">sedang diproses, sisa request <?= $sisa ?> kali</small>
                            <a href="<?= base_url('mahasiswa/editReqTagihan/') . $id; ?>" class="btn btn-warning btn-sm btn-block"><i class="far fa-fw fa-envelope"></i> Ubah Request</a>
                          <?php elseif ($sisa == '1' and $status == '1') : ?>
                            <small class="text-success ml-2">request disetujui, sisa request <?= $sisa ?> kali. <i><a href="" class="small" data-toggle="modal" data-target="#modal-pesanResp">lihat pesan admin</a></i></small>
                            <a href="<?= base_url('mahasiswa/editReqTagihan/') . $id; ?>" class="btn btn-success btn-sm btn-block"><i class="far fa-fw fa-envelope"></i> Request Tagihan</a>
                          <?php elseif ($sisa == '1' and $status == '2') : ?>
                            <small class="text-danger ml-2">request ditolak, sisa request <?= $sisa ?> kali. <i><a href="" class="small" data-toggle="modal" data-target="#modal-pesanResp">lihat pesan admin</a></i></small>
                            <a href="<?= base_url('mahasiswa/editReqTagihan/') . $id; ?>" class="btn btn-success btn-sm btn-block"><i class="far fa-fw fa-envelope"></i> Request Tagihan</a>
                          <?php elseif ($sisa == '0' and $status == '0') : ?>
                            <small class="text-dark ml-2">sedang diproses, sisa request <?= $sisa ?> kali</small>
                            <a href="<?= base_url('mahasiswa/editReqTagihan/') . $id; ?>" class="btn btn-warning btn-sm btn-block"><i class="far fa-fw fa-envelope"></i> Ubah Request</a>
                          <?php elseif ($sisa == '0' and $status == '1') : ?>
                            <small class="text-success ml-2">request disetujui, sisa request <?= $sisa ?> kali. <i><a href="" class="small" data-toggle="modal" data-target="#modal-pesanResp">lihat pesan admin</a></i></small>
                            <button type="button" class="btn btn-secondary btn-sm btn-block" disabled><i class="far fa-fw fa-envelope"></i> Request Tagihan</button>
                          <?php elseif ($sisa == '0' and $status == '2') : ?>
                            <small class="text-danger ml-2">request ditolak, sisa request <?= $sisa ?> kali. <i><a href="" class="small" data-toggle="modal" data-target="#modal-pesanResp">lihat pesan admin</a></i></small>
                            <button type="button" class="btn btn-secondary btn-sm btn-block" disabled><i class="far fa-fw fa-envelope"></i> Request Tagihan</button>

                          <?php endif; ?>
                        <?php else : ?>
                          <small class="text-dark ml-2">sisa request 2 kali</small>
                          <a href="<?= base_url('mahasiswa/inputReqTagihan'); ?>" class="btn btn-success btn-sm btn-block"><i class="far fa-fw fa-envelope"></i> Request Tagihan</a>
                        <?php endif; ?>
                      </div>
                    <?php else : ?>
                      <div class="col-md-7 col-lg-5 text-center">
                        <small class="text-danger ml-2">tidak dapat melakukan request tagihan</small>
                        <a href="<?= base_url('mahasiswa/inputReqTagihan'); ?>" class="btn btn-secondary btn-sm btn-block disabled"><i class="far fa-fw fa-envelope"></i> Request Tagihan</a>
                      </div>
                    <?php endif; ?>
                  <?php else : ?>
                    <div class="col-md-7 col-lg-5 text-center">
                      <small class="text-danger ml-2">tidak dapat melakukan request tagihan</small>
                      <a href="<?= base_url('mahasiswa/inputReqTagihan'); ?>" class="btn btn-secondary btn-sm btn-block disabled"><i class="far fa-fw fa-envelope"></i> Request Tagihan</a>
                    </div>
                  <?php endif; ?>
                <?php endif; ?>

                <div class="col-md-5 col-lg-7 text-right mt-3">
                  <span class="h5">Total :</span>
                  <span class="h2 px-2 rounded bg-danger"> Rp. <?= number_format($totaltgh['total'], '0', ',', '.'); ?> </span>

                </div>
              </div>

            </div>
            <div class="card-body p-0">
              <table id="example2" class="table table-hover table-responsive projects table-sm table-striped">
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


<div class="modal fade" id="modal-pesanResp">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h4 class="modal-title">Respon Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="card">
          <ul class="list-group">
            <li class="list-group-item  bg-light">
              <strong>Request Mahasiswa: </strong>
              <?php
              if ($reqtgh['jenis'] == 'minus') :
                $jenis = 'kurangi tagihan';
              elseif ($reqtgh['jenis'] == 'plus') :
                $jenis = 'tambah tagihan';
              endif;
              echo $jenis . ' menjadi Rp.' . number_format($reqtgh['pesan_req'], '0', ',', '.');
              ?>
            </li>
            <li class="list-group-item">
              <strong>Status Request: </strong>
              <?php
              if ($reqtgh['status'] == '1') :
                // $status = 'disetujui';
                echo "<span class='text-success'>disetujui</span>";
              // $status;
              elseif ($reqtgh['status'] == '2') :
                // $status = 'ditolak';
                echo "<span class='text-danger'>ditolak</span>";
              endif;

              ?>
            </li>
            <li class="list-group-item bg-light">
              <strong>Respon Admin: </strong>
              <?= $reqtgh['pesan_resp']; ?>

            </li>
          </ul>
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