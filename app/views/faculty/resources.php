<?php
require_once __DIR__ . '/../../../middlewares/FacultyMiddleware.php';
App\Middlewares\FacultyMiddleware::check();

include 'includes/navbar.php';
include 'includes/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Approved Research</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/assets/lte/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../public/assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/assets/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/assets/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/assets/lte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Capstone</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Faculty Resource Repository</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> -->
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 order-2 order-md-1">
              <h4>Activities</h4>
              <div class="post">
                <div class="user-block">
                  <!-- <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image"> -->
                  <span class="username"><a href="#">Bj Narag</a></span>
                  <span class="description">Shared - 7:45 PM today</span>
                </div>
                <p>Template for CPR1 .</p>
                <p><a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i>CPR1.DOCX</a></p>
              </div>
            </div>
            <div class="col-lg-4 order-1 order-md-2">
            <h3 class="text-primary"><i class="fas fa-book"></i> Template Basis for Capstone</h3>

              <!-- <p class="text-muted"></p> -->
              <h5 class="mt-5 text-muted">Project files</h5>
              <ul class="list-unstyled">
                <li><a href="#" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a></li>
                <li><a href="#" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a></li>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../public/assets/lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../public/assets/lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../public/assets/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../public/assets/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../public/assets/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../public/assets/lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../public/assets/lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../public/assets/lte/plugins/jszip/jszip.min.js"></script>
<script src="../public/assets/lte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../public/assets/lte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../public/assets/lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../public/assets/lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../public/assets/lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/assets/lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../public/assets/lte/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
