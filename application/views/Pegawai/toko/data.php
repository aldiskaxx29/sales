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

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <?= $this->session->flashdata('toko') ?>
          <!-- <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</a> -->
          <hr>
          <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Toko</th>
                <th>Nama Toko</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody>
              <?php foreach ($toko as $no => $to): ?>
                <tr>
                  <td><?= $no+1 ?></td>
                  <td><?= $to->kode_toko ?></td>
                  <td><?= $to->nama_toko ?></td>
                  <td><?= $to->alamat ?></td>
                  <td><?= $to->no_telpon ?></td>
                  <!-- <td>
                    <a href="<?= base_url('Pegawai/Toko/delete/' . $to->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus')"><i class="fas fa-trash"></i></a>
                    <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalEdit<?= $to->id ?>"><i class="fas fa-edit"></i></a>
                  </td> -->
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- Modal Tambah -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label>Kode Toko</label>
            <input type="text" name="kode_toko" class="form-control">
            <?= form_error('kode_toko','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Nama Toko</label>
            <input type="text" name="nama_toko" class="form-control">
            <?= form_error('nama_toko','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>No Telepon</label>
            <input type="text" name="no_telpon" class="form-control">
            <?= form_error('no_telpon','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat"></textarea>
            <?= form_error('alamat','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->

<?php foreach ($toko as $no => $pr): ?>
<div class="modal fade" id="exampleModalEdit<?= $pr->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Pegawai/Toko/edit') ?>" method="post">
          <div class="form-group">
            <label>Kode Toko</label>
            <input type="hidden" name="id" value="<?= $pr->id ?>">
            <input type="text" name="kode_toko" class="form-control" value="<?= $pr->kode_toko ?>">
            <?= form_error('kode_toko','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Nama Toko</label>
            <input type="text" name="nama_toko" class="form-control" value="<?= $pr->nama_toko ?>">
            <?= form_error('nama_toko','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>No Telepon</label>
            <input type="text" name="no_telpon" class="form-control" value="<?= $pr->no_telpon ?>">
            <?= form_error('no_telpon','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat"><?= $pr->alamat ?></textarea>
            <?= form_error('alamat','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>


