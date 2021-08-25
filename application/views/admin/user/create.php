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
            <div class="card card-primary col-md-6 offset-3">
              <div class="card-header"><h4 class="text-primary">Form Pendaftaran User</h4></div>
              <div class="card-body">
                <form action="<?= base_url('Admin/User/create') ?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="username">Nama</label>
                    <input id="username" type="text" class="form-control" name="username"  value="<?= set_value('username') ?>" autofocus>
                    <div class="invalid-feedback">
                    </div>
                    <?= form_error('username','<small class="text-danger">','</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="phone">No Telepon</label>
                    <input id="phone" type="text" class="form-control" name="phone"  value="<?= set_value('phone') ?>" autofocus>
                    <div class="invalid-feedback">
                    </div>
                    <?= form_error('phone','<small class="text-danger">','</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email"  value="<?= set_value('email') ?>" autofocus>
                    <div class="invalid-feedback">
                    </div>
                    <?= form_error('email','<small class="text-danger">','</small>') ?>
                  </div>

                  <div class="row">
                    <div class="form-group col-4 offset-4">
                      <label for="agama" class="d-block">Company</label>
                      <select class="form-control" name="company">
                        <option value="">-- Pilihan --</option>
                        <option value="PIMPINAN">PIMPINAN</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="SALES">SALES</option>
                      </select>
                      <?= form_error('company','<small class="text-danger">','</small>') ?>
                    </div>
                    <!-- <div class="form-group col-4">
                      <label for="no_hp" class="d-block">No Handphon</label>
                      <input id="no_hp" type="text" class="form-control" name="no_hp" value="<?= set_value('no_hp') ?>">
                      <?= form_error('no_hp','<small class="text-danger">','</small>') ?>
                    </div> -->
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input type="password" name="password" class="form-control">
                      <?= form_error('password','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="password1" class="d-block">Confirm Password</label>
                      <input type="password" name="password1" class="form-control">
                      <?= form_error('password1','<small class="text-danger">','</small>') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Daftar
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

  </section>
  </div>

