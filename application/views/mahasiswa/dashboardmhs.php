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
        <div class="col-8">
          <div class="callout callout-info">
            <h4>Selamat Datang <a href="<?= base_url('user'); ?>" style="text-decoration: none;" class="text-primary"> <?= $mahasiswa['nama']; ?></a>!</h4>
          </div>
          <div class="card">
            <div class="card-body">
              <p><b>SIBAKUL</b> adalah Sistem Informasi Bayar Kuliah</p>
              <p>SIBAKUL akan memberikan anda informasi tentang besaran tagihan biaya kuliah anda pribadi. Selain itu juga SIBAKUL dapat anda gunakan untuk melaporkan bahwa anda telah membayar tagihan biaya kuliah dengan cara mengunggah (upload) bukti setoran bank melalui menu Bayar Kuliah</p>
              <p><b>Pentunjuk:</b></p>
              <ul>
                <li>Untuk memulai aplikasi ini silahkan klik <b>Menu</b> dipojok kiri atas.</li>
                <li>Untuk melihat tagihan anda pilih menu <b>Tagihan</b>.</li>
                <li>Untuk mengupload bukti pembayaran kuliah pilih <b>Bayar Kuliah</b>.</li>
                <li>Untuk melihat dan mengubah profil anda pilih menu <b>Profil Saya</b>.</li>
                <li>Untuk mengganti password anda pilih menu <b>Ganti Password</b>.</li>
                <li>Untuk keluar dari aplikasi ini (Sign Out) pilih teks <b>Keluar</b> di pojok kanan atas.</li>
              </ul>

              <p>~<b>Terima Kasih</b>~</p>
              <a href="www.stmikbandungbali.ac.id">STMIK Bandung Bali</a>
            </div>
          </div>
        </div>
      </div>


    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->