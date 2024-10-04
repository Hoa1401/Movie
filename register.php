<?php
require("./connect.php");
if (isset($_POST["account"])) {
    $name = $_POST["account"];
    $pass = $_POST["pass"];
    $r_pass = $_POST["r-pass"];

    $sql = "select * from login where user_name = '$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<p style='color: #fff; font-weight:bold; text-align: center;' >Tên đăng nhập đã tồn tại, vui lòng nhập lại tên mới! </p>";
    } else {
        $sql_insert = "INSERT INTO login(user_name,password) VALUES ('$name','$pass')";
        if ($result = $conn->query($sql_insert)) {
            header("Location:login.php");
        } else {
            echo "Error:" . $sql_insert . "<br>" . mysqli_error($conn);
        }
    }
}
?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        let isChecked = false;
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('#test').addEventListener('click', function(event) {
                //Không cho form gửi đi khi thực hiện hành động click xảy ra 
                event.preventDefault();
                //nếu nếu hàm test() trả về gtri true thì các lệnh trong if sẽ đc thực thi
                if (test()) {
                    isChecked = true;
                    alert("Hợp Lệ");
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('#rep').addEventListener('click', function(event) {
                //ktra gtri của biến isChecked, nếu isChecked là true thì thực hiện các lệnh trong if
                if (isChecked) {
                    alert("Chúc mừng bạn đã đăng kí tài khoản thành công!");
                } else {
                    event.preventDefault(); // Không cho form gửi đi
                    alert("Kiểm tra dữ liệu trước khi gửi!");
                }
            });
        });

        function test() {
            //ktra giá trị hàm account có rỗng k, nếu rỗng sẽ hiển thị thông báo theo alert 
            //---> chuyển tới hàm account trả về giá trị false để ngăn chặn k cho thực hiện các hành động tiếp
            if (document.querySelector('#account').value === "") {
                alert("Tên đăng nhập không để trống");
                document.querySelector('#account').focus();
                return false;
            }
            if (document.querySelector('#pass').value === "") {
                alert("Password không để trống");
                document.querySelector('#pass').focus();
                return false;
            }
            if (document.querySelector('#r-pass').value === "") {
                alert("Nhập lại mật khẩu");
                document.querySelector('#r-pass').focus();
                return false;
            }
            if (document.querySelector('#pass').value !== document.querySelector('#r-pass').value) {
                alert("Mật khẩu không trùng nhau");
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
                    <form action="register.php" method="post">
                        <h2 style="text-align: center; color: #fff;">Đăng kí tài khoản thành viên</h2>

                        <p style="color: #fff;">Nhập vào tên đăng nhập:
                        <p>
                            <input type="text" name="account" id="account" class="form-control" required>

                        <p style="color: #fff;">Nhập mật khẩu:
                        <p>
                            <input type="password" name="pass" id="pass" class="form-control" required>

                        <p style="color: #fff;">Nhập lại mật khẩu:</p>
                        <input type="password" name="r-pass" id="r-pass" class="form-control" required>
                        <br>
                        <input class="btn btn-warning" type="reset" value="Reset">
                        <button type="submit" id="test" class="btn btn-danger">Kiểm tra</button>

                        <button type="submit" id="rep" class="btn btn-danger">Đăng ký</button>
                </div>
            </div>
            <div class="col-3"></div>
            </form>
        </div>
    </div>
</body>

</html>