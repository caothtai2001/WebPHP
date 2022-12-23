<?php

  $user = $_SESSION['user'];
  $permission = $_SESSION['permission'];

  require_once('config.php'); 
  $conn = new mysqli('mysql-server', 'root', 'root', 'quantrivien');
  $sql = "SELECT * FROM nhanvien WHERE cccd='$user'";
  $result =$conn -> query($sql);
  if ($result -> num_rows ==0){
      die('loiroicmm');
  }
  $data = $result->fetch_array();
  $email = $data['email'].$data['duoiemail'];
  ?>
<div class ="home">
    <div class="flex-shrink-0 sidenav">
        <div class="logobrandcard">
            <div class="d-flex flex-row logothuonghieu">
                <div class="p-2"><a href="home.php"><img src="../images/logo.svg" width="50" /></a></div>
                <div class="p-2">
                    <h4>Triple T</h4>
                    <p>company</p>
                </div>
            </div>
        </div>
        <div class="profilecard">
            <span class="chucvu" chucvu="<?=$data['chucvu']?>"><?=$data['chucvu']?></span>
            <img class="round" src="../images/logo.png" height ="80" alt="user" />
            <h4 class="ten"><?=$_SESSION['name'] ?></h4>
            <h7 class ="phongban"><?=$data['phongban']?></h7>
            <p class ="email"><?=$email?></p>
            <a class="btn btn-outline-danger" href="logout.php">Đăng xuất</a>
            <button class="btn btn-outline-primary dropdown-toggle " data-bs-toggle="dropdown">Tùy chọn</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item " href="changepassword.php">Đổi mật khẩu</a></li>
                <li><a class="dropdown-item" href="changavt.php">Đổi ảnh đại diện</a></li>
                <li><a class="dropdown-item" href="myprofile.php?cccd=<?=$user?>">Thông tin cá nhân</a></li>

            </ul>
        </div>
        <div class="selectlist flex-fluid">
            <ul class="list-unstyled ps-0">
                <li class="mb-1 hidequantri" permission="<?=$_SESSION['permission'] ?>" >
                    <button class="btn title1 align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    Quản trị
                    </button>                   
                    <div class="collapse" id="home-collapse">
                        <ul class="title1-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="manage_department.php" class="link-dark rounded">Phòng ban</a></li>
                            <li><a href="manage_human.php" class="link-dark rounded">Nhân sự</a></li>
                            <li><a href="manage_account.php" class="link-dark rounded">Tài khoản</a></li>

                        </ul>
                    </div>
                </li>
                <?php
                if ($permission != '2') {       ?>
                <li class="mb-1 hidephongban" permission="<?=$_SESSION['permission'] ?>">
                    <button class="btn title1 align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#phongban-collapse" aria-expanded="false">
                    Phòng <?=$data['phongban']?>
                    </button>                   
                    <div class="collapse" id="phongban-collapse">
                        <ul class="title1-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="manage_departmentdetail.php" class="link-dark rounded">Thông tin</a></li>           
                            <li><a href="manage_departmenttruongphong.php?phongban=<?$data['phongban']?>" class="link-dark rounded">Nhân sự</a></li>

                        </ul>
                    </div>
                </li>
                
                <?php
                }
                ?>
                

                <li class="mb-1 hidenhiemvu" permission="<?=$_SESSION['permission'] ?>">
                    <button class="btn title1 align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    Nhiệm vụ
                    </button>
                    <div class="collapse" id="orders-collapse">
                    <ul class="title1-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="manage_mytask.php" class="link-dark rounded mytask" permission="<?=$_SESSION['permission'] ?>" >Đang chờ</a></li>
                        <li><a href="manage_mytaskinprocess.php" class="link-dark rounded mytask" permission="<?=$_SESSION['permission'] ?>" >Đang làm</a></li>
                        <li><a href="manage_mytaskdone.php" class="link-dark rounded mytask" permission="<?=$_SESSION['permission'] ?>" >Đã hoàn tất</a></li>
                        <li class="hidetaomoinhiemvu" permission="<?=$_SESSION['permission'] ?>"><a href="newtask.php" class="link-dark rounded">Tạo mới</a></li>
                        <li ><a href="manage_task.php" class="link-dark rounded tientrinhtask" permission="<?=$_SESSION['permission'] ?>">Tiến trình</a></li>
                    </ul>
                    </div>
                </li>
                <li class="mb-1" >
                    <button class="btn title1 align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#tinhnang-collapse" aria-expanded="false">
                    Nghỉ phép
                    </button>                   
                    <div class="collapse" id="tinhnang-collapse">
                        <ul class="title1-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="xinnghiphep.php" class="link-dark rounded xinnghiphep" permission="<?=$_SESSION['permission'] ?>">Xin nghỉ phép</a></li>
                            <li><a href="lichsunghiphep.php" class="link-dark rounded xinnghiphep" permission="<?=$_SESSION['permission'] ?>">Lịch sử nghỉ phép</a></li>
                            <li><a href="manage_attendance.php" class="link-dark rounded duyetnghiphep" permission="<?=$_SESSION['permission'] ?>">Duyệt nghỉ phép</a></li>
                            <li><a href="manage_attendance_approved.php" class="link-dark rounded lichsuduyet" permission="<?=$_SESSION['permission'] ?>">Lịch sử duyệt</a></li>

                           
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>