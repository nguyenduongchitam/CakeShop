<?php
session_start();

$tong=0;
include("../../Database/Config/config.php");

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
            <td>'.($i+1).'</td>
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
{  // lấy thông tin khách hàng từ form
    $full_name=$_POST['full_name'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
    $address=$_POST['address'];
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
        $sql_add_order= "INSERT INTO `order`(`user_id`, `note`, `order_date`, `status`, `total_money`) VALUES ($user_id,'$note',now(),1,$tong)";
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
        unset($_SESSION['cart']);
        unset($_SESSION['quantity_in_cart']);
        header("Location: index.php?action=thanhyou&query=none");
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
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color:#fff7e6;
            color: #4d2600;
        }

        h1 {
            text-align: center;
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

        .cart {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
            width: 60%;
            text-align:center;
            
            
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
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<img src="../modules/images/Header-logo.png" class="img-fluid logo" alt="Logo" style="max-width: 140px; height:90px; border-radius:20px">

 
<a href="index.php?action=cart&query=none" >Giỏ hàng</a>

    <div class="container">
        <div class="checkout-form">
            <h1>Thanh toán</h1>
            <form id="checkoutForm" method="post" action="">
                
          <?php 
          if(isset($_SESSION['dangnhap'])&&($_SESSION['dangnhap']!=""))
          {
            $sql1 = "SELECT * FROM user where email='".$_SESSION['dangnhap']."'";
        $result1= mysqli_query($mysqli,$sql1);

        while ($row = mysqli_fetch_array($result1)) {
            $full_name= $row['full_name'];
            $email=$row['email'];
            $phone_number=$row['phone_number'];
            $address=$row['address'];
            echo '
            <h2>Thanh toán giỏ hàng</h2>
            <label for="full_name">Họ và tên </label>
            <input type="text" name="full_name"  value="'.$full_name.'" required>
          
            <label for="email">Email</label>
            <input type="email" name="email" value="'.$email.'"  required>
          
            <label>Số điện thoại</label>
            <input type="text" name="phone_number" value="'.$phone_number.'"  required>
          
            <label for="address">Địa chỉ</label>
            <input type="text" name="address" value="'.$address.'"  required>

            <label for="note">Vui lòng nhập địa chỉ nhận hàng</label>
            <textarea placeholder="Nội dung" type="areatext" name="note" class="form-control" required> </textarea>

            <br>
            <button type="submit" name="dathang">Đặt hàng</button>';
        }
    }
        else echo '
        <h2>Thanh toán giỏ hàng</h2>
        <label for="full_name">Họ và tên </label>
        <input type="text" name="full_name" required>
        
        <label for="email">Email</label>
        <input type="email"  name="email" required>
        
        <label>Số điện thoại</label>
        <input type="text" name="phone_number" required>
        
        <label for="address">Địa chỉ</label>
        <input type="text"  name="address" required>
        
        <button type="submit" name="dathang">Đặt hàng</button>
        
        <label for="note">Vui lòng nhập địa chỉ nhận hàng</label>
        <textarea placeholder="Nội dung" type="areatext" name="note" class="form-control" required> </textarea>
        ';

          ?>
    </form>
        </div>
        <div class="cart">
            <h2>Giỏ hàng</h2>
            <table>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá </th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
            </tr>
           <?php showcart($tong)?>
           </table>
           
           <p>Tổng tiền : <?php echo $tong ?></p>
        </div>
    </div>