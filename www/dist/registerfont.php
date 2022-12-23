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
      die('Không thể kết nối database: ' . $conn->connect_error);
  }
  echo "Kết nối thành công tới database<br><br>";
//khai bao giá trị
  $chucvu="";
  $phongban="";
  $lastname="";
  $firstname="";
  $ngaysinh="";
  $gender="";
  $cccd="";
  $ngaycap="";
  $noicap="";
  $quoctich="";
  $dantoc="";
  $tongiao="";
  $noisinh="";
  $thuongtru="";
  $sdt="";
  $sdtkc="";
  $quanhe="";
  $email="";
  $duoiemail="";
  $stk="";
  $nganhang="";
  // lấy giá trị

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["chucvu"])) { $chucvu = $_POST['chucvu']; }
    if(isset($_POST["phongban"])) { $phongban = $_POST['phongban']; }
    if(isset($_POST["lastname"])) { $lastname = $_POST['lastname']; }
    if(isset($_POST["firstname"])) { $firstname = $_POST['firstname']; }
    if(isset($_POST["ngaysinh"])) { $ngaysinh = $_POST['ngaysinh']; }
    if(isset($_POST["gender"])) { $gender = $_POST['gender']; }
    if(isset($_POST["cccd"])) { $cccd = $_POST['cccd']; }
    if(isset($_POST["ngaycap"])) { $ngaycap = $_POST['ngaycap']; }
    if(isset($_POST["noicap"])) { $noicap = $_POST['noicap']; }
    if(isset($_POST["quoctich"])) { $quoctich = $_POST['quoctich']; }
    if(isset($_POST["dantoc"])) { $dantoc = $_POST['dantoc']; }
    if(isset($_POST["tongiao"])) { $tongiao = $_POST['tongiao']; }
    if(isset($_POST["noisinh"])) { $noisinh = $_POST['noisinh']; }
    if(isset($_POST["thuongtru"])) { $thuongtru = $_POST['thuongtru']; }
    if(isset($_POST["sdt"])) { $sdt = $_POST['sdt']; }
    if(isset($_POST["sdtkc"])) { $sdtkc = $_POST['sdtkc']; }
    if(isset($_POST["quanhe"])) { $quanhe = $_POST['quanhe']; }
    if(isset($_POST["email"])) { $email = $_POST['email']; }
    if(isset($_POST["duoiemail"])) { $duoiemail = $_POST['duoiemail']; }
    if(isset($_POST["stk"])) { $stk = $_POST['stk']; }
    if(isset($_POST["nganhang"])) { $nganhang = $_POST['nganhang']; }
  }
 
  

  
   $sql="INSERT INTO nhanvien
   (chucvu,
   phongban,
   lastname,
   firstname,
   ngaysinh,
   gender,
   cccd,
   ngaycap,
   noicap,
   quoctich,
   dantoc,
   tongiao,
   noisinh,
   thuongtru,
    sdt,
    sdtkc,
    quanhe,
    email,
    duoiemail,
    stk,
    nganhang) 
   VALUES('$chucvu',
   '$phongban',
   '$lastname',
   '$firstname',
   '$ngaysinh',
   '$gender',
   '$cccd',
   '$ngaycap',
   '$noicap',
   '$quoctich',
   '$dantoc',
   '$tongiao',
   '$noisinh',
   '$thuongtru',
   '$sdt',
   '$sdtkc',
   '$quanhe',
   '$email',
   '$duoiemail',
   '$stk',
   '$nganhang') ";
   
  if(mysqli_query($conn,$sql)){
    $sql="INSERT INTO login(user,pass,firstname,lastname) VALUES('$cccd','$cccd','$lastname','$firstname')";
    mysqli_query($conn,$sql);
  }else{
    echo "Không thêm được" . $sql .mysqli_errno($conn);
}
  $conn->close();

	// Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên
	
?>
