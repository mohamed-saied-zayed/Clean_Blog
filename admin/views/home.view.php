<?php require_once ADMIN_PATH."views/inc/header.php"; ?>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
              <div class="small-box bg-info">
              <div class="inner">
                <h3><?= count_numbers("posts","id"); ?></h3>

                <p>Posts</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            <div class="cared">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= count_numbers("users","id"); ?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= count_numbers("messages","id"); ?></h3>

                <p>Messages</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>


              </div>
            </div><!-- /.card -->
          </div>

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php require_once ADMIN_PATH."views/inc/footer.php"; ?>
