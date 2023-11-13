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
            header("Location:homepage.php");
        }
        else{
            echo '<script>alert("Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại.")<script>';
            header("Location:sign-in.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="C:\xampp\htdocs\front-end\style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="search_box.css">
    <title>sign in</title>
</head>
<body>
    <div>
        <div class="header">
            <div class="taskbar">
                <div id="square"><img src="image\bakery.avif" id="logo"></div>
                <div id="items">
                    <div class="box">
                        <input id ="search" type="text" placeholder="Search here">
                        <a><i class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                    <div id="user"><i class="fa-solid fa-user"></i></div>
                    <div id="shopping-cart"><i class="fa-solid fa-cart-shopping"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="category">
                <div>Trang chủ</div>
                <div>Menu</div>
                <div>Sự kiện</div>
                <div>About us</div>
                <div>Liên hệ</div>
            </div>
        </div>
        <div class="main">
            <div class="ban"><img src="image\banner.png" id="banner"></div>
            <form class="sign-in" action="" autocomplete="off" method="POST">
                <table id="sign-table">
                    <th style="height: 45px;border-bottom: solid thin;" class="support"><h4>ĐĂNG NHẬP</h4></th>
                    <tr style="height: 45px;"><td><input type="text" class="acount" placeholder="Email" name="username"></td></tr>
                    <tr><td><input type="text" class="acount" placeholder="Mật khẩu" name="password"></td></tr>
                    <tr style="height: 45px;"><td><button type="submit" class="acount" id="submit" name="dangnhap">Đăng nhập</button></td></tr>
                    <tr class="support"><td>Trở về</td></tr>
                    <tr class="support"><td>Đăng ký</td></tr>
                    <tr class="support"><td>Quên mật khẩu</td></tr>
                </table>
            </form>
        </div>
        <div class="footer">
            <div id="detail"><img src="image\footer.png" id="footer-pic"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>