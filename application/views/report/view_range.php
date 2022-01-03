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


          <div class="col-md-4">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <label class="input-group-text bg-dark text-light border-dark">
                    ตั้งแต่วันที่
                  </label>
                </div>
                <input type="date" name="start" class="form-control" value="<?= $start; ?>" required>
              </div>
            </div>
          </div>


          <div class="col-md-4">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <label class="input-group-text bg-dark text-light border-dark">
                    ถึงวันที่
                  </label>
                </div>
                <input type="date" name="end" class="form-control" value="<?= $end; ?>" required>


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
            
          }else{
         ?>

         <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>

        <div id="mychart"></div>
        <hr>
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
				<?php } ?>		
      </div>

    </div>
  </div>

<?php $this->load->view('template/footer'); ?>

<script>
<?php 
    $j=0;
    $series='';
    foreach ($chart as $c) {
      if($j>0){
        $series.=' , ';
            
      } 

      $datediff = strtotime($end) - strtotime($start);
        $range_day=round($datediff / (60 * 60 * 24))+1;
        // echo $range_day;

        // exit;

        $data='';
        $cat='';
        for ($i=0; $i < $range_day; $i++) { 
          if($i>0){
            $data.=' , ';
            $cat.=' , ';
          } 
            $day=date('Y-m-d',strtotime($start .' + '.$i.' day'));
            $dd=0;
            if($c['d'.date('Ymd',strtotime($day))]!=''){
              $dd=$c['d'.date('Ymd',strtotime($day))];
            }
            $data.=$dd;
            $cat.="'".DateThai($day)."'";
        }
      $series.= '{
        name: \''.$c['zone_code'].' - '.$c['zone_name'].'\',
        data: ['.$data.']
      }';
      $j++;
    }
    ?>
  Highcharts.chart('mychart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'สถิติเข้าใช้ระหว่างวันที่ <?= DateThai($start).' ถึงวันที่ '.DateThai($end) ?>'
    },
   
    xAxis: {
        
        categories: [
          <?=  $cat; ?>
        ]
    },
    yAxis: {
        title: {
            text: 'จำนวนผู้เข้าใช้ (คน)'
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },
    series: [
      <?= $series; ?>
    ]
});
  
</script>

</body>

</html>
