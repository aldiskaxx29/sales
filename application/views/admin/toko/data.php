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
          <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalTambah"><i class="fas fa-plus"></i> Tambah Toko</a>
          <hr>
          <table class="table" id="myTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Toko</th>
                <th>Nama Toko</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
            </thead>        
            <tbody>
              <?php foreach ($toko as $no => $to): ?>
                <tr>
                  <td><?= $no+1 ?></td>
                  <td><?= $to->kode_toko ?></td>
                  <td><?= $to->nama_toko ?></td>
                  <td><?= $to->no_telpon ?></td>
                  <td><?= $to->alamat ?></td>
                  <td>
                    <a href="<?= base_url('Admin/Toko/delete/' . $to->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingn Dihapus')"><i class="fas fa-trash"></i></a>
                    <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModalEdit<?= $to->id ?>"><i class="fas fa-edit"></i></a>
                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalDetail<?= $to->id ?>"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>         
          </table>
        </div>
      </div>
    </div>
    
  </section>
</div>


<!-- //Modal Tambah Toko -->
 
<div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label>Kode Toko</label>
            <input type="text" name="kode" class="form-control" autofocus value="<?= $kode ?>" readonly>
            <?= form_error('kode','<small class="text-danger">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Nama Toko</label>
            <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>">
            <?= form_error('nama','<small class="text-danger">','</small>') ?>
          </div>
          <div class="form-group">
            <label>No Telepon</label>
            <input type="text" name="phone" class="form-control" value="<?= set_value('phone') ?>">
            <?= form_error('phone','<small class="text-danger">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat" value="<?= set_value('alamat') ?>"></textarea>
            <?= form_error('alamat','<small class="text-danger">','</small>') ?>
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
<?php foreach ($toko as $no => $to): ?>  
<div class="modal fade" id="exampleModalEdit<?= $to->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Admin/Toko/edit') ?>" method="post">
          <div class="form-group">
            <label>Kode Toko</label>
            <input type="hidden" name="id" value="<?= $to->id ?>">
            <input type="text" name="kode" class="form-control" autofocus value="<?= $to->kode_toko ?>" readonly>
          </div>
          <div class="form-group">
            <label>Nama Toko</label>
            <input type="text" name="nama" class="form-control" value="<?= $to->nama_toko ?>">
          </div>
          <div class="form-group">
            <label>No Telepon</label>
            <input type="text" name="phone" class="form-control" value="<?= $to->no_telpon ?>">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat"><?= $to->alamat ?></textarea>
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
<?php endforeach ?>


<!-- Modal Detail -->
<?php foreach ($toko as $no => $to): ?>  
<div class="modal fade" id="exampleModalDetail<?= $to->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
          <tr>
            <th>Kode Toko</th>
            <td><?= $to->kode_toko ?></td>
          </tr>
          <tr>
            <th>Nama Toko</th>
            <td><?= $to->nama_toko ?></td>
          </tr>
          <tr>
            <th>No Telepon</th>
            <td><?= $to->no_telpon ?></td>
          </tr>
          <tr>
            <th>Alamat</th>
            <td><?= $to->alamat ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
