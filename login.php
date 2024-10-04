<?php
require("./connect.php");
session_start();
if (isset($_POST["login"])) {
    $user_name = $_POST["user_name"];
    $password = $_POST["pass"];
    $sql = "select * from login where user_name = '$user_name' and password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        //lưu trữ & duy trì trạng thái đăng nhập trong các trang tiếp theo
        $_SESSION["user_name"] = $user_name;

        if ($result->fetch_assoc()['role'] == 1) {
            header("location:./qtv.php");
        } else {
            header("location:./trangchu.php");
        }
    } else {
        echo "Ten dang nhap hoac mat khau khong chinh xac, vui long dang nhap lai!";
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('button').onclick = check;
        });

        function check() {
            //ktra giá trị account có rỗng 
            if (document.querySelector('#account').value === "") {
                alert("Tên đăng nhập không để trống");
                //chuyển con trỏ chuột tới ô gtri rỗng vừa xét
                document.querySelector('#account').focus();
                return false;
            }
            if (document.querySelector('#pass').value === "") {
                alert("Password không để trống");
                document.querySelector('#pass').focus();
                return false;
            }

            return true;
        }
    </script>
</head>

<body style="background-image: url('./assets/image/login/login.jpg'); background-size: cover; background-position: center; min-height: 100vh;">
    <div class="container">
        <div class="row">

            <div class="col-3"></div>

            <div class="col-6" style="padding-top: 8%;">
                <div class="shadow p-3 mb-5 rounded" style="background: rgba(20, 20, 20, 0.5)">
                    <form action="login.php" method="post">

                        <h1 style="text-align: center; color: #fff;">Đăng nhập</h1>
                        <br>
                        <h5 style="color: #fff;">Tên đăng nhập:</h5>
                        <input autofocus class="form-control" type="text" id="account" name="user_name" required>
                        <br>

                        <h5 style="color: #fff;">Mật khẩu:</h5>
                        <input class="form-control" type="password" id="pass" name="pass" required>
                        <br>
                        <hr>
                        <div style="text-align: center;">
                            <input class="btn btn-warning" type="reset" value="Reset">
                            <button type="submit" name="login" class="btn btn-primary" onclick="check()">Đăng nhập</button>
                        </div>
                    </form>
                    <br>
                    <div style="display:flex">
                        <p style="font-weight:bold; color:#fff">Bạn chưa có tài khoản ?</p>
                        <a href="./register.php" style="text-decoration: none;font-weight:bold; padding-left: 15px;">
                            <span>Đăng kí</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>

        </div>
    </div>
</body>

</html>