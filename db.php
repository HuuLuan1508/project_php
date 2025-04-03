<?php
$host = "localhost";  // Máy chủ (nếu dùng XAMPP/Laragon thì là "localhost")
$username = "root";   // Tên tài khoản mặc định của MySQL (XAMPP/Laragon là "root")
$password = "";       // Mật khẩu mặc định (XAMPP/Laragon thường để trống)
$database = "Project_php"; // Tên database bạn đã tạo trong phpMyAdmin


// Kết nối MySQL
$conn = new mysqli($host, $username, $password, $database, 3308);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
