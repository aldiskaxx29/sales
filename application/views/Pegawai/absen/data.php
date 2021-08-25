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
          <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data Absen</a>
          <hr>
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggl Absen</th>
                <th>Nama</th>
                <th>Foto 1</th>
                <th>Foto 2</th>
                <th>Foto 3</th>
                <th>Foto 4</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($absen as $no => $a): ?>
                <tr>
                <td><?= $no+1 ?></td>
                <th><?= $a->tgl_absen ?></th>
                <td><?= $a->nama ?></td>
                <td>
                  <?php if ($a->foto1 == ''): ?>
                    <small><i>Tidak Ada</i></small>
                  <?php else: ?>
                    <img src="<?= base_url('assets/img/absen/' . $a->foto1) ?>" width="50"> 
                  <?php endif ?>
                </td>
                <td>
                  <?php if ($a->foto2 == ''): ?>
                    <small><i>Tidak Ada</i></small>
                  <?php else: ?>
                    <img src="<?= base_url('assets/img/absen/' . $a->foto2) ?>" width="50"> 
                  <?php endif ?>
                </td>
                <td>
                  <?php if ($a->foto3 == ''): ?>
                    <small><i>Tidak Ada</i></small>
                  <?php else: ?>
                    <img src="<?= base_url('assets/img/absen/' . $a->foto3) ?>" width="50"> 
                  <?php endif ?>
                </td>
                <td>
                  <?php if ($a->foto4 == ''): ?>
                    <small><i>Tidak Ada</i></small>
                  <?php else: ?>
                    <img src="<?= base_url('assets/img/absen/' . $a->foto4) ?>" width="50"> 
                  <?php endif ?>
                </td>
                <td><?= $a->total ?></td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>





<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Absen Sales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Pegawai/Absen/create') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
          </div>
          <div class="form-group">
            <label>Foto 1</label>
            <input type="file" name="foto1" class="form-control">
          </div>
          <div class="form-group">
            <label>Foto 2</label>
            <input type="file" name="foto2" class="form-control">
          </div>
          <div class="form-group">
            <label>Foto 3</label>
            <input type="file" name="foto3" class="form-control">
          </div>
          <div class="form-group">
            <label>Foto 4</label>
            <input type="file" name="foto4" class="form-control">
          </div>
          <div class="form-group">
            <label>Total</label>
            <input type="text" name="total" class="form-control">
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
