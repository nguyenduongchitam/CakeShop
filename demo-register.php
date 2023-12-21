<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>register</title>
</head>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $error=[];
        $announce=[];
        $eventPassword = $_POST['password'];
        if(empty(trim($eventPassword)))
        {
            $error['password']['required'] = 'mật khẩu không được để trống';
        }
        else{
            if(empty(trim($_POST['repeat_password'])))
            {
                $error['repeat_password']['required'] = 'vui lòng nhâp lại mật khẩu';
                $error['password']['save'] = $eventPassword;
            }
            else
            {
                $matkhau = $_POST['password'];
                if(($_POST['repeat_password'])!= $matkhau){
                $error['repeat_password']['compare'] = 'mật khẩu nhập lại không đúng';
                $error['password']['save'] = $eventPassword;
                }
                else{
                    $announce['repeat_password']['save'] = $matkhau;
                }
            }
        }
        $eventEmail = $_POST['email'];
        if(empty(trim($eventEmail)))
        {
            $error['email']['required'] = 'email không được để trống';
        }
        else{
            if(!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)){
                $error['email']['invalid'] = 'email không hợp lệ';
            }
            else{
                $announce['email']['save'] = $eventEmail;
            }
        }

        if(empty($error)){
            include("config.php");
		    if(isset($_POST["dangky"])){
                $email = $_POST["email"];
  			    $password = $_POST["password"];
                $hashPassword = password_hash($password,PASSWORD_DEFAULT);
  			    $sql="select * from user where email='$email'";
					$kt=mysqli_query($mysqli, $sql);

					if(mysqli_num_rows($kt)  > 0){
						$error['email']['exist'] = 'email đã tồn tại';
					}else{  $sql = "INSERT INTO user(
	    					email,
                            password,
                            role_id,
                            create_at,
                            update_at
	    					) VALUES (
	    					'$email',
	    					'$hashPassword',
                            2,
                            now(),
                            now()
	    					)";
                        mysqli_query($mysqli,$sql);
				   		header('location:demo-sign-in.php');
					}						    
            }
        }
        else{
            $error['dangky']['invalid']='dang ky khong thanh cong';
        }
    }
?>
<body>
    <div id="wrapper">
        <form action="" id="form-login" method="POST">
            <h1 class="form-heading">Đăng ký</h1>
                <div class="form-group">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" class="form-input" placeholder="Email" name="email" id="email" value="<?php echo (!empty($announce['email']['save']))?$announce['email']['save']:false; ?>">
                </div>
                <?php
                    echo (!empty($error['email']['required']))?'<span class="error" style="color: red">'.$error['email']['required'].'</span>':false;

                    echo (!empty($error['email']['invalid']))?'<span class="error" style="color: red">'.$error['email']['invalid'].'</span>':false;

                    echo (!empty($error['email']['exist']))?'<span class="error" style="color: red">'.$error['email']['exist'].'</span>':false;
                ?>
            <div class="form-group">
                <i class="fa-solid fa-key"></i>
                <input type="text" class="form-input" placeholder="Mật khẩu" name="password" id="password" value="<?php echo (!empty($error['password']['save']))?$error['password']['save']:false; echo (!empty($announce['repeat_password']['save']))?$announce['repeat_password']['save']:false;?>">
            </div>
            <?php
                    echo (!empty($error['password']['required']))?'<span class="error" style="color: red">'.$error['password']['required'].'</span>':false;
            ?>
            <div class="form-group">
                <i class="fa-solid fa-repeat"></i>
                <input type="password" class="form-input" placeholder="Nhập lại mật khẩu" name="repeat_password" id="repeat_password" value="<?php echo (!empty($announce['repeat_password']['save']))?$announce['repeat_password']['save']:false;?>">
                <div id="eye">
                    <i class="fa-solid fa-eye"></i>
                </div>
            </div>
            <?php
                    echo (!empty($error['repeat_password']['required']))?'<span class="error" style="color: red">'.$error['repeat_password']['required'].'</span>':false;

                    echo (!empty($error['repeat_password']['compare']))?'<span class="error" style="color: red">'.$error['repeat_password']['compare'].'</span>':false;
            ?>
            <input type="submit" class="form-submit" value="Đăng ký" name="dangky">
            <input type="button" class="form-submit" value="Đăng nhập" name="dangnhap" onclick="Sign()">
            <div class="support" onclick="Redirect()">Trở về</div>
            <?php
                echo (!empty($error['dangky']['invalid']))?'<span style="color: red;margin-left:120px">'.$error['dangky']['invalid'].'</span>':false;
            ?>
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
<script type="text/javascript">
            function Redirect() {
               window.location="homepage.php";
            }
</script>
<script>
    function Sign(){
                window.location = "demo-sign-in.php";
            }
</script>
</html>
