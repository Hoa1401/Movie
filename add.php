<?php
require("./connect.php");
session_start();
//kiem tra xem dang nhap hay chua
if (!$_SESSION["user_name"]) {
    header("location:./trangchu.php");
} else {
}

?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

</head>

<body style="background-color: #f5f5f5;">

    <div class="container">
        <h1 style="text-align: center;">Thêm phim mới</h1>
        <a href="./qtv.php" style="text-decoration: none;"> <--Quay lại trang trước</a>
                <br>

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="input-group mb-3">
                        <span class="input-group-text">Thời gian</span>
                        <input type="date" class="form-control" placeholder="Ngày/ Tháng/ Năm" aria-label="Ngày/ Tháng/ Năm" name="date">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Tên phim</span>
                        <input type="text" class="form-control" placeholder="Tên phim" aria-label="Tên phim" name="tenPhim">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Quốc Gia</span>
                        <input type="text" class="form-control" placeholder="Quốc gia" aria-label="Quốc gia" name="quocGia">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Thể loại</span>
                        <input type="text" class="form-control" placeholder="Thể loại" aria-label="Thể loại" name="theLoai">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Năm phát hành</span>
                        <input type="text" class="form-control" placeholder="Năm phát hành" aria-label="Năm phát hành" name="namPhatHanh">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Mô tả</span>
                        <input type="text" class="form-control" placeholder="Mô tả" aria-label="Mô tả" name="moTa">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Link phim</span>
                        <input type="text" class="form-control" placeholder="Link phim " aria-label="Link phim " name="link">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Ảnh bìa</span>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="submit" value="Thêm mới" name="insert">Xác nhận</button>
                    </div>
                </form>

    </div>
    <?php
    require "./connect.php";

    $table = "movie";
    $col_data = array("ID", "date", "tenPhim", "quocGia", "theLoai", "namPhatHanh", "moTa", "link", "image");
    if (isset($_POST['insert'])) {
        $value1 = $_POST["date"];
        $value2 = $_POST["tenPhim"];
        $value3 = $_POST["quocGia"];
        $value4 = $_POST["theLoai"];
        $value5 = $_POST["namPhatHanh"];
        $value6 = $_POST["moTa"];
        $value7 = $_POST["link"];

        // <img src='./assets/image/" . $row['image'] . "' alt='Image' style='width:100px;'></td>";
        // Xử lý ảnh
        $image = $_FILES['image']['name'];
        $target = "./assets/image" . basename($image);

        // Thực hiện truy vấn SQL để lưu dữ liệu
        $sql = "INSERT INTO $table (date, tenPhim, quocGia, theLoai, namPhatHanh, moTa, link, image) 
                VALUES ('$value1','$value2','$value3','$value4','$value5','$value6','$value7','$image')";

        $result = $conn->query($sql);
    }

    $id = "SELECT * FROM $table";
    $result = $conn->query($id);
    ?>
    <table class="table table-dark table-hover">
        <form action="./xoaphim.php" method="get">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" type="submit" value="Xóa theo chọn">Xác nhận xóa</button>
            </div>

            <hr>
            <tr>
                <th>ID</th>
                <th>Ngày đăng</th>
                <th>Tên phim</th>
                <th>Quốc gia</th>
                <th>Thể loại</th>
                <th>năm phát hành</th>
                <th>Mô tả</th>
                <th>Link</th>
                <th>Ảnh</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            <?php
            //lấy kết quả từng dòng gán cho $row
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <?php foreach ($col_data as $value) { ?>
                        <td><?php echo $row[$value]; ?></td>
                    <?php } ?>
                    <td><a href="./update.php?ID=<?php echo $row["ID"]; ?>">Sửa</a></td>
                    <td><input type="checkbox" name="checkbox[]" value="<?php echo $row["ID"]; ?>"></td>
                </tr>
            <?php } ?>
        </form>
    </table>
</body>

</html>