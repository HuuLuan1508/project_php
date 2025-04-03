<?php
include '../db.php'; // Kết nối database


$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';


$sql = "SELECT * FROM books WHERE title LIKE ?";

$search_term = "%$keyword%";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $search_term);
$stmt->execute();
$result = $stmt->get_result();
$total_results = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm: <?= htmlspecialchars($keyword) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/index.css">
    <script src="https://kit.fontawesome.com/c4e248e73c.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("../components/header.php"); ?>

    <div class="container mt-4 mb-5">
        <div class="card shadow p-4">
            <h2>Kết quả tìm kiếm: "<?= htmlspecialchars($keyword) ?>"</h2>
            <p>Tìm thấy <?= $total_results ?> kết quả</p>
        </div>

        <div class="row mt-4">
            <?php if ($total_results > 0): ?>
                <?php while ($book = $result->fetch_assoc()): ?>
                    <div class="col-6 col-lg-3 d-flex justify-content-center text-center mt-5">
                        <ul>
                            <li class="design_products">
                                <a href="/PROJECT_PHP/pages/viewdetail.php?id=<?= $book['id']; ?>">
                                    <img class="img_book" src="<?= htmlspecialchars($book['image']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
                                    <p class="text_title mt-2"><?= htmlspecialchars($book['title']); ?></p>
                                </a>
                                <div class="rating">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="fa<?= ($i <= $book['star']) ? 's' : 'r'; ?> fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                                <p class="text-muted small">Tác giả: <?= htmlspecialchars($book['author']); ?></p>
                            </li>
                        </ul>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12 text-center mt-5">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Không tìm thấy kết quả nào cho từ khóa "<?= htmlspecialchars($keyword) ?>".
                    </div>
                    <p>Gợi ý:</p>
                    <ul class="list-unstyled">
                        <li>Kiểm tra lại chính tả của từ khóa</li>
                        <li>Thử sử dụng từ khóa khác</li>
                        <li>Thử sử dụng từ khóa ngắn hơn</li>
                    </ul>
                    <a href="/PROJECT_PHP/index.php" class="btn btn-primary mt-3">
                        <i class="fas fa-home me-2"></i>Quay lại trang chủ
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php include("../components/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>

<style>
    .img_book {
        width: 200px;
        height: 280px;
        object-fit: contain;
        display: block;
        margin: 0 auto;
    }
    .rating i {
        color: gold;
    }
</style> 