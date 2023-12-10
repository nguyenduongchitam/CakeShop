<?php 

  if(!isset($_SESSION['quantity_in_cart'])) $_SESSION['quantity_in_cart']=0;

   if(!isset($_SESSION['cart'])) $_SESSION['cart']=  [];
   // làm rỗng giỏ hàng
   if(isset($_GET['decart'])&& $_GET['decart']==1) unset($_SESSION['cart']);

   if(isset($_GET['delid'])&& $_GET['delid']>=0 && isset($_GET['quantity'])) 
   { 
    array_splice($_SESSION['cart'],$_GET['delid'],1);
    $_SESSION['quantity_in_cart']= $_SESSION['quantity_in_cart']-$_GET['quantity'];
   }
   if(isset($_SESSION['cart'])&&isset($_GET['add']))
   {$product_id=$_GET['add'];
    for ($i=0; $i <sizeof($_SESSION['cart']); $i++)
    {  
        if($_SESSION['cart'][$i][0]==$product_id)
        $_SESSION['cart'][$i][4]+=1;
    }
   }
   if(isset($_SESSION['cart'])&&isset($_GET['remove']))
   {$product_id=$_GET['remove'];
    for ($i=0; $i <sizeof($_SESSION['cart']); $i++)
    {  
        if($_SESSION['cart'][$i][0]==$product_id)
         if ($_SESSION['cart'][$i][4]-1>0)
         { break;
            $_SESSION['cart'][$i][4]-=1;
         }
         else if ($_SESSION['cart'][$i][4]-1==0)
         {  break;
             echo'<script>location.replace("index.php?action=cart&query=none&delid='.$i.'&quantity='.$_SESSION['cart'][$i][4].'");</script>';
             
         }
    }
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
    echo'<script>location.replace("index.php?action=cart&query=none");</script>';
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
               <td><img src="../../Database/Images/'.$_SESSION['cart'][$i][1].'" alt="" height="100" weight="80" ></td>
                <td>'.$_SESSION['cart'][$i][2].'</td>
                <td>'.$_SESSION['cart'][$i][3].'</td>
                
                <td>
                <a href="index.php?action=cart&query=none&remove='.$_SESSION['cart'][$i][0].'" class="quantity"><ion-icon name="remove-circle-outline"></ion-icon></a>
                <input type="text" value="'.$_SESSION['cart'][$i][4].'" style=" width:40px; text-align:center ;" ></input>
                <a href="index.php?action=cart&query=none&add='.$_SESSION['cart'][$i][0].'" class="quantity"><ion-icon name="add-circle-outline"></ion-icon></a>
                </td>  
                <td>'.$tt.'</td>
                <td>
                <a href="index.php?action=cart&query=none&delid='.$i.'&quantity='.$_SESSION['cart'][$i][4].'"> <ion-icon name="trash-outline" class="trash"></ion-icon> </a>
                </td>
          </tr>';
       }
      
    } else echo'<script>location.replace("index.php?action=cartnone&query=none");</script>';
    }
    }
   
?>

<div class="cartbody">
    <div class="container-mt-5">
        <h1 class="text-center">Giỏ hàng của bạn</h1>
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
                    <p style="font-size:x-large; text-align: center;"><b>ĐƠN HÀNG</b></p>
                    <hr style="height: 3px; background-color: black;">
                        <!-- <h5 class="card-title">Tổng cộng</h5> -->
                        <p style="font-size:large"><b>Nhập mã khuyến mãi </p></b>
                        <div class="indiscount"><input type><input type="submit" value="Áp dụng" style="background-color: #ED7D31; border: none; color: white;"></div>
                        <hr style="height: 2px; margin: 30px 0; background-color: black; margin-bottom:10px;">
                        <div class="cart-summary">
                         <p style="font-size:large"><b>Tạm tính: </p> <span id="totalAmount" class="total" style="color:#ED7D31"><?php echo $tong ?>đ </span></b>
                        </div>
                        <a href="cartcheckout.php?tong=<?php echo $tong ?>"  ><button class="button"><b>Thanh toán</b></button></a>
                    </div>
                </div>
                <div class="intext">
                <p><i> <b>Chính sách mua hàng:</b><br> Hiện chúng tôi chỉ áp dụng giao hàng ở khu vực miền Nam</i></p>
                </div>
            </div>
        </div>
    </div>
    <!-- <a href="index.php" class="back"> Quay về trang chủ</a> -->
</div>
    <!-- <a href="index.php" class="back"> Quay về trang chủ</a> -->
</div>





