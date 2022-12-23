<?php
  session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
    $user = $_SESSION['user'];

    include 'permission_truongphong.php';

    require_once('config.php'); 
    $conn = new mysqli('mysql-server', 'root', 'root', 'quantrivien');
    $sql = "SELECT * FROM nhanvien WHERE cccd='$user'";
    $result =$conn -> query($sql);
    if ($result -> num_rows ==0){
        die('loiroicmm');
    }

    $data = $result->fetch_array();
    $email = $data['email'].$data['duoiemail'];
    $phongban = $data['phongban'];
    $user = $_SESSION['user'];

    require_once('config.php'); 
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
  $host = 'mysql-server'; // tên mysql server
  $user = 'root';
  $pass = 'root';
  $db = 'quantrivien'; // tên databse

    //kết nối database
  $conn = new mysqli($host, $user, $pass, $db);
  $conn->set_charset("utf8");
  //kiểm tra kết nối 
  if ($conn->connect_error) {
      die('Không thể kết nối database: ' . $conn->connect_error);
  }

  //khai bao giá trị
  $tenda="";
  $mota=""; 
  $ngaytao="";
  $ngaynop="";
  $tennv="";
  $phongban = $data['phongban'];


// lấy giá trị

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["tenda"])) { $tenda = $_POST['tenda']; }
        if(isset($_POST["mota"])) { $mota = $_POST['mota']; }
        if(isset($_POST["ngaytao"])) { $ngaytao = $_POST['ngaytao']; } 
        if(isset($_POST["ngaynop"])) { $ngaynop = $_POST['ngaynop']; }
        if(isset($_POST["tennv"])) { $tennv = $_POST['tennv']; 
        $sql="INSERT INTO duan(tenda,mota,ngaytao,ngaynop,tennv,phongban) VALUES('$tenda','$mota','$ngaytao','$ngaynop','$tennv','$phongban')";
        if(mysqli_query($conn,$sql)){
        
      }
        }
      }
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
    <title>New Task | Triple T Company</title>
    <link rel="shortcut icon" href="../images/logo.svg"/>
    </head>


<body class = "home">
<?php include 'sidebar.php'; ?>


<div class="main">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Nhiệm vụ mới</h3></div>
                    <div class="card-body">
                    <form action = "newtask.php" method ="POST">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tên nhiệm vụ</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="tenda">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Mô tả</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="mota">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Từ ngày</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" name="ngaytao" id="from">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Đến ngày</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" name="ngaynop" id="deadline">
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Giao cho </legend>
                            <div class="col-sm-10">
                               
                            <?php
                                // Create connection
                                $conn = new mysqli('mysql-server', 'root', 'root', 'quantrivien');
                                // Check connection
                                if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
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
                                $phongban = $data['phongban'];
                                $user = $_SESSION['user'];

                                $sql = "SELECT * FROM nhanvien WHERE phongban = '$phongban' ";
                                $result = $conn->query($sql);
                                $count1=0;
                                if ($result->num_rows > 0) {
                                // output data of each row

                                while($row = $result->fetch_assoc()) {                       
                                    $name =  $row['lastname'] . ' ' .$row['firstname'];
               
                            ?>     
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tennv" value="<?=$name?>" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault"><?=$name?></label>
                                </div>
                                <?php
                          }
                        } else {
                        }
                        
                      ?> 
                        
                            </div>
                        </fieldset>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-outline-primary ">Tạo task</button>                                  
                        </div>
                    </form>
                    </div>
                    <div class="card-footer text-center py-3">
                    <div class="small">Created By Triple T Team | Copyright © 2022 all rights reserved</div>
                    <a href="contact.php">Contact to us...</a>

                </div>
            </div>                            
        </div>
    </div>
</div>

  

 

    
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../main.js"></script>
  </body>
<?php


?>

</html>