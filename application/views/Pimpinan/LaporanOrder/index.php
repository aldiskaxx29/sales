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
          <div class="row">
            <div class="col-md-4">
              <form action="" method="post">
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="dari" class="form-control">
                  <?= form_error('dari','<small class="text-danger">','</small>') ?>
                </div>
                <div class="form-group">
                  <label>Sampai Tanggal</label>
                  <input type="date" name="sampai" class="form-control">
                  <?= form_error('sampai','<small class="text-danger">','</small>') ?>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Cari</button>            
              </form>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- Modal -->
<!-- <?php foreach ($order as $no => $or): ?>
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
            </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?> -->