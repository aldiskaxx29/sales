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
          <?= $this->session->flashdata('orderan') ?>
          <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</a>
          <hr>
          <table class="table table-striped" id="myTable" style="overflow-x:auto;">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Order</th>
                <th>Sales</th>
                <th>Nama Toko</th>
                <th>Alamat</th>
                <th>Nama Produk</th>
                <th>Kategori Produk</th>
                <th>Qty</th>
                <th>Keterangan</th>
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
                  <td><?= $or->kategori_produk ?></td>
                  <td><?= $or->qty ?></td>
                  <td><?= $or->keterangan ?></td>
                  <td>
                    <a href="<?= base_url('Pegawai/Order/delete/' . $or->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus')"><i class="fas fa-trash"></i></a>
                    <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalEdit<?= $or->id ?>"><i class="fas fa-edit"></i></a>
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


<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label>Kode Produk</label>
            <select class="form-control" name="id">
              <option value="">-- Pilihan --</option>
              <?php foreach ($produk as $pr): ?>
                <option value="<?= $pr->id_produk ?>"><?= $pr->kode_produk ?> <?= $pr->nama_produk ?></option>
              <?php endforeach ?>
            </select>
            <?= form_error('id','<small class="text-danger">','</small>') ?>
          </div>
<!--           <div class="form-group">
            <label>Nama Produk</label>
            
            <select class="form-control" name="nama_produk">
              <option value="">-- Pilihan --</option>
              <?php foreach ($produk as $pr): ?>
              <option value="<?= $pr->nama_produk ?>"><?= $pr->nama_produk ?></option>
              <?php endforeach ?>
            </select>
            <?= form_error('nama_produk','<small class="text-danger">','</small>') ?>
          </div> -->
          <div class="form-group">
            <label>Nama Toko</label>
            <select class="form-control" name="nama_toko">
              <option value="">-- Pilihan --</option>
              <?php foreach ($toko as $to): ?>
                <option value="<?= $to->nama_toko ?>"><?= $to->nama_toko ?></option>
              <?php endforeach ?>
            </select>
            <?= form_error('nama_toko','<small class="text-danger">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat"></textarea>
            <?= form_error('alamat','<small class="text-danger">','</small>') ?>
          </div>
<!--           <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" name="kategori">
              <option value="">-- Pilihan --</option>
              <?php foreach ($kategori as $k): ?>
                <option value="<?= $k->kategori ?>"><?= $k->kategori ?></option>
              <?php endforeach ?>
            </select>
          </div> -->
          <div class="form-group">
            <label>Qty</label>
            <input type="number" name="qty" class="form-control">
            <?= form_error('qty','<small class="text-danger">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan"></textarea>
            <?= form_error('keterangan','<small class="text-danger">','</small>') ?>
          </div>
          <div class="form-group float-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
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
        <form action="<?= base_url('Pegawai/Order/edit') ?>" method="post">
          <div class="form-group">
            <label>Nama Toko</label>
            <input type="hidden" name="id" value="<?= $or->id ?>">
            <select class="form-control" name="nama_toko">
              <?php foreach ($toko as $pr): ?>
                <?php if ($pr->nama_toko == $or->nama_toko): ?>
                  <option value="<?= $pr->nama_toko ?>" selected ><?= $pr->nama_toko ?></option>  
                <?php else: ?>
                  <option value="<?= $pr->nama_toko ?>"><?= $pr->nama_toko ?></option>
                <?php endif ?>              
              <?php endforeach ?>  
            </select> 
            <?= form_error('nama_toko','<small class="text-danger">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat"><?= $or->alamat ?></textarea>
            <?= form_error('alamat','<small class="text-danger">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Nama Produk</label>
            <!-- <input type="text" name="nama_produk" class="form-control"> -->
            <select class="form-control" name="nama_produk">
              <?php foreach ($produk as $pr): ?>
                <?php if ($pr->nama_produk == $or->nama_produk): ?>
                  <option value="<?= $pr->nama_produk ?>" selected ><?= $pr->nama_produk ?></option>  
                <?php else: ?>
                  <option value="<?= $pr->nama_produk ?>"><?= $pr->nama_produk ?></option>
                <?php endif ?>              
              <?php endforeach ?>         
            </select>
            <?= form_error('nama_produk','<small class="text-danger">','</small>') ?>
          </div>

          <div class="form-group">
            <label>Qty</label>
            <input type="number" name="qty" class="form-control" value="<?= $or->qty ?>">
            <?= form_error('qty','<small class="text-danger">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan"><?= $or->keterangan ?></textarea>
            <?= form_error('keterangan','<small class="text-danger">','</small>') ?>
          </div>
          <div class="form-group float-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>