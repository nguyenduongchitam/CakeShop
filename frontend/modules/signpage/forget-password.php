
<?php require("../../../mail/sentpasswordmail.php"); 

	if(isset($_POST['submit'])){
		$response = sendMail($_POST['email']);
	}
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style>
        .container {
            max-width: 400px;
            margin: 100px auto;
        }

        .card {
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            width: 100%;
        }
		.back {

		text-align: center;
		}
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1 class="card-title">Quên mật khẩu</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Nhập email</label>
                    <input type="email" class="form-control"  name="email" id="email" placeholder="nhập email" value="<?php echo (!empty($_SESSION['login']))?$_SESSION['login']:false;?>">
					<?php
			echo (!empty($error['email']['exist']))?'<span class="error" style="color: red">'.$error['email']['exist'].'</span>':false;
		          ?>
				</div>
                <button type="submit" class="btn btn-primary" name="submit">Reset Password</button>			
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
			 <p><div class="back" id="ChuyenTrang" >Trở về</div></p>
        </div>
    </div>
    <script>
		document.getElementById("ChuyenTrang").addEventListener("click", function() {
  window.location.href = "sign-in.php";
});
    </script>
 
</body>

</html>