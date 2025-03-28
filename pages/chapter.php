<?php
include '../db.php'; // Kết nối database
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Kiểm tra ID hợp lệ
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p style='color:red;'>Lỗi: ID không hợp lệ.</p>";
    exit;
}

$chapter_id = intval($_GET['id']);

// Lấy thông tin chương
$sql = "SELECT * FROM chapters WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $chapter_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<p style='color:red;'>Không tìm thấy chương này.</p>";
    exit;
}
$chapter = $result->fetch_assoc();
$book_id = $chapter['book_id'];

// Lấy thông tin sách
$sql_book = "SELECT title, image FROM books WHERE id = ?";
$stmt = $conn->prepare($sql_book);
$stmt->bind_param("i", $book_id);
$stmt->execute();
$book = $stmt->get_result()->fetch_assoc();

// Lấy danh sách ảnh của chương
$sql_images = "SELECT image_url FROM contents WHERE chapter_id = ?";
$stmt = $conn->prepare($sql_images);
$stmt->bind_param("i", $chapter_id);
$stmt->execute();
$images = $stmt->get_result();

// Lấy chương trước
$sql_prev = "SELECT id FROM chapters WHERE book_id = ? AND id < ? ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($sql_prev);
$stmt->bind_param("ii", $book_id, $chapter_id);
$stmt->execute();
$prev_chapter = $stmt->get_result()->fetch_assoc();

// Lấy chương sau
$sql_next = "SELECT id FROM chapters WHERE book_id = ? AND id > ? ORDER BY id ASC LIMIT 1";
$stmt = $conn->prepare($sql_next);
$stmt->bind_param("ii", $book_id, $chapter_id);
$stmt->execute();
$next_chapter = $stmt->get_result()->fetch_assoc();

// Lấy danh sách chương
$sql_chapters = "SELECT id, title FROM chapters WHERE book_id = ? ORDER BY id ASC";
$stmt = $conn->prepare($sql_chapters);
$stmt->bind_param("i", $book_id);
$stmt->execute();
$chapters = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($chapter['title']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c4e248e73c.js" crossorigin="anonymous"></script>
    <style>
        .img-book { width: 200px; height: auto; object-fit: contain; margin-bottom: 15px; }
        .chapter-list { max-height: 300px; overflow-y: auto; }
        .chapter-image { width: 100%; max-width: 800px; margin-bottom: 15px; }
    </style>
    <link rel="stylesheet" href="../style/index.css">
</head>
<body>

<?php include __DIR__ . "/../components/header.php"; ?>

<div class="container mt-4">

    <div class="card shadow p-4">
        <h1><?= htmlspecialchars($chapter['title']) ?></h1>
        
        <!-- Hiển thị danh sách ảnh -->
        <div class="mt-3 text-center">
            <?php if ($images->num_rows > 0): ?>
                <?php while ($img = $images->fetch_assoc()): ?>
                    <img class="img-fluid chapter-image" src="<?= htmlspecialchars($img['image_url']); ?>" alt="Chapter Image">
                <?php endwhile; ?>
            <?php else: ?>
                <p>Không có hình ảnh nào cho chương này.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-4 mb-4">
        <?php if ($prev_chapter): ?>
            <a href="chapter.php?id=<?= $prev_chapter['id'] ?>" class="btn btn-secondary">⬅ Trở lại</a>
        <?php else: ?>
            <button class="btn btn-secondary" disabled>⬅ Trở lại</button>
        <?php endif; ?>
        <?php if ($next_chapter): ?>
            <a href="chapter.php?id=<?= $next_chapter['id'] ?>" class="btn btn-primary">Tiếp theo ➡</a>
        <?php else: ?>
            <button class="btn btn-primary" disabled>Tiếp theo ➡</button>
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
