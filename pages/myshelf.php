<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
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

.center_myshelf{
    background-image: url('https://fliphtml5.com/bookcase/img/red-1.png');
    background-size: contain; /* Hiển thị toàn bộ ảnh */
    background-repeat: repeat-x;
    background-size: contain;
    height: 199px; /* Giữ chiều cao */
    width: 100%;
   

}

.img_book{
    width: auto;
    height: 140px;
    object-fit: cover;
    margin-top: 48px;
   
}

</style>
    <body>
    <?php include("../components/header.php"); ?>
  <div class="header_myshefl text-center mb-0">
   
  </div>
 <div class="container-fluid">
 <?php
include '../db.php'; // Kết nối database
$query = "SELECT * FROM books";
$result = $conn->query($query);
?>

<div class="row mt-0">
    <div class="center_myshelf col-12 d-flex flex-wrap">
    <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 text-center mb-3">
                <a href="details.php?id=<?= $row['id'] ?>">
                    <img src="<?= $row['image'] ?>" class="img_book" alt="<?= $row['title'] ?>">
                    <p class="text_title mt-2"> <?= $row['title'] ?> </p>
                </a>
            </div>
            <?php endwhile; ?>
    </div>
   
</div>
<div class="row mt-0">
    <div class="center_myshelf col-12 d-flex justify-content-start">
            <div class="col-2">
                <a href=""> <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image"></a>
             </div>
             <div class="col-2">
                <a href=""> <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image"></a>
             </div>
             <div class="col-2">
                <a href=""> <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image"></a>
             </div>
             <div class="col-2">
                <a href=""> <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image"></a>
             </div>
             <div class="col-2">
                <a href=""> <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image"></a>
             </div>
             <div class="col-2">
                <a href=""> <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image"></a>
             </div>
        </div>
    </div>
 </div>
 <div class="row mt-0">
    <div class="center_myshelf col-12 d-flex justify-content-start">
            <div class="col-2">
                <a href=""> <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image"></a>
             </div>
             <div class="col-2">
                <a href=""> <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image"></a>
             </div>
             <div class="col-2">
                <a href=""> <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image"></a>
             </div>
             <div class="col-2">
                <a href=""> <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image"></a>
             </div>
             <div class="col-2">
                <a href=""> <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image"></a>
             </div>
             <div class="col-2">
                <a href=""> <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image"></a>
             </div>
        </div>
    </div>
 </div>




<?php $conn->close(); ?>
 
 
 <div class="header_myshefl mb-0 mt-0">
 </div>
 <?php include("../components/footer.php"); ?>


        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

