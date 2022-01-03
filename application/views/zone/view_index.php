<?php $this->load->view('template/header'); ?>


  <div class="container-fluid">

    <div class="card">
      <div class="card-body">
        <h1>
              <i class="fa fa-user"></i> จัดการโซนและอุปกรณ์
            </h1>
            <a href="<?= site_url('zone/create') ?>" class="btn btn-success"><i class="fa fa-user-plus"></i>เพิ่มโซน</a>
            <hr>

        <table class="table">
          <thead>
              <tr>
              <th style="vertical-align : middle;text-align:center;" rowspan="2" >ID</th>
              
              <th style="vertical-align : middle;text-align:center;" rowspan="2">ชื่ออุปกรณ์</th>
              <th style="vertical-align : middle;text-align:center;" rowspan="2">รหัสโซน</th>
              <th style="vertical-align : middle;text-align:center;" rowspan="2">ชื่อโซน</th>
              <th style="vertical-align : middle;text-align:center;" rowspan="2">ประเภทโซน</th>
              <th class="text-center">สถานะ Rasp.</th>
              <th class="text-center">Mac-address Rasp.</th>
              <th class="text-center">IP address Rasp.</th>
              <th style="vertical-align : middle;text-align:center;" rowspan="2">จัดการ</th>  
              </tr>
              <tr>
              <th class="text-center">สถานะ MCU</th>
              <th class="text-center">Mac-address MCU</th>
              <th class="text-center">IP address MCU</th> 
              </tr>
          </thead>
          <tbody>	
            <?php 
							foreach ($zone as $z) {
              echo '<tr>';
              echo '<td style="vertical-align : middle;text-align:center;" rowspan="2">'.$z['zone_id'].'</td>';
              
              echo '<td style="vertical-align : middle;text-align:center;" rowspan="2">'.$z['zone_deviceName'].'</td>';
              echo '<td style="vertical-align : middle;text-align:center;" rowspan="2">'.$z['zone_code'].'</td>'; 
              echo '<td style="vertical-align : middle;text-align:center;" rowspan="2">'.$z['zone_name'].'</td>';
              if($z['zone_maxloud'] == 45.0){
                echo '<th style="vertical-align : middle;text-align:center;" rowspan="2">'.'โซนเงียบ'.'</th>';
              }elseif($z['zone_maxloud'] == 150.0){
                echo '<th style="vertical-align : middle;text-align:center;" rowspan="2">'.'โซนใช้เสียงได้'.'</th>';
              }
              
              if($z['zone_status_rasp']==0){
								echo '<td class="text-center">
								<img src="'.base_url().'assets/images/reddot.png"  alt="" width="10px" height="10x">
								</td>'; 
              } elseif ($z['zone_status_rasp']==1) {
								echo '<td class="text-center">
								<img src="'.base_url().'assets/images/greendot.png"  alt="" width="10px" height="10x">
								</td>'; 
              } else{
                echo '<td class="text-center" >Error</td>';
              }
              echo '<td class="text-center">'.$z['zone_mac_rasp'].'</td>';
              echo '<td class="text-center">'.$z['zone_ip_rasp'].'</td>';
              echo '<td style="vertical-align : middle;text-align:center;" rowspan="2">';
              echo ' <a href="'.site_url('zone/display/'.$z['zone_id']).'" class="btn btn-warning btn-sm"><i class="fa fa-line-chart"></i> ดู Zone</a>';
              echo ' <a href="'.site_url('zone/edit/'.$z['zone_id']).'" class="btn btn-dark btn-sm"><i class="fa fa-edit"></i> แก้ไข</a>';
              echo ' <a href="'.site_url('zone/delete/'.$z['zone_id']).'" onclick="return confirm(\'ลบ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> ลบ</a>';
              echo '</tr>';
              
              echo '<tr>';
              
              if($z['zone_status_mcu']==0){
								echo '<td class="text-center">
								<img src="'.base_url().'assets/images/reddot.png"  alt="" width="10px" height="10x">
								</td>'; 
              } elseif ($z['zone_status_mcu']==1) {
								echo '<td class="text-center" rowspan="2">
								<img src="'.base_url().'assets/images/greendot.png"  alt="" width="10px" height="10x">
								</td>'; 
              } else{
                echo '<td class="text-center" rowspan="2">Error</td>';
              }
              echo '<td class="text-center">'.$z['zone_mac_mcu'].'</td>';
              echo '<td class="text-center">'.$z['zone_ip_mcu'].'</td>';
              echo '</tr>';
              echo '<tr>';
              
              
              echo '</td>';
              // echo '</tr>';
              // echo '<tr>';
             
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
