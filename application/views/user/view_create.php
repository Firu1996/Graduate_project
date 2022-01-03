<?php $this->load->view('template/header'); ?>


  <div class="container mb-4">
    <div class="row">
      <div class="col-md-12 ">
        <div class="card">
          <div class="card-body">
            <h1>
              <i class="fa fa-user-plus"></i>เพิ่มผู้ใช้
            </h1>
            <hr>

            <form action="" method="POST">
              <?= validation_errors(); ?>
              <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="username" name="username" value="" placeholder="กรอก Username"required>
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" name="password" value="123456" required readonly>
                  <small>password เริ่มต้น 123456</small>
                </div>
              </div>

              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">ชื่อ</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" value="" placeholder="กรอก ชื่อUser"required>
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Zone ที่รับผิดชอบ</label>
                <div class="col-sm-10">
                  <?php 

                  foreach ($zone as $z) {
                     echo '<div class="form-check ">
                      <input class="form-check-input" name="zone[]" type="checkbox" value="'.$z['zone_id'].' " id="zone_'.$z['zone_id'].'">
                      <label class="form-check-label" for="zone_'.$z['zone_id'].'">
                        '.$z['zone_code'].' - '.$z['zone_name'].'
                      </label>
                    </div>';
                  }
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-block">
                      <i class="fa fa-save"></i> Save
                    </button>
                  </div>
                </div>
                <div class="col-sm-6">
                  <a href="<?= site_url('user'); ?>" class="btn btn-outline-dark btn-block">Back</a>
                
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $this->load->view('template/footer'); ?>

</body>

</html>
