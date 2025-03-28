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
    .header_myshefl {
        background-image: url('https://fliphtml5.com/bookcase/img/red-nav.png');
        background-repeat: repeat-x;
        background-size: auto;
        background-position: top;
        height: 70px;
        width: 100%;
    }

    .center_myshelf {
        background-image: url('https://fliphtml5.com/bookcase/img/red-1.png');
        background-size: contain;
        background-repeat: repeat-x;
        height: 199px;
        width: 100%;
    }

    .img_book {
        width: auto;
        height: 140px;
        object-fit: cover;
        margin-top: 48px;
    }
</style>

<body>
    <?php
    include '../db.php'; 
    include("../components/header.php");

    // Giả sử user_id được lấy từ session
    $user_id = 3;

    // Lấy danh sách sách đã đọc
    $sql = "SELECT redBooks FROM users WHERE id = $user_id";
    $result = $conn->query($sql);
    $books_result = null;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $read_books = json_decode($row['redBooks']); // Chuyển JSON thành mảng

        if (!empty($read_books)) {
            // Tạo danh sách ID sách để truy vấn
            $book_ids = implode(',', $read_books);
            $sql_books = "SELECT * FROM books WHERE id IN ($book_ids)";
            $books_result = $conn->query($sql_books);
        }
    }
    ?>

    <div class="container mt-4">
        <h2 class="text-center">Lịch sử đọc sách</h2>

        <div class="row">
            <?php if ($books_result && $books_result->num_rows > 0): ?>
                <?php while ($book = $books_result->fetch_assoc()): ?>
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <img src="<?= $book['image'] ?>" class="card-img-top img_book" alt="Bìa sách">
                            <div class="card-body">
                                <h5 class="card-title"><?= $book['title'] ?></h5>
                                <p class="card-text">Tác giả: <?= $book['author'] ?></p>
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

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQ+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>
