<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a></div>
        <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
        <div class="breadcrumb-item"><?= $title ?></div>
      </div>
    </div>
    
          <div class="section-body row">
            <div class="card card-success col-md-6 offset-3">
              <div class="card-header"><h4 class="text-success">Form Pendaftaran</h4></div>
              <div class="card-body">
                <form action="<?= base_url('Admin/User/update') ?>" method="POST" >
                  <div class="form-group">
                    <label for="username">Nama</label>
                    <input type="hidden" name="id" value="<?= $users['id_user'] ?>">
                    <input id="username" type="text" class="form-control" name="username"  value="<?= $users['username'] ?>" autofocus>
                    <div class="invalid-feedback">
                    </div>
                    <?= form_error('username','<small class="text-danger">','</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="phone">No Telepon</label>
                    <input id="phone" type="text" class="form-control" name="phone"  value="<?= $users['phone'] ?>" autofocus>
                    <div class="invalid-feedback">
                    </div>
                    <?= form_error('phone','<small class="text-danger">','</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email"  value="<?= $users['email'] ?>" autofocus>
                    <div class="invalid-feedback">
                    </div>
                    <?= form_error('email','<small class="text-danger">','</small>') ?>
                  </div>

                  <!-- <div class="row">
                    <div class="form-group col-6">
                      <label for="password">Password</label>
                      <input id="password" type="password" class="form-control" name="password" value="<?= set_value('password') ?>" >
                      <?= form_error('password','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="password1">Confirmasi Password</label>
                      <input id="password1" type="password" class="form-control" name="password1" value="<?= set_value('password1') ?>">
                      <?= form_error('password1','<small class="text-danger">','</small>') ?>
                    </div>
                  </div> -->

                  <div class="row">
                    <div class="form-group col-4 offset-2">
                      <label for="agama" class="d-block">Company</label>
                      <select class="form-control" name="company">
                        <option value="PIMPINAN" <?php if ($users['company'] == 'PIMPINAN'): ?>selected<?php endif ?>>PIMPINAN</option>
                        <option value="ADMIN" <?php if ($users['company'] == 'ADMIN'): ?>selected<?php endif ?>>ADMIN</option>
                        <option value="SALES" <?php if ($users['company'] == 'SALES'): ?>selected<?php endif ?>>SALES</option>
                      </select>
                      <?= form_error('company','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group col-4">
                      <label for="active" class="d-block">Status</label>
                      <!-- <input id="active" type="text" class="form-control" name="active" value="<?= set_value('active') ?>"> -->
                      <select class="form-control" name="active">
                        <option value="1" <?php if ($users['active'] == '1'): ?>selected<?php endif ?>>Aktif</option>
                        <option value="0" <?php if ($users['active'] == '0'): ?>selected<?php endif ?>>Tidak</option>
                      </select>
                      <?= form_error('active','<small class="text-danger">','</small>') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">
                      Update
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

  </section>
  </div>

