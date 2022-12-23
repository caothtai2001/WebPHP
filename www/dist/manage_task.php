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
    $sql = "SELECT mada, tenda, mota, ngaytao, ngaynop, tennv, trangthai, phongban FROM duan ";
    // Thực thi câu truy vấn và gán vào $result
    $result = $conn->query($sql);
    $result = getDuan();
    $number_of_human = 0;
    if ($result['code']==0) {
      $duanList = $result['data'];
      $number_of_duan = count($duanList);
    }
    $conn = new mysqli('mysql-server', 'root', 'root', 'quantrivien');
    $sql="select count(*) as total from duan where trangthai='processing'";
    $result=mysqli_query($conn,$sql);
    $a=mysqli_fetch_assoc($result);
    $demprocess = 0;


    $id ='';
    if(isset($_GET["id"])) { 
        $id = $_GET['id']; 
    {
        
        }} 
    $sql = "UPDATE duan SET trangthai='success' where mada=$id ";
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
    <title>Quản lí công việc | Triple T Company</title>
    <link rel="shortcut icon" href="../images/logo.svg"/>
    </head>


<body>
<?php
    include 'sidebar.php';
?>

<div class="main">
<div class="tieude ">
    <p class="dongtieude">Tổng quan</p>
</div>
  <div class="container-fuild p-5 my-5">
            <div class="table-responsive">
                <table class="table table-hover table-striped rounded-3">  <!-- table-striped là tô màu xen kẽ -->
                    <thead class="table-success">
                        <tr>
                            <td>STT</td>
                            <td>Tên dự án</td>                           
                            <td>Đến ngày</td>
                            <td>Giao cho</td>
                            <td>Trạng thái</td>
                            <td colspan="2">Thao tác</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
        $count1 = 0;
                        foreach ($duanList as $duan) {
                            $count1=$count1+1;
                            $duan1= $duan['mada'];

                            $duan2 = $duan['tenda'];
                            $duan3 = $duan['mota'];                        
                            $duan4 = $duan['ngaytao'];
                            $duan5 = $duan['ngaynop'];                        
                            $duan6 = $duan['tennv'];                        
                            $duan7 = $duan['trangthai'];                        
                   ?>
                            <tr class="item">
                                <td><?=$count1?></td>
                                <td><?=$duan2?></td>
                                <td><?=$duan5?></td>
                                <td><?=$duan6?></td>
                                <td><?=$duan7?></td>
                                <td>
                                  <a class="btn btn-outline-primary" href="taskdetail.php?mada=<?=$duan1?>">Chi tiết</a>                             
                                </td>       
                                <td>
                                  <a type="button" class="btn btn-success" href="manage_task.php?id=<?=$duan1?>">
                                  Hoàn thành</a>
                                </td>

                                
                            </tr>
                          <?php
                        }
                      ?>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Số dự án: <span><?=$number_of_duan?></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <p id="total-price" class="fl-right">Số dự án đã hoàn thành: <?=$demprocess?></p>
                                        <p id="total-price" class="fl-right">Số dự án chưa hoàn thành: <span>dùng hàm in ra mày</span></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
        </div>
</div>    
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../main.js"></script>
  </body>


</html>
