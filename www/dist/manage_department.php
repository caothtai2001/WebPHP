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
  $sql = "SELECT * FROM nhanvien WHERE cccd='$user'";
  $result =$conn -> query($sql);
  if ($result -> num_rows ==0){
      die('loiroicmm');
  }

  $data = $result->fetch_array();
  require_once('config.php'); 
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
      <p class="dongtieude">Quản lí phòng ban</p>
  </div>
  <div class="d-grid pt-3 m-3">
  <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#adddepartment">
  Thêm phòng ban
</a>
  </div>
  <div class="d-grid ">
  <div class="container-fuild p-3 my-5">
    <div class="table-responsive">
      <table class="table table-hover table-striped rounded-3">  <!-- table-striped là tô màu xen kẽ -->
        <thead class="table-success">
          <tr>
            <td>STT</td>
            <td>Tên phòng ban</td>
            <td>Mô tả</td>
            <td>Số phòng</td>

            <td class = "text-center" colspan="2">Thao tác</td>                                         
          </tr>
        </thead>
        <tbody>
      <?php
      $count1 =0;
      foreach ($phongbanList as $phongban) {
        $count1=$count1+1;
        $phongbanmapb = $phongban['mapb'];
        $phongbanphongban = $phongban['phongban'];
        $phongbanmota= $phongban['mota'];     
        $phongbansophong= $phongban['sophong'];                        
                   
      ?>       
                            <tr class="item">
                                <td><?=$count1?></td>
                                <td><?=$phongbanphongban?></td>
                                <td><?=$phongbanmota?></td>    
                                <td class = "text-center"><?=$phongbansophong?></td>    

                                <td>
                                <a class="btn btn-primary" href="manage_departmentdetail.php?phongban=<?=$phongbanphongban?>">Truy cập</a>                             
                                </td>                             
                                <td>
                                  <a onClick="window.location.href=window.location.href" class="btn btn-danger" href="manage_department.php?id=<?=$phongbanmapb?>">
                                   Xóa phòng ban</a>
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
                                    <p id="total-price" class="fl-right">Số phòng ban trong hệ thống: <?=$number_of_phongban?></p>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
        </div>        
</div>

<!-- The Modal -->
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
if(isset($_GET["id"])) { 
    $id = $_GET['id']; 
  {
    
    }}

    $sql="DELETE from phongban WHERE mapb=?";

    $stm=$conn->prepare($sql);

    $stm->bind_param("s",$id);

    if(!$stm->execute()){
        die('can not:'.$stm->error);

    }
    
 
    

  
    

   $conn->close();

 
   

	// Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên
	
?>
<?php   
  //khai báo
  $host = 'mysql-server'; // tên mysql server
  $user = 'root';
  $pass = 'root';
  $db = 'quantrivien'; // tên databse

    //kết nối database
  $conn = new mysqli($host, $user, $pass, $db);
  $conn->set_charset("utf8_unicode_ci");
  //kiểm tra kết nối 
  if ($conn->connect_error) {
     
  }
//khai bao giá trị
  $phongban="";
  $mota="";
  $sophong="";


  // lấy giá trị

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["phongban"])) { $phongban = $_POST['phongban']; }
    if(isset($_POST["mota"])) { $mota = $_POST['mota']; }
    if(isset($_POST["sophong"])) { $sophong = $_POST['sophong']; }
    
  }
 
  

  
   $sql="INSERT INTO phongban (phongban,mota,sophong) VALUES('$phongban','$mota','$sophong')";
   
  mysqli_query($conn,$sql);
  

  $conn->close();

	// Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên
	
?>




