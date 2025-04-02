<!doctype html>
<html lang="en">

<head>
    <title>Lịch sử đọc sách</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../style/index.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/c4e248e73c.js" crossorigin="anonymous"></script>
</head>

<style>
    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }
    .card:hover {
        transform: scale(1.05);
    }
    .card-body {
        text-align: center;
    }
    .img_book {
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
    }
    .rating i {
        color: gold;
    }
</style>

<body>
    <?php
    include '../db.php'; 
    include("../components/header.php");

    $user_id = 3;
    $sql = "SELECT redBooks FROM users WHERE id = $user_id";
    $result = $conn->query($sql);
    $books_result = null;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $read_books = json_decode($row['redBooks']); 

        if (!empty($read_books)) {
            $book_ids = implode(',', $read_books);
            $sql_books = "SELECT * FROM books WHERE id IN ($book_ids)";
            $books_result = $conn->query($sql_books);
        }
    }
    ?>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Lịch sử đọc sách</h2>

        <div class="row">
            <?php if ($books_result && $books_result->num_rows > 0): ?>
                <?php while ($book = $books_result->fetch_assoc()): ?>
                    <div class="col-md-3">
                        <div class="card mb-4 p-3">
                            <img src="<?= $book['image'] ?>" class="card-img-top img_book" alt="Bìa sách">
                            <div class="card-body">
                                <h5 class="card-title mb-2"> <?= htmlspecialchars($book['title']) ?> </h5>
                                <p class="card-text">Tác giả: <?= htmlspecialchars($book['author']) ?></p>
                                <div class="rating">
                                    <?php for ($i = 0; $i < $book['star']; $i++): ?>
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">Chưa có sách nào được đọc.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php include("../components/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>
