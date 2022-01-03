<ul class="nav nav-tabs nav-fill card-header-tabs">
          <li class="nav-item">
            <a class="nav-link <?php if(isset($type) AND $type=="day"){echo 'active';} ?>" href="<?= site_url('report') ?>">ดูจำนวนคนแบบรายวัน</a>
          </li>
          <li class="nav-item">
          <a class="nav-link <?php if(isset($type) AND $type=="month"){echo 'active';} ?>" href="<?= site_url('report/month') ?>">ดูจำนวนคนแบบรายเดือน</a>
          </li>
          <li class="nav-item">
          <a class="nav-link <?php if(isset($type) AND $type=="year"){echo 'active';} ?>" href="<?= site_url('report/year') ?>">ดูจำนวนคนรายปี</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if(isset($type) AND $type=="range"){echo 'active';} ?>" href="<?= site_url('report/range') ?>">ดูจำนวนคนตามช่วงวันที่ต้องการ</a>
          </li>
          
          
        </ul>