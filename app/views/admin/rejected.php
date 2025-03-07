<?php
require_once __DIR__ . '/../../../middlewares/AdminMiddleware.php';
App\Middlewares\AdminMiddleware::check();

include 'includes/navbar.php';
include 'includes/sidebar.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Approved Capstone</title>

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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">List of Capstone</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Approved Capstone</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <!-- Main content -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage Researches</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="researchTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Research ID</th>
                            <th>Capstone Title</th>
                            <th>Author(s)</th>
                            <th>Year</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
        <tr>
            <td>1</td>
            <td>Unverified AI Chatbot for Students</td>
            <td>John Doe, Jane Smith</td>
            <td>2024</td>
            <td>Artificial Intelligence</td>
            <td class="text-danger">Rejected</td>
            <td>
                <button class="btn btn-info btn-sm">View</button>
                <button class="btn btn-warning btn-sm">Resubmit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Faulty IoT Security System</td>
            <td>Michael Johnson, Emily Davis</td>
            <td>2023</td>
            <td>Internet of Things</td>
            <td class="text-danger">Rejected</td>
            <td>
                <button class="btn btn-info btn-sm">View</button>
                <button class="btn btn-warning btn-sm">Resubmit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Inaccurate Machine Learning Model</td>
            <td>Chris Brown, Sarah Wilson</td>
            <td>2022</td>
            <td>Machine Learning</td>
            <td class="text-danger">Rejected</td>
            <td>
                <button class="btn btn-info btn-sm">View</button>
                <button class="btn btn-warning btn-sm">Resubmit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Unsecure Blockchain Voting System</td>
            <td>David Martinez, Emma Lopez</td>
            <td>2024</td>
            <td>Cybersecurity</td>
            <td class="text-danger">Rejected</td>
            <td>
                <button class="btn btn-info btn-sm">View</button>
                <button class="btn btn-warning btn-sm">Resubmit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Incomplete Research on Cloud Computing</td>
            <td>Daniel Garcia, Olivia Miller</td>
            <td>2023</td>
            <td>Cloud Computing</td>
            <td class="text-danger">Rejected</td>
            <td>
                <button class="btn btn-info btn-sm">View</button>
                <button class="btn btn-warning btn-sm">Resubmit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
    </tbody>
                    <tfoot>
                        <tr>
                            <th>Research ID</th>
                            <th>Capstone Title</th>
                            <th>Author(s)</th>
                            <th>Year</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>




              <!-- /.card-body -->
            </div>
            <!-- /.card -->


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
