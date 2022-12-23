<?php 

session_start();
  if (!isset($_SESSION['user'])) {
      header('Location: login.php');
      exit();
  }
  $user = $_SESSION['user'];
 
  include 'permission_admin.php'; //chỉ có giám đốc mới được dô đây thôi nha

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
    $sql = "SELECT stt, phongban, chucvu, firstname, lastname, ngaysinh, gender, cccd, sdt, email, duoiemail FROM nhanvien";
    // Thực thi câu truy vấn và gán vào $result
    $result = $conn->query($sql);
    $result = getHuman();
    $number_of_human = 0;
    if ($result['code']==0) {
      $humanList = $result['data'];
      $number_of_human = count($humanList);
  }
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
    <title>Quản lí nhân sự | Triple T Company</title>
    <link rel="shortcut icon" href="../images/logo.svg"/>
    </head>


<body>
<?php
    include 'sidebar.php';
    ?>
<div class="main">
    <div class = "managehuman">
  <div class="tieude">
    <p class="dongtieude">Quản lí nhân sự</p>
  </div>
  <div class="pt-5 d-grid">
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addmember">
  Thêm nhân sự
</button>
  </div>
  <div class="container-fuild p-5 my-5">
    <div class="table-responsive">
      <table class="table table-hover table-striped rounded-3">  <!-- table-striped là tô màu xen kẽ -->
        <thead class="table-success text-center">
          <tr>
            <td>STT</td>
            <td>Họ và tên</td>
            <td>Giới tính</td>
            <td>Ngày sinh</td>
            <td>Phòng ban</td>
            <td>Chức vụ</td>
            <td>Số điện thoại</td>
            <td>Email</td>
            <td colspan ="2" >Thao tác</td>
                                          
          </tr>
        </thead>
        <tbody>
        <?php
        $count1 = 0;
                        foreach ($humanList as $human) {
                            $count1=$count1+1;
                            $humanstt = $human['stt'];
                            $humanchucvu = $human['chucvu'];
                            $humanphongban = $human['phongban'];                        
                            $name =  $human['lastname'] . ' ' .$human['firstname'];
                            $humancccd = $human['cccd'];                        
                            $humangender = $human['gender'];                        
                            $humanngaysinh = $human['ngaysinh'];                        
                            $humansodienthoai = $human['sdt'];                        
                            $humanemail = $human['email'] . $human['duoiemail'];                        
                    ?>
                            <tr class="item">
                                <td class ="text-center"><?=$count1?></td>
                                <td><?=$name?></td>
                                <td class ="text-center"><?=$humangender?></td>
                                <td class ="text-center"><?=$humanngaysinh?></td>
                                <td><?=$humanphongban?></td>
                                <td><?=$humanchucvu?></td>
                                <td><?=$humansodienthoai?></td>
                                <td><?=$humanemail?></td>         

                                <td>
                                <a class="btn btn-outline-primary" href="profiledetail.php?cccd=<?=$humancccd?>">Truy cập</a>                             
                                </td> 
                                <td>
                                <a class="btn btn-outline-danger" href="manage_human.php?id=<?=$humancccd?>">Xóa nhân viên</a> 
                                </td>
                                
                            </tr>
                          <?php
                        }
                      ?>    
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

    $sql="DELETE from nhanvien WHERE cccd=?";

    $stm=$conn->prepare($sql);

    $stm->bind_param("s",$id);

    if(!$stm->execute()){
        die('can not:'.$stm->error);

    }
    $sql="DELETE from login WHERE user=?";
    
    $stm=$conn->prepare($sql);

    $stm->bind_param("s",$id);

    if(!$stm->execute()){
        die('can not:'.$stm->error);

    }
 
    
    
   $conn->close();
	// Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên	
?>
 
                        
                    </tbody>
                    <tfoot class="bg-z">
                        <tr>
                            <td colspan="11">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Số nhân viên: <?=$number_of_human?></p>
                                </div>
                            </td>
                        </tr>
                        
                    </tfoot>
                </table>
        </div>        
</div>

<!-- Button trigger modal xac nhan-->
<div class="modal fade" id="changepass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đặt lại mật khẩu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ......
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
        <a class="btn btn-danger" href="manage_human.php?cccd=<?=$humancccd?>">Thăng chức</a>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal xoa tk-->

                              <div class="modal fade" id="deletehuman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Xóa tài khoản</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      Sau khi xóa không thể khôi phục
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Hủy bỏ</button>
                                      <a class="btn btn-danger" href="manage_human.php?id=<?=$humancccd?>">Xóa</a>
                                    </div>
                                  </div>
                                </div>
                              </div>          
