<?php
include("../../Database/Config/config.php");
if(isset($_GET['id'])){ 
$id=$_GET['id'];
$sql="select * from product where product_id=$id";
$result= mysqli_query($mysqli,$sql);
}
while ($row = mysqli_fetch_array($result)) {
  $categoryid=$row['category_id'];
?>

<script>
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  /*create magnifier glass:*/
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");
  /*insert magnifier glass:*/
  img.parentElement.insertBefore(glass, img);
  /*set background properties for the magnifier glass:*/
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  /*execute a function when someone moves the magnifier glass over the image:*/
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /*prevent the magnifier glass from being positioned outside the image:*/
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /*set the position of the magnifier glass:*/
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>

</div>
 <div class="productbody">
 <p style="color: #4d2600; padding-top: 60px;" ><a href="index.php?action=menupage&query=none" class="linkmenu">Menu</a> > <?php echo $row['title']?> </p>  
               <div class="card-wrapper"> 
               <div class="img-magnifier-container">
                <img id="myimage" src="../../Database/Images/<?php echo $row['thumbnail'] ?> "  width=380px; height=380px;> 
                </div>
                <div class="product-content" >
                    <h2 class="product-title"><?php echo $row['title']?></h2>
                    <div class="product-price">
                        <p class="last-price" style="color: #4d2600;">Giá Gốc: <span><?php echo $row['price']?></span></p>
                        <p class="new-price" style="color: #4d2600;">Giá Khuyến Mãi: <span><?php echo $row['discount_price']?></span></p>
                    </div>

                    <div class="product-detail">
                        <h2> Thông tin sản phẩm: </h2>
                        <p> <?php echo $row['description']?> </p>
                    </div>
                    <div class="purchase-info">
                 <form method="POST" action="index.php?action=cart&query=none">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']?>">
                    <input type="hidden" name="title" value="<?php echo $row['title'] ?>"> 
                    <input type="hidden" name="price" value="<?php echo $row['price'] ?>"> 
                    <input type="hidden" name="discount_price" value="<?php echo $row['discount_price'] ?>"> 
                    <input type="hidden" name="thumbnail" value="<?php echo $row['thumbnail'] ?>"> 
                     <input type="number"name="quantity" value="1" min="1"><br>
                    <input type="submit" name="add_to_cart" class="btn" value="THÊM VÀO GIỎ"><b> </b></input>
                  </form>
                    </div>
                </div>
  

    <?php } ?>
           <!--  </div> -->
        </div>

        <hr style="border: 1px dashed #B0A695; width: 50%; align-items:center; margin-left:auto; margin-right:auto;">
        
        <h1 class="title"> Sản Phẩm Liên Quan </h1>
         
        <div class="img-select">
             <?php 
        $sql2= 'SELECT  * from product,category where product.category_id=category.category_id and category.category_id= '.$categoryid.' ';
        $result= mysqli_query($mysqli,$sql2);
        while ($row = mysqli_fetch_array($result)) {
                ?>  
              <div class="col">
        <a class="namecake"  href="index.php?action=product&query=none&id=<?php echo $row['product_id']?>&category_id=<?php echo $row['category_id']?>">
        <div class="image-container">
        <img src="../../Database/Images/<?php echo $row['thumbnail'] ?> " alt="pic" width="250" height="250" style="margin-bottom:10px;">
        <i><?php echo $row['title'] ?> <br> <?php echo $row['discount_price'] ?> đ </i>
        <div>
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
        </div>
         </a>
        </div>
        
        </form>
              <?php } ?>
         </div> 
         </div>  

         <script  type="text/javascript"  src="https://code.jquery.com/jquery-1.11.0.min.js" ></script>
    <script   type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js" ></script>   
    <script src="../modules/js/product.js"></script>  

<script>
   magnify("myimage", 3);
</script>   
  </div> 