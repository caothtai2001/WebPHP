<?php
    
    //khai báo
  $host = 'mysql-server'; // tên mysql server
  $user = 'root';
  $pass = 'root';
  $db = 'product_management'; // tên databse

    //kết nối database
  $conn = new mysqli($host, $user, $pass, $db);
  $conn->set_charset("utf8");
  //kiểm tra kết nối 
  if ($conn->connect_error) {
      die('Không thể kết nối database: ' . $conn->connect_error);
  }
  echo "Kết nối thành công tới database<br><br>";

  $sql="CREATE TABLE IF NOT EXISTS contact(id int primary key AUTO_INCREMENT, name varchar(128),email varchar(128),message varchar(128))";
  if(!$conn->query($sql))
  {
      die('can not'.$conn->error );
  }
  echo "ThanhCong";
 
//khai bao giá trị
  $name="";
  $email="";
  $message="";
// lấy giá trị

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["name"])) { $name = $_POST['name']; }
    if(isset($_POST["email"])) { $email = $_POST['email']; }
    if(isset($_POST["message"])) { $message = $_POST['message']; }
  }

  if (empty($name)){
      echo " nhap name";
  }
    if (empty($email)){
        echo " nhap email";
    }
    if (empty($message)){
        echo " nhap message";
    }
    
   $sql="INSERT INTO contact(name,email,message) VALUES('$name','$email','$message')";


   $conn->close();

 
   

	// Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên
	
?>
