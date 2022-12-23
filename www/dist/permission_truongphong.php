<?php
if (isset($_SESSION['user']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: login.php');
}else {
	if (isset($_SESSION['permission']) == true) {
		// Ngược lại nếu đã đăng nhập
		$permission = $_SESSION['permission'];
		// Kiểm tra quyền của người đó có phải là admin hay không
		if ($permission != '1') {
			// Nếu không phải admin thì xuất thông báo
			header('Location: home.php');
			exit();
		}
	}
}
?>