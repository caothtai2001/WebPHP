<?php
  session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
    $user = $_SESSION['user'];
    $name = $_SESSION['name'];
    $permission = $_SESSION['permission'];
    if ($permission == '0') {
        $ngayduocnghi = 12;
    }elseif($permission == '1') {
        $ngayduocnghi =15;       
    }
    if ($permission != '2') {
        // Nếu không phải admin thì xuất thông báo
        $conn = new mysqli('mysql-server', 'root', 'root', 'quantrivien');
        $sql ="SELECT SUM(songay) FROM xinnghiphep WHERE cccd = '$user' and  trangthai='approved' ";
        $result =$conn -> query($sql);
        if ($result -> num_rows == 0){
            $a='0';
        }else{    
        $data = $result->fetch_array();    
        }
        $songaydanghi = $data["SUM(songay)"];
        $songaynghiconlai = $ngayduocnghi - $data["SUM(songay)"]; 


        $sql ="SELECT COUNT(mada) FROM duan WHERE tennv = '$name' and  trangthai!='completed' ";
        $result =$conn -> query($sql);
        if ($result -> num_rows == 0){
            $a='0';
        }else{    
        $data1 = $result->fetch_array();    
        }
        $soduandanglam = $data1["COUNT(mada)"];
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
    <title>Home | Triple T Company</title>
    <link rel="shortcut icon" href="../images/logo.svg"/>
    </head>

<body>
<?php
    include 'sidebar.php';
    ?>
    <div class="main">
        <div class="home">
            <div class="tieude ">
                <p class="dongtieude">Tổng quan</p>
            </div>
            <div class = "dong1 row justify-content-center">
                <div class="dashboardcard1 col-xxl-4 col-xl-5 col-lg-6 col-md-8 col-sm-10 col-xs-10">
                    <h4 class ="a"><?=$_SESSION['user'] ?></h4>

                </div>
                <div class="dashboardcard1">
                <h4 class ="a">Quyền truy cập</h4>

                    <h4 class ="a"><?=$_SESSION['permission']?></h4>

                </div>
                <?php
                if ($permission != '2') {       ?>
                <div class="dashboardcard1">
                    <h4 class ="a">Bạn hiện có <?=$soduandanglam?> công việc được giao</h4>

                </div>
                
                <div class="dashboardcard1">
                    <h4 class ="a">Số ngày đã nghỉ: <?=$songaydanghi?></h4>
                    <h4 class ="a">Số ngày được nghỉ còn lại: <?=$songaynghiconlai?></h4>
                </div>
                <?php
                }
                ?>
            </div>
            
        </div>
    </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/main.js"></script>
</body>


</html>