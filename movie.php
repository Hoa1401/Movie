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
            <h1><a href="./trangchu.php"><span style="color: #fff;">Xemphim</span>ONLINE</a></h1>
            <!-- Begin nav -->
            <ul class="nav">

                <div class="menu">

                    <h4 class="mini-title">menu</h4>
                    <li><a href="./trangchu.php"><i class="ti-home nav-icon"></i>Trang chủ</a></li>
                    <li><a href="#"><i class="ti-video-camera nav-icon"></i>Tất cả phim</a></li>
                    <li><a href="#"><i class="ti-mobile nav-icon"></i>Liên hệ</a></li>

                    <h4 class="mini-title">Thể Loại</h4>
                    <li><a href="#"><i class="ti-video-clapper nav-icon"></i>Hành động</a></li>
                    <li><a href="#"><i class="ti-video-clapper nav-icon"></i>Hoạt hình</a></li>
                    <li><a href="#"><i class="ti-video-clapper nav-icon"></i>Cổ Trang</a></li>
                    <li><a href="#"><i class="ti-video-clapper nav-icon"></i>Kinh dị</a></li>

                </div>

                <div class="sidebar-footer">
                    <li><a href="./index.php"><i class="ti-share-alt nav-icon"></i>Đăng xuất</a></li>
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
                    <a class="ann-infomation" href="#"><i class="header-icon ti-announcement"></i></a>
                    <a class="user-infomation" href="#"><i class="header-icon ti-user"></i></a>
                </div>

            </div>

            

            <div id="movie">
                <?php
                if (isset($_GET['video'])) {
                    $video = $_GET['video'];
                    $videoPath = "./assets/video/" . $video;

                    if (file_exists($videoPath)) {
  
                        echo "
                            <div id='movie'>
                                <video width='100%' height='auto' controls>
                                    <source src='$videoPath' type='video/mp4'>
                                </video>
                            </div>";
                    } else {
                        echo "<p>Video không tồn tại.</p>";
                    }
                } else {
                    echo "<p>Không có video nào được chọn.</p>";
                }
                ?>
            </div>

            <div id="upcoming-movie">

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

        </div>

        <div id="footter"></div>

    </div>

    </div>
</body>

<script src="./assets/js/main.js"></script>

</html>