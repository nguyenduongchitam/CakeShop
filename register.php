<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <title>sign in</title>
</head>
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
<?php
include("config.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $error=[];
       
        if(empty(trim($_POST['email'])))
        {
            $error['email']['required'] = 'email không được để trống';
        }
        else if(!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)){
                $error['email']['invalid'] = 'email không hợp lệ';
         }

         if(empty(trim($_POST['password'])))
        {
            $error['password']['required'] = 'mật khẩu không được để trống';
        }

        if(empty(trim($_POST['repeat_password'])))
        {
            $error['repeat_password']['required'] = 'vui lòng nhâp lại mật khẩu';
        }
        else
        if($_POST['repeat_password']!= $_POST['password']){
        $error['repeat_password']['compare'] = 'mật khẩu không đúng';
            }
        
        if(empty($error)){
		    if(isset($_POST['dangky'])){
                $email = $_POST['email'];
  			    $password = $_POST['password'];
                $hashPassword = password_hash($password,PASSWORD_DEFAULT);
  			    $sql="select * from user where email='$email'";
					$kt=mysqli_query($mysqli, $sql);

					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else
                    {  $sql = "INSERT INTO user(
	    					email,
                            password
	    					) VALUES (
	    					'$email',
	    					'$hashPassword'
	    					)";
                        mysqli_query($mysqli,$sql);
				   		header('location:sign-in.php');
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
                <input type="text" class="form-input" placeholder="Email" name="email" id="email">
            </div>
            <?php
                    echo (!empty($error['email']['required']))?'<span class="error" style="color: red">'.$error['email']['required'].'</span>':false;

                    echo (!empty($error['email']['invalid']))?'<span class="error" style="color: red">'.$error['email']['invalid'].'</span>':false;
            ?>
            <div class="form-group">
                <i class="fa-solid fa-key"></i>
                <input type="text" class="form-input" placeholder="Mật khẩu" name="password" id="password">
            </div>
            <?php
                    echo (!empty($error['password']['required']))?'<span class="error" style="color: red">'.$error['password']['required'].'</span>':false;
            ?>
            <div class="form-group">
                <i class="fa-solid fa-repeat"></i>
                <input type="password" class="form-input" placeholder="Nhập lại mật khẩu" name="repeat_password" id="repeat_password">
                <div id="eye">
                    <i class="fa-solid fa-eye"></i>
                </div>
            </div>
                
            <?php
                    echo (!empty($error['repeat_password']['required']))?'<span class="error" style="color: red">'.$error['repeat_password']['required'].'</span>':false;

                    echo (!empty($error['repeat_password']['compare']))?'<span class="error" style="color: red">'.$error['repeat_password']['compare'].'</span>':false;
            ?>
            <input type="submit" class="form-submit" value="Đăng ký" name="dangky">
            <input type="submit" class="form-submit" value="Đăng nhập" name="dangnhap">
            <div class="support">Trở về</div>
            <?php
                echo (!empty($error['dangky']['invalid']))?'<span style="color: red;margin-left:120px">'.$error['dangky']['invalid'].'</span>':false;
            ?> 
        </form>
    </div>
</body>
</html>