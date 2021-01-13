<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'banh_food';

// Mở kết nối
$conn = mysqli_connect($server, $username, $password, $database);

// Kiểm tra lỗi
if (!$conn) {
	die("Kết nối thất bại: " . mysqli_connect_error());
}
?>