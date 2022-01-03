
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if(isset($title)){echo $title;} ?></title>


  <link rel="stylesheet" href="<?= base_url() ?>assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>

<body>

  <header class="mb-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <a class="navbar-brand" href="#">
          <i class="fa fa-microchip text-warning"></i>
          <strong>IOT</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <?php if($this->session->userdata('user_id')){ ?>
          <div class="navbar-nav">
            <a class="nav-item nav-link <?php if(isset($menu) AND $menu=='home'){echo 'active';} ?>" href="<?= base_url() ?>index.php">หน้าแรก</a>
            <?php if($this->session->userdata('user_id')==1){ ?>
            <a class="nav-item nav-link <?php if(isset($menu) AND $menu=='report'){echo 'active';} ?>" href="<?= base_url() ?>index.php/Report">ดูจำนวนผู้เข้าใช้</a>
            <a class="nav-item nav-link <?php if(isset($menu) AND $menu=='zone'){echo 'active';} ?>" href="<?= base_url() ?>index.php/Zone">จัดการโซนและอุปกรณ์</a>
            <a class="nav-item nav-link <?php if(isset($menu) AND $menu=='user'){echo 'active';} ?>" href="<?= base_url() ?>index.php/User">จัดการข้อมูลสมาชิก</a>
            <?php } ?>
          </div>

          <ul class="navbar-nav ml-auto">
      
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i> <?= $this->session->userdata('user_username') ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                
                <a class="dropdown-item" href="<?= site_url('profile/change_password') ?>">เปลี่ยนรหัสผ่าน</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url() ?>index.php/Authen/logout">ออกจากระบบ</a>
              </div>
            </li>
            
          </ul>
          <?php }else{ ?>
          <div class="navbar-nav">
            <a class="nav-item nav-link <?php if(isset($menu) AND $menu=='home'){echo 'active';} ?>" href="<?= base_url() ?>index.php">หน้าแรก</a>
            <a class="nav-item nav-link <?php if(isset($menu) AND $menu=='login'){echo 'active';} ?>" href="<?= base_url() ?>index.php/Authen">เข้าสู่ระบบ</a>
          </div>
          <?php } ?>
        </div>
      </div>
    </nav>
  </header>