<!-- The Modal -->
<div class="modal fade" id="addmember">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm nhân viên và tạo tài khoản nội bộ</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="card-body">
                                        <form action="manage_human.php" method="post" class="font-weight-bold needs-validation" novalidate>
                                        <div class="mb-2 text-center ">
                                            <h3>Vui lòng điền chính xác thông tin</h3>
                                            <h6>Thông tin không hợp lệ sẽ bị từ chối</h6>

                                        </div>
                                            <div class="mb-2">
                                                <div class="pb-1">Phần thông tin cá nhân</div>
                                                <div class="pb-1">Chức vụ</div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="chucvu" value="Nhân viên" checked> Nhân viên
                                                    </label>
                                                </div>
                                               

                                            </div>
                                            <div class="mb-2">
                                                <div class="pb-1">Phòng ban</div>
                                                <select class="form-select" name="phongban" required>
                                                <?php
                                                    foreach ($phongbanList as $phongban) {
                                                        $phongbanphongban = $phongban['phongban'];
                                                ?>    
                                                    <option value="<?=$phongbanphongban?>"><?=$phongbanphongban?></option>
                                                <?php
                                                    }
                                                ?>  
                                                    <div class="valid-feedback">Valid.</div>
                                                </select>
                                            </div>
                                            <div class="row mb-3">
                                            
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="lastname" id="inputLastName" type="text" placeholder="Enter your last name" required/>
                                                        <label for="inputFirstName">Họ và tên lót</label>
                                                        <div class="invalid-tooltip">Vui lòng nhập Họ và tên lót.</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="firstname" id="inputFirstName" type="text" placeholder="Enter your first name" required/>
                                                        <label for="inputLastName">Tên</label>
                                                        <div class="invalid-tooltip">Vui lòng nhập tên.</div>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-8">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="ngaysinh" id="inputLastName" type="date"  required/>
                                                        <label for="inputLastName">Ngày sinh</label>
                                                        <div class="invalid-tooltip">Vui lòng nhập ngày sinh</div>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                            <select class="form-select" id="sel1" name="gender">
                                                                <option>Nam</option>
                                                                <option>Nữ</option>
                                                            </select>
                                                        <label for="sel1" class="form-label">Giới tính</label>
                                                    </div>
                                                </div>
                                              
                                                </div>                                        
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="cccd" id="inputFirstName" type="text"  />
                                                        <label for="inputFirstName">CCCD</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="ngaycap" id="inputFirstName" type="date"  />
                                                        <label for="inputFirstName">Ngày cấp</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="noicap" id="inputLastName" type="text"  />
                                                        <label for="inputLastName">NƠI CẤP</label>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="quoctich" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">QUỐC TỊCH</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="sel1" name="dantoc" >
                                                        <option>Kinh</option>
                                                        <option>Ba Na</option>
                                                        <option>Bố Y</option>
                                                        <option>Brâu</option>
                                                        <option>Bru - Vân Kiều</option>
                                                        <option>Chăm</option>
                                                        <option>Chơ Ro</option>
                                                        <option>Chu Ru</option>
                                                        <option>Chứt</option>
                                                        <option>Co</option>
                                                        <option>Cơ Lao</option>
                                                        <option>Cơ Tu</option>
                                                        <option>Cống</option>
                                                        <option>Dao</option>
                                                        <option>Ê Đê</option>
                                                        <option>Gia Rai</option>
                                                        <option>Giáy</option>
                                                        <option>Giẻ-Triêng</option>
                                                        <option>Hà Nhì</option>
                                                        <option>H'Mông</option>
                                                        <option>Hoa</option>
                                                        <option>Hrê</option>
                                                        <option>Kháng</option>
                                                        <option>Khmer</option>
                                                        <option>Khơ mú</option>
                                                        <option>Kơ Ho</option>
                                                        <option>La Chí</option>
                                                        <option>La Ha</option>
                                                        <option>La Hủ</option>
                                                        <option>Lào</option>
                                                        <option>Lô Lô</option>
                                                        <option>Lự</option>
                                                        <option>Mạ</option>
                                                        <option>Mảng</option>
                                                        <option>Mnông</option>
                                                        <option>Mường</option>
                                                        <option>Ngái</option>
                                                        <option>Nùng</option>
                                                        <option>Ơ Đu</option>
                                                        <option>Pà Thẻn</option>
                                                        <option>Phù Lá</option>
                                                        <option>Pu Péo</option>
                                                        <option>Ra Glai</option>
                                                        <option>Rơ Măm</option>
                                                        <option>Sán Chay</option>
                                                        <option>Sán Dìu</option>
                                                        <option>Si La</option>
                                                        <option>Stiêng</option>
                                                        <option>Tà Ôi</option>
                                                        <option>Tày</option>
                                                        <option>Thái</option>
                                                        <option>Thổ</option>
                                                        <option>Xinh Mun</option>
                                                        <option>Xơ Đăng</option>

                                                        </select>
                                                    <label for="sel1" class="form-label">Dân tộc:</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="sel1" name="tongiao">
                                                            <option>Không</option>
                                                            <option>Phật giáo</option>
                                                            <option>Công giáo</option>
                                                            <option>Tin lành</option>
                                                            <option>Cao đài</option>
                                                            <option>Phật giáo Hòa Hảo</option>
                                                            <option>Hồi giáo</option>
                                                            <option>Tôn giáo Baha’I</option>
                                                            <option>Tịnh độ Cư sỹ Phật hội</option>
                                                            <option>Cơ đốc Phục lâm</option>
                                                            <option>Phật giáo Tứ Ân Hiếu nghĩa</option>
                                                            <option>Minh Sư đạo</option>
                                                            <option>Minh lý đạo - Tam Tông Miếu</option>
                                                            <option>Bà-la-môn giáo</option>
                                                            <option>Mặc môn</option>
                                                            <option>Phật giáo Hiếu Nghĩa Tà Lơn</option>
                                                            <option>Bửu Sơn Kỳ Hương</option>
                                                        </select>
                                                    <label for="sel1" class="form-label">Tôn giáo:</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="sel1" name="noisinh">
                                                            <option>An Giang</option>
                                                            <option>Bà Rịa – Vũng Tàu</option>
                                                            <option>Bắc Giang</option>
                                                            <option>Bắc Kạn</option>
                                                            <option>Bạc Liêu</option>
                                                            <option>Bắc Ninh</option>
                                                            <option>Bến Tre</option>
                                                            <option>Bình Định</option>
                                                            <option>Bình Dương</option>
                                                            <option>Bình Phước</option>
                                                            <option>Bình Thuận</option>
                                                            <option>Cà Mau</option>
                                                            <option>Cần Thơ</option>
                                                            <option>Cao Bằng</option>
                                                            <option>Đà Nẵng</option>
                                                            <option>Đắk Lắk</option>
                                                            <option>Đắk Nông</option>
                                                            <option>Điện Biên</option>
                                                            <option>Đồng Nai</option>
                                                            <option>Đồng Tháp</option>
                                                            <option>Gia Lai</option>
                                                            <option>Hà Giang</option>
                                                            <option>Hà Nam</option>
                                                            <option>Hà Nội</option>
                                                            <option>Hà Tĩnh</option>
                                                            <option>Hải Dương</option>
                                                            <option>Hải Phòng</option>
                                                            <option>Hậu Giang</option>
                                                            <option>Hòa Bình</option>
                                                            <option>Hưng Yên</option>
                                                            <option>Khánh Hòa</option>
                                                            <option>Kiên Giang</option>
                                                            <option>Kon Tum</option>
                                                            <option>Lai Châu</option>
                                                            <option>Lâm Đồng</option>
                                                            <option>Lạng Sơn</option>
                                                            <option>Lào Cai</option>
                                                            <option>Long An</option>
                                                            <option>Nam Định</option>
                                                            <option>Nghệ An</option>
                                                            <option>Ninh Bình</option>
                                                            <option>Ninh Thuận</option>
                                                            <option>Phú Thọ</option>
                                                            <option>Phú Yên</option>
                                                            <option>Quảng Bình</option>
                                                            <option>Quảng Nam</option>
                                                            <option>Quảng Ngãi</option>
                                                            <option>Quảng Ninh</option>
                                                            <option>Quảng Trị</option>
                                                            <option>Sóc Trăng</option>
                                                            <option>Sơn La</option>
                                                            <option>Tây Ninh</option>
                                                            <option>Thái Bình</option>
                                                            <option>Thái Nguyên</option>
                                                            <option>Thanh Hóa</option>
                                                            <option>Thừa Thiên Huế</option>
                                                            <option>Tiền Giang</option>
                                                            <option>TP Hồ Chí Minh</option>
                                                            <option>Trà Vinh</option>
                                                            <option>Tuyên Quang</option>
                                                            <option>Vĩnh Long</option>
                                                            <option>Vĩnh Phúc</option>
                                                            <option>Yên Bái</option>
                                                        </select>
                                                    <label for="sel1" class="form-label">Nơi sinh:</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="sel1" name="thuongtru">
                                                            <option>An Giang</option>
                                                            <option>Bà Rịa – Vũng Tàu</option>
                                                            <option>Bắc Giang</option>
                                                            <option>Bắc Kạn</option>
                                                            <option>Bạc Liêu</option>
                                                            <option>Bắc Ninh</option>
                                                            <option>Bến Tre</option>
                                                            <option>Bình Định</option>
                                                            <option>Bình Dương</option>
                                                            <option>Bình Phước</option>
                                                            <option>Bình Thuận</option>
                                                            <option>Cà Mau</option>
                                                            <option>Cần Thơ</option>
                                                            <option>Cao Bằng</option>
                                                            <option>Đà Nẵng</option>
                                                            <option>Đắk Lắk</option>
                                                            <option>Đắk Nông</option>
                                                            <option>Điện Biên</option>
                                                            <option>Đồng Nai</option>
                                                            <option>Đồng Tháp</option>
                                                            <option>Gia Lai</option>
                                                            <option>Hà Giang</option>
                                                            <option>Hà Nam</option>
                                                            <option>Hà Nội</option>
                                                            <option>Hà Tĩnh</option>
                                                            <option>Hải Dương</option>
                                                            <option>Hải Phòng</option>
                                                            <option>Hậu Giang</option>
                                                            <option>Hòa Bình</option>
                                                            <option>Hưng Yên</option>
                                                            <option>Khánh Hòa</option>
                                                            <option>Kiên Giang</option>
                                                            <option>Kon Tum</option>
                                                            <option>Lai Châu</option>
                                                            <option>Lâm Đồng</option>
                                                            <option>Lạng Sơn</option>
                                                            <option>Lào Cai</option>
                                                            <option>Long An</option>
                                                            <option>Nam Định</option>
                                                            <option>Nghệ An</option>
                                                            <option>Ninh Bình</option>
                                                            <option>Ninh Thuận</option>
                                                            <option>Phú Thọ</option>
                                                            <option>Phú Yên</option>
                                                            <option>Quảng Bình</option>
                                                            <option>Quảng Nam</option>
                                                            <option>Quảng Ngãi</option>
                                                            <option>Quảng Ninh</option>
                                                            <option>Quảng Trị</option>
                                                            <option>Sóc Trăng</option>
                                                            <option>Sơn La</option>
                                                            <option>Tây Ninh</option>
                                                            <option>Thái Bình</option>
                                                            <option>Thái Nguyên</option>
                                                            <option>Thanh Hóa</option>
                                                            <option>Thừa Thiên Huế</option>
                                                            <option>Tiền Giang</option>
                                                            <option>TP Hồ Chí Minh</option>
                                                            <option>Trà Vinh</option>
                                                            <option>Tuyên Quang</option>
                                                            <option>Vĩnh Long</option>
                                                            <option>Vĩnh Phúc</option>
                                                            <option>Yên Bái</option>
                                                        </select>
                                                    <label for="sel1" class="form-label">Thường trú:</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="sdt" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Số điện thoại</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="sdtkc" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Số điện thoại khẩn cấp</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-floating">
                                                        <select class="form-select" id="sel1" name="quanhe">
                                                            <option>Người thân</option>
                                                            
                                                            <option>Bạn bè</option>
                                                        </select>
                                                    <label for="sel1" class="form-label">Mối quan hệ:</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-8">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="email" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Email username</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-floating">
                                                        <select class="form-select" name="duoiemail" id="sel1" name="sellist">
                                                            <option>@gmail.com</option>
                                                            <option>@outlook.com</option>
                                                            <option>@outlook.com.vn</option>
                                                        </select>
                                                    <label for="sel1" class="form-label">Tên miền</label>
                                                    </div>
                                                </div>
                                                    
                                                
                                                
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <div class="pb-1">THÔNG TIN TÀI KHOẢN NGÂN HÀNG</div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="stk" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Số tài khoản</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="nganhang" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Ngân hàng</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-success px-5">Thêm nhân viên và tạo tài khoản</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">     
        <div class="small">Created By Triple T Team | Copyright © 2022 all rights reserved</div>                                            
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
</div> 

    
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
  $conn->set_charset("utf8_unicode_ci");
  //kiểm tra kết nối 
  if ($conn->connect_error) {
     
  }
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
  $permission="0";

  // lấy giá trị

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["chucvu"])) { $chucvu = $_POST['chucvu']; }
    if(isset($_POST["phongban"])) { $phongban = $_POST['phongban']; }
    if(isset($_POST["lastname"])) { $lastname = $_POST['lastname']; }
    if(isset($_POST["firstname"])) { $firstname = $_POST['firstname']; }
    if(isset($_POST["ngaysinh"])) { $ngaysinh = $_POST['ngaysinh']; }
    if(isset($_POST["gender"])) { $gender = $_POST['gender']; }
    if(isset($_POST["cccd"])) 
    { 
        $cccd = $_POST['cccd']; 
        $pass = password_hash($cccd, PASSWORD_DEFAULT);
    }
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
    $sql="INSERT INTO login(user,pass,firstname,lastname,permission,phongban) VALUES('$cccd','$pass','$lastname','$firstname','$permission','$phongban')";
    mysqli_query($conn,$sql);
  }else{
}
  $conn->close();

	// Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên
	
?>