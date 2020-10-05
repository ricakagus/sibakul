<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>img/logo4-sibakul.png">
  <title>SIBAKUL | <?= $judul; ?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/toastr/toastr.min.css">

  <!-- jQuery -->
  <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>

  <script>
    // script untuk file import
    $(document).ready(function() {
      // Sembunyikan alert validasi kosong
      $("#kosong").hide();
    });
  </script>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">