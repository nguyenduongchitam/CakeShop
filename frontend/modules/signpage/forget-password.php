
<?php require("../../../mail/sentpasswordmail.php"); 

	if(isset($_POST['submit'])){
		$response = sendMail($_POST['email']);
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="nofollow, noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>Quên mật khẩu</title>
</head>
<body>

	<form action="" method="POST" enctype="multipart/form-data">
		<div class="info">
			Quên mật khẩu
		</div>

		<label>Nhập email</label>
		<input type="email" name="email" value="<?php echo (!empty($_SESSION['login']))?$_SESSION['login']:false;?>">
		<?php
			echo (!empty($error['email']['exist']))?'<span class="error" style="color: red">'.$error['email']['exist'].'</span>':false;
		?>
		<button type="submit" name="submit">Submit</button>
	
		<?php 
			if(@$response == "success"){
				header('location:verify.php');
			}else{
				?>
					<p class="error"><?php echo @$response; ?></p>		
				<?php
			}
		?>
	</form>

</body>
</html>