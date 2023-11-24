<?php

    include("../../Database/Config/config.php");
    $sql1="select * from category";
$result1= mysqli_query($mysqli,$sql1);

if(isset($_GET['trang'])){
  $page = $_GET['trang'];
}
else{
  $page = '';
}
if($page == '' || $page = 1){
  $begin = 0;
}
else{
  $begin = ($page*8)-8;
}

if(isset($_GET['id'])){ 
  $id=$_GET['id'];
  $sql2="SELECT * FROM product ,category where product.category_id=category.category_id and category.category_id=$id ORDER BY product.category_id DESC LIMIT $begin,8"  ;
  $result2 = mysqli_query($mysqli,$sql2);
 }
else 
{
  $sql2="SELECT * FROM product ,category where product.category_id=category.category_id " ;
  $result2 = mysqli_query($mysqli,$sql2);
}

    ?>
<div class="menubody">
   <div class="wrapper">
    <div id="main">
        <div class="chose">
          <p class="menu">DANH MỤC MENU</p>
            <ul class="danhmuc">
              <ul class="underline-list">
              <?php
                         while ($row = mysqli_fetch_array($result1)) {
                       ?>
                        <li><a href="index.php?action=menupage&query=none&id=<?php echo $row['category_id'] ?>"><?php echo $row['name'] ?></a></li>
                        <br>
                        <?php
                         }
                   ?> 
              </ul>
            </ul>
        </div>
        <div class="maincontent">
            <ul class="product">
            <?php
                    while ($row = mysqli_fetch_array($result2)) {
              ?>
            <li>
<<<<<<< HEAD
                <a class="namecake" href="index.php?action=product&query=none&id=<?php echo $row['product_id']?>&category_id=<?php echo $row['category_id']?>">
                <img src="../../Database/Images/<?php echo $row['thumbnail'] ?> " alt="image">
                <i class="product_list"><?php echo $row['title'] ?> </i><br>
                <i class="price"><?php echo $row['price'] ?> đ </i>
=======
                <a href="index.php?action=product&query=none&id=<?php echo $row['product_id']?>&category_id=<?php echo $row['category_id']?>">
                <img src="../../../Database/images/<?php echo $row['thumbnail'] ?> " alt="image">
                <p class="product_list"><?php echo $row['title'] ?> </p>
                <P class="price"><?php echo $row['discount_price'] ?> <i class="fas fa-underline"></i> <i class="fas fa-shopping-cart"></i></P>
>>>>>>> 65bbb58e0fc54296b89dbfff9bab4b74570a5805
                </a>
              </li> 
    <?php
    } 
  ?>
              
          </ul>
        </div>

      </div>
      

   </div>
   <div style="clear:both;"></div>
   <?php
   $sql_trang = mysqli_query($mysqli, "SELECT * FROM product");
   $count = mysqli_num_rows($sql_trang);
   $trang = ceil($count/8);
   ?>
          <ul class="list">
            <?php
            for($i=1;$i<=$trang;$i++){
            ?>
            <li <?php if($i == $page){echo 'style = "background: #ffcce6;"';} else{ echo '';} ?>><a href="index.php?action=menupage&query=product trang=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php
            }
            ?>
          </ul>
</div>