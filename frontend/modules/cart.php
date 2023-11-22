<?php session_start();

if(!isset($_SESSION['quantity_in_cart'])) $_SESSION['quantity_in_cart']=0;

   if(!isset($_SESSION['cart'])) $_SESSION['cart']=  [];
   // làm rỗng giỏ hàng
   if(isset($_GET['decart'])&& $_GET['decart']==1) unset($_SESSION['cart']);

   if(isset($_GET['delid'])&& $_GET['delid']>=0&&isset($_GET['quantity'])) 
   { 
    array_splice($_SESSION['cart'],$_GET['delid'],1);
    $_SESSION['quantity_in_cart']= $_SESSION['quantity_in_cart']-$_GET['quantity'];
   }
   if(isset($_POST['add_to_cart'])&&($_POST['add_to_cart']))
   {
    $product_id= $_POST['product_id'];
    $title= $_POST['title'];
   /*  $price= $_POST['price']; */
   $discount_price= $_POST['discount_price']; 
   $thumbnail = $_POST['thumbnail'];
    /* $description= $_POST['description']; */
    $quantity=$_POST['quantity'];
    $_SESSION['quantity_in_cart']= $_SESSION['quantity_in_cart']+$quantity;
    $ok=false;
    for ($i=0; $i <sizeof($_SESSION['cart']); $i++)
    {  
     if($_SESSION['cart'][$i][0]==$product_id)
     {   $ok=true;
        $quantitynew=$quantity+$_SESSION['cart'][$i][4];
        $_SESSION['cart'][$i][4]=$quantitynew;
        break;
     }
    }
    if($ok==false)
    {
        $product=[$product_id,$thumbnail,$title,$discount_price,$quantity];
        $_SESSION['cart'][]=$product;
    }
   } 

   $tong=0;
   
   function showcart(&$tong,&$sl)
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
                
                <td>
                <button>-</button>
                <input type="text" value="'.$_SESSION['cart'][$i][4].'" style=" width:40px; text-align:center ;" ></input>
                <button>+</button>
                </td>
                
                <td>'.$tt.'</td>
                <td>
                <a href="cart.php?delid='.$i.'&quantity='.$_SESSION['cart'][$i][4].'"> Xóa </a>
                </td>
          </tr>';
       }
      
    } else echo 'emty';
    }
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <!-- Link CSS của Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .product-row {
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }

        .product-row:last-child {
            border-bottom: none;
        }

        .product-name {
            font-weight: bold;
            
        }
        
    </style>
</head>

<body>
    <a href="index.php"> Quay về trang chủ</a>
    <div class="container mt-5  ">
        <h1 class="text-center">Giỏ hàng</h1>
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="cartTable">
                                    <!-- Dữ liệu giỏ hàng sẽ được đổ vào đây -->
                                      <?php 
                                      showcart($tong,$sl);
                                      /* session_destroy(); */
                                      ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tổng cộng</h5>
                        <div class="cart-summary">
                            <p>Tổng tiền: <span id="totalAmount"><?php echo $tong ?> </span></p>
                        </div>
                        <a href="cartcheckout.php?tong=<?php echo $tong ?>" class="btn btn-primary">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



