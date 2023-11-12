<?php
    include("/xampp/htdocs/CakeShop/Database/Config/config.php");
    $sql="select * from category";
$resut= mysqli_query($mysqli,$sql);
    ?>
<div class="menubody">
   <div class="wrapper">
   <h1>MENU</h1>
    <div id="main">
        <div class="chose">
          <p class="menu">DANH MỤC MENU</p>
            <ul class="danhmuc">
              <ul class="underline-list">
              <?php
                         while ($row = mysqli_fetch_array($resut)) {
                       ?>
                        <li><a href="#"><?php echo $row['name'] ?></a></li>
                        <br>
                        <?php
                         }
                   ?> 
                   
              </ul>
            </ul>
        </div>
        <div class="maincontent">
          <ul class="product">
            <li>
              <a href="">
              <img src="/frontend/modules/images/3D bear cake.webp" alt="image">
              <p class="product_list">3D BEAR CAKE</p>
              <P class="price">300,000<i class="fas fa-underline"></i> <i class="fas fa-shopping-cart"></i></P>
              </a>
            </li>
            <li>
              <a href="">
              <img src="/frontend/modules/images/BLACKFORESTOPERA01.jpg" alt="image">
              <p class="product_list">BALCK FOREST OPERA CAKE</p>
              <P class="price">320,000<i class="fas fa-underline"></i> <i class="fas fa-shopping-cart"></i></P>
              </a>
            </li>
            <li>
              <a href="">
              <img src="/frontend/modules/images/CHEESEBRULLECHIFFON01.jpg" alt="image">
              <p class="product_list">CHEESE BRULLE CHIFFON CAKE</p>
              <P class="price">300,000<i class="fas fa-underline"></i> <i class="fas fa-shopping-cart"></i></P>
              </a>
            </li>
            <li>
              <a href="">
              <img src="/frontend/modules/images/OPLA03.jpg" alt="image">
              <p class="product_list">OPLA CAKE</p>
              <P class="price">250,000<i class="fas fa-underline"></i> <i class="fas fa-shopping-cart"></i></P>
              </a>
            </li>
            <li>
              <a href="">
              <img src="/frontend/modules/images/PINEAPPLECOCONUTCHIFFON01.jpg" alt="image">
              <p class="product_list">PINEAPPLE COCONUT CHIFFON CAKE</p>
              <P class="price">380,000<i class="fas fa-underline"></i> <i class="fas fa-shopping-cart"></i></P>
              </a>
            </li>
            <li>
              <a href="">
              <img src="/frontend/modules/images/RASPBERRYTIRA01.jpg" alt="image">
              <p class="product_list">RASPBERRY TIRA CAKE</p>
              <P class="price">350,000<i class="fas fa-underline"></i> <i class="fas fa-shopping-cart"></i></P>
              </a>
            </li>
            <li>
              <a href="">
              <img src="/frontend/modules/images/RASPCHIFFON01.jpg" alt="image">
              <p class="product_list">RASP CHIFFON CAKE</p>
              <P class="price">400,000<i class="fas fa-underline"></i> <i class="fas fa-shopping-cart"></i></P>
              </a>
            </li>
            <li>
              <a href="">
              <img src="/frontend/modules/images/Strawbery cake.jpg" alt="image">
              <p class="product_list">STRAWBERRY CAKE</p>
              <P class="price">350,000<i class="fas fa-underline"></i> <i class="fas fa-shopping-cart"></i></P>
              </a>
            </li>
        </ul>
        </div>
        <div class="clear"></div>
    </div>
   </div>
</div>