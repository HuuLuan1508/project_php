<?php
include '../db.php'; // Kết nối database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Kiểm tra mật khẩu nhập lại
    if ($password !== $confirm_password) {
        echo "<script>alert('Mật khẩu không khớp!'); window.location.href='register.php';</script>";
        exit();
    }

    // Mã hóa mật khẩu trước khi lưu vào database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Kiểm tra email đã tồn tại chưa
    $check_email = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($check_email);

    if ($result->num_rows > 0) {
        echo "<script>alert('Email đã tồn tại!'); window.location.href='register.php';</script>";
        exit();
    }

    // Chèn dữ liệu vào bảng users
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Đăng ký thành công!'); window.location.href='login.php';</script>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c4e248e73c.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .register-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .btn-register {
            width: 100%;
            background: #28a745;
            color: white;
            transition: 0.3s;
        }
        .btn-register:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Đăng Ký</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Họ và Tên</label>
                <input type="text" placeholder="User Name" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" placeholder="Email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" placeholder="Password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Nhập lại mật khẩu</label>
                <input type="password" placeholder="Confirm Password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="/PROJECT_PHP/pages/login.php">Đã có tài khoản? Đăng nhập</a>
            </div>
            <button type="submit" class="btn btn-register mt-3">Đăng Ký</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
