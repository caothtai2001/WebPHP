<?php

	#  https://www.w3schools.com/php/php_mysql_select.asp
 
    $host = 'mysql-server'; // tên mysql server
    $user = 'root';
    $pass = 'root';
    $db = 'product_management'; // tên databse

    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8");
	
	// Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên
?>
