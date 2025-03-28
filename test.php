<?php
include 'db.php';

if ($conn) {
    echo "Kết nối MySQL thành công!";
} else {
    echo "Lỗi kết nối!";
}
?>
