<?php
		include("../../../Database/Config/config.php");
		if(isset($_POST["dangky"])){
  			$username = $_POST["fullname"];
  			$password = $_POST["password"];
 			$phonenumber = $_POST["phone_number"];
  			$email = $_POST["email"];
            $address = $_POST["address"];
			  if ($username == "" || $password == "" || $phonenumber == "" || $email == ""|| $address=="") {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
  			}else{  $sql="select * from user where email='$email'";
					$kt=mysqli_query($mysqli, $sql);

					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else{  $sql = "INSERT INTO user(
	    					full_name,
	    					password,
						    email,
                            phone_number,
                            address
	    					) VALUES (
	    					'$username',
	    					'$password',
						    '$email',
	    					'$phonenumber',
                            '$address'
	    					)";
                        mysqli_query($mysqli,$sql);
				   		echo "chúc mừng bạn đã đăng ký thành công";
					}
            }						    
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/sign.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>sign in</title>
</head>
<body>
    <div id="wrapper">
        <form action="demo-register.php" id="form-login" method="POST">
            <h1 class="form-heading">Đăng nhập</h1>
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Họ và tên" name="fullname" id="fullname">
            </div>
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Email" name="email" id="email">
            </div>
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Mật khẩu" name="password" id="password">
            </div>
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Số điện thoại" name="phone_number" id="phone_number">
            </div>
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Địa chỉ" name="address" id="address">
            </div>
            <input type="submit" class="form-submit" value="Đăng ký" name="dangky">
            <input type="submit" class="form-submit" value="Đăng nhập" name="dangnhap">
            <div class="support">Trở về</div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</html>
