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
          <div class="card card-primary card-outline">
            <div class="card-header  bg-secondary">
              <div class="row">
                <div class="col-md-4">
                  <h3 class="card-title">Ubah Data Tagihan</h3>
                </div>
                <div class="col-md-6">
                  <p class="card-title">NO.TAGIHAN : <b><?= $idTgh; ?></b></p>
                </div>
                <div class="col-md-2">
                  <div class="float-right">
                    <a class="btn btn-primary btn-sm" href="<?= base_url('admin/tagihan/'); ?>" role="button">
                      <i class="fas fa-arrow-left">
                      </i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <?= $this->session->flashdata('pesan'); ?>
            <form role="form" class="projects" method="POST" action="<?= base_url('admin/ubahtagihan/') . $mahasiswa['nim'] ?>">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="<?= $mahasiswa['nim']; ?>">
                        <?= form_error('nim', '<small class=text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $mahasiswa['nama']; ?>">
                        <?= form_error('nama', '<small class=text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <!-- <label for="nim">NIM</label> -->
                        <select name="bulan" id="bulan" class="form-control">
                          <option value="">-pilih bulan-</option>
                          <?php foreach ($bulan as $b) : ?>
                            <?php if ($mahasiswa['bulan'] == $b['id']) : ?>
                              <option value="<?= $b['id']; ?>" selected><?= $b['bulan']; ?></option>
                            <?php else : ?>
                              <option value="<?= $b['id']; ?>"><?= $b['bulan']; ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="<?= $mahasiswa['tahun']; ?>">
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item bg-secondary">
                  <div class="card-title">Komponen Biaya</div>

                  <div class="col-md-6 float-right">Rp. <span class="h4 font-weight-bold"><?= $mahasiswa['jumlah']; ?>,-</span></div>


                </li>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Cuti</label>
                        <input type="text" class="form-control" id="cuti" name="cuti" placeholder="Cuti" value="<?= $mahasiswa['cuti']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">DPP</label>
                        <input type="text" class="form-control" id="dpp" name="dpp" placeholder="DPP" value="<?= $mahasiswa['dpp']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Almamater</label>
                        <input type="text" class="form-control" id="almamater" name="almamater" placeholder="Almamater" value="<?= $mahasiswa['almamater']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">PSPT</label>
                        <input type="text" class="form-control" id="pspt" name="pspt" placeholder="PSPT" value="<?= $mahasiswa['pspt']; ?>"">
                      </div>
                      <div class=" form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Kerja Praktek (KP)</label>
                        <input type="text" class="form-control" id="kp" name="kp" placeholder="KP" value="<?= $mahasiswa['kp']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Perpanjang KP</label>
                        <input type="text" class="form-control" id="pkp" name="pkp" placeholder="Perpanjang KP" value="<?= $mahasiswa['pkp']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Tugas Akhir (TA)</label>
                        <input type="text" class="form-control" id="ta" name="ta" placeholder="TA" value="<?= $mahasiswa['ta']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Perpanjang TA</label>
                        <input type="text" class="form-control" id="pta" name="pta" placeholder="Perpanjang TA" value="<?= $mahasiswa['pta']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">SPP</label>
                        <input type="text" class="form-control" id="spp" name="spp" placeholder="SPP" value="<?= $mahasiswa['spp']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="cuti" class="ml-1 mb-0 small">Denda</label>
                        <input type="text" class="form-control" id="denda" name="denda" placeholder="Denda" value="<?= $mahasiswa['denda']; ?>">
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="row justify-content-between align-item-end">
                    <div class="col-md-8">
                      <p><b>date created:</b> <i><?= date('d F Y', $mahasiswa['created']); ?></i></p>
                    </div>
                    <div class="col-md-4 float-right">
                      <button type="submit" class="btn btn-primary btn-block ">ubah</button>
                    </div>
                  </div>

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