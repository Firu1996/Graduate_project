<?php $this->load->view('template/header'); ?>
  <meta http-equiv="refresh" content="15" />

  <div class="container mb-4">

    <div class="card">
      <div class="card-body">
        <h1>
          <i class="fa fa-home"></i> หน้าแรก
        </h1>
            

        <table class="table">
          <thead>
            <tr>
              <th class="text-center">ID</th>
							<th class="text-center">สถานะ Rasp</th>
              <th class="text-center">สถานะ MCU</th>
              <th class="text-center">รหัสโซน</th>
              <th class="text-center">ชื่อโซน</th>
              <th class="text-center">จำนวนคน</th>
              <th class="text-center">อุณภูมิ</th>
              <th class="text-center">ความดัง</th>
              <th class="text-center">ระดับเสียงในโซน</th>
              <th class="text-center">ดูโซน</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($zone as $z) {
              echo '<tr>';
							echo '<td class="text-center">'.$z['zone_id'].'</td>';
							if($z['zone_status_rasp']==0){
								echo '<td class="text-center">
								<img src="'.base_url().'assets/images/reddot.png"  alt="" width="10px" height="10x">
								</td>'; 
              } elseif ($z['zone_status_rasp']==1) {
								echo '<td class="text-center">
								<img src="'.base_url().'assets/images/greendot.png"  alt="" width="10px" height="10x">
								</td>'; 
              } else{
                echo '<td class="text-center">Error</td>';
              }
              if($z['zone_status_mcu']==0){
								echo '<td class="text-center">
								<img src="'.base_url().'assets/images/reddot.png"  alt="" width="10px" height="10x">
								</td>'; 
              } elseif ($z['zone_status_mcu']==1) {
								echo '<td class="text-center">
								<img src="'.base_url().'assets/images/greendot.png"  alt="" width="10px" height="10x">
								</td>'; 
              } else{
                echo '<td class="text-center">Error</td>';
              }
              echo '<td class="text-center">'.$z['zone_code'].'</td>';
							echo '<td class="text-center">'.$z['zone_name'].'</td>';
							if(empty($z['log_count'])){
								echo '<td class="text-center">'.' 0 คน '.'</td>';
							} else {
								echo '<td class="text-center">'.$z['log_count'].' คน'.'</td>'; 
							}
							if(empty($z['temp_total'])){
								echo '<td class="text-center">'.' 0 C '.'</td>';
							} else {
								echo '<td class="text-center">'.$z['temp_total'].' C'.'</td>'; 
							}
							if(empty($z['loud_total'])){
								echo '<td class="text-center">'.' 0 db '.'</td>';
							} else {
								echo '<td class="text-center">'.$z['loud_total'].' db'.'</td>'; 
              }
              if($z['loud_total']>=$z['zone_maxloud']){
                echo '<th class="text-center" style="color:red;">'.'เสียงดังเกินกำหนด'.'</th>';
              }elseif($z['loud_total']<$z['zone_maxloud']) {
                echo '<th class="text-center">'.'ระดับเสียงปกติ'.'</th>';
              }
              echo '<td class="text-center">';
              echo '<a href="'.site_url('home/display/'.$z['zone_id']).'" class="btn btn-warning btn-sm"><i class="fa fa-line-chart"></i> ดู Zone</a>';
              echo '</td>';
              echo '</tr>';
            }
            ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>

<?php $this->load->view('template/footer'); ?>

</body>

</html>
