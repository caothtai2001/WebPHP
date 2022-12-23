<?php 

session_start();
  if (!isset($_SESSION['user'])) {
      header('Location: login.php');
      exit();
  }
  $user = $_SESSION['user'];
  include 'permission_admin.php'; //chỉ có giám đốc mới được dô đây thôi nha

  require_once('config.php'); 
  $conn = new mysqli('mysql-server', 'root', 'root', 'quantrivien');
  $sql = "SELECT * FROM nhanvien WHERE cccd='$user'";
  $result =$conn -> query($sql);
  if ($result -> num_rows ==0){
      die('loiroicmm');
  }

  $data = $result->fetch_array();
  $email = $data['email'].$data['duoiemail'];
  require_once('config.php');                        
  $conn = new mysqli('mysql-server', 'root', 'root', 'quantrivien');
    $sql = "SELECT id, user, pass, trangthai FROM login";
    // Thực thi câu truy vấn và gán vào $result
    $result = $conn->query($sql);
    $result = getAccount();
    $number_of_account = 0;
    if ($result['code']==0) {
      $accountList = $result['data'];
      $number_of_account = count($accountList);
  }  
?>
<?php 
    include 'permission_admin.php'; 
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
  <div class="p-5 bg-primary text-white text-center">
    <h1>Tài khoản nội bộ</h1>
  </div>
  <div class="d-grid pt-5">

  <div class="container-fuild p-5 my-5">
    <div class="table-responsive">
      <table class="table table-hover table-striped rounded-3">  <!-- table-striped là tô màu xen kẽ -->
        <thead class="table-success">
          <tr>
            <td>STT</td>
            <td>Họ và tên</td>
            <td>Tên tài khoản</td>
            <td>Mật khẩu</td>
            <td>Trạng thái</td>
            <td>Đặt lại mật khẩu</td>                              
          </tr>
        </thead>
        <tbody>
 
        <?php
        $count1 = 0;
                        foreach ($accountList as $account) {
                          $count1 =  $count1 +1;
                            $accountid = $account['id'];
                            $accountuser = $account['user'];
                            $accountpass = $account['pass'];                        
                            $name = $account['firstname'] . ' ' . $account['lastname'];
                            $accounttrangthai = $account['trangthai']; 

                    ?>
                            <tr class="item">
                            
                            <td><?=$count1?></td>
                                <td><?=$name?></td>
                                <td id="user"><?=$accountuser?></td>
                                <td><?=$accountpass?></td>                                
                                <td><?=$accounttrangthai?></td>                                
                                <td>
                                <a class="btn btn-warning" href="manage_account.php?id=<?=$accountuser?>">Đặt lại</a>
                                </td>

                                
                            </tr>
                          <?php
                        }
                      ?>    
                     
                        
 
                        
                    </tbody>
                    <tfoot class="bg-z">
                        <tr>
                            <td colspan="11">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Số tài khoản hệ thống: <?=$number_of_account?></p>
                                </div>
                            </td>
                        </tr>
                        
                    </tfoot>
                </table>
        </div>        
</div>

<!-- Button trigger modal xac nhan-->
<div class="modal fade" id="changepass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đặt lại mật khẩu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Tài khoản này sẽ được đặt lại mật khẩu
      </div>
      <div class="modal-footer">
     
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
         <a class="btn btn-success" href="manage_account.php?id=<?=$accountuser?>">Đặt lại</a>
  
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
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Đặt lại mật khẩu thành công")';  
    echo '</script>';  
    }}

    $sql = "SELECT * from login where user = '$id'";
    $result = mysqli_query($conn,$sql);
    $data = $result->fetch_assoc();
    $hashed_pw = $data['user'];
    $pass = password_hash($hashed_pw, PASSWORD_DEFAULT);


    $sql="UPDATE  login SET pass='$pass' WHERE user=?";
    $stm=$conn->prepare($sql);

    $stm->bind_param("s",$id);

    if(!$stm->execute()){
        die('can not:'.$stm->error);

    }else

   $conn->close();

?>
