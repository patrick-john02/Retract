<?php


include 'includes/navbar.php';
include 'includes/sidebar.php';
?>


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
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Page Header -->
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0">My Researches</h1>
      </div>
    </div>

   <!-- Main content -->
   <section class="content">
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Projects Detail</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
 
    </div>
  </div>
  <div class="card-body">
    <div class="row">
        <!-- Research Reviews -->
        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
            <h4>Recent Activity</h4>
            <?php if (!empty($reviews)) : ?>
                <?php foreach ($reviews as $review) : ?>
                    <div class="post">
                        <div class="user-block">
                            <!-- <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image"> -->
                            <span class="username">
                                <a href="#"><?= htmlspecialchars($review['reviewer_name']) ?></a>
                            </span>
                            <span class="description"><?= date('F j, Y, g:i a', strtotime($review['reviewed_at'])) ?></span>
                        </div>
                        <p>Comment: <?= nl2br(htmlspecialchars($review['comments'])) ?></p>
                        <p>Rating: <strong><?= htmlspecialchars($review['rating'] ?? 'No Rating') ?>/5</strong></p>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No recent activity.</p>
            <?php endif; ?>
        </div>

        <!-- Research Details -->
        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
            <h3 class="text-primary"><i class="fas fa-file-alt"></i> <?= htmlspecialchars($researchDetails['title'] ?? 'No Title') ?></h3>
            <p class="text-muted"><?= nl2br(htmlspecialchars($researchDetails['abstract'] ?? 'No Abstract')) ?></p>
            <br>
            <div class="text-muted">
            <p class="text-sm">Submitted by: <?= htmlspecialchars($researchDetails['submitted_by_name'] ?? 'Unknown') ?></p>

<!-- <p class="text-sm">Category: <?= htmlspecialchars($researchDetails['category_name'] ?? 'Unknown') ?></p> -->


            </div>

            <h5 class="mt-5 text-muted">Project files</h5>
            <ul class="list-unstyled">
                <?php if (!empty($researchDetails['file_path'])) : ?>
                    <li>
                        <a href="<?= htmlspecialchars($researchDetails['file_path']) ?>" class="btn-link text-secondary" target="_blank">
                            <i class="far fa-fw fa-file-pdf"></i> <?= strtoupper($researchDetails['file_type']) ?> File
                        </a>
                    </li>
                <?php else : ?>
                    <li>No project file uploaded.</li>
                <?php endif; ?>
            </ul>

            <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Update</a>
          <!-- <a href="#" class="btn btn-sm btn-warning">Report contact</a> -->
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>
</div>
</div>



<!-- jQuery -->
<script src="../public/assets/lte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../public/assets/lte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../public/assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../public/assets/lte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../public/assets/lte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../public/assets/lte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../public/assets/lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../public/assets/lte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../public/assets/lte/plugins/moment/moment.min.js"></script>
<script src="../public/assets/lte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../public/assets/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../public/assets/lte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../public/assets/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/assets/lte/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../public/assets/lte/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../public/assets/lte/dist/js/pages/dashboard.js"></script>
</body>
</html>
