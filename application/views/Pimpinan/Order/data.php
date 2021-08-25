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
          <!-- <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a> -->
          <hr>
          <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Order</th>
                <th>Nama Toko</th>
                <th>Alamat</th>
                <th>Nama Produk</th>
                <th>Qty</th>
                <th>Keterangan</th>
                <th>Status</th>
                <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody>
              <?php foreach ($order as $no => $or): ?>
                <tr>
                  <td><?= $no+1 ?></td>
                  <td><?= $or->tgl_order ?></td>
                  <td><?= $or->nama_toko ?></td>
                  <td><?= $or->alamat ?></td>
                  <td><?= $or->nama_produk ?></td>
                  <td><?= $or->qty ?></td>
                  <td><?= $or->keterangan ?></td>
                  <!-- <td>
                    <?php if ($or->status == 0): ?>
                      <small class="badge badge-warning" data-toggle="modal" data-target="#exampleModal<?= $or->id ?>" style="cursor: pointer;">Verifikasi</small>
                    <?php else: ?>
                      <small class="badge badge-success">Success</small>
                    <?php endif ?>
                  </td> -->
                  <td>
                    <?php if ($or->status == 0): ?>
                      <small class="badge badge-warning" data-toggle="modal" data-target="#exampleModal<?= $or->id ?>" style="cursor: pointer;">Verifikasi</small>
                    <?php elseif($or->status == 1): ?>
                      <small class="badge badge-light" >Success</small>
                    <?php elseif($or->status == 2): ?>
                      <small class="badge badge-success">Kirim</small>
                    <?php elseif ($or->status == 3): ?>
                      <small class="badge badge-danger">Gagal</small>
                    <?php endif ?>
                  </td>
                  <td>
                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    <a href="" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- Modal -->
<?php foreach ($order as $no => $or): ?>
<div class="modal fade" id="exampleModal<?= $or->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Pimpinan/Orderan/verify') ?>" method="POST">
          <div class="form-group">
            <label>Status Order</label>
            <input type="hidden" name="id" value="<?= $or->id ?>">
            <select class="form-control" name="status">
              <option value="0" <?php if ($or->status == 0): ?>selected<?php endif ?>>Verifikasi</option>
              <option value="1" <?php if ($or->status == 1): ?>selected<?php endif ?>>Acc</option>
              <option value="3" <?php if ($or->status == 3): ?>selected<?php endif ?>>Gagal</option>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>