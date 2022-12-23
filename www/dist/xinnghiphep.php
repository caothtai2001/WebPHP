<?php
  session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
    if ($_SESSION['permission'] == 0) {
		$tongngay = 12;
	}elseif($_SESSION['permission'] == 1){
        $tongngay = 15;
    }
    $usercf =$_SESSION['user'];
    $user = $_SESSION['user'];
    include 'permission_banadmin.php';

    require_once('config.php'); 
    $conn = new mysqli('mysql-server', 'root', 'root', 'quantrivien');
    $sql = "SELECT * FROM nhanvien WHERE cccd='$user' ";
    $result =$conn -> query($sql);
    if ($result -> num_rows ==0){
        die('loiroicmm');
    }

    $data = $result->fetch_array();
    $email = $data['email'].$data['duoiemail'];
    $name = $data['lastname'].' '.$data['firstname'];
    $phongban = $data['phongban'];



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
  $lydo="";
  $ngaynghi="";
  $songay="";  
  $machucvu=$_SESSION['permission'];


// lấy giá trị

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["lydo"])) { $lydo = $_POST['lydo']; }
    if(isset($_POST["ngaynghi"])) { $ngaynghi = $_POST['ngaynghi']; }
    if(isset($_POST["songay"])) { $songay = $_POST['songay']; 
         
    $sql="INSERT INTO xinnghiphep(ten, cccd,ngaynghi,songay,lydo,machucvu,phongban, tongngayduocnghi) VALUES('$name','$usercf','$ngaynghi','$songay','$lydo','$machucvu','$phongban','$tongngay')";
        if(mysqli_query($conn,$sql)){
    
  }
    }
  }

 
    
   

 
//khai bao giá trị


	
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
    <title>Xin nghỉ phép | Triple T Company</title>
    <link rel="shortcut icon" href="../images/logo.svg"/>
    </head>


<body class = "home">
<?php
    include 'sidebar.php';
    ?>

<div class="main">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Nộp đơn nghỉ phép</h3></div>
                    <div class="card-body">
                    <form action="xinnghiphep.php" method="POST">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Mã nhân viên</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cccd" name="cccd" placeholder="<?=$_SESSION['user'] ?>" value="<?=$_SESSION['user'] ?>" disabled>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Lý do nghỉ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lydo" id="inputEmail3" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Từ ngày</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="ngaynghi" id="ngaynghi">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Số ngày</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="songay" id="songay">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" required>
                                <label class="form-check-label" for="gridCheck1">
                                Tôi đồng ý với các điều khoản và bổ sung những giấy tờ cần thiết.
                                </label>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Check this checkbox to continue.</div>
                            </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button onClick="window.location.href=window.location.href" type="submit" class="btn btn-primary">
                            Nộp đơn
                            </button>

                            <!-- Modal -->
                            
                                                    
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

<!-- Button trigger modal -->



 

    
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../main.js"></script>
  </body>


</html>
