<?php $this->load->view('template/header'); ?>


  <div class="container mb-4">
  
    <div class="card">
      <div class="card-header">
        <h1>
          <i class="fa fa-user"></i> ดูจำนวนผู้เข้าใช้
        </h1>
        <hr>
        <?php $this->load->view('report/tab'); ?>
      </div>
      <div class="card-body">
        <form action="" method="GET">
        <div class="row my-4">
          <div class="col-md-4">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <label class="input-group-text bg-dark text-light border-dark" for="zoneSelect">
                    เลือก Zone
                  </label>
                </div>
                <select class="custom-select" name="z" required>
                  <option value="">-- เลือก Zone --</option>
                  <option value="all" <?php if($select_zone=='all'){echo 'selected';} ?>>All zone</option>
                  <?php 
                  foreach ($zone as $z) {
                    $selected='';
                    if($z['zone_id']==$select_zone){
                      $selected='selected';
                    }
                    echo '<option value="'.$z['zone_id'].'" '.$selected.'>'.$z['zone_code'].' - '.$z['zone_name'].'</option>';
                  } 
                  ?>
                  
                </select>
              </div>
            </div>
          </div>


          <div class="col-md-8">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <label class="input-group-text bg-dark text-light border-dark">
                    เลือกวัน
                  </label>
                </div>
                <input type="date" name="day" class="form-control" value="<?= $day; ?>">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-warning">
                    <i class="fa fa-search"></i> ค้นหา
                  </button>
                </div>
              </div>

            </div>
          </div>


          
        </div>
        </form>

        <hr>
<?php 
        if(empty($reports)){
            
          }
         ?>
        <div class="row">
          <?php 



          foreach ($reports as $r) { ?>
          <div class="col-md-4 mb-3">
            <div class="card">
              <h3 class="card-header text-center">
                <?= $r['zone_code'].' - '.$r['zone_name']; ?>
                
              </h3>
              <div class="card-body">
                <h1 class="text-center"><?= $r['log_total']*1 ?> คน</h1>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>

      </div>

    </div>
  </div>

<?php $this->load->view('template/footer'); ?>

</body>

</html>
