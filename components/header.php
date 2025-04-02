<header class="header_one p-3" style="background-image: url('https://nettruyenrr.com/public/assets/images/bg_header_2017.jpg'); background-size: cover; color: white;">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6 d-flex align-items-center gap-5">
                <i class="fa-solid fa-book text-white fs-2 me-2"></i>
                <button class="menu-toggle d-lg-none bg-transparent border-0 text-white fs-2">☰</button>
                <ul class="nav-menu d-none d-lg-flex gap-3 align-items-center m-0 p-0">
                    <li><a href="/PROJECT_PHP/index.php" style="color: white;">Trang Chủ</a></li>
                    <li><a href="/PROJECT_PHP/pages/myshelf.php" style="color: white;">Kệ Sách</a></li>
                    <li><a href="/PROJECT_PHP/pages/history.php" style="color: white;">Truyện đã đọc</a></li>
                </ul>
            </div>
            <div class="col-6 gap-4">
                <ul class="d-flex gap-3 align-items-center justify-content-end m-0 p-0 ">
                    <li>
                        <form action="/PROJECT_PHP/pages/search.php" method="GET">
                            <div class="position-relative">
                                <input class="input_search form-control pe-5" type="text" name="keyword" placeholder="Bạn tìm gì..." style="color: black;">
                                <button type="submit" class="bg-transparent border-0 position-absolute top-50 end-0 translate-middle-y me-2">
                                    <i class="fa-solid fa-magnifying-glass" style="color: black;"></i>
                                </button>
                            </div>
                        </form>
                    </li>

                    <li>
                        <a class="d-flex align-items-center gap-2" href="/PROJECT_PHP/pages/login.php" style="color: white;">
                            <i class="fa-solid fa-user" style="color: white;"></i>
                            <span>Đăng Nhập</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
