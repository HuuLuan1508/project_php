<?php
include '../db.php'; // Kết nối database
session_start(); // Bắt đầu session để lấy thông tin người dùng

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_id'])) {
    $book_id = intval($_POST['book_id']);
    
    $user_id = 1;

   
    $check_query = "SELECT * FROM user_shelf WHERE user_id = ? AND book_id = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $user_id, $book_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $insert_query = "INSERT INTO user_shelf (user_id, book_id, added_date) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ii", $user_id, $book_id);
        
        if ($stmt->execute()) {
            $_SESSION['message'] = "Sách đã được thêm vào kệ sách của bạn!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Có lỗi xảy ra khi thêm sách vào kệ!";
            $_SESSION['message_type'] = "danger";
        }
    } else {
        $_SESSION['message'] = "Sách này đã có trong kệ sách của bạn!";
        $_SESSION['message_type'] = "warning";
    }

    $stmt->close();
    
    header("Location: viewdetail.php?id=$book_id");
    exit;
} else {

    header("Location: index.php");
    exit;
}

$conn->close();
?> 