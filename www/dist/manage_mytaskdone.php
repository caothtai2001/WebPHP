<?php 
  session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
  $user = $_SESSION['user'];
  $fullname = $_SESSION['name'];
  $b = 1;
  $machucvu = $_SESSION['permission'] - $b;
  require_once('config.php');
  $conn = new mysqli('mysql-server', 'root', 'root', 'quantrivien');
  $sql = "SELECT * FROM duan WHERE tennv = '$fullname' and trangthai='completed' or trangthai='waiting' ";
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
    <title>Nhiệm vụ của tôi | Triple T Company</title>
    <link rel="shortcut icon" href="../images/logo.svg"/>
    </head>


<body>
<?php
    include 'sidebar.php';
    ?>

<div class="main">
  <div class ="lichsunghiphep">
  <div class="p-5 bg-primary text-white text-center">
    <h1>Nhiệm vụ của tôi</h1>
  </div>
  <div class="d-grid ">

  <div class="container-fuild p-5 ">
    <div class="table-responsive">
      <table class="table table-hover table-striped rounded-3">  <!-- table-striped là tô màu xen kẽ -->
        <thead class="table-success">
          <tr>
            <td class ="text-center">STT</td>
            <td class ="text-center">Tên dự án</td>
            <td>Mô tả</td>
            <td class ="text-center">Ngày giao</td>
            <td class ="text-center">Ngày nộp</td>
            <td>Trạng thái</td>
            <td colspan="2">Thao tác</td>                        
          </tr>
        </thead>
        <tbody>
        <?php
            // Create connection


            $count1=0;
            if ($result1->num_rows > 0) {   
            while($row = $result1->fetch_assoc()) {
                $tongso = count($row);
                $count1=$count1+1;
                $duan1 = $row["mada"];
                $duan2 = $row["tenda"];
                $duan3 = $row["mota"];
                $duan4 = $row["ngaytao"];
                $duan5 = $row["ngaynop"];
                $duan6 = $row["tennv"];
                $duan7 = $row["trangthai"];
                $duan8 = $row["phongban"];                  
        ?>                                                                    
                            <tr class="item">
                                <td class ="text-center"><?=$count1?></td>
                                <td class ="text-center"><?=$duan2?></td>
                                <td ><?=$duan3?></td>
                                <td class ="text-center"><?=$duan4?></td>
                                <td class ="text-center"><?=$duan5?></td>
                                <td><?=$duan7?></td>  
                                <td>
                                  <a class="btn btn-outline-primary" href="taskdetail.php?mada=<?=$duan1?>">Chi tiết</a>                             
                                </td>                       
                            </tr>
                          <?php
                          }
                        } else {
                        }                       
                      ?>                                          
                    </tbody>    
                    <tfoot class="bg-z">
                        <tr>
                          
                        </tr>
                        
                    </tfoot>
                </table>
        </div>        
</div>

<!-- Button trigger modal xac nhan-->

</div>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../main.js"></script>
  </body>
</html>
