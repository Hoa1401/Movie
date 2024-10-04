<?php
require "./connect.php";

$table = "movie";
$col_data = "ID";
//---------------------
//Lấy các giá trị của các hộp kiểm được chọn từ URL và lưu chúng vào biến $checkbox
$checkbox = $_GET["checkbox"];
//Duyệt qua từng giá trị $value trong mảng $checkbox
foreach ($checkbox as $value) {
    $sql = "DELETE FROM $table WHERE $col_data = $value";
    $conn->query($sql);
}
$conn->close();
header("location: ./add.php");
?>
