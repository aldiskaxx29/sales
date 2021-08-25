
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?= base_url('assets') ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-success">
              <div class="card-header"><h4 class="text-success">Form Pendaftaran</h4></div>
              <div class="card-body">
                <form action="<?= base_url('Auth/registrasi') ?>" method="POST" enctype="multipart/form-data">
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
                  </div>

                  <div class="row">
               <!--      <div class="form-group col-4">
                      <label for="jk" class="d-block">Jenis Kelamin</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="jk1" value="Laki - laki">
                        <label class="form-check-label" for="jk1">
                          Laki - laki
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="jk2" value="Perempuan">
                        <label class="form-check-label" for="jk2">
                          Perempuan
                        </label>
                      </div>
                      <?= form_error('jk','<small class="text-danger">','</small>') ?>
                    </div> -->
                    <div class="form-group col-4 offset-4">
                      <label for="agama" class="d-block">Company</label>
                      <select class="form-control" name="company">
                        <option value="">-- Pilihan --</option>
                        <option value="PIMPINAN">PIMPINAN</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="PEGAWAI">PEGAWAI</option>
                      </select>
                      <?= form_error('company','<small class="text-danger">','</small>') ?>
                    </div>
                    <!-- <div class="form-group col-4">
                      <label for="no_hp" class="d-block">No Handphon</label>
                      <input id="no_hp" type="text" class="form-control" name="no_hp" value="<?= set_value('no_hp') ?>">
                      <?= form_error('no_hp','<small class="text-danger">','</small>') ?>
                    </div> -->
                  </div>


                  <!-- <div class="form-divider">
                    Your Home
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Country</label>
                      <select class="form-control selectric">
                        <option>Indonesia</option>
                        <option>Palestine</option>
                        <option>Syria</option>
                        <option>Malaysia</option>
                        <option>Thailand</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Province</label>
                      <select class="form-control selectric">
                        <option>West Java</option>
                        <option>East Java</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>City</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-6">
                      <label>Postal Code</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div> -->

                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">
                      Daftar
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

