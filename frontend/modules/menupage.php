<?php
    include("../../Database/Config/config.php");
    $sql1="select * from category";
$result1= mysqli_query($mysqli,$sql1);
/* Kiem tra trang */
if(isset($_GET['page'])){
  $page=$_GET['page'];
  }
  else 
  {
    $page='';
  }
  if ($page ==''||$page=='1')
  {
    $begin=0;
  }
  else
  {
    $begin=($page*8)-8;
  }
  
if(isset($_GET['id'])){ 
  
  $id=$_GET['id'];
  $sql2="SELECT * FROM product ,category where product.category_id=category.category_id and category.category_id=$id LIMIT $begin,8" ;
  $result2 = mysqli_query($mysqli,$sql2);
 }
else 
{
  $sql2="SELECT * FROM product  LIMIT $begin,8 " ;
  $result2 = mysqli_query($mysqli,$sql2);
}
    ?>
<div class="menubody">
   <div class="wrapper">
   <h1 >MENU</h1>
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
        </form>
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
   <!-- đếm số trang có thể chia đc  -->
   <?php if(isset($_GET['id']))
  {
  $sql_trang= mysqli_query($mysqli,"SELECT * FROM product ,category where product.category_id=category.category_id and category.category_id=$id");
  $row_count = mysqli_num_rows($sql_trang);
  $trang =ceil($row_count/8);
  }
  else 
  {
    $sql_trang= mysqli_query($mysqli,"SELECT * FROM  product");
    $row_count = mysqli_num_rows($sql_trang);
    $trang =ceil($row_count/8);
  }
   ?> 
   <style>
    .pagination {
  display:flex;
  justify-content: center;
  margin-left: 250px;
  margin-right: auto;
  margin-bottom: 15px;
}

.page {
  padding: 8px 12px;
  margin: 0 4px;
  background-color: #FFE3BB;
  color: #663300;
  text-decoration: none;
  border-radius: 4px;
  
}

.page:hover {
  background-color: #FFE3BB;
  font-style: oblique;
}

.page.active {
  background-color:#FAEED1;
  
}
    </style>
    <!-- Thuc hien viec chia trang -->
   <div class="pagination">
  <?php 
    for ($i=1;$i<=$trang;$i++)
    {
    ?>
   <a href="index.php?action=menupage&query=none&<?php if(isset($_GET['id'])) echo 'id='.$id.'&' ?>page=<?php echo $i ?>" <?php if($i==$page) echo 'class="page"'; else echo 'class="page active"';?> ><?php echo $i ?></a>
    <?php
    }
    ?>
</div>


</div>