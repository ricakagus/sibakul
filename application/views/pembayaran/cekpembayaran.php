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
        <div class="col-md-6">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <span class="">Periode Tagihan:</span><br>
              <?php if (!$pembayaran) : ?>
                <small class="h6 text-right text-success">-</small>
              <?php else : ?>
                <?php
                foreach ($bulan as $b) :
                  if ($pembayaran['bulan'] == $b['id']) :
                    $namabulan = $b['bulan'];
                  endif;
                endforeach;
                ?>

                <span class="h3 text-right"># <?= $namabulan . ' ' . $pembayaran['tahun']; ?> #</span>
              <?php endif; ?>

              <span class="badge badge-warning">paid</span>
            </div>
            <?= $this->session->flashdata('pesan'); ?>
            <?= form_open_multipart('admin/konfirm_pembayaran/' . $pembayaran['id']); ?>

            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <?php if (!$pembayaran['bukti']) : ?>
                  <small class="h6 text-right text-success">tidak ada tagihan</small>
                <?php else : ?>
                  <?php if ($pembayaran['bukti']) : ?>
                    <img src="<?= base_url('assets/img/buktibayar/') . $pembayaran['bukti']; ?>" class="rounded img-fluid mx-auto" name="fbukti">
                  <?php else : ?>
                    <img src="<?= base_url('assets/img/buktibayar/buktikosong.jpg');  ?>" class="rounded img-fluid mx-auto" name="fbukti">
                  <?php endif; ?>
                <?php endif; ?>
              </li>
              <li class="list-group-item">
                <div class="form-group row">
                  <label for="jumlah" class="col-sm-5 col-form-label">Total Tagihan:</label>
                  <label class="mt-2 mb-0 col-sm-5">Rp. <?= number_format($pembayaran['total'], '0', ',', '.'); ?></label>
                  <!-- <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah dibayarkan" value="<?= $pembayaran['jumlah']; ?>" readonly> -->
                  <?= form_error('jumlah', '<small class=text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group row">
                  <label for="status" class="col-sm-5 col-form-label">Status Pembayaran:</label>
                  <div class="icheck-success d-inline col-sm-3">
                    <input type="radio" name="rStatus" value="1" id="radioSuccess1">
                    <label for="radioSuccess1" class="text-success mr-5">accept
                    </label>
                  </div>
                  <div class="icheck-danger d-inline col-sm-2">
                    <input type="radio" name="rStatus" value="2" id="radioDanger1">
                    <label for="radioDanger1" class="text-danger">reject
                    </label>
                  </div>

                </div>

              </li>
              <li class="list-group-item text-center">
                <button type="submit" class="btn btn-primary mt-2 mb-2"><i class="fas fa-fw fa-file-upload"></i> Konfirmasi</button>
              </li>
            </ul>
            </form>

          </div>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->