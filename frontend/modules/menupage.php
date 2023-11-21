<?php
    include("../../Database/Config/config.php");
    $sql1="select * from category";
$result1= mysqli_query($mysqli,$sql1);
if(isset($_GET['id'])){ 
  $id=$_GET['id'];
  $sql2="SELECT * FROM product ,category where product.category_id=category.category_id and category.category_id=$id " ;
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
        <div class="clear"></div>
    </div>
   </div>
</div>