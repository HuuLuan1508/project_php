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
.left_myshelf{
    background-image: url('../imgs/keleft.png');
    background-size: contain; /* Hiển thị toàn bộ ảnh */
    background-repeat: no-repeat;
    height: 200px; /* Giữ chiều cao */
    display: flex; /* Giúp căn giữa nội dung */
    justify-content: center;
    margin-right: -4px;
    
}
.center_myshelf{
    background-image: url('https://fliphtml5.com/bookcase/img/red-1.png');
    background-size: contain; /* Hiển thị toàn bộ ảnh */
    background-repeat: repeat-x;
    background-size: contain;
    height: 199px; /* Giữ chiều cao */
    display: flex; /* Giúp căn giữa nội dung */
    justify-content: center;
   

}
.right_myshelf{
    background-image: url('../imgs/keright.png');
    background-size: contain; /* Hiển thị toàn bộ ảnh */
    background-repeat: no-repeat;
    height: 200px; /* Giữ chiều cao */
    display: flex; /* Giúp căn giữa nội dung */
    justify-content: center;
    
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
  <div class="header_myshefl mb-0">
  </div>
 <div class="container-fluid">
 <div class="row mt-0">
    <div class="left_myshelf col-2">
        <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image">
        
    </div>

    <!-- Cột giữa -->
    <div class="center_myshelf col-8 text-center d-flex gap-4">
    <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image">
    <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image">
    <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image">
    <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Left Image">

    </div>

    <!-- Cột phải -->
    <div class="right_myshelf col-2 d-flex justify-content-center">
        <img src="https://online.fliphtml5.com/qyhf/cpki/files/shot.jpg" class="img_book" alt="Right Image">
    </div>
</div>
 </div>


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

