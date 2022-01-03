<?php $this->load->view('template/header'); ?>
<meta http-equiv="refresh" content="15" />

  <div class="container mb-4">

    <h2 class="text-white-50">
      <i class="fa fa-list"></i> <?= $zone['zone_code'].' - '.$zone['zone_name']; ?>
    </h2>
    <br>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-3">
          <div class="card-body">
            <img class="img-fluid rounded-circle mb-3" src="<?= base_url(); ?>assets/images/people-logo.png" alt="">
            <h2 class="text-center badge-dark" >จำนวนคนที่อยู่ในโซน</h2>
            <h2 class="text-center badge-dark" ><?= $zone['log_count']*1 ?></h2>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card mb-3">
          <div class="card-body">
            <img class="img-fluid rounded-circle mb-3" src="<?= base_url(); ?>assets/images/temp-logo.png" alt="">
            <!-- <h2 class="text-center badge-dark"> <?= $zone['temp_total']*1 ?> C</h2> -->
            <?php 
            if($zone['temp_total'] > 30.0){
                echo '<h2 class="text-center badge-dark">อากาศร้อน</h2>';
                echo '<h2 class="text-center badge-dark">'.$zone['temp_total'].'</h2>';
                
            }elseif($zone['temp_total'] >= 28.0 && $zone['temp_total'] <= 30.0){
              echo '<h2 class="text-center badge-dark">อากาศค่อนข้างร้อน</h2>';
              echo '<h2 class="text-center badge-dark">'.$zone['temp_total'].'</h2>';
              
            }elseif($zone['temp_total'] >= 25.0 && $zone['temp_total'] <= 27.0){
              echo '<h2 class="text-center badge-dark">อากาศเย็นสบาย</h2>';
              echo '<h2 class="text-center badge-dark">'.$zone['temp_total'].'</h2>';
              
            }elseif($zone['temp_total'] >= 23.0 && $zone['temp_total'] <= 24.0) {
              echo '<h2 class="text-center badge-dark">อากาศค่อนข้างเย็น</h2>';
              echo '<h2 class="text-center badge-dark">'.$zone['temp_total'].'</h2>';
              
            }elseif($zone['temp_total'] <= 22.0){
              echo '<h2 class="text-center badge-dark">อากาศหนาว</h2>';
              echo '<h2 class="text-center badge-dark">'.$zone['temp_total'].'</h2>';
              
            }
            ?>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card mb-3">
          <div class="card-body">
            <img class="img-fluid rounded-circle mb-3" src="<?= base_url(); ?>assets/images/sound-logo.jpg" alt="">
            <!-- <h2 class="text-center badge-dark"><?= $zone['loud_total']*1 ?> db</h2> -->
            <?php if($zone['loud_total']>=$zone['zone_maxloud']){ ?>
              <h2 class="text-center badge-dark">เสียงดังเกินกำหนด</h2>
              <h2 class="text-center badge-dark"><?= $zone['loud_total']*1 ?> db</h2>
              
            <?php }elseif($zone['loud_total']<$zone['zone_maxloud']) { ?>
              <h2 class="text-center badge-dark">ระดับเสียงปกติ</h2>
              <h2 class="text-center badge-dark"><?= $zone['loud_total']*1 ?> db</h2>
              
             <?php }?>
          </div>
        </div>
      </div>
    </div>

  </div>

<?php $this->load->view('template/footer'); ?>

</body>

</html>
