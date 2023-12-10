<?php
require("sentmail.php");
$mailer = new Mailer();
$tieude = "Email with HTML content";
$noidung = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Email</title>
    <style>
        body {
            font-family:"Segoe UI";
            color: #4d2600;
        }
        .img-fluid-logo {
            width: 180px; 
            height:180px; 
            border-radius: 100%;  
            display: block;
            margin-right: auto;
            margin-left: auto;
            margin-bottom: 30px;

        }

        .mail {
            margin-left: auto;
            margin-right: auto;
            padding: 60px;
            display: flex;
            flex-direction: column;
        }
       .content{
            flex:1;
       }

       .incontent{
        padding-left: 80px;
        padding-right: 60px;
        margin-top: 40px;
       }

       .order{
           text-align: center;
           border: 1px dashed #4d2600;
           background-color: #FFFAFA;
           
       }
        .final{
            text-align: right;
        }

        .button { 
            width: 40%;
            height: 60px;
            font-family: "Segoe UI";
            font-size: large;
            border-radius: 13px;
            border: none;
            font-style: oblique;
            margin-top: 30px;
            background-color: #FFF5E4;
            position:relative;
            left: 50%;
            transform: translateX(-50%);
            bottom: 5px;
        }

        .button:hover{
            background-color: #F7E9D7;
        }

        .wave-border {
            width: 100%;
            border: 4px solid transparent;
            border-image: repeating-linear-gradient(-45deg, rgb(243, 167, 175), rgb(247, 73, 99) 10px, transparent 10px, transparent 20px) 10;
            animation: wave-animation 2s linear infinite;
        }

       @keyframes wave-animation {
        0% {
         background-position: 0 0;
           }
        100% {
        background-position: 60px 0;
        }
}

    </style>
</head>
<body>
    <div class="mail">
    <div class="content">
    <img src="cid:my-image" class="img-fluid-logo" alt="Logo">
    <div class="wave-border"></div>
    <div class="incontent">
    <p>Chào bạn, <b>[Họ tên]</b></p>

    <p>Xin chân thành cảm ơn bạn chọn đặt hàng tại <b style="color: #DA0C81; font-size: large;">IU LÀ ĐÂY</b>!</p>

    <p>Tiệm bánh xin thông báo đã nhận được đơn đặt hàng mang mã số: <b>[mã đơn]</b>.</p>
    <p>Chúng tôi xác nhận rằng đơn hàng của bạn đã được nhận và sẽ được xử lý trong thời gian sớm nhất. Chúng tôi sẽ thông báo cho bạn khi đơn hàng đã sẵn sàng để giao hoặc để bạn đến lấy tại cửa hàng.</p>
    <p>Dưới đây là thông tin chi tiết của đơn hàng:</p>
    <div class="order">
    <ul style="list-style-type: none;">
        <li><strong>Tên khách hàng:</strong> [Tên của khách hàng]</li>
        <li><strong>Số điện thoại:</strong> [Số điện thoại của khách hàng]</li>
        <li><strong>Địa chỉ giao hàng:</strong> [Địa chỉ giao hàng]</li>
    </ul>

    <p><strong>Sản phẩm đã đặt hàng:</strong></p>

    <ul style="list-style-type: none;">
        <li>[Tên sản phẩm 1]: [Số lượng]</li>
        <li>[Tên sản phẩm 2]: [Số lượng]</li>
        <li>[Tên sản phẩm 3]: [Số lượng]</li>
    </ul>

    <p><strong>Tổng cộng:</strong> [Tổng số tiền]</p>

    <p><strong>Phương thức thanh toán:</strong> [Phương thức thanh toán đã chọn]</p>
</div>

    <p>Xin chân thành cảm ơn bạn đã tin tưởng và lựa chọn <b style="color: #DA0C81; font-size: large;">IU LÀ ĐÂY</b>. Rất mong được phục vụ bạn trong tương lai.</p>
    <p>Nếu bạn có bất kỳ thắc mắc hoặc vấn đề nào, vui lòng liên hệ với chúng tôi qua hotline:<b> 1900 1234</b> hoặc gửi email tại <b>iuladay@bake.com</b>.</p>
    </div>

    <div class="final">
    <p>Trân trọng,</p>
    <p><b style="color: #DA0C81; font-size: x-large; letter-spacing: 3px;">IU LÀ ĐÂY</b></p>
    <div>
    </div>
</div>

    <div class="wave-border"></div>

    <button class="button"><a href="http://localhost:3000/frontend/modules/index.php?action=homepage&query=none" style="text-decoration: none;" >Website <b style="color: #DA0C81; letter-spacing: 3px;"> IULÀĐÂY</b></button>
</body>
</html>';
$maildathang = "matkhaucuatuila@gmail.com";
$mailer->dathangmail($tieude, $noidung, $maildathang);
?>
