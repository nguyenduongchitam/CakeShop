<?php
    include("../../Database/Config/config.php");
    $sql1="select * from product where category_id=1";
    $result1= mysqli_query($mysqli,$sql1);
    $sql2="select * from product where category_id=2";
    $result2= mysqli_query($mysqli,$sql2);
    ?>
<div class="homebody">
  <div class = "homepagepic">
<img src="../modules/images/headerhomepage1.png" alt="Homepic" width="100%" height="250">
<img src="../modules/images/headerhomepage2.png" alt="Homepic" width="100%" height="250">
<img src="../modules/images/headerhomepage3.png" alt="Homepic" width="100%" height="250">
  </div>
<script
  type="text/javascript"
  src="https://code.jquery.com/jquery-1.11.0.min.js"
></script>
<script
  type="text/javascript"
  src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
></script>
<script
  type="text/javascript"
  src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
></script>
<script src="../modules/js/roll.js"></script>

<div class="main">
    <h1 class="mainname">Bánh ngọt <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></h1>
</div>
<div class="item1">
   <?php
      while ($row = mysqli_fetch_array($result1)) {
      ?>
      <div class="col">
        <a href="index.php?action=product&query=none&id=<?php echo $row['product_id']?>&category_id=<?php echo $row['category_id']?>">
        <img src="../../../Database/images/<?php echo $row['thumbnail'] ?> " alt="pic" width="250" height="250" style="margin-bottom:10px">
          <i><?php echo $row['title'] ?> <br> <?php echo $row['price'] ?> </i>
         </a>
        </div>
          <?php
         }
        ?> 
</div>
<script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script src="../modules/js/roll.js"></script>
<hr border="2">

<div class="main">
    <h1 class="mainname">Best-seller <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></h1>
</div>

<div class="item1" style = "padding-bottom: 40px">
     <?php
      while ($row = mysqli_fetch_array($result2)) {
      ?>
      <div class="col">
        <a href="index.php?action=product&query=none&id=<?php echo $row['product_id']?>&category_id=<?php echo $row['category_id']?>">
        <img src="../../../Database/images/<?php echo $row['thumbnail'] ?> " alt="pic" width="250" height="250" style="margin-bottom:10px">
          <i><?php echo $row['title'] ?> <br> <?php echo $row['price'] ?> </i>
         </a>
        </div>
          <?php
         }
        ?> 
</div>
<script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script src="../modules/js/roll.js"></script>
<table>
    <tr>
        <td class="border"></td>
        <td class="text">
          <h1 class="intext">About us</h1>
          <i style="font-size: 120%"> Mỗi chiếc bánh là một câu chuyện riêng<br>với hơi thở và tinh thần chẳng thể<br>lẫn vào đâu được.</i>
        </td>
        <td class="image">
           <img src="../modules/images/aboutus.png" alt="pic" width="520" height="300">
        </td>
    </tr>
  
</table>
</div>