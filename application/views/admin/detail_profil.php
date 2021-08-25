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
    
          <div class="section-body row">
            <div class="card card-primary col-md-6 offset-3">
              <table class="table table-striped">
                <tr>
                  <th>Uesername</th>
                  <td><?= $user['username'] ?></td>
                </tr>    
                <tr>
                  <th>Email</th>
                  <td><?= $user['email'] ?></td>
                </tr>    
                <tr>
                  <th>Company</th>
                  <td><?= $user['company'] ?></td>
                </tr>    
                <tr>
                  <th>Phone</th>
                  <td><?= $user['phone'] ?></td>
                </tr>        
                <tr>
                  <th>Status</th>
                  <td>
                    <?php if ($user['active'] == 1): ?>
                      <small class="badge badge-success">Active</small>
                    <?php else: ?>
                      <small><i>Tidak Active</i></small>
                    <?php endif ?>
                  </td>
                </tr>        
              </table>
            </div>
          </div>

  </section>
  </div>

