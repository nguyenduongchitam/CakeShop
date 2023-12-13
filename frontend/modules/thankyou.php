<!DOCTYPE html>
<html>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<head>
    <title>Đặt hàng thành công</title>
    <style>
        body {
            font-family:'Segoe UI';
            background-color: #f5f5f5;
            color: #4d2600;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 25px;
            background-color: #FFF5E4;
            border: 1px solid #dddddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            font-size: 24px;
            margin-top: 0;
        }
        
        p {
            color: #776B5D;
            font-size: 16px;
            line-height: 1.5;
        }

        .button {
            border: none;
            height: 39px;
            border-radius: 10px;
            font-size: 19px;
            width: 30%;
            position:relative;
            left: 50%;
            transform: translateX(-50%);
            bottom: 3px;
            background-color: #F2EAD3; 
        }

        .button:hover{
            background-color: #F4DFB6; 
        }
    </style>
</head>
<body>
    <div class="container">
     <ion-icon name="checkmark-circle-outline" style="font-size:50px; position:relative; left: 50%; transform: translateX(-50%);"></ion-icon>
        <h1>Đặt hàng thành công!</h1>
        <p>Cảm ơn bạn đã tin tưởng và đặt hàng. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để xác nhận đơn hàng thông qua email.</p>
        <p>Rất mong được phục vụ bạn trong tương lai!</p>

        <button class="button"><a href="index.php?action=homepage&query=none" style="text-decoration: none; color:#4d2600; font-family:'Segoe UI';" >Trang chủ</button>
    </div>
</body>
</html>