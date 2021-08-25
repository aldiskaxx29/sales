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
            <div class="col-md-8">
              <table class="table table-striped">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Nama Toko</th>
                      <th>Alamat</th>
                      <th>Qty</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($filter)): ?>
                    <div class="alert alert-danger">Data Kosong</div>
                  <?php else: ?>
                    <a href="<?= base_url('Pimpinan/LaporanOrder/print/?dari=' .set_value('dari'). '&sampai='.set_value('sampai')) ?>" class="btn btn-primary" target="_blank"><i class="fas fa-priint"></i> Print</a>
                    <hr>
                  <?php endif ?>                  
                  <?php foreach ($filter as $no => $fil): ?>
                  <tr>
                      <td><?= $no+1 ?></td>
                      <td><?= $fil->nama_produk ?></td> 
                      <td><?= $fil->nama_toko ?></td>
                      <td><?= $fil->alamat ?></td>
                      <td><?= $fil->qty ?></td>
                      <td><?= $fil->keterangan ?></td>
                      <td><?= $fil->status ?></td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </section>
</div>

