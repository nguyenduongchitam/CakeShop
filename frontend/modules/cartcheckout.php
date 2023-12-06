<?php
session_start();
$tong=0;
include("../../Database/Config/config.php");
require("../../mail/sentmail.php");
if(!isset($_SESSION['dangnhap'])&&($_SESSION['dangnhap']==""))
          {
           header("location:sign-in.php");
          }
function showcart(&$tong)
{
    if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart'])))
{  if(sizeof($_SESSION['cart'])>0)
 { 
   for ($i=0; $i <sizeof($_SESSION['cart']); $i++)
  {   
     $tt=$_SESSION['cart'][$i][3]*$_SESSION['cart'][$i][4];
     $tong+=$tt;
 echo '<tr>
             <td>'.$_SESSION['cart'][$i][2].'</td>
             <td>'.$_SESSION['cart'][$i][3].'</td>
             <td>'.$_SESSION['cart'][$i][4].'</td>
             </td>
             <td>'.$tt.'</td>
       </tr>';
    }
   
 } else echo 'emty';
 }
 }

 if(isset($_POST['dathang']))
{  
   
    /* $address=$_POST['address']; */
    $city=$_POST['city'];
    $district=$_POST['district'];
    $delivery=$_POST['delivery'];
    $ward=$_POST['ward'];
    $note=$_POST['note'];
    // tạo dữ liệu oder
      
    if(isset($_SESSION['dangnhap'])&&($_SESSION['dangnhap']!=""))
    {
        $sql1 = "SELECT * FROM user where email='".$_SESSION['dangnhap']."'";
        $result1= mysqli_query($mysqli,$sql1);

        while ($row = mysqli_fetch_array($result1)) {
        $user_id=$row['user_id'];
        }
        $tong=$_GET['tong'];
        $sql_add_order= "INSERT INTO `order`(`user_id`, `city`, `district`, `ward`, `note`, `delivery_money`, `order_date`, `status`, `total_money`) VALUES ($user_id,'$city','$district','$ward','$note',$delivery,now(),1,$tong)";
        //lay id order vua moi them vao 
        if ( mysqli_query($mysqli,$sql_add_order)) {
            $last_order_id = mysqli_insert_id($mysqli);
            //them vao order detail   
            for ($i=0; $i <sizeof($_SESSION['cart']); $i++)
            {
            $product_id= $_SESSION['cart'][$i][0];
            $discount_price=$_SESSION['cart'][$i][3];
            $num= $_SESSION['cart'][$i][4];
            $sql2= "INSERT INTO order_detail(order_id,product_id,price,num) values ( $last_order_id,$product_id,$discount_price,$num)";
            mysqli_query($mysqli,$sql2);
            }
        }
           /* $mail =new Mailer();
           $tieude="Đặt hàng website cakeshop thành công !";
           $noidung=" 
           <p>cảm ơn quý khách đã đặt hàng với mã đơn hàng là : ".$last_order_id ." <p>
           <p> Đơn đặt hàng bao gồm : <p>
           <table>
           ";
          for ($i=0; $i <sizeof($_SESSION['cart']); $i++)
            {   
           $tt=$_SESSION['cart'][$i][3]*$_SESSION['cart'][$i][4];
          $noidung.="<tr>
            <td>".($i+1)."</td>
             <td>".$_SESSION['cart'][$i][2]."</td>
             <td>".$_SESSION['cart'][$i][3]."</td>
             <td>".$_SESSION['cart'][$i][4]."</td>
             </td>
             <td>".$tt."</td>
            </tr>";
           }

           $noidung.="
           <table>
           <p> tổng tiền : ".$tong." <p>
           ";
           $maildathang=$_SESSION['dangnhap'];
           $mail->dathangmail($tieude,$noidung,$maildathang); */
           unset($_SESSION['cart']);
           unset($_SESSION['quantity_in_cart']);   
           echo '<script>location.replace("index.php?action=thanhyou&query=none");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        /* CSS cho trang checkout */
        body {
            font-family:'Segoe UI';
            margin: 0;
            padding: 20px;
            color: #4d2600;
            background-color: #FFFBF5;
        }

        .img-fluid-logo {
            width: 120px; 
            height:120px; 
            border-radius: 100%;  
            display: block;
            margin-right: auto;
            margin-left: 220px;
            margin-bottom: 24px;
            filter: brightness(100%);
            transition: filter 0.3s ease;

        }
        .img-fluid-logo:hover {
          filter:contrast(110%)
        }
        .background {
          background-image: url(../modules/images/background.png);
        }
        .link {
          margin-left: 220px;
         
        }

        .linkcart{
          text-decoration:none; 
          color: #8B7E74;

        }

        .linkcart:hover {
          color: #4d2600;
        }
      
        .title {
          font-size: 22px;
          font-weight: bold;
          letter-spacing: 2px;
          background-color: antiquewhite;
          padding: 5px 10px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            display: flex;
        }

        .checkout-form {
            flex-basis: 70%;
            margin-right: 20px;
        }

        .square-checkbox {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border: 1px solid #000;
        width: 15px;
        height: 15px;
        border-radius: 3px;
        position: relative;
       }

    .square-checkbox:checked::before {
        content: "\2713";
        font-size: 12px;
        color: #000;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
       }

       .checkbox-label {
        display: flex;
        align-items: center;
        
    }

    .checkbox-label input[type="checkbox"] {
        margin-right: 5px;
    }

        .cart {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
            width: 60%;
            text-align:center;
            padding: 10px;
            border-width: 2px;
            
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .cart-item .name {
            flex-grow: 1;
            margin-right: 10px;
        }

        .cart-item .price {
            flex-shrink: 0;
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            font-weight: bold;
        }
        .bill {
          display: flex; 
          justify-content: center; 
          align-items: center;
          border-spacing: 8px;
          
        }
        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
          background-color: #ED7D31;
          color: white;
          border: none;
          font-size: 20px;
          border-radius: 10px;
          width: 80%;
          margin-top: 10px;
          height: 40px;
          
        }

        button:hover {
            background-color: rgb(214, 0, 0);
        }

        .amounttotal{
          font-size: 23px;
          text-align: right;
          justify-content: space-between;
          color:#ED7D31;
          
        }
    </style>
</head>
<body>

<a href="index.php?action=homepage&query=none"><img src="../modules/images/Header-logo.png" class="img-fluid-logo" alt="Logo">
    
<p class="link"><a href="index.php?action=cart&query=none" class="linkcart">Giỏ hàng của bạn</a> > Thông tin mua hàng </p>

<div class="container">
        <div class="checkout-form">
            <p class="title">THÔNG TIN GIAO HÀNG</p>
            <form id="checkoutForm" method="post" action="">
                
          <?php 
            $sql1 = "SELECT * FROM user where email='".$_SESSION['dangnhap']."'";
        $result1= mysqli_query($mysqli,$sql1);

        while ($row = mysqli_fetch_array($result1)) {
            $full_name= $row['full_name'];
            $email=$row['email'];
            $phone_number=$row['phone_number'];
            $address=$row['address'];
            echo '
            <label for="full_name">Họ và tên </label>
            <input type="text" name="full_name"  value="'.$full_name.'" disabled >
            <label for="email">Email</label>
            <input type="email" name="email" value="'.$email.'" disabled>
            <label>Số điện thoại</label>
            <input type="text" name="phone_number" value="'.$phone_number.'" disabled >
            <label>Chọn Tỉnh/ Thành phố</label>
            <select name="city" class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
              <option  value="" selected> Tỉnh/ Thành phố</option>           
            </select>
            <label>Chọn Quận/ Huyện</label>
             <select name="district" class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
             <option  value="" selected>Quận/ Huyện</option>
            </select>
            <label>Chọn Phường/ Xã</label>
           <select name="ward" class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
          <option  value="" selected>Phường/ Xã</option>
          </select>  
          <label>Địa chỉ nhận hàng</label>
            <input type="text"></input>
          <label>Ghi chú cho cửa hàng</label>
          <textarea placeholder="Nội dung" type="areatext" name="note" class="form-control" style="width: 99%; height: 50px;"> </textarea> 
          <p class="title">PHƯƠNG THỨC GIAO HÀNG</p>
          <label class="checkbox-label"><input type="checkbox" class="square-checkbox" name="delivery" value="0" onclick="uncheckOther(this)"> Nhận sản phẩm tại cửa hàng</label>
           <br>
           <label class="checkbox-label"><input type="checkbox" class="square-checkbox" name="delivery" value="40000" onclick="uncheckOther(this)"> Giao hàng theo tốc độ tiêu chuẩn (từ 2 - 5 ngày làm việc)</label>
          <p class="title">PHƯƠNG THỨC THANH TOÁN</p>
          <label class="checkbox-label"><input type="checkbox" class="square-checkbox" onclick="uncheckOther(this)" > Thanh toán khi nhận hàng (COD)</label>
          <br>
          <label class="checkbox-label"><input type="checkbox" class="square-checkbox" onclick="uncheckOther(this)"> Thanh toán bằng ví MoMo</label>
        
        ';
        }
          ?>
        <script>
          function uncheckOther(checkbox) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(item) {
               if (item !== checkbox) {
                 item.checked = false;
           }
        });
        }
        </script>

    </form>
        </div>
        <div class="cart">
            <h2 style="letter-spacing: 2px; font-size: 25px;">ĐƠN HÀNG</h2>
            <hr style="height: 2px; border: none; background-color: #A9A9A9; margin: 20px 10px; ">
            <table class="bill">
            <tr>    
                <th>Tên sản phẩm </th> 
                <th>Đơn giá </th>
                <th>Số lượng</th>
                <th>Tổng</th>
            </tr>
           <?php showcart($tong)?>
           </table>
          
           <hr style="height: 2px; border: none; background-color: #A9A9A9; margin: 20px 10px; ">
           
           <p style="font-size: 16px;"><b>TỔNG CỘNG : <span class="amounttotal"><?php echo $tong ?> VND</b></span></p>

           <button type="submit" name="dathang"><b>HOÀN TẤT ĐẶT HÀNG</b></button>
           
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
  var cities = document.getElementById("city");
  var districts = document.getElementById("district");
  var wards = document.getElementById("ward");

  var Parameter = {
    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
    method: "GET", 
    responseType: "application/json", 
  };

  var promise = axios(Parameter);
  promise.then(function (result) {
    renderCity(result.data);
  });

  function renderCity(data) {
    for (const city of data) {
      cities.options[cities.options.length] = new Option(city.Name, city.Name);
    }

    cities.onchange = function () {
      districts.length = 1;
      wards.length = 1;

      if (this.value !== "") {
        const selectedCity = data.find(city => city.Name === this.value);

        for (const district of selectedCity.Districts) {
          districts.options[districts.options.length] = new Option(district.Name, district.Name);
        }
      }
    };

    districts.onchange = function () {
      wards.length = 1;

      if (this.value !== "") {
        const selectedCity = data.find(city => city.Name === cities.value);
        const selectedDistrict = selectedCity.Districts.find(district => district.Name === this.value);

        for (const ward of selectedDistrict.Wards) {
          wards.options[wards.options.length] = new Option(ward.Name, ward.Name);
        }
      }
    };
  }
</script>
</body>