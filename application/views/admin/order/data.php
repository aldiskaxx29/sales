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
          <?= $this->session->flashdata('order') ?>
          <!-- <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Order</a> -->
          <hr>
          <table class="table" id="myTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Order</th>
                <th>Sales</th>
                <th>Nama Toko</th>
                <th>Alamat</th>
                <th>Nama Produk</th>
                <th>Qty</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>        
            <tbody>
              <?php foreach ($order as $no => $or): ?>
                <tr>
                  <td><?= $no+1 ?></td>
                  <td><?= $or->tgl_order ?></td>
                  <td><?= $or->sales ?></td>
                  <td><?= $or->nama_toko ?></td>
                  <td><?= $or->alamat ?></td>
                  <td><?= $or->nama_produk ?></td>
                  <td><?= $or->qty ?></td>
                  <td><?= $or->keterangan ?></td>
                  <td>
                    <?php if ($or->status == 0): ?>
                      <small class="badge badge-warning">Verifikasi</small>
                    <?php elseif($or->status == 1): ?>
                      <small class="badge badge-light" data-toggle="modal" data-target="#exampleModalStatus<?= $or->id ?>" style="cursor: pointer;">Success</small>
                    <?php elseif($or->status == 2): ?>
                      <small class="badge badge-success">Kirim</small>
                    <?php elseif ($or->status == 3): ?>
                      <small class="badge badge-danger">Gagal</small>
                    <?php endif ?>
                  </td>
                  <td>
                    <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    <a href="" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalEdit<?= $or->id ?>"><i class="fas fa-eye"></i></a>
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

<!-- Modal Detail -->
<?php foreach ($order as $no => $or): ?>
<div class="modal fade" id="exampleModalEdit<?= $or->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Absen Sales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
          <tr>
            <th>Tanggal Order</th>
            <td><?= $or->tgl_order ?></td>
          </tr>
          <tr>
            <th>Nama Toko</th>
            <td><?= $or->nama_toko ?></td>
          </tr>
          <tr>
            <th>Alamat</th>
            <td><?= $or->nama_produk ?></td>
          </tr>
          <tr>
            <th>Nama Produk</th>
            <td><?= $or->nama_produk ?></td>
          </tr>
          <tr>
            <th>Qty</th>
            <td><?= $or->qty ?></td>
          </tr>
          <tr>
            <th>Keterangan</th>
            <td><?= $or->keterangan ?></td>
          </tr>
          <tr>
            <th>Status</th>
            <td>
              <?php if ($or->status == 0): ?>
                <small class="badge badge-warning">Verifikasi</small>
              <?php elseif($or->status == 1): ?>
                <small class="badge badge-info">Success</small>
              <?php elseif($or->status == 2): ?>
                <small class="badge badge-success">Kirim</small>
              <?php elseif ($or->status == 3): ?>
                <small class="badge badge-danger">Gagal</small>
              <?php endif ?>
            </td>
          </tr>
        </table>
      </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>


<!-- Ubah status orderan -->
<?php foreach ($order as $no => $or): ?>
<div class="modal fade" id="exampleModalStatus<?= $or->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Admin/Order/verify') ?>" method="post">
          <div class="form-group">
            <label>Ubah Status</label>
            <input type="hidden" name="id" value="<?= $or->id ?>">
            <select class="form-control" name="status">
              <option value="1">Success</option>
              <option value="2">Kirim</option>
              <option value="3">Gagal</option>
            </select>
          </div>
          <div class="form-group float-right">
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
  
<?php endforeach ?>