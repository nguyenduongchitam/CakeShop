<?php
    include("../../Database/Config/config.php");
    $sql1="select * from category";
$result1= mysqli_query($mysqli,$sql1);

  if(isset($_POST['searchkey'])) $searchkey=$_POST['searchkey'];

  $sql2="SELECT * FROM product where title like '%$searchkey%'" ;
  $result2 = mysqli_query($mysqli,$sql2);
?>

<div class="menubody">
<h1 style="font-family:'Segoe UI'; font-size:27px; padding-top: 30px; color: #4d2600;"><i>Kết quả tìm kiếm cho từ : </i><?php echo '"'.$searchkey.'"' ?></h1>
   <div class="wrapper">
    <div id="main">
      <div class="maincontent">
        <ul class="product">
        <?php
          while ($row = mysqli_fetch_array($result2)) {
          ?>
            <li>
                <a href="index.php?action=product&query=none&id=<?php echo $row['product_id']?>&category_id=<?php echo $row['category_id']?>">
                <img src="../../Database/Images/<?php echo $row['thumbnail'] ?> " alt="image" style="padding-bottom: 10px;">
                <p class="product_list"><b><?php echo $row['title'] ?></b> <br><?php echo $row['discount_price'] ?> đ<i class="fas fa-shopping-cart"></i></p>
                </a>
                <div class="cart">
        <form method="POST" action="index.php?action=cart&query=none" >
    <input type="hidden" name="product_id" value="<?php echo $row['product_id']?>">
    <input type="hidden" name="title" value="<?php echo $row['title'] ?>"> 
    <input type="hidden" name="price" value="<?php echo $row['price'] ?>"> 
    <input type="hidden" name="discount_price" value="<?php echo $row['discount_price'] ?>"> 
    <input type="hidden" name="thumbnail" value="<?php echo $row['thumbnail'] ?>"> 
    <input type="hidden" name="description" value="<?php echo $row['description'] ?>"> 
    <input type="hidden" name="quantity" value="1" min="1" >
    <input type="submit" name="add_to_cart" value="ADD TO CART" class="add-to-cart"> </input>  
       </div>
              </li> 
              
      
    <?php
    } 
  ?>
              
          </ul>
          
        </div>
        <div class="clear"></div>
    </div>
   </div>


</div>