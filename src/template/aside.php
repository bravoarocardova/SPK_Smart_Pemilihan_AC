
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SPK SMART</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= ucfirst($_SESSION['user']) ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if($title == 'Sistem Pendukung Keputusan') echo 'active'; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($title == 'Data Alternatif' || $title == 'Nilai Alternatif') echo 'menu-open'; ?>">
            <a href="#" class="nav-link <?php if($title == 'Data Alternatif' || $title == 'Nilai Alternatif') echo 'active'; ?>">
              <i class="nav-icon fas fa-list-ol"></i>
              <p>
                Alternatif
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="data-alternatif.php" class="nav-link <?php if($title == 'Data Alternatif') echo 'active'; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Alternatif</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="nilai-alternatif.php" class="nav-link <?php if($title == 'Nilai Alternatif') echo 'active'; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Nilai Alternatif</p>
                    </a>
                </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($title == 'Data Kriteria' || $title == 'Bobot Kriteria' || $title == 'Hasil Normalisasi Kriteria' || $title == 'Sub Kriteria' || $title == 'Nilai Utiliti') echo 'menu-open'; ?>">
            <a href="#" class="nav-link <?php if($title == 'Data Kriteria' || $title == 'Bobot Kriteria' || $title == 'Hasil Normalisasi Kriteria' || $title == 'Sub Kriteria' || $title == 'Nilai Utiliti') echo 'active'; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kriteria
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="data-kriteria.php" class="nav-link <?php if($title == 'Data Kriteria') echo 'active'; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Kriteria</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="bobot-kriteria.php" class="nav-link <?php if($title == 'Bobot Kriteria') echo 'active'; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Bobot Kriteria</p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="hasil-normalisasi-kriteria.php" class="nav-link <?php if($title == 'Hasil Normalisasi Kriteria') echo 'active'; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Hasil Normalisasi Kriteria</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="sub-kriteria.php" class="nav-link <?php if($title == 'Sub Kriteria') echo 'active'; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sub Kriteria</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="nilai-utiliti.php" class="nav-link <?php //if($title == 'Nilai Utiliti') echo 'active'; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Nilai Utiliti</p>
                    </a>
                </li> -->
            </ul>
          </li>
          <li class="nav-item">
                <a href="perhitungan.php" onclick="<?php ranking() ?>" class="nav-link <?php if($title == 'Perhitungan') echo 'active'; ?>">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                        Perhitungan
                    </p>
                </a>
          </li>
          <li class="nav-item">
                <a href="logout.php" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
