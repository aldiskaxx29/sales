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
                <?= $this->session->flashdata('produk') ?>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</a>
                <hr>
                <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Produk</th>
                      <th>Nama Produk</th>
                      <th>Kategori Produk</th>
                      <th>Harga Produk</th>
                      <th>Deskription</th>
                      <th>Gambar</th>
                      <th>Stok</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($produk as $no => $pr): ?>
                      <tr>
                        <td><?= $no+1 ?></td>
                        <td><?= $pr->kode_produk ?></td>
                        <td><?= $pr->nama_produk ?></td>
                        <td><?= $pr->kategori_produk ?></td>
                        <td><?= $pr->harga_produk ?></td>
                        <td><?= $pr->deskripsi ?></td>
                        <td>
                          <img src="<?= base_url('/assets/img/produk/' .$pr->gambar ) ?>" width="50">
                          </td>
                        <td><?= $pr->stok ?></td>
                        <td>
                          <a href="<?= base_url('Admin/Produk/delete/' . $pr->id_produk) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus')"><i class="fas fa-trash"></i></a>
                          <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalEdit<?= $pr->id_produk  ?>"><i class="fas fa-edit"></i></a>
                          <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalDetail<?= $pr->id_produk  ?>"><i class="fas fa-eye"></i></a>
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
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Kode produk</label>
            <input type="text" name="kode_produk" class="form-control" value="<?= $kode ?>" readonly>
            <?= form_error('kode_produk','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Nama produk</label>
            <input type="text" name="nama_produk" class="form-control">
            <?= form_error('nama_produk','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Kategori produk</label>
            <select class="form-control" name="kategori_produk">
              <option value="">-- Pilihan --</option>
              <?php foreach ($kategori as $k): ?>
                <option value="<?= $k->kategori ?>"><?= $k->kategori ?></option>
              <?php endforeach ?>
            </select>
            <!-- <input type="text" name="kategori_produk" class="form-control"> -->
            <?= form_error('nama_produk','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Harga produk</label>
            <input type="text" name="harga_produk" class="form-control">
            <?= form_error('harga_produk','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi"></textarea>
            <?= form_error('deskripsi','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control">
            <?= form_error('stok','<small class="text-danger text-form">','</small>') ?>
          </div>
          <div class="form-group">
            <label>Foto Produk</label>
            <input type="file" name="foto" class="form-control">
            <?= form_error('foto','<small class="text-danger text-form">','</small>') ?>
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

<?php foreach ($produk as $no => $pr): ?>
<div class="modal fade" id="exampleModalEdit<?= $pr->id_produk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Admin/Produk/edit') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Kode produk</label>
            <input type="hidden" name="id" value="<?= $pr->id_produk ?>">
            <input type="text" name="kode_produk" class="form-control" value="<?= $pr->kode_produk ?>" readonly>
          </div>
          <div class="form-group">
            <label>Nama produk</label>
            <input type="text" name="nama_produk" class="form-control" value="<?= $pr->nama_produk ?>">
          </div>
          <div class="form-group">
            <label>Kategori produk</label>
            <select class="form-control" name="kategori_produk">
              <?php foreach ($kategori as $k): ?>
                <?php if ($pr->kategori_produk == $k->kategori): ?>
                  <option value="<?= $k->kategori ?>" selected><?= $k->kategori ?></option>
                <?php else: ?>
                  <option value="<?= $k->kategori ?>"><?= $k->kategori ?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label>Harga produk</label>
            <input type="text" name="harga_produk" class="form-control" value="<?= $pr->harga_produk ?>">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi"><?= $pr->deskripsi ?></textarea>
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="<?= $pr->stok ?>">
          </div>
          <div class="form-group">
            <label>Foto Produk</label><br>
            <img src="<?= base_url('assets/img/produk/' . $pr->gambar) ?>" width="100">
            <input type="file" name="foto" class="form-control">
            <small class="text-danger">Biarkan jika gambar tidak ingin diubah</small>
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


<!-- Modal Detail -->

<?php foreach ($produk as $no => $pr): ?>
<div class="modal fade" id="exampleModalDetail<?= $pr->id_produk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <th>Kode produk</th>
            <td><?= $pr->kode_produk ?></td>
          </tr>
          <tr>
            <th>Nama produk</th>
            <td><?= $pr->nama_produk ?></td>
          </tr>
          <tr>
            <th>Harga produk</th>
            <td><?= $pr->harga_produk ?></td>
          </tr>
          <tr>
            <th>Deskripsi</th>
            <td><?= $pr->deskripsi ?></td>
          </tr>
          <tr>
            <th>Quantity</th>
            <td><?= $pr->stok ?></td>
          </tr>
          <tr>
            <th>Gambar</th>
            <td><img src="<?= base_url('assets/img/produk/' . $pr->gambar) ?>" width="100"></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

