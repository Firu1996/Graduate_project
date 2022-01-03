<?php $this->load->view('template/header'); ?>
<div class="container mb-4">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-body">
            <h1>
              <i class="fa fa-sign-in"></i> เข้าสู่ระบบ
            </h1>
            <hr>
            <form action="" method="POST">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="กรอก Username" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="กรอก Password" required>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-block">
                      <i class="fa fa-sign-in"></i> เข้าสู่ระบบ
                    </button>
                  </div>
                </div>
                <div class="col-sm-6">
                  
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>


<?php $this->load->view('template/footer'); ?>

</body>

</html>
