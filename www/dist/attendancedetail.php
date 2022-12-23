<?php 

session_start();
  if (!isset($_SESSION['user'])) {
      header('Location: login.php');
      exit();
  }
  $user = $_SESSION['user'];

  include 'permission_banuser.php'; //chỉ có giám đốc mới được dô đây thôi nha
  require_once('config.php');                        
  $conn = new mysqli('mysql-server', 'root', 'root', 'quantrivien');
  // Check connection
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  $madonxnp ='';
  if(isset($_GET["madonxnp"])) { 
      $madonxnp = $_GET['madonxnp']; 
  {
      
      }} 
  $sql = "SELECT * FROM xinnghiphep WHERE madonxnp = '$madonxnp' ";
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
<?php
    include 'sidebar.php';
    ?>
<div class="main">
    
        <?php
            if ($result1->num_rows > 0) {
            while($row = $result1->fetch_assoc()) {
                $xinnghiphep1 = $row["madonxnp"];
                $xinnghiphep2 = $row['cccd'];
                $xinnghiphep3 = $row['ten'];                        
                $xinnghiphep4 = $row['ngaynghi'];
                $xinnghiphep5 = $row['songay'];                        
                $xinnghiphep6 = $row['lydo'];                        
                $xinnghiphep7 = $row['trangthai'];                        
                $xinnghiphep8 = $row['machucvu'];  


        ?>                                                                    
        <?php
        }
        } else { }
        ?>    
        <div class="tieude">
            <p class="dongtieude"> Đơn xin nghỉ phép</p>
        </div>                  
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Chi tiết đơn xin nghỉ phép</h3></div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label" >Mã nhân viên</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lydo" id="inputEmail3" placeholder="<?=$xinnghiphep2?>"  disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label" >Tên nhân viên</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lydo" id="inputEmail3" placeholder="<?=$xinnghiphep3?>"  disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label" >Lý do</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lydo" id="inputEmail3" placeholder="<?=$xinnghiphep6?>"  disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label" ></label>
                            <div class = "col ">
                                <label for="inputEmail3" class="col-sm-10 col-form-label" >Số ngày</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="lydo" id="inputEmail3" placeholder="<?=$xinnghiphep5?>"  disabled>
                                </div>
                            </div>
                            <div class = "col ">
                                <label for="inputEmail3" class="col-sm-6 col-form-label" >Từ ngày</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="lydo" id="inputEmail3" placeholder="<?=$xinnghiphep4?>"  disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label" ></label>

                            <div class = "col mb-6">
                                <label for="inputEmail3" class="col-sm-6 col-form-label" >Trạng thái</label>
                                <input type="text" class="form-control" name="lydo" id="inputEmail3" placeholder="<?=$xinnghiphep7?>"  disabled>
                            </div>
                        </div>
                        <td>
                                <a type="button" class="btn btn-outline-primary btnaccept" href="manage_attendance_approved.php?id=<?=$xinnghiphep1?>">
                                  Đồng ý</a>
                                </td>
                                <td>
                                <a type="button" class="btn btn-danger btnaccept"  href="manage_attendance_approved.php?id1=<?=$xinnghiphep1?>">
                                  Từ chối</a>
                                </td>
                        
                    
                    </div>
                    <div class="card-footer text-center py-3">
                    <div class="small">Created By Triple T Team | Copyright © 2022 all rights reserved</div>
                </div>
            </div>                            
        </div>
    </div>
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../main.js"></script>
  </body>


</html>
<?php
//khai báo
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

// lấy giá trị
$id="";
if(isset($_GET["id"])) { $id = $_GET['id']; 
  {

    }}

    $sql="UPDATE xinnghiphep SET trangthai='approved' WHERE madonxnp=?";
    $stm=$conn->prepare($sql);

    $stm->bind_param("i",$id);

    if(!$stm->execute()){
        die('can not:'.$stm->error);

    }else

   $id1="";
   if(isset($_GET["id1"])) { $id1 = $_GET['id1']; 
     {
   
       }}
   
       $sql="UPDATE xinnghiphep SET trangthai='refused' WHERE madonxnp=?";
       $stm=$conn->prepare($sql);
   
       $stm->bind_param("i",$id1);
   
       if(!$stm->execute()){
           die('can not:'.$stm->error);
   
       }else
      $conn->close();
 
   

	// Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên
	
?>