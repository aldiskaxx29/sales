<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"><?= $user['company'] ?></a>
            <!-- <a href="#">Super Admin</a> -->
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#"><i class="fas fa-home"></i></a>
            <!-- <a href="#">Sa</a> -->
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>

              <?php if ($user['company'] == 'PIMPINAN'): ?>
                <li class="<?php if ($this->uri->segment('2') == 'Dashboard'): ?> active <?php endif ?>">
                <a href="<?= base_url('Pimpinan/Dashboard/') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Starter</li>
              <li class="<?php if ($this->uri->segment('2') == 'Orderan'): ?> active <?php endif ?>">
                <a class="nav-link" href="<?= base_url('Pimpinan/Orderan')  ?>"><i class="fas fa-home"></i> <span>Order Sales</span></a>
              </li>
              <li class="<?php if ($this->uri->segment('2') == 'LaporanOrder'): ?> active <?php endif ?>">
                <a class="nav-link" href="<?= base_url('Pimpinan/LaporanOrder/')  ?>"><i class="fas fa-users"></i> <span>Laporan Order</span></a>
              </li>
              <?php endif ?>
              <?php if ($user['company'] == 'ADMIN'): ?>
                <li class="<?php if ($this->uri->segment('2') == 'Dashboard'): ?> active <?php endif ?>">
                  <a href="<?= base_url('/Admin/Dashboard') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
                <li class="menu-header">Starter</li>
                <li class="<?php if ($this->uri->segment('2') == 'Sales'): ?> active <?php endif ?>">
                  <a class="nav-link" href="<?= base_url('Admin/Sales/')  ?>"><i class="fas fa-home"></i> <span>Data Sales</span></a>
                </li>
                
                <li class="<?php if ($this->uri->segment('2') == 'Produk'): ?> active <?php endif ?>">
                  <a class="nav-link" href="<?= base_url('Admin/Produk/')  ?>"><i class="fas fa-store"></i> <span>Data Produk</span></a>
                </li>
                <li class="<?php if ($this->uri->segment('2') == 'Toko'): ?> active <?php endif ?>">
                  <a class="nav-link" href="<?= base_url('Admin/Toko/')  ?>"><i class="fas fa-store"></i> <span>Data Toko</span></a>
                </li>
                <li class="<?php if ($this->uri->segment('2') == 'Order'): ?> active <?php endif ?>">
                  <a class="nav-link" href="<?= base_url('Admin/Order/')  ?>"><i class="fas fa-users"></i> <span>Data Order</span></a>
                </li>
                <li class="<?php if ($this->uri->segment('2') == 'Kategori'): ?> active <?php endif ?>">
                  <a class="nav-link" href="<?= base_url('Admin/Kategori/')  ?>"><i class="fas fa-users"></i> <span>Data Kategori</span></a>
                </li>
                <li class="<?php if ($this->uri->segment('2') == 'User'): ?> active <?php endif ?>">
                  <a class="nav-link" href="<?= base_url('Admin/User/')  ?>"><i class="fas fa-user"></i> <span>Data User</span></a>
                </li>
              <?php endif ?>
              <?php if ($user['company'] == 'SALES'): ?>
                <li class="<?php if ($this->uri->segment('2') == 'Dashboard'): ?> active <?php endif ?>">
                  <a href="<?= base_url('Pegawai/Dashboard/') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
                <li class="menu-header">Starter</li>
                <!-- <li class="<?php if ($this->uri->segment('2') == 'Produk'): ?> active <?php endif ?>">
                  <a class="nav-link" href="<?= base_url('Pegawai/Produk/')  ?>"><i class="fas fa-home"></i> <span>Produk</span></a>
                </li> -->
                <li class="<?php if ($this->uri->segment('2') == 'Katalog'): ?> active <?php endif ?>">
                  <a class="nav-link" href="<?= base_url('Pegawai/Katalog/')  ?>"><i class="fas fa-print"></i> <span>Katalog</span></a>
                </li>
                <li class="<?php if ($this->uri->segment('2') == 'Toko'): ?> active <?php endif ?>">
                  <a class="nav-link" href="<?= base_url('Pegawai/Toko/')  ?>"><i class="fas fa-store"></i> <span>Toko</span></a>
                </li>
                <li class="<?php if ($this->uri->segment('2') == 'Order'): ?> active <?php endif ?>">
                  <a class="nav-link" href="<?= base_url('Pegawai/Order/')  ?>"><i class="fas fa-users"></i> <span>Order</span></a>
                </li>
                <!-- <li class="<?php if ($this->uri->segment('2') == 'Absen'): ?> active <?php endif ?>">
                  <a class="nav-link" href="<?= base_url('Pegawai/Absen/')  ?>"><i class="fas fa-user"></i> <span>Absen</span></a>
                </li> -->
              <?php endif ?>
    
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="<?= base_url('Admin/Dashboard/logout') ?>" class="btn btn-dark btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
        </aside>
</div>






