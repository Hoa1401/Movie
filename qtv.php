<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPFILM</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">

</head>

<body>
    <div id="toast"></div>
    <div class="container">

        <div class="main-sidebar">
            <h1><a href="#"><span style="color: #fff;">Xemphim</span>ONLINE</a></h1>
            <!-- Begin nav -->
            <ul class="nav">

                <div class="menu">

                    <h4 class="mini-title">menu</h4>
                    <li><a href="./qtv.php"><i class="ti-home nav-icon"></i>Trang chủ</a></li>
                    <li><a href="#id2"><i class="ti-video-camera nav-icon"></i>Coming soon</a></li>
                    <li><a href="#id3"><i class="ti-mobile nav-icon"></i>List phim</a></li>

                    <h4 class="mini-title">Admin</h4>
                    <li><a href="./add.php"><i class="ti-video-clapper nav-icon"></i>Quản lý phim</a></li>
                    <li><a href="#"><i class="ti-video-clapper nav-icon"></i>Hoạt hình</a></li>
                    <li><a href="#"><i class="ti-video-clapper nav-icon"></i>Cổ Trang</a></li>
                    <li><a href="#"><i class="ti-video-clapper nav-icon"></i>Kinh dị</a></li>

                </div>

                <div class="sidebar-footer">
                    <li><a href="http://localhost/xemphim/"><i class="ti-share-alt nav-icon"></i>Đăng xuất</a></li>
                </div>

            </ul>
            <!-- End nav -->
        </div>
        <!-- End Sidebar -->

        <div class="main-content">

            <div id="header">

                <div class="search-btn">
                    <input type="text" placeholder="Tìm kiếm phim...">
                    <a href="#">
                        <i class="search-icon ti-search"></i>
                    </a>
                </div>

                <div class="user">
                    <a class="ann-infomation" href="http://localhost/xemphim/login.php"><i class="header-icon ti-announcement"></i></a>
                    <a class="user-infomation" href="#"><i class="header-icon ti-user"></i></a>
                </div>

            </div>


            <div id="slider">
                <div class="slider-container">

                    <div class="slide active">
                        <img src="./assets/image/Slider/slider1.jpg" alt="Movie 1">
                        <a  class="caption" href="#">XEM PHIM</a>
                    </div>

                    <div class="slide">
                        <img src="./assets/image/Slider/slider2.jpg" alt="Movie 2">
                        <a class="caption" href="">XEM PHIM</a>
                    </div>

                    <div class="slide">
                        <img src="./assets/image/Slider/slider3.jpg" alt="Movie 3">
                        <a class="caption" href="">XEM PHIM</a>
                    </div>

                    <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
                    <button class="next" onclick="changeSlide(1)">&#10095;</button>

                </div>
            </div>


            <div id="upcoming-movie">

                <h4 class="section-title" id="id2">Phim Sắp Chiếu</h4>

                <div class="movie-grid">

                    <div class="movie">
                        <a href="#">
                            <img src="./assets/image/phimSapChieu/01.jpg" alt="Avengers">
                            <h3>Avengers</h3>
                        </a>
                        <p class="category">Hành động</p>
                    </div>

                    <div class="movie">
                        <a href="#">
                            <img src="./assets/image/phimSapChieu/02.jpg" alt="Avengers">
                            <h3>Doraemon</h3>
                        </a>
                        <p class="category">Hoạt hình</p>
                    </div>

                    <div class="movie">
                        <a href="#">
                            <img src="./assets/image/phimSapChieu/03.jpg" alt="Avengers">
                            <h3>Doraemon</h3>
                        </a>
                        <p class="category">Hoạt hình</p>
                    </div>

                    <div class="movie">
                        <a href="#">
                            <img src="./assets/image/phimSapChieu/04.jpg" alt="Avengers">
                            <h3>Doraemon</h3>
                        </a>
                        <p class="category">Hoạt hình</p>
                    </div>

                </div>

            </div>

            <div id="movie">

                <h4 class="section-title" id="id3">Tất cả phim</h4>

                <section class="movie-grid">
                    <?php
                    require "./connect.php";
                    $sql = "SELECT * FROM movie";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) { ?>

                        <div  class="movie">
                            <a target="_blank" href="./movie.php?video=<?php echo urlencode($row['link']); ?>">
                                <img src="./assets/image/<?php echo $row['image']; ?>" alt="<?php echo $row['tenPhim']; ?>">
                                <h3><?php echo $row['tenPhim']; ?></h3>
                            </a>
                            <p class="category"><?php echo $row['theLoai']; ?></p>
                        </div>
                    <?php } ?>
                </section>
                
            </div>

            <div id="footter"></div>

        </div>

    </div>
</body>

<script src="./assets/js/main.js"></script>

</html>