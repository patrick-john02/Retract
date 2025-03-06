 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../public/assets/images/cit.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Faculty Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block">Welcome, <?php echo htmlspecialchars($username ?? 'Guest'); ?></a>
        </div>
      </div>

     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="/retract/public/faculty-dashboard" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-item">
  <a href="/retract/public/manage-research" class="nav-link">
    <i class="nav-icon fas fa-book"></i>
    <p>Research Projects</p>
  </a>
</li>

<!-- <li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-upload"></i>
    <p>Submitted Research</p>
  </a>
</li> -->

<!-- <li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-edit"></i>
    <p>Progress Tracking</p>
  </a>
</li> -->

<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-copy"></i>
    <p>Peer Reviews</p>
  </a>
</li>

<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-bell"></i>
    <p>Resources</p>
  </a>
</li>
<!-- <li class="nav-header">Research</li> -->
<li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Research
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejected</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Published</p>
                </a>
              </li>
            </ul>
          </li>

<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-user-tie"></i>
    <p>Profile Settings</p>
  </a>
</li>

<li class="nav-item">
  <a href="/retract/public/logout" class="nav-link">
    <i class="nav-icon fas fa-sign-out-alt"></i>
    <p>Logout</p>
  </a>
</li>

        </ul>
      </nav>
    </div>
  </aside>