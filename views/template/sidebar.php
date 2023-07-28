<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../resaurces/dist/img/STMIKBandungLogo.png" alt="STMIK Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">STMIK Bandung</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../resaurces/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?= $logUser ?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../dashboard/index_dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pengguna
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="../admin/index_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../pembimbing/index_pembimbing.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembimbing Sekolah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../siswa/index_siswa.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../grupPKL/index_grupPKL.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Grup PKL
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../jadwal/index_jadwal.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Jadwal
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../laporan/index_laporan.php" class="nav-link">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>