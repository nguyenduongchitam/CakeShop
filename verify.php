<?php require("script.php"); ?>
<?php
	if(isset($_POST['submit'])){
		$verify_code = $_POST['code'];
        $error=[];
        if($_SESSION['code'] == $verify_code)
        {	
            header('location:reset-password.php');
			unset($_SESSION['code']);
        }
        else{
            $error['code']['verify']='Mã xác nhận sai';
        }

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="nofollow, noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>Xác nhận người dùng</title>
</head>
<body>

	<form action="" method="post" enctype="multipart/form-data">
		<div class="info">
			Xác nhận người dùng
		</div>
		<div>Mã xác nhận sẽ được gửi về Gmail của bạn</div>
		<div>Vui lòng kiểm tra</div>
		<label>Nhập mã xác nhận</label>
		<input type="text" name="code" value="">
	
		<button type="submit" name="submit">Submit</button>
		<?php 
            echo (!empty($error['code']['verify']))?'<span class="error" style="color: red">'.$error['code']['verify'].'</span>':false;
		?>
	</form>

</body>
</html>