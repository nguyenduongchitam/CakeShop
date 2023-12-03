
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
            <td><img src="../../../Database/images/'.$_SESSION['cart'][$i][1].'" alt="" height="100" weight="100" ></td>
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
    /* $address=$_POST['address']; */
    $city=$_POST['city'];
    $district=$_POST['district'];
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
        $sql_add_order= "INSERT INTO `order`(`user_id`, `city`, `district`, `ward`, `note`, `delivery_money`, `order_date`, `status`, `total_money`) VALUES ($user_id,'$city','$district','$ward','$note',now(),1,$tong)";
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
       // header("Location: index.php?action=thanhyou&query=none");
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
            width: 500px;
            
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
<a href="cart.php" >Quay ve</a>
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
          
            <div>
            <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
             <option name="city" value="" selected> Chọn tỉnh thành</option>           
              </select>
               
              <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
              <option name="district" value="" selected>Chọn quận huyện</option>
             </select>
     
               <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
                 <option  name="wrad" value="" selected>Chọn phường xã</option>
               </select>
                  </div>    
             <button type="submit" name="dathang">Đặt hàng</button>
             <label for="note">Vui lòng nhập địa chỉ nhận hàng</label>
             <textarea placeholder="Nội dung" type="areatext" name="note" class="form-control" required> </textarea>
             ';
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
        <div>
       <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
        <option name="city" value="" selected> Chọn tỉnh thành</option>           
         </select>
         <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
         <option name="district" value="" selected>Chọn quận huyện</option>
        </select>

          <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
            <option name="wrad" value="" selected>Chọn phường xã</option>
          </select>
             </div>    
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
                <th>ảnh</th>
                <th>tên sản phẩm</th>
                <th>giá </th>
                <th>số lượng</th>
                <th>tổng tiền</th>
            </tr>
           <?php showcart($tong)?>
           </table>
           
           <p>Tổng tiền : <?php echo $tong ?></p>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
	var citis = document.getElementById("city");
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
  for (const x of data) {
    citis.options[citis.options.length] = new Option(x.Name, x.Id);
  }
  citis.onchange = function () {
    district.length = 1;
    ward.length = 1;
    if(this.value != ""){
      const result = data.filter(n => n.Id === this.value);

      for (const k of result[0].Districts) {
        district.options[district.options.length] = new Option(k.Name, k.Id);
      }
    }
  };
  district.onchange = function () {
    ward.length = 1;
    const dataCity = data.filter((n) => n.Id === citis.value);
    if (this.value != "") {
      const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

      for (const w of dataWards) {
        wards.options[wards.options.length] = new Option(w.Name, w.Id);
      }
    }
  };
}
	</script>
</body>