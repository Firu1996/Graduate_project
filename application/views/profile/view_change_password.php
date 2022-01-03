<?php $this->load->view('template/header'); ?>


  <div class="container mb-4">
    <div class="row">
      <div class="col-md-12 ">
        <div class="card">
          <div class="card-body">
            <h1>
              <i class="fa fa-lock"></i> เปลี่ยนรหัสผ่าน
            </h1>
            <hr>

            <form action="" method="POST">
               <?= validation_errors(); ?>
              <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Old Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" required>
									<small>password อย่างน้อย 6 ตัว</small>
                </div>
              </div>

              <div class="form-group row">
                <label for="renew_password" class="col-sm-2 col-form-label">Confirm New Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="renew_password" name="renew_password" placeholder="Confirm New Password" required>
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
