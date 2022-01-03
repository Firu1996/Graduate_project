<?php $this->load->view('template/header'); ?>


  <div class="container mb-4">
    <div class="row">
      <div class="col-md-12 ">
        <div class="card">
          <div class="card-body">
            <h1>
              <i class="fa fa-user-plus"></i> แก้ไขโซน
            </h1>
            <hr>

            <form action="" method="POST">
               
            <div class="form-group row">
                <label for="zone_deviceName" class="col-sm-2 col-form-label">ชื่ออุปกรณ์</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="zone_deviceName" name="zone_deviceName" value="<?= $zone['zone_deviceName']?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="zone_code" class="col-sm-2 col-form-label">รหัสโซน</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="zone_code" name="zone_code" value="<?= $zone['zone_code'] ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="zone_mac" class="col-sm-2 col-form-label">Mac-address Raspberry Pi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="zone_mac_rasp" name="zone_mac_rasp" value="<?= $zone['zone_mac_rasp'] ?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="zone_ip" class="col-sm-2 col-form-label">Mac-address MCU</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="zone_mac_mcu" name="zone_mac_mcu" value="<?= $zone['zone_mac_mcu'] ?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="zone_name" class="col-sm-2 col-form-label">ชื่อโซน</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="zone_name" name="zone_name" value="<?= $zone['zone_name'] ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="zone_name" class="col-sm-2 col-form-label">ความดังสูงสุดของโซน</label>
                <div class="col-sm-10">
                <select class="form-control" id="zone_maxloud" name="zone_maxloud"required>
                <?php if($zone['zone_maxloud'] == 45.0){ ?>
                  <option value="45.0" selected>โซนเงียบ</option>
                  <option value="150.0">ใช้เสียงได้</option>
                <?php }else if($zone['zone_maxloud'] == 150.0){ ?>
                  <option value="45.0">โซนเงียบ</option>
                  <option value="150.0" selected>ใช้เสียงได้</option>
               <?php } ?>             
              </select>
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
                  <a href="<?= site_url('zone'); ?>" class="btn btn-outline-dark btn-block">Back</a>
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
