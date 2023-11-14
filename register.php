
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="search_box.css">
    <title>register</title>
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
            <form class="sign-in" action="" method="POST">
            <div id="layout-sign">
                <table id="sign-table">
                    <th style="border-bottom: solid thin;" class="support"><h4 style="font-weight: bolder;">TẠO TÀI KHOẢN</h4></th>
                    <tr><td><input type="text" class="acount" placeholder="Họ Tên" name="hovaten"></td></tr>
                    <tr><td><input type="text" class="acount" placeholder="Email" name="email"></td></tr>
                    <tr><td><input type="password" class="acount" placeholder="Mật khẩu" name="matkhau"></td></tr>
                    <tr><td><input type="password" class="acount" placeholder="Mật khẩu" name="matkhau"></td></tr>
                    <tr><td><input type="text" class="acount" placeholder="Số điện thoại" name="phone_number"></td></tr>
                    <tr><td><input type="text" class="acount" placeholder="Địa chỉ" name="address"></td></tr>
                    <tr><td><button type="submit" class="acount" id="submit" name="dangky">Đăng ký</button></td></tr>
                    <tr class="support"><td>Trở về</td></tr>
                </table>
            </div>
            </form>
        </div>
        <div class="footer">
            <div id="detail"><img src="image\footer.png" id="footer-pic"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<?php
    include("config.php");
    if(isset($_POST['dangky'])){
            $tenkhachhang = $_POST['hovaten'];
            $email = $_POST['email'];
            $matkhau = $_POST['matkhau'];
            $sodienthoai = $_POST['phone_number'];
            $diachi = $_POST['address'];
            $sql_user = mysqli_query($mysqli,"INSERT INTO user(full_name,email,password,phone_number,address,role_id,create_at,update_time) VALUE('".$tenkhachhang."',
            '".$email."','".$matkhau."','".$sodienthoai."','".$diachi."',1,'".$created_at."','".$update_at."')");
            if($sql_user){
                echo '<p style="color:green">bạn đã đăng ký thành công</p>';
                $_SESSION['dangky'] = $tenkhachhang;
                header("Location:register.php");
            }
    }
?>
</html>
