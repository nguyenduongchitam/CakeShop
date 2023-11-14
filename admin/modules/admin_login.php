<?php
include("config.php");
if(isset($_POST['sign_in'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql_check="SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result=mysqli_query($mysqli,$sql_check);
    $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        header("Location:index.php");
    }
    else
    {
        echo'<script>
            window.location.href="index.php";
            alert("lo
            '
    }
    }
?>
<html>
    <head>
        <title>Admin Login Page</title>
    </head> 
    <body>
    <div class="login_form">
    <h2>Admin Login</h2>
    <form action="" method="post">
        <div class="input_field">
            <input type="email" placeholder="Email quản trị viên" name="admin_email">
        </div>
        <div class="input_field">
            <input type="password" placeholder="Mật khẩu" name="admin_password">
        </div>
        <input type="submit" value="Đăng nhập" name="login">
    </form>
    </div>
    <?php
    
?>
    </body>
</html>
