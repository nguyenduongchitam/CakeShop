<?php require("../../../mail/sentpasswordmail.php"); 

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
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

        .form-control {
            text-align: center;
        }

        .btn-primary {
            width: 100%;
        }
		#ChuyenTrang {
			text-align: center;
		}
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1 class="card-title">Mã xác nhận sẽ được gửi về Gmail của bạn,vui lòng kiểm tra gmail</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="verification-code" >Nhập mã xác nhận</label>
                    <input type="text" class="form-control" id="verification-code" placeholder="Nhập code" name="code">
					<?php 
                 echo (!empty($error['code']['verify']))?'<span class="error" style="color: red">'.$error['code']['verify'].'</span>':false;
		         ?>
                </div>
                <button type="submit" class="btn btn-primary" name="submit" >Xác nhận</button>
            </form>
			<br>
			<div id='ChuyenTrang'>Trở về</div>
        </div>
    </div>
	<script>
		document.getElementById("ChuyenTrang").addEventListener("click", function() {
  window.location.href = "sign-in.php";
});
    </script>
</body>

</html>