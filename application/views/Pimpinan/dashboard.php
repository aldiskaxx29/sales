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
            <!-- <div class="row"> -->
              <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                      <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Data Produk</h4>
                      </div>
                      <div class="card-body">
                        <?php  
                          $this->db->from('barang');
                          echo $this->db->count_all_results();
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                      <i class="fas fa-home"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Data Toko</h4>
                      </div>
                      <div class="card-body">
                        <?php  
                          $this->db->from('toko');
                          echo $this->db->count_all_results();
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                      <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Data Order</h4>
                      </div>
                      <div class="card-body">
                        <?php  
                          $this->db->from('orderan');
                          echo $this->db->count_all_results();
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                      <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Data Absen</h4>
                      </div>
                      <div class="card-body">
                        <?php  
                          $this->db->from('absen');
                          echo $this->db->count_all_results();
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
          </div>
        </section>
      </div>