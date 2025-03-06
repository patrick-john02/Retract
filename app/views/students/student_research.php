<?php
require_once __DIR__ . '/../../../middlewares/StudentMiddleware.php';
require_once __DIR__ . '/../../core/Session.php'; 
require_once __DIR__ . '/../../controllers/ResearchController.php';

App\Middlewares\StudentMiddleware::check();


$controller = new ResearchController();
$progressData = $controller->getResearchProgress();

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

    <!-- Main Content -->
    <section class="content">
      <div class="container-fluid">
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addResearchModal">
    Add Research
</button>
<br>
<br>
        <div class="card">
          
          <div class="card-header">
            
            <h3 class="card-title">Research</h3>
          </div>
          <div class="card-body">
          <table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Research Title</th>
            <th>Status</th>
            <th>Progress</th>
            <th>Label</th>
            <th>Last Updated</th>
            <th>Last Updated By</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($progressData)): ?>
            <?php foreach ($progressData as $index => $progress): ?>
                <tr>
                    <td><?= $index + 1 ?>.</td>
                    <td>
                    <a href="/retract/public/timeline?id=<?= htmlspecialchars($progress['id']) ?>" class="text-primary">
                        <?= htmlspecialchars($progress['title'] ?? 'No Title') ?>
                    </a>
                </td>




                    <td><strong><?= ucfirst($progress['status'] ?? 'unknown') ?></strong></td>
                    <td>
                        <div class="progress progress-xs">
                            <?php
                                $progressStages = [
                                    'proposal' => 20,
                                    'under review' => 40,
                                    'revision' => 60,
                                    'approved' => 80,
                                    'published' => 100
                                ];
                                $progressPercentage = $progressStages[$progress['stage']] ?? 0;

                                $progressColors = [
                                    'proposal' => 'bg-danger',
                                    'under review' => 'bg-warning',
                                    'revision' => 'bg-primary',
                                    'approved' => 'bg-info',
                                    'published' => 'bg-success'
                                ];
                                $progressColor = $progressColors[$progress['stage']] ?? 'bg-secondary';
                            ?>
                            <div class="progress-bar <?= $progressColor ?>" style="width: <?= $progressPercentage ?>%"></div>
                        </div>
                    </td>
                    <td><span class="badge <?= $progressColor ?>"><?= ucfirst($progress['stage'] ?? 'unknown') ?> (<?= $progressPercentage ?>%)</span></td>
                    <td><?= !empty($progress['updated_at']) ? date('F j, Y', strtotime($progress['updated_at'])) : 'N/A' ?></td>
                    <td><?= htmlspecialchars($progress['last_updated_by'] ?? 'Unknown') ?></td>
                    <td><?= htmlspecialchars($progress['progress_details'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="text-center">No research progress available.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<!-- Add Research Modal -->
<div class="modal fade" id="addResearchModal" tabindex="-1" aria-labelledby="addResearchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addResearchModalLabel">Add Research</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="researchTitle" class="form-label">Research Title</label>
                        <input type="text" class="form-control" id="researchTitle" placeholder="Enter research title">
                    </div>
                    <div class="mb-3">
                        <label for="researchDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="researchDescription" rows="3" placeholder="Enter research description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="researchStatus" class="form-label">Status</label>
                        <select class="form-select" id="researchStatus">
                            <option value="proposal">Proposal</option>
                            <option value="under review">Under Review</option>
                            <option value="revision">Revision</option>
                            <option value="approved">Approved</option>
                            <option value="published">Published</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="researchFile" class="form-label">Upload File</label>
                        <input class="form-control" type="file" id="researchFile">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Research</button>
            </div>
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
