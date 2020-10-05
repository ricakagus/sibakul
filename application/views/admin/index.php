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

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $qtyMhs['banyak']; ?> </h3>

              <p>Mahasiswa Terdaftar </p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
              <ion-icon name="people-circle-outline"></ion-icon>
            </div>
            <a href="<?= base_url('admin/mahasiswa'); ?>" class="small-box-footer">Info detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><span style="font-size: 20px;">Rp.</span> <?= number_format($sumTgh['jumlah'], 0, ',', '.'); ?><span style="font-size: 30px;">,-</span></h3>
              <p>Jumlah Tagihan</p>
            </div>
            <div class="icon">
              <i class="fas fa-money-check-alt"></i>
            </div>
            <a href="<?= base_url('admin/tagihan'); ?>" class="small-box-footer">Info detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $qtyBayar['bayar']; ?> <span style="font-size: 16px; font-weight: normal;">mahasiswa</span></h3>

              <p>Pembayaran Bulan Ini</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <a href="<?= base_url('admin/pembayaran'); ?>" class="small-box-footer">Info detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $qtyReq; ?></h3>

              <p>Request Perubahan</p>
            </div>
            <div class="icon">
              <i class="fas fa-envelope"></i>
            </div>
            <a href="<?= base_url('admin/reqtagihan'); ?>" class="small-box-footer">Info detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->


    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->