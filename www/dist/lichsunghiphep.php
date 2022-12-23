<?php 
  session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
  $user = $_SESSION['user'];
  $b = 1;
  $machucvu = $_SESSION['permission'] - $b;
  require_once('config.php'); 
  $conn = new mysqli('mysql-server', 'root', 'root', 'quantrivien');

  $sql = "SELECT * FROM xinnghiphep WHERE cccd = '$user' ";
  $result1 = $conn->query($sql);
  include 'permission_banadmin.php';

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
    <title>Lịch sử nghỉ phép | Triple T Company</title>
    <link rel="shortcut icon" href="../images/logo.svg"/>
    </head>


<body>
<?php
    include 'sidebar.php';
    ?>

<div class="main">
  <div class ="lichsunghiphep">
  <div class="p-5 bg-primary text-white text-center">
    <h1>Lịch sử nghỉ phép của bạn</h1>
  </div>
  <div class="d-grid ">

  <div class="container-fuild p-5 ">
    <div class="table-responsive">
      <table class="table table-hover table-striped rounded-3">  <!-- table-striped là tô màu xen kẽ -->
        <thead class="table-success">
          <tr>
            <td class ="text-center">STT</td>
            <td class ="text-center">Mã nhân viên</td>
            <td>Tên nhân viên</td>
            <td class ="text-center">Ngày nghỉ</td>
            <td class ="text-center">Số ngày</td>
            <td>Lý do</td>
            <td class ="text-center">Trạng thái</td>
                            
          </tr>
        </thead>
        <tbody>
 
        <?php
            // Create connection


            $count1=0;
            if ($result1->num_rows > 0) {
            // output data of each row
            
            while($row = $result1->fetch_assoc()) {
                $tongso = count($row);
                $count1=$count1+1;
                $xinnghiphep1 = $row["madonxnp"];
                $xinnghiphep2 = $row['cccd'];
                $xinnghiphep3 = $row['ten'];                        
                $xinnghiphep4 =  $row['ngaynghi'];
                $xinnghiphep5 = $row['songay'];                        
                $xinnghiphep6 = $row['lydo'];                        
                $xinnghiphep7 = $row['trangthai'];                        
                $xinnghiphep8 = $row['machucvu'];                        
        ?>                                                                    
                            <tr class="item">
                                <td class ="text-center"><?=$count1?></td>
                                <td class ="text-center"><?=$xinnghiphep2?></td>
                                <td ><?=$xinnghiphep3?></td>
                                <td class ="text-center"><?=$xinnghiphep4?></td>
                                <td class ="text-center"><?=$xinnghiphep5?></td>
                                <td><?=$xinnghiphep6?></td>
                                <td class ="text-center"><?=$xinnghiphep7?></td>
 

                             
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
