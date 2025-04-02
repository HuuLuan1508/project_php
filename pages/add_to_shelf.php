<?php
include '../db.php'; // Kết nối database
session_start(); // Bắt đầu session để lấy thông tin người dùng

// Kiểm tra phương thức POST và ID sách
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_id'])) {
    $book_id = intval($_POST['book_id']);
    
    // Trong trường hợp thực tế, bạn sẽ lấy user_id từ session sau khi đăng nhập
    // Ví dụ: $user_id = $_SESSION['user_id'];
    // Tạm thời sử dụng user_id = 1 cho mục đích demo
    $user_id = 1;

    // Kiểm tra xem sách đã có trong kệ chưa
    $check_query = "SELECT * FROM user_shelf WHERE user_id = ? AND book_id = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $user_id, $book_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Nếu sách chưa có trong kệ, thêm vào
        $insert_query = "INSERT INTO user_shelf (user_id, book_id, added_date) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ii", $user_id, $book_id);
        
        if ($stmt->execute()) {
            // Thêm thành công
            $_SESSION['message'] = "Sách đã được thêm vào kệ sách của bạn!";
            $_SESSION['message_type'] = "success";
        } else {
            // Lỗi khi thêm
            $_SESSION['message'] = "Có lỗi xảy ra khi thêm sách vào kệ!";
            $_SESSION['message_type'] = "danger";
        }
    } else {
        // Sách đã có trong kệ
        $_SESSION['message'] = "Sách này đã có trong kệ sách của bạn!";
        $_SESSION['message_type'] = "warning";
    }

    $stmt->close();
    
    // Chuyển hướng về trang chi tiết sách
    header("Location: viewdetail.php?id=$book_id");
    exit;
} else {
    // Nếu không phải POST request hoặc không có book_id
    header("Location: index.php");
    exit;
}

$conn->close();
?> 