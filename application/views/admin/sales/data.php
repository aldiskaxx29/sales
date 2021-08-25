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
                <!-- <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Sales</a> -->
                <hr>
                <table class="table" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <!-- <th>Kode Sales</th> -->
                      <th>Nama Sales</th>
                      <th>Email</th>
                      <th>Company</th>
                      <th>No Telepon</th>
                      <th>Status</th>
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>        
                  <tbody>
                    <?php foreach ($sales as $no => $s): ?>
                      <tr>
                        <td><?= $no+1 ?></td>
                        <!-- <td><?= $or->kode_sales ?></td> -->
                        <td><?= $s->username ?></td>
                        <td><?= $s->email ?></td>
                        <td><?= $s->company ?></td>
                        <td><?= $s->phone ?></td>
                        <td>
                          <?php if ($s->active == 1): ?>
                            <small class="badge badge-light">Activ</small>
                          <?php else: ?>
                            <small class="text-center"><i>Belum Active</i></small>
                          <?php endif ?>
                        </td>
                       <!--  <td>
                          <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                          <a href="" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        </td> -->
                      </tr>
                    <?php endforeach ?>                  
                  </tbody>         
                </table>
              </div>
            </div>
          </div>
        </section>
      </div>
  