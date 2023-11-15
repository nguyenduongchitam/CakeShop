<?php
    session_start();
    include("config.php");
    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user where email='".$email."'AND password='".$password."'";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0)
        {
            $_SESSION['dangnhap'] = $email;
            header("Location:index.php");
        }
        else{
            echo '<script>alert("Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại.")<script>';
            header("Location:admin_login.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Đăng nhập trang quản trị</h2>
    <form action="" method="post">
    <table>
    <tr><input type="text" placeholder="Nhập email" name="email"></tr>
    <br>    
    <tr><input type="password" placeholder="Nhập mật khẩu" name="password" ></tr>
    <br>
    <tr><button name="dangnhap">Đăng nhập</button></tr>
    </table>
    </form>
</body>
</html>