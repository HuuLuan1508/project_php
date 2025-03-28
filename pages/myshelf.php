<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
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
        /* Hiển thị toàn bộ ảnh */
        background-repeat: repeat-x;
        background-size: contain;
        height: 199px;
        /* Giữ chiều cao */
        width: 100%;


    }

    .img_book {
        width: 100px;
        height: 150px;
        object-fit: cover;
        margin-top: 30px;

    }

    .bookshelf-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        /* Canh giữa */
        background-image: url('https://fliphtml5.com/bookcase/img/red-1.png');
        background-size: contain;
        background-repeat: repeat-x;
        width: 100%;
        height: auto;
    }

    .book-item {
        flex: 0 0 calc(100% / 6);
        /* 6 cuốn mỗi hàng */
        text-align: center;
        margin-bottom: 20px;
    }
</style>

<body>
    <?php include("../components/header.php"); ?>
    <div class="header_myshefl text-center mb-0">
    </div>

    <div>
        <?php
        include '../db.php'; // Kết nối database
        $query = "SELECT * FROM books";
        $result = $conn->query($query);
        $count = $result->num_rows;
        ?>

        <div class="bookshelf-container">
            <?php if ($count > 0):
                $index = 0;
                while ($row = $result->fetch_assoc()):
                    if ($index % 6 == 0): ?>
                        <?php if ($index != 0): ?>
                        </div><?php endif; ?>
                    <div class="bookshelf-row"> <!-- Bắt đầu hàng mới sau 6 sách -->
                    <?php endif; ?>

                    <div class="book-item">
                        <a href="details.php?id=<?= $row['id'] ?>">
                            <img src="<?= $row['image'] ?>" class="img_book" alt="<?= $row['title'] ?>">
                        </a>
                    </div>

                    <?php $index++; ?>
                <?php endwhile; ?>

                <!-- Đóng hàng cuối cùng nếu chưa đủ 6 cuốn -->
                <?php if ($index % 6 != 0): ?>
                    <?php for ($i = $index % 6; $i < 6; $i++): ?>
                        <div class="book-item"></div> <!-- Ô trống để cân đối -->
                    <?php endfor; ?>
                <?php endif; ?>
            </div>

        <?php else: ?>
            <!-- Trường hợp không có sách: Hiển thị 3 hàng với 6 ô trống mỗi hàng -->
            <?php for ($row = 0; $row < 3; $row++): ?>
                <div class="bookshelf-row">
                    <?php for ($col = 0; $col < 6; $col++): ?>
                        <div class="book-item">
                            <div class="img_book" alt="Empty Slot"></div>
                        </div>
                    <?php endfor; ?>
                </div>
            <?php endfor; ?>
        <?php endif; ?>
    </div>

    <?php $conn->close(); ?>





    <div class="header_myshefl mb-0 mt-0">
    </div>
    <?php include("../components/footer.php"); ?>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>