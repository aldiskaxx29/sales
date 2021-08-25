<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Calon Siswa</a>
            <!-- <a href="#">Super Admin</a> -->
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">Cs</a>
            <!-- <a href="#">Sa</a> -->
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                  <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
              </li> -->
              <li class="<?php if ($this->uri->segment('2') == 'Dashboard'): ?> active <?php endif ?>">
                <a href="<?= base_url('Admin/Dashboard/') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Starter</li>
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="layout-default.html">Data User</a></li>
                  <li><a class="nav-link" href="layout-transparent.html">Data Siswa</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Data Kelas</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Data Jurusan</a></li>
                </ul>
              </li> -->
              <li class="<?php if ($this->uri->segment('2') == 'Data_Rumah'): ?> active <?php endif ?>">
                <a class="nav-link" href="<?= base_url('Admin/Data_Rumah/')  ?>"><i class="fas fa-home"></i> <span>Biodata Pendaftaran</span></a>
              </li>
              <li class="<?php if ($this->uri->segment('2') == 'Data_Sales'): ?> active <?php endif ?>">
                <a class="nav-link" href="<?= base_url('Admin/Data_Sales/')  ?>"><i class="fas fa-users"></i> <span>Pengumuman</span></a>
              </li>
              <li class="<?php if ($this->uri->segment('2') == 'Data_Customer'): ?> active <?php endif ?>">
                <a class="nav-link" href="<?= base_url('Admin/Data_Customer/')  ?>"><i class="fas fa-user"></i> <span>Cetak Bukti Pendaftaran</span></a>
              </li>
              <!-- <li class="">
                <a class="nav-link" href="#"><i class="fas fa-file"></i> <span>Laporan</span></a>
              </li> -->
              <!-- <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Laporan</span></a></li> -->
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="<?= base_url('Admin/Dashboard/logout') ?>" class="btn btn-success btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
        </aside>
</div>






