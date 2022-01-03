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
                    เลือกปี
                  </label>
                </div>
                <input type="number" min="2019" name="year" class="form-control" value="<?= $year; ?>">
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

        <div id="mychart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        <hr>

        <div class="row">
          <?php foreach ($reports as $r) { ?>
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
  Highcharts.chart('mychart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'สถิติการเข้าใช้ปี <?= YearThai($year); ?>'
    },
    
    xAxis: {
        categories: [
            'มกราคม <?= YearThai($year); ?>',
            'กุมภาพันธ์ <?= YearThai($year); ?>',
            'มีนาคม <?= YearThai($year); ?>',
            'เมษายน <?= YearThai($year); ?>',
            'พฤษภาคม <?= YearThai($year); ?>',
            'มิถุนายน <?= YearThai($year); ?>',
            'กรกฎาคม <?= YearThai($year); ?>',
            'สิงหาคม <?= YearThai($year); ?>',
            'กันยายน <?= YearThai($year); ?>',
            'ตุลาคม <?= YearThai($year); ?>',
            'พฤศจิกายน <?= YearThai($year); ?>',
            'ธันวาคม <?= YearThai($year); ?>'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'จำนวนผู้เข้าใช้ (คน)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} คน</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        // column: {
        //     pointPadding: 0.2,
        //     borderWidth: 0
        // }
    },
    series: [
    <?php 
    $j=0;
    foreach ($chart as $c) {
      if($j>0){
        echo ',';
      }

      $data='';
      for ($i=1; $i <= 12; $i++) { 
        if($i>1){
          $data.=' , ';
        }

        $dd=0;
        if($c['d'.$i]!=''){
          $dd=$c['d'.$i];
        }
        $data.=$dd;
      }
      echo '{
        name: \''.$c['zone_code'].' - '.$c['zone_name'].'\',
        data: ['.$data.']
      }';
      $j++;
    }
    ?>
    ]
});
</script>

</body>

</html>
