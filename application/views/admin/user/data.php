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
          <?= $this->session->flashdata('user') ?>
          <a href="<?= base_url('Admin/User/create') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah User</a>
          <hr>
          <table class="table" id="myTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Company</th>
                <th>No Telepon</th>
                <th>Active</th>
                <th>Create</th>
                <th>Action</th>
              </tr>
            </thead>        
            <tbody>
              <?php foreach ($users as $no => $us): ?>
                <tr>
                  <td><?= $no+1 ?></td>
                  <td><?= $us->username ?></td>
                  <td><?= $us->email ?></td>
                  <td><?= $us->company ?></td>
                  <td><?= $us->phone ?></td>
                  <td>
                    <?php if ($us->active == 1): ?>
                      <small class="badge badge-light">Activ</small>
                    <?php else: ?>
                      <small class="text-center"><i>Belum Active</i></small>
                    <?php endif ?>
                      
                    </td>
                  <td><?= $us->created ?></td>
                  <td>
                    <a href="<?= base_url('Admin/User/delete/' . $us->id_user) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Ingin Di Hapus')"><i class="fas fa-trash"></i></a>
                    <a href="<?= base_url('Admin/User/edit/' . $us->id_user) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalDetail<?= $us->id_user ?>"><i class="fas fa-eye"></i></a>
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
<?php foreach ($users as $no => $us): ?>
<div class="modal fade" id="exampleModalDetail<?= $us->id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <th>Username</th>
            <td><?= $us->username ?></td>
          </tr>
          <tr>
            <th>Email</th>
            <td><?= $us->username ?></td>
          </tr>
          <tr>
            <th>Company</th>
            <td><?= $us->company ?></td>
          </tr>
           <tr>
            <th>Active</th>
            <td><?= $us->active ?></td>
          </tr>
          <tr>
            <th>No Telepon</th>
            <td><?= $us->phone ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
