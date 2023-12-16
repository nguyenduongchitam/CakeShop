<?php
    session_start();
    include("config.php");
    if(isset($_COOKIE['email-admin']) && isset($_COOKIE['password-admin'])){
        $emailid = $_COOKIE['email-admin'];
        $password = $_COOKIE['password-admin'];
    }
    else{
        $emailid = $password = "";
    }
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $error=[];
        if(empty(trim($_POST['password'])))
        {
            $error['password']['required'] = 'mật khẩu không được để trống';
        }

        if(empty(trim($_POST['email'])))
        {
            $error['email']['required'] = 'tài khoản không được để trống';
        }
        if(empty($error)){
        if(isset($_POST['dangnhap'])){
            $taikhoan = $_POST['email'];
            $matkhau = $_POST['password'];
            $sql = "SELECT * FROM user WHERE email= '".$taikhoan."' AND role_id = 1 LIMIT 1 ";
            $row = mysqli_query($mysqli,$sql);
            $result = mysqli_fetch_array($row);
            if(empty($result)){
                $error['email']['exist'] = 'tài khoản không tồn tại';   
            }
            else{
                $passwordHashData = $result['password'];
                if(password_verify($matkhau,$passwordHashData))
                {
                    $_SESSION['dangnhap'] = $taikhoan;
                    if(isset($_REQUEST['rememberMe']))
                    {
                        setcookie('email-admin',$_REQUEST['email'],time()+60*60);
                        setcookie('password-admin',$_REQUEST['password'],time()+60*60);
                    }
                    else{
                        setcookie('email-admin',$_REQUEST['email'],time()-10);
                        setcookie('password-admin',$_REQUEST['password'],time()-10);
                    }
                    header("location:user.php");
                }
                else{
                    $error['password']['un-verify'] = 'sai mât khẩu';
                    $error['email']['save'] = $taikhoan;
                }
            }
        }
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
<body>
    <div id="wrapper">
        <form action="" id="form-login" method="POST">
            <h1 class="form-heading">Đăng nhập</h1>
            <div class="form-group">
                <i class="fa-regular fa-user"></i>
                <input type="text" class="form-input" placeholder="Email" name="email" 
                value="<?php 
                            if($emailid == ""){
                                echo (!empty($error['email']['save']))?$error['email']['save']:false;
                            }
                            else{
                                if(empty($error['email']['save']))
                                {
                                    echo $emailid;
                                }
                                else{
                                    echo (!empty($error['email']['save']))?$error['email']['save']:false;
                                }
                            }
                        ?>">
            </div>
            <?php
                    echo (!empty($error['email']['required']))?'<span class="error" style="color: red">'.$error['email']['required'].'</span>':false;

                    echo (!empty($error['email']['exist']))?'<span class="error" style="color: red">'.$error['email']['exist'].'</span>':false;
                ?>
            <div class="form-group">
                <i class="fa-solid fa-key"></i>
                <input type="password" class="form-input" placeholder="Mật khẩu" name="password" 
                value="<?php
                            if(empty($error['password']['un-verify']))
                            {
                                echo $password;
                            } 
                        ?>">
                <div id="eye">
                    <i class="fa-solid fa-eye"></i>
                </div>
            </div>
            <?php
                echo (!empty($error['password']['required']))?'<span class="error" style="color: red">'.$error['password']['required'].'</span>':false;

                echo (!empty($error['password']['un-verify']))?'<span class="error" style="color: red">'.$error['password']['un-verify'].'</span>':false;
            ?><br>
            <input type="checkbox"  name="rememberMe" id="rememberMe"><label for="rememberMe" style="color:white">Ghi nhớ tài khoản ?</label>
            <input type="submit" class="form-submit" value="Đăng nhập" name="dangnhap" >
            <input type="button" class="form-submit" value="Đăng ký">
            <div class="support" style="cursor: pointer;">Trở về</div>
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
