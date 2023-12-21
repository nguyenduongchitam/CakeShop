
<?php
include("../../../Database/Config/config.php");
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $error=[];
        $announce=[];
        $eventPasswordNew = $_POST['new-password'];
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
        if(empty(trim($eventPasswordNew)))
        {
            $error['password']['required'] = 'mật khẩu không được để trống';
            $announce['email']['save'] = $_POST['email'];
        }
        else{
            if(empty(trim($_POST['repeat-password'])))
            {
                $error['repeat_password']['required'] = 'vui lòng nhâp lại mật khẩu';
                $error['password']['save'] = $eventPasswordNew;
                $announce['email']['save'] = $_POST['email'];
            }
            else
            {
                if(($_POST['repeat-password'])!= $eventPasswordNew){
                $error['repeat_password']['compare'] = 'mật khẩu nhập lại không đúng';
                $error['password']['save'] = $eventPasswordNew;
                $announce['email']['save'] = $_POST['email'];
                }
            }
        }
    }
    if(empty($error)){
        if(isset($_POST['save-password']))
        {
            $email = $_POST['email'];
            $matkhaumoi = $_POST['new-password'];
            $nhaplaimatkhau = $_POST['repeat-password'];
            $sql = "SELECT * FROM user where email='".$email."' LIMIT 1 ";
            $row = mysqli_query($mysqli,$sql);
            $result = mysqli_fetch_array($row);
            if(empty($result)){
                $error['email']['exist'] = 'email không tồn tại';
            }
            else{
                $passwordHashData = password_hash($nhaplaimatkhau,PASSWORD_DEFAULT);
                $sqlpass = "UPDATE user SET password = '$passwordHashData' WHERE email = '$email'";
                $row3 = mysqli_query($mysqli,$sqlpass);
                header('location:sign-in.php');
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/sign.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Làm mới mật khẩu</title>
</head>
<body>
    <div id="wrapper">
                    <form id="form-login" method="POST" action="">
                        <h3>Làm mới mật khẩu</h3>
                        <div class="form-group">
                        <input type="text" class="form-input" placeholder="Email" name="email" value="<?php echo (!empty($announce['email']['save']))?$announce['email']['save']:false; ?>">
                        </div>
                        <?php
                            echo (!empty($error['email']['required']))?'<span class="error" style="color: red">'.$error['email']['required'].'</span>':false;

                            echo (!empty($error['email']['invalid']))?'<span class="error" style="color: red">'.$error['email']['invalid'].'</span>':false;

                            echo (!empty($error['email']['exist']))?'<span class="error" style="color: red">'.$error['email']['exist'].'</span>':false;
                        ?>
                        <div class="form-group">
                            <input type="password" class="form-input" placeholder="Nhập mật khẩu mới" name="new-password" value="<?php echo (!empty($error['password']['save']))? $error['password']['save'] :false;
                            echo (!empty($announce['password']['save']))? $announce['password']['save'] :false; ?>"> 
                        </div>
                            <?php
                                echo (!empty($error['password']['required']))?'<span class="error" style="color: red">'.$error['password']['required'].'</span>':false;
                            ?>
                        <div class="form-group">
                            <input type="password" class="form-input" placeholder="Nhập lại mật khẩu" name="repeat-password" value="<?php echo (!empty($announce['repeat_password']['save']))? $announce['repeat_password']['save']:false;?>">  
                        </div>
                        <?php
                            echo (!empty($error['repeat_password']['required']))?'<span class="error" style="color: red">'.$error['repeat_password']['required'].'</span>':false;

                            echo (!empty($error['repeat_password']['compare']))?'<span class="error" style="color: red">'.$error['repeat_password']['compare'].'</span>':false;
                        ?>
                        <div>
                            <button type="submit" class="form-submit" name="save-password">CẬP NHẬT MẬT KHẨU</button>
                    </div>
                </form>
        </div>
</body>
</html>