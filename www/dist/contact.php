<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Triple T Company</title>
    <link rel="shortcut icon" href="../images/logo.svg" />
</head>
<body class = "contact">
  <div class = "container">
    <div class="content justify-content-center">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">19, Nguyen Huu Tho, Tan Phong</div>
          <div class="text-two">District 7</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">0846 341 434</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">minhtrietofficial@gmail.com</div>
          <div class="text-two">...@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>If you have any work from me or any types of quries related to my tutorial, you can send me message from here. It's my pleasure to help you.</p>
      <form action="contact.php" method="POST">
        <div class="input-box">
          <input type="text" placeholder="Enter your name" name="name">
        </div>
        <div class="input-box">
          <input type="text" placeholder="Enter your email" name="email">
        </div>
        <div class="input-box message-box">
          <textarea placeholder="Enter your message" name="message"></textarea>
        </div>
        <div class="button">
          <input type="submit"class="btn btn-primary px-5" value="Send Now" >
          
        </div>
      </form>
    </div>
    </div>
  </div>
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
  $conn->set_charset("utf8_unicode_ci");
  //kiểm tra kết nối 
  if ($conn->connect_error) {
     
  }
  $name="";
  $email="";
  $message="";
// lấy giá trị

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["name"])) { $name = $_POST['name']; }
    if(isset($_POST["email"])) { $email = $_POST['email']; }
    if(isset($_POST["message"])) { $message = $_POST['message']; }
  }    
   $sql="INSERT INTO contact(name,email,message) VALUES('$name','$email','$message')";

   mysqli_query($conn,$sql);
   $conn->close();

 
   

	// Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên
	
?>