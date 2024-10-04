<?php
require "connect.php";

$table = "movie";
$col_data = array("ID", "date", "tenPhim", "quocGia", "theLoai", "namPhatHanh", "moTa", "link", "image");
$value0 = $_GET["ID"];

// Truy vấn để lấy dữ liệu hiện tại
$sql = "SELECT * FROM $table WHERE $col_data[0]=$value0";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
</head>

<body style="background-color: #f5f5f5;">
    <div class="container" >
        <h1 style="text-align: center;">Sửa thông tin phim</h1>
        <a href="./add.php" style="text-decoration: none;"> <-- Quay lại trang trước</a>
                <br>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Thời gian</span>
                        <input type="date" class="form-control" name="date" value="<?php echo $row[$col_data[1]]; ?>">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Tên phim</span>
                        <input type="text" class="form-control" name="tenPhim" value="<?php echo $row[$col_data[2]]; ?>">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Quốc Gia</span>
                        <input type="text" class="form-control" name="quocGia" value="<?php echo $row[$col_data[3]]; ?>">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Thể loại</span>
                        <input type="text" class="form-control" name="theLoai" value="<?php echo $row[$col_data[4]]; ?>">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Năm phát hành</span>
                        <input type="text" class="form-control" name="namPhatHanh" value="<?php echo $row[$col_data[5]]; ?>">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Mô tả</span>
                        <input type="text" class="form-control" name="moTa" value="<?php echo $row[$col_data[6]]; ?>">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Link phim</span>
                        <input type="text" class="form-control" name="link" value="<?php echo $row[$col_data[7]]; ?>">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Ảnh bìa</span>
                        <input type="file" class="form-control" name="image" accept="image/*">
                        <input type="hidden" name="current_image" value="<?php echo $row[$col_data[8]]; ?>">
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="submit" name="update">Xác nhận</button>
                    </div>
                </form>
    </div>
</body>

<?php
if (isset($_POST['update'])) {
    $value1 = $_POST["date"];
    $value2 = $_POST["tenPhim"];
    $value3 = $_POST["quocGia"];
    $value4 = $_POST["theLoai"];
    $value5 = $_POST["namPhatHanh"];
    $value6 = $_POST["moTa"];
    $value7 = $_POST["link"];
    $value8 = $_FILES['image']['name'];

    // Kiểm tra nếu có ảnh mới
    if (!empty($_FILES['image']['name'])) {
        $value8 = $_FILES['image']['name'];
        $target = "./assets/image" . basename($value8);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        // Nếu không có ảnh mới, giữ nguyên ảnh cũ
        $value8 = $_POST['current_image'];
    }

    // Cập nhật dữ liệu vào cơ sở dữ liệu
    $sql = "UPDATE $table SET $col_data[1]='$value1',$col_data[2]='$value2',$col_data[3]='$value3',$col_data[4]='$value4',$col_data[5]='$value5', $col_data[6]='$value6', $col_data[7]='$value7', $col_data[8]='$value8' 
    WHERE $col_data[0]=$value0";
    $conn->query($sql);

    // Chuyển hướng về trang add.php sau khi cập nhật
    header("location: add.php");
}
$conn->close();
?>