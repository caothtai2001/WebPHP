<?php
    session_start();
    session_destroy();
    $usercf=$_SESSION['user'];
 

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


  $sql="CREATE TABLE IF NOT EXISTS contact(id int primary key AUTO_INCREMENT, name varchar(128),email varchar(128),message varchar(128))";
  $conn->select_db('quantrivien');
  if(!$conn->query($sql))
  {
      die('can not'.$conn->error );
  }

 
//khai bao giá trị
$pass="";
$cfpass="";
$oldpass="";

// lấy giá trị

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["pass"])) { $pass = $_POST['pass']; }
  if(isset($_POST["cfpass"])) { $cfpass = $_POST['cfpass']; }
  if(isset($_POST["oldpass"])) { $oldpass = $_POST['oldpass']; }
}

$sql = "SELECT * from login where user = '$usercf'";
$result = mysqli_query($conn,$sql);
$data = $result->fetch_assoc();
$hashed_pw = $data['pass'];

if(password_verify($oldpass,$hashed_pw) && $pass===$cfpass){
  $password_hash = password_hash($pass, PASSWORD_DEFAULT);
  $sql="UPDATE login set pass='$password_hash' where user='$usercf'";
  if(mysqli_query($conn,$sql)){
 

}else{
}
  $sql="UPDATE login set trangthai='active' where user='$usercf'";
  if(mysqli_query($conn,$sql)){
}else{
}
  $conn->close();
}
// else{
//   exit;
// }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login | Triple T Company</title>
    <link rel="shortcut icon" href="../images/logo.svg" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mt-5 mx-auto p-3 border rounded">
            <h4>Đổi mật khẩu thành công</h4>
            <p>Tài khoản của bạn đã được đăng xuất khỏi hệ thống.</p>
            <p>Nhấn <a href="login.php">vào đây</a> để trở về trang đăng nhập, hoặc trang web sẽ tự động chuyển hướng sau <span id="counter" class="text-danger">5</span> giây nữa.</p>
            <a class="btn btn-success px-5" href="login.php">Đăng nhập</a>
        </div>
      </div>
    </div>
  <script>
      let duration = 5;
      let countDown = 5;
      let id = setInterval(() => {

          countDown --;
          if (countDown >= 0) {
              $('#counter').html(countDown);
          }
          if (countDown == -1) {
              clearInterval(id);
              window.location.href = 'login.php';
          }

      }, 1000);
  </script>
  </body>
</html>
