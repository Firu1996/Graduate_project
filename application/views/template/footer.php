
  <script src="<?= base_url() ?>assets/bootstrap/js/jquery-3.3.1.slim.min.js"></script>
  <script src="<?= base_url() ?>assets/bootstrap/js/popper.min.js"></script>
  <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

  <script>
  	  <?php if($this->session->flashdata('save_success')){ ?>
		Swal.fire({
  							type: 'success',
  							title: 'บันทึกข้อมูลสำเร็จ',
  							text: ' ',
			})
  	  <?php } ?>
      <?php if($this->session->flashdata('password_wrong')){ ?>
  		Swal.fire({
  							type: 'error',
  							title: 'เข้าสู่ระบบไม่ได้',
  							text: 'Username หรือ Password ผิด',
			})
  	  <?php } ?>
	  <?php if($this->session->flashdata('change_success')){ ?>
  		Swal.fire({
  							type: 'success',
  							title: 'เปลี่ยนรหัสผ่านสำเร็จ',
  							text: ' ',
			})
  	  <?php } ?>
	  <?php if($this->session->flashdata('change_error')){ ?>
  		Swal.fire({
  							type: 'error',
  							title: 'เปลี่ยนรหัสผ่านไม่ได้',
  							text: 'กรอก Password เก่าไม่ถูกต้อง',
			})
  	  <?php } ?>
	  <?php if($this->session->flashdata('delete_success')){ ?>
  		Swal.fire({
  							type: 'success',
  							title: 'ลบข้อมูลเรียบร้อยแล้ว',
  							text: ' ',
			})
  	  <?php } ?>
	  <?php if($this->session->flashdata('login_success')){ ?>
  		Swal.fire({
  							type: 'success',
  							title: 'ยินดีต้อนรับเข้าสู่ระบบ',
  							text: ' ',
			})
  	  <?php } ?>
	  


  </script>
