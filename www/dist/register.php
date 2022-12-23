<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <title>Register | Triple T Company</title>
    <link rel="shortcut icon" href="../images/logo.svg" />

</head>
<body>
 
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Thêm thông tin nhân viên</h3>
                                    <h6 class="text-center font-weight-light my-4">Triple T Company</h3>

                                    </div>
                                    <div class="card-body">
                                        <form action="registerfont.php" method="post" class="font-weight-bold needs-validation" novalidate>
                                        <div class="mb-2 text-center ">
                                            <h3>Vui lòng điền chính xác thông tin</h3>
                                            <h6>Thông tin không hợp lệ sẽ bị từ chối</h6>

                                        </div>
                                            <div class="mb-2">
                                                <div class="pb-1">Phần thông tin cá nhân</div>
                                                <div class="pb-1">Chức vụ</div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" >
                                                        <input type="radio" class="form-check-input" name="chucvu" value="Nhân viên" checked> Nhân viên
                                                        <input type="radio" class="form-check-input" name="chucvu" value="Trưởng Phòng"> Trưởng phòng

                                                    </label>
                                                </div>
                                               

                                            </div>
                                            <div class="mb-2">
                                                <div class="pb-1">Phòng ban</div>
                                                <select class="form-select" name="phongban" required>
                                                    <option >Kế toán</option>
                                                    <option>Nhân sự</option>
                                                    <option>Kinh doanh</option>
                                                    <option>Marketting</option>
                                                    <option>Phó giám đốc</option>
                                                    <option>Giám đốc</option>
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
                                                        <input class="form-control" name="ngaysinh" id="inputLastName" type="text" placeholder="Enter your last name" required/>
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
                                                        <input class="form-control" name="cccd" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">CCCD</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="ngaycap" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Ngày cấp</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="noicap" id="inputLastName" type="text" placeholder="Enter your last name" />
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
                                    <div class="card-footer text-center py-3">
                                                <div class="small">Created By Triple T Team | Copyright © 2022 all rights reserved</div>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../main.js"></script>
    </body>
</html>