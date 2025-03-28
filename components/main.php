<?php
include 'db.php'; // Kết nối database

// Lấy danh sách sách từ database
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

// Kiểm tra lỗi SQL
if (!$result) {
    die("Lỗi SQL: " . $conn->error);
}
?>

<div class="container mt-4 mb-5">
    <hr>
    <div class="row mt-4">
        <?php while ($book = $result->fetch_assoc()) { ?>
            <div class="col-6 col-lg-3 d-flex justify-content-center text-center mt-5">
                <ul>
                    <li class="design_products">
                        <a href="/PROJECT_PHP/pages/viewdetail.php?id=<?= $book['id']; ?>">
                            <img class="img_book" src="<?= htmlspecialchars($book['image']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
                            <p class="text_title mt-2"><?= htmlspecialchars($book['title']); ?></p>
                        </a>
                    </li>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>

<?php 
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
</style>


