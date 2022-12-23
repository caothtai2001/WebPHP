<?php
// quyền truy cập của giám đốc là 2
if (isset($_SESSION['user']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: login.php');
}else {
	if (isset($_SESSION['permission']) == true) {
		// Ngược lại nếu đã đăng nhập
		$permission = $_SESSION['permission'];
		// Kiểm tra quyền của người đó có phải là admin hay không
		if ($permission != '2') {
		//nếu quyền người dùng hiện tại không phải là giám đốc thì ra chổ khác
        header('Location: home.php');
        exit();
		}
	}
}
?>