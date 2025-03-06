<?php
require_once __DIR__ . '/../../../middlewares/StudentMiddleware.php';
App\Middlewares\StudentMiddleware::check();

include 'includes/navbar.php';
include 'includes/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/assets/lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../public/assets/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../public/assets/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../public/assets/lte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/assets/lte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../public/assets/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../public/assets/lte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../public/assets/lte/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="../public/assets/lte/plugins/select2/css/select2.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>5</h3>
                <p>Files Uploaded</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-upload mr-2"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>1</h3>
                <p>Revisions</p>
              </div>
              <div class="icon">
                <i class="fas fa-edit mr-2"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>13</h3>
                <p>Document Versions</p>
              </div>
              <div class="icon">
                <i class="fas fa-copy mr-2"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>2</h3>
                <p>Viewed Documents</p>
              </div>
              <div class="icon">
                <i class="fas fa-eye mr-2"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->

  <h2 class="text-center display-4"> Search a Capstone</h2>
<form action="#">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold">Result Type:</label>
                        <select class="form-control form-control-lg select2" multiple="multiple" data-placeholder="Select type" style="width: 100%;">
                            <option>Text only</option>
                            <option>Images</option>
                            <option>Video</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold">Result Type:</label>
                        <select class="form-control form-control-lg select2" multiple="multiple" data-placeholder="Select type" style="width: 100%;">
                            <option>Text only</option>
                            <option>Images</option>
                            <option>Video</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold">Result Type:</label>
                        <select class="form-control form-control-lg select2" multiple="multiple" data-placeholder="Select type" style="width: 100%;">
                            <option>Text only</option>
                            <option>Images</option>
                            <option>Video</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-lg">
                    <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-lg btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>




<!-- jQuery -->
<script src="../public/assets/lte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../public/assets/lte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="../public/assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../public/assets/lte/plugins/chart.js/Chart.min.js"></script>
<script src="../public/assets/lte/plugins/sparklines/sparkline.js"></script>
<script src="../public/assets/lte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../public/assets/lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="../public/assets/lte/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="../public/assets/lte/plugins/moment/moment.min.js"></script>
<script src="../public/assets/lte/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../public/assets/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../public/assets/lte/plugins/summernote/summernote-bs4.min.js"></script>
<script src="../public/assets/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../public/assets/lte/dist/js/adminlte.js"></script>
<script src="../public/assets/lte/dist/js/demo.js"></script>
<script src="../public/assets/lte/dist/js/pages/dashboard.js"></script>
<script src="../public/assets/lte/plugins/select2/js/select2.full.min.js"></script>
<script src="../public/assets/lte/dist/js/adminlte.min.js"></script>
<script>
    $(function () {
      $('.select2').select2()
    });
</script>
</body>
</html>