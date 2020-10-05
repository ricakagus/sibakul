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
            <?php if ($tagihan['status'] == '2') : ?>
              <div class="card-header bg-danger">
              <?php else : ?>
                <div class="card-header">
                <?php endif; ?>

                <span class="">ID TAGIHAN:</span><br>
                <?php if (!$tagihan) : ?>
                  <small class="h6 text-right text-success">-</small>
                <?php else : ?>
                  <span class="h3 text-right"># <?= $tagihan['id_tagihan']; ?> #</span>
                <?php endif; ?>

                </div>
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open_multipart('mahasiswa/bayarkuliah'); ?>

                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <?php if (!$tagihan) : ?>
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
                      <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah dibayarkan" value="<?= $tagihan['jumlah']; ?>" readonly>
                        <?= form_error('jumlah', '<small class=text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="bukti" class="col-sm-3 col-form-label">Bukti Bayar</label>
                      <div class="col-sm-9">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="bukti" name="bukti">
                          <label class="custom-file-label" for="bukti">pilih file</label>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item text-center">
                    <?php if (!$tagihan) : ?>
                      <button type="submit" class="btn btn-primary mt-2 mb-2 " disabled><i class="fas fa-fw fa-file-upload"></i> upload bukti bayar</button>
                    <?php else : ?>
                      <button type="submit" class="btn btn-primary mt-2 mb-2 "><i class="fas fa-fw fa-file-upload"></i> upload bukti bayar</button>
                    <?php endif; ?>
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