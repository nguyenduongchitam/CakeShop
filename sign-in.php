<?php
    session_start();
    include("config.php");
    if(isset($_COOKIE['emailid']) && isset($_COOKIE['password'])){
        $emailid = $_COOKIE['emailid'];
        $password = $_COOKIE['password'];
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
            $error['email']['required'] = 'email không được để trống';
        }
        else
        {
            if(!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)){
                $error['email']['invalid'] = 'email không hợp lệ';
            }
        }
        if(empty($error)){
        if(isset($_POST['dangnhap'])){
            $taikhoan = $_POST['email'];
            $matkhau = $_POST['password'];
            $sql = "SELECT * FROM user where email='".$taikhoan."' LIMIT 1 ";
            $row = mysqli_query($mysqli,$sql);
            $result = mysqli_fetch_array($row);
            if(empty($result)){
                $error['email']['exist'] = 'email không tồn tại';
            }
            else{
                $passwordHashData = $result['password'];
                if(password_verify($matkhau,$passwordHashData))
                {
                    $_SESSION['dangnhap'] = $taikhoan;
                    if(isset($_REQUEST['rememberMe']))
                    {
                        setcookie('emailid',$_REQUEST['email'],time()+60*60);
                        setcookie('password',$_REQUEST['password'],time()+60*60);
                    }
                    else{
                        setcookie('emailid',$_REQUEST['email'],time()-10);
                        setcookie('password',$_REQUEST['password'],time()-10);
                    }
                    header("Location:index.php?action=homepage&query=none");
                }
                else{
                    $error['password']['un-verify'] = 'sai mât khẩu';
                    $error['email']['save'] = $taikhoan;
                    $_SESSION['login'] = $_POST['email'];
                }
            }
        }
    }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<script type="text/javascript">
            function Redirect() {
               window.location="homepage.php";
            }
</script>
<script>
    function ForgetPassword(){
                window.location = "PHPMailer-gmail-source-code/forget-password.php";
            }
</script>
<script>
    function Register(){
                window.location = "front-end/register.php";
            }
</script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="sign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>sign in</title>
</head>
<body>
    <div id="wrapper">
        <form action="" id="form-login" method="POST">
            <h1 class="form-heading">Đăng nhập</h1>
            <div class="form-group">
                <i class="fa-regular fa-user"></i>
                <input type="text" class="form-input" placeholder="Email" name="email" value="<?php echo $emailid;
                echo (!empty($error['email']['save']))?$error['email']['save']:false; ?>">
            </div>
            <?php
                    echo (!empty($error['email']['required']))?'<span class="error" style="color: red">'.$error['email']['required'].'</span>':false;

                    echo (!empty($error['email']['invalid']))?'<span class="error" style="color: red">'.$error['email']['invalid'].'</span>':false;

                    echo (!empty($error['email']['exist']))?'<span class="error" style="color: red">'.$error['email']['exist'].'</span>':false;
                ?>
            <div class="form-group">
                <i class="fa-solid fa-key"></i>
                <input type="password" class="form-input" placeholder="Mật khẩu" name="password" value="<?php echo $password; ?>">
                <div id="eye">
                    <i class="fa-solid fa-eye"></i>
                </div>
            </div>
            <?php
                echo (!empty($error['password']['required']))?'<span class="error" style="color: red">'.$error['password']['required'].'</span>':false;

                echo (!empty($error['password']['un-verify']))?'<span class="error" style="color: red">'.$error['password']['un-verify'].'</span>':false;
            ?>
            <input type="submit" class="form-submit" value="Đăng nhập" name="dangnhap">
            <input type="submit" class="form-submit" value="Đăng ký" onclick="Register()">
            <div class="support" onclick="Redirect()" style="cursor: pointer;">Trở về</div>
            <div class="support" onclick="ForgetPassword()" style="cursor: pointer;"><u>Quên mật khẩu?</u></div>
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
