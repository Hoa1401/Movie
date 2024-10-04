<?php
require "connect.php";

// Xử lý gửi bình luận
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST["name"];
//     $comment = $_POST["comment"];

//     if (!empty($name) && !empty($comment)) {
//         $stmt = $conn->prepare("INSERT INTO comments (name, comment) VALUES (?, ?)");
//         $stmt->bind_param("ss", $name, $comment);
//         $stmt->execute();
//         $stmt->close();
//     }
// }
if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $comment = $_POST["comment"];

    $sql = "select * from danhgia where user_name = '$name'";
    $result = $conn->query($sql);
    
    $sql_insert = "INSERT INTO danhgia(user_name,noiDung) VALUES ('$name','$comment')";
    if ($result = $conn->query($sql_insert)) {
        header("Location:form.php");
    } else {
        echo "Error:" . $sql_insert . "<br>" . mysqli_error($conn);
    }
    
}

// Lấy tất cả bình luận từ cơ sở dữ liệu
$table = "danhgia";
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Section</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <style>
        .comment-box {
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .comment-header {
            font-weight: bold;
        }

        .comment-timestamp {
            font-size: 0.9em;
            color: gray;
        }

        .comment-content {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Phần bình luận</h1>

    <!-- Form gửi bình luận -->
    <form action="form.php" method="POST">
        <input type="text" name="name" placeholder="Tên của bạn" required><br>
        <textarea name="comment" rows="4" placeholder="Nhập bình luận của bạn" required></textarea><br>
        <button type="submit" name="insert">Gửi bình luận</button>
    </form>

    <hr>

    <!-- Hiển thị các bình luận đã lưu -->
    <?php
    $table = "danhgia";
    $sql = "SELECT * FROM $table";

    $col_data= array ("id_dg","user_name","noiDung");
    if (isset($_POST['insert'])) {
        $value1 = $_POST["user_name"];
        $value2 = $_POST["noiDung"];
        
        $sql = " INSERT INTO $table ( user_name, noiDung) 
                VALUE ('$value1', '$value2')";
        $result = $conn->query($sql);
    }
    $id = "SELECT * FROM $table";
    $result = $conn->query($id);
    ?>
    <table class="table table-dark table-hover">
        <form>
            <tr>
                <th>ID</th>
                <th>Tên Người Dùng</th>
                <th>Comments</th>
            </tr>
    
            <?php
            //lấy kết quả từng dòng gán cho $row
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <?php foreach ($col_data as $value) { ?>
                        <td><?php echo $row[$value]; ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </form>
    </table>
    <!-- ?>
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='comment-box'>";
            echo "<div class='comment-header'> " . htmlspecialchars($row["user_name"]) . " <span class='comment-timestamp'>(" . $row["timestamp"] . ")</span></div>";
            echo "<div class='comment-content'>" . htmlspecialchars($row["noiDung"]) . "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>Chưa có bình luận nào.</p>";
    }
    ?> -->

</body>
</html>

<?php
$conn->close();
?>
