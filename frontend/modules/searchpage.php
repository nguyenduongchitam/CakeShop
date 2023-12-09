<?php
    include("../../Database/Config/config.php");
    $sql1="select * from category";
$result1= mysqli_query($mysqli,$sql1);

  if(isset($_POST['searchkey'])) $searchkey=$_POST['searchkey'];

  $sql2="SELECT * FROM product where title like '%$searchkey%'" ;
  $result2 = mysqli_query($mysqli,$sql2);
?>

<h1>Kết quả tìm kiếm cho từ : <?php echo $searchkey ?></h1>

<div class="menubody">
   <div class="wrapper">
    <div id="main">
      <div class="maincontent">
        <ul class="product">
          <?php
          while ($row = mysqli_fetch_array($result2)) {
          ?>
            <li>
                <a href="index.php?action=product&query=none&id=<?php echo $row['product_id']?>&category_id=<?php echo $row['category_id']?>">
                <img src="../../Database/Images/<?php echo $row['thumbnail'] ?> " alt="image">
                <p class="product_list"><?php echo $row['title'] ?> </p>
                <P class="price"><?php echo $row['discount_price'] ?> đ<i class="fas fa-shopping-cart"></i></P>
                </a>
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