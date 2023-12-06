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
            echo '<script> alert("Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại.")<script>';
            header("Location:admin_login.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background: url(/Database/images/Bánh\ 1.png); background-size:cover; background-position-y:-450px">
    <div class="wrapper" style="align-items: center;min-height: 100vh; display:flex; justify-content:center; align-items:center">
    <form action="" method="post" style="max-width: 400px; background: rgba(0, 0, 0, 0.8 ); padding:30px 30px 40px; box-shadow:0px 0px 17px 2px rgba(255, 255, 255, 0.8 );" >
    <h3 style="color:white; text-align:center; margin-bottom:30px">Đăng nhập trang quản trị</h3>
    <div class="form-gr" style="border:0;border-bottom:1px solid #fff;margin-top:10px; margin-bottom:10px;" >
    <i class="fas fa-user" style="color: white; margin-right: 5px;"></i><input style="color:white; width: 280px; height:35px; background:transparent;border:0; outline:0" type="text" placeholder="Nhập email" name="email"></tr>   
    </div>
    <div class="form-gr" style="border:0;border-bottom:1px solid #fff;margin-top:10px; margin-bottom:10px;">
    <i class="fas fa-key fa-rotate-270" style="color:white;margin-right: 5px;"></i><input style="color:white;width: 280px; height:35px; background:transparent;border:0; outline:0" type="password" placeholder="Nhập mật khẩu" name="password" ></tr>
    </div>
    <button style="width: 100%; height:35px; margin-top:20px " name="dangnhap">Đăng nhập</button>
    </table>
    </form>
    </div>
</body>
</html>