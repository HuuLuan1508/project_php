<?php
include '../db.php'; // Kết nối database


// Kiểm tra ID hợp lệ
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p style='color:red;'>Lỗi: ID không hợp lệ hoặc không tồn tại trong URL.</p>";
    exit;
}

$id = intval($_GET['id']);

// Lấy thông tin sách
$sql = "SELECT * FROM books WHERE id = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {//kiểm tra xem; có tồn tại hay không
    echo "<p style='color:red;'>Lỗi: Không tìm thấy sách với ID này ($id)</p>";
    exit;
}

$book = $result->fetch_assoc();

// Lấy danh sách chương
$sql_chapters = "SELECT * FROM chapters WHERE book_id = ? ORDER BY id DESC";

$stmt = $conn->prepare($sql_chapters);
$stmt->bind_param("i", $id);
$stmt->execute();
$chapters = $stmt->get_result();

?><!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($book['title']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/index.css">
    <script src="https://kit.fontawesome.com/c4e248e73c.js" crossorigin="anonymous"></script>

        
</head>
<body>
<?php include __DIR__ . "/../components/header.php"; ?>
    <div class="container mt-4 mb-5 ">
        <div class="card shadow p-4">
            <div class="row">
                <div class="col-md-4 text-center">
                    <?php if (!empty($book['image'])): ?>
                        <img class="img_book_detail" src="<?= htmlspecialchars($book['image']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
                    <?php else: ?>
                        <p class='text-danger'>Không có ảnh</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-8">
                    <h1><?= htmlspecialchars($book['title']) ?></h1>
                    <p><strong>Tác giả:</strong> <?= htmlspecialchars($book['author']) ?></p>
                    <p><strong>Thể loại:</strong> <?= htmlspecialchars($book['category']) ?></p>
                    <p><?= nl2br(htmlspecialchars($book['description'])) ?></p>
                    
                    <!-- Thêm nút "Thêm vào kệ sách" -->
                    <form method="post" action="add_to_shelf.php">
                        <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-bookmark"></i> Thêm vào kệ sách
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-4 card shadow p-4">
            <h2>📖 Danh sách chương</h2>
            <?php if ($chapters->num_rows > 0): ?>
                <ul class="list-group">
                    <?php while ($chapter = $chapters->fetch_assoc()): ?>
                        <li class="list-group-item">
                            <a href="chapter.php?id=<?= $chapter['id'] ?>"> <?= htmlspecialchars($chapter['title']) ?> </a>
                            <span class="text-muted float-end">
                                <?= date('d/m/Y H:i', strtotime($chapter['updated_at'])) ?>
                            </span>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p class="text-muted">Chưa có chương nào.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php include __DIR__ . "/../components/footer.php"; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
<style>
    .img_book_detail{
        width: 190px;
        height: auto;   
        object-fit: contain;
    }
    a{
        list-style: none;
        text-decoration: none;
    }
</style>