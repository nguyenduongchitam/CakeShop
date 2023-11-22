<?php
    session_start();
    include("config.php");
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['username'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM user where email='".$taikhoan."'AND password='".$matkhau."' LIMIT 1 ";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0)
        {
            $_SESSION['dangnhap'] = $taikhoan;
            header("Location:index.php?action=homepage&query=none");
        }
        else{
            echo '<script>alert("Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại.")<script>';
            header("Location:sign-in.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>sign in</title>
</head>
<script type="text/javascript">
        function Redirect() {
            window.location="homepage.php";
        }
</script>
<body>
    <div id="wrapper">
        <form action="" id="form-login">
            <h1 class="form-heading">Đăng nhập</h1>
            <div class="form-group">
                <i class="fa-regular fa-user"></i>
                <input type="text" class="form-input" placeholder="Email" name="username">
            </div>
            <div class="form-group">
                <i class="fa-solid fa-key"></i>
                <input type="password" class="form-input" placeholder="Mật khẩu" name="password">
                <div id="eye">
                    <i class="fa-solid fa-eye"></i>
                </div>
            </div>
            <input type="submit" class="form-submit" value="Đăng nhập" name="dangnhap">
            <input type="submit" class="form-submit" value="Đăng ký">
            <div class="support" onclick="Redirect">Trở về</div>
            <div class="support">Quên mật khẩu</div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function(){
    $('#eye').click(function(){
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if($(this).hasClass('open'))
        {
            $(this).prev().attr('type', 'text');
        }
        else{
            $(this).prev().attr('type', 'password');
        }
    });
});
</script>
</html>
