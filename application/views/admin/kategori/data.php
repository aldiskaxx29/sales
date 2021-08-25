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
          <?= $this->session->flashdata('kategori') ?>
          <a href="<?= base_url('Admin/User/create') ?>" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Kategori</a>
          <hr>
          <table class="table" id="myTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>        
            <tbody>
              <?php foreach ($kategori as $no => $k): ?>
                <tr>
                  <td><?= $no+1 ?></td>
                  <td><?= $k->kategori ?></td>
                  <td><?= $k->date ?></td>
                  <td>
                    <a href="<?= base_url('Admin/Kategori/delete/' . $k->id_kategori) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ngin Di Hapus')"><i class="fas fa-trash"></i></a>
                    <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModalEdit<?= $k->id_kategori ?>"><i class="fas fa-edit"></i></a>
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



<!-- modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control">
            <?= form_error('kategori','<small class="text-danger">','</small>') ?>
          </div>
          <div class="form-group float-right">
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal edit -->
<?php foreach ($kategori as $no => $k): ?>
<div class="modal fade" id="exampleModalEdit<?= $k->id_kategori ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Edit Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="<?= base_url('Admin/Kategori/update') ?>" method="post">
          <div class="form-group">
            <label>Kategori</label>
            <input type="hidden" name="id" value="<?= $k->id_kategori ?>">
            <input type="text" name="kategori" class="form-control" value="<?= $k->kategori ?>">
            <?= form_error('kategori','<small class="text-danger">','</small>') ?>
          </div>
          <div class="form-group float-right">
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
       </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
