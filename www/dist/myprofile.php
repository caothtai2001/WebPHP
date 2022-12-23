<?php 

session_start();
  if (!isset($_SESSION['user'])) {
      header('Location: login.php');
      exit();
  }
  $user = $_SESSION['user'];

  require_once('config.php'); 
  
  $conn = new mysqli('mysql-server', 'root', 'root', 'quantrivien');
  $sql = "SELECT * FROM nhanvien WHERE cccd='$user'";
  $result =$conn -> query($sql);
  if ($result -> num_rows ==0){
      die('loiroicmm');
  }

  $data = $result->fetch_array();
  $email = $data['email'].$data['duoiemail'];
                       
    $sql = "SELECT mapb, phongban, chucnang, soluongnhanvien FROM phongban";
    // Thực thi câu truy vấn và gán vào $result
    $result = $conn->query($sql);
    $result = getPhongban();
    $number_of_phongban = 0;
    
    if ($result['code']==0) {
      $phongbanList = $result['data'];
      $number_of_phongban = count($phongbanList);
  }  
  $conn = new mysqli('mysql-server', 'root', 'root', 'quantrivien');
  // Check connection
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  $cccd ='';
  if(isset($_GET["cccd"])) { 
      $cccd = $_GET['cccd']; 
  {
      
      }} 
  $sql = "SELECT * FROM nhanvien WHERE cccd = '$cccd' ";
  $result1 = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
        <link rel="stylesheet" href="../style.css">
    <title>Quản lí chấm công | Triple T Company</title>
    <link rel="shortcut icon" href="../images/logo.svg"/>
    </head>


<body>
<?php include 'sidebar.php'; ?>

<div class="main">
    <div class ="profiledetail">
    
        <?php
            if ($result1->num_rows > 0) {
            while($row = $result1->fetch_assoc()) {
                $humanchucvu = $row['chucvu'];
                $humanphongban = $row['phongban'];                        
                $name =  $row['lastname'] . ' ' .$row['firstname'];
                $humancccd = $row['cccd']; 
                $humanngaycap= $row['ngaycap'];                                               
                $humangender = $row['gender'];                        
                $humanngaysinh = $row['ngaysinh'];                        
                $humansodienthoai = $row['sdt'];  
                $humansodienthoaikc = $row['sdtkc'];  
                $humanquanhe = $row['quanhe'];                        
                $humanthuongtru = $row['thuongtru'];                        
                $humannoisinh = $row['noisinh'];                        
                $humantongiao = $row['tongiao'];                        
                $humandantoc = $row['dantoc'];  
                $humanquoctich = $row['quoctich'];                        
                $humannoicap = $row['noicap'];                       
                $humanemail = $row['email'] . $row['duoiemail'];
                $humanstk = $row['stk'];                        
                $humannganhang = $row['nganhang'];                        
        ?>                                                                    
        <?php
        }
        } else { }
        ?>    
        <div class="tieude">
            <p class="dongtieude"> <?=$name?></p>
        </div>                  
        <div class = "dong1 row justify-content-center">
            <div class="profilecarddetail">
                <span class="chucvu" chucvu="<?=$humanchucvu?>"><?=$humanchucvu?></span>
                <span class ="phongban">Phòng <?=$humanphongban?></span>
                <img class="round" src="../images/logo.png" height ="80" alt="user" />
                <h3 class="ten">Họ và tên: <?=$name?></h3>
                <h4 class ="email">Mã nhân viên (National ID): <?=$humancccd?></h4>
                <p class ="ttcccd" chucvu="<?=$humanchucvu?>">Ngày cấp: <?=$humanngaycap?>, tại <?=$humannoicap?></p>
                <p class ="email">Ngày sinh: <?=$humanngaysinh?>, giới tính: <?=$humangender?></p>
                <p class ="email">Số điện thoại: <?=$humansodienthoai?></p>
                <p class ="email">Địa chỉ mail: <?=$humanemail?></p>

                <p class ="email">Số điện thoại khẩn cấp: <?=$humansodienthoaikc?> - <?=$humanquanhe?></p>
                <p class ="email">Nơi sinh: <?=$humannoisinh?> - Thường trú: <?=$humanthuongtru?></p>
                <p class ="email">Dân tộc: <?=$humandantoc?> - Tôn giáo: <?=$humantongiao?></p>
                <p class ="email">Quốc tịch: <?=$humanquoctich?></p>
                <p class ="email">Số tài khoản: <?=$humanstk?> ngân hàng <?=$humannganhang?></p>
            </div>
        </div>
    </div> 
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../main.js"></script>
  </body>


</html>