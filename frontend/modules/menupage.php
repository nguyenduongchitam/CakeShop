<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <title>trang khách hàng</title>
    <link rel="stylesheet" href="../css/menupage.css">
  </head>
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

<body>
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
  
        <div class="clickk">
          <i class="bi bi-chevron-up"></i>
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
            <li <?php if($i == $page){echo 'style = "background: #ffcce6;"';} else{ echo '';} ?>><a href="index.php?action=menupage&query=none trang=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php
            }
            ?>
          </ul>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $(window).scroll(function(){
      if($(this).scrollTop()){
        $('.clickk').fadeIn();
      }else{
        $(".clickk").fadeOut();
      }
    });
    $(".clickk").click(function(){
      $('html,body').animate({scrollTop: 0}, 500);
    });
  });
</script>
</html>