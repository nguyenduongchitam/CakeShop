<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>trang khách hàng</title>
    <link rel="stylesheet" href="../css/search.css">
  </head>
  <?php

include("../../Database/Config/config.php");
$sql1="select * from category";
$result1= mysqli_query($mysqli,$sql1);

if(isset($_GET['search'])){ 
    $tukhoa = $_POST['tukhoa'];
}
$sql2="SELECT * FROM product ,category where product.category_id=category.category_id and product.title";
$result2 = mysqli_query($mysqli,$sql2);
?>

<body>
<h2><?php echo $_POST['tukhoa'] ?></h2>
<div class="menubody">
   <div class="wrapper">
    <div id="main">
        <div class="maincontent">
            <ul class="product">
            <?php
                    while ($row = mysqli_fetch_array($result2)) {
              ?>
            <li>
                <a class="namecake" href="index.php?action=product&query=none&id=<?php echo $row['product_id']?>&category_id=<?php echo $row['category_id']?>">
                <img src="../../Database/Images/<?php echo $row['thumbnail'] ?> " alt="image">
                <i class="product_list"><?php echo $row['title'] ?> </i><br>
                <i class="price"><?php echo $row['price'] ?> đ </i>
                </a>
              </li> 
    <?php
    } 
  ?>    
          </ul>
        </div>
      </div>
   </div>
</div>
</body>
</html>