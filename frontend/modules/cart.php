<?php session_start();

   if(!isset($_SESSION['cart'])) $_SESSION['cart']=  [];
   if(isset($_POST['add_to_cart'])&&($_POST['add_to_cart']))
   {
    $product_id= $_POST['product_id'];
    $title= $_POST['title'];
    $price= $_POST['price'];
    /* $discount_price= $_POST['discount_price']; */
   $thumbnail = $_POST['thumbnail'];
    /* $description= $_POST['description']; */
    $quantity=$_POST['quantity'];
    
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
        $product=[$product_id,$thumbnail,$title,$price,$quantity];
        $_SESSION['cart'][]=$product;
    }



   } 
   function showcart()
   {
       if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart'])))
   {
    $tong=0;
    for ($i=0; $i <sizeof($_SESSION['cart']); $i++)
    {  
        $tt=$_SESSION['cart'][$i][3]*$_SESSION['cart'][$i][4];
        $tong+=$tt;
    echo '<tr>
               <td>'.($i+1).'</td>
               <td><img src="../../../Database/images/'.$_SESSION['cart'][$i][1].'" alt="" height="200" weight="200" ></td>
                <td>'.$_SESSION['cart'][$i][2].'</td>
                <td>'.$_SESSION['cart'][$i][3].'</td>
                <td>'.$_SESSION['cart'][$i][4].'</td>
                <td>'.$tt.'<td>
          </tr>';
       }
      }
      echo '<tr>
           <th colspan="5"> Tổng đơn hàng </th>
           <th>'.$tong.'</th>
      </tr>';
    }
   
?>

<table border="1">
    <tr>
        <th>stt</th>
        <th>ảnh</th>
        <th>tên sp</th>
        <th>giá sản phẩm</th>
        <th>số lượng sp</th>
        <th>Thành tiền</th>
    </tr>
    <?php 
    showcart();
   /* session_destroy(); */
    ?>

</table>


