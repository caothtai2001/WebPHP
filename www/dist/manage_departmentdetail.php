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
                       
  $conn = new mysqli('mysql-server', 'root', 'root', 'quantrivien');
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
  $phongban ='';
  if(isset($_GET["phongban"])) { 
      $phongban = $_GET['phongban']; 
  {
      
      }} 
  $sql = "SELECT * FROM nhanvien WHERE phongban = '$phongban' ";
  $result1 = $conn->query($sql);

  
?>
<?php 
    include 'permission_banuser.php'; 
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

<div class="main">
<?php
    include 'sidebar.php';

    ?>
  <div class="tieude">
      <p class="dongtieude">Quản lí phòng <?=$phongban?></p>
  </div>
<div class="d-grid pt-5">
  <div class="container-fuild p-5 my-5">
    <div class="table-responsive">
      <table class="table table-hover table-striped rounded-3">
        <thead class="table-success">
          <tr>
            <td>STT</td>
            <td>Tên nhân viên</td>
            <td>Giới tính</td>
            <td>Chức vụ</td>
            <td>SĐT</td>
            <td>Email</td>
            <td >Thao tác</td>                                         
          </tr>
        </thead>
        <tbody>
        <?php
            $count1=0;
            if ($result1->num_rows > 0) {
            while($row = $result1->fetch_assoc()) {
                $count1=$count1+1;
                $humanstt = $row["stt"];
                $humanchucvu = $row['chucvu'];
                $humanphongban = $row['phongban'];                        
                $name =  $row['lastname'] . ' ' .$row['firstname'];
                $humancccd = $row['cccd'];                        
                $humangender = $row['gender'];                        
                $humanngaysinh = $row['ngaysinh'];                        
                $humansodienthoai = $row['sdt'];                        
                $humanemail = $row['email'] . $row['duoiemail'];
        ?>                                                                    
                            <tr class="item">
                                <td class ="text-center"><?=$count1?></td>
                                <td><?=$name?></td>
                                <td class ="text-center"><?=$humangender?></td>
                                <td><?=$humanchucvu?></td>
                                <td><?=$humansodienthoai?></td>
                                <td><?=$humanemail?></td>
                                <td>
                                <a class="btn btn-outline-info" href="profiledetail.php?cccd=<?=$humancccd?>">Truy cập</a>                             
                                </td>                         
                            </tr>
                          <?php
                          }
                        } else {
                        }
                        
                      ?>                      
                    </tbody>

                </table>
        </div>        
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../main.js"></script>
  </body>


</html>
