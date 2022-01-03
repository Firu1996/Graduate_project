<?php $this->load->view('template/header'); ?>


  <div class="container mb-4">

    <div class="card">
      <div class="card-body">
        <h1>
              <i class="fa fa-user"></i> จัดการข้อมูลสมาชิก
            </h1>
            <a href="<?= site_url('user/create') ?>" class="btn btn-success"><i class="fa fa-user-plus"></i>เพิ่มผู้ใช้</a>
            <hr>

        <table class="table">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Username</th>
              <th class="text-center">ชื่อ</th>
              <th class="text-center">จัดการ</th>

            </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($user as $u) {
              echo '<tr>';
              echo '<td class="text-center">'.$u['user_id'].'</td>';
              echo '<td class="text-center">'.$u['user_username'].'</td>';
              echo '<td class="text-center">'.$u['user_name'].'</td>';
              echo '<td class="text-center">';
              if($u['user_id']!=1){
              echo '<a href="'.site_url('user/edit/'.$u['user_id']).'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</a>';  
              echo ' <a href="'.site_url('user/delete/'.$u['user_id']).'" onclick="return confirm(\'ลบ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> ลบ</a>';
              }
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
