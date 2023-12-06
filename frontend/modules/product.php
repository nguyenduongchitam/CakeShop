<!-- <?php
include("../../Database/Config/config.php");
if(isset($_GET['id'])){ 
$id=$_GET['id'];
$sql="select * from product where product_id=$id";
$result= mysqli_query($mysqli,$sql);
}
while ($row = mysqli_fetch_array($result)) {
?>
<div class="product">
    <form method="POST" action="index.php?action=cart&query=none">
    
<table>
<tr>
    <input type="hidden" name="product_id" value="<?php echo $row['product_id']?>">
    <td> Tên sp : <?php echo $row['title'] ?></td>
    <input type="hidden" name="title" value="<?php echo $row['title'] ?>"> 
</tr>
<tr>
    <td>Giá sp: <?php echo $row['price'] ?></td>
    <input type="hidden" name="price" value="<?php echo $row['price'] ?>"> 
</tr>
<tr>
    <td>Giá khuyến mãi sp: <?php echo $row['discount_price'] ?></td>
    <input type="hidden" name="discount_price" value="<?php echo $row['discount_price'] ?>"> 
</tr>
<tr>
    <td>Ảnh sản phẩm : <img src="../../../Database/images/<?php echo $row['thumbnail'] ?>" height="200" width="200" name="<?php echo $row['thumbnail'] ?>"></td>
    <input type="hidden" name="thumbnail" value="<?php echo $row['thumbnail'] ?>"> 
</tr>
<tr>
    <td>Mô tả : <?php echo $row['description'] ?></td>
    <input type="hidden" name="description" value="<?php echo $row['description'] ?>"> 
</tr>
<tr>
    <td><input type="number" name="quantity" value="1" min="1" ></td>
</tr>
<tr>
    <td><input type="submit" name="add_to_cart" value="Mua hàng"> </input></td>
</tr>
</table>
</form>
<?php
}?>
</div>
 -->
 <?php
include("../../Database/Config/config.php");
if(isset($_GET['id'])){ 
$id=$_GET['id'];
$sql="select * from product where product_id=$id";
$result= mysqli_query($mysqli,$sql);
}
?>
<div class="productbody">
    <?php while ($row = mysqli_fetch_array($result)) {
      ?>
    <section style="background: bisque;">
        <div class="card-wrapper">
            <div class="card">
                <div class="product-imgs">
                    <div class="img-display">
                        <div class="img-showcase">
                            <img src="../../../Database/images/<?php echo $row['thumbnail'] ?>">
                             <img src="../../../frontend/modules/images/2b.png">
                            <img src="../../../frontend/modules/images/2c.png">
                            <img src="../../../frontend/modules/images/2d.png"> 
                        </div>
                    </div>
                    <div class="img-select">
                        <div class="img-item">
                            <a href="#" data-id="1">
                              <!--   <img src="../../../Database/images/<?php echo $row['thumbnail'] ?>"> -->
                            </a>
                        </div>
                        <!-- <div class="img-item">
                            <a href="#" data-id="2">
                                <img src="../frontend/modules/images/2b.png">
                            </a>
                        </div>
                        <div class="img-item">
                            <a href="#" data-id="3">
                                <img src="../frontend/modules/images/2c.png">
                            </a>
                        </div>
                        <div class="img-item">
                            <a href="#" data-id="4">
                                <img src="../frontend/modules/images/2d.png">
                            </a>
                        </div> -->
                    </div>
                </div>
                <div class="product-content">
                    <h2 class="product-title"><?php echo $row['title'] ?></h2>

                    <div class="product-price">
                        <p class="last-price" style="color: #4d2600;">Giá Gốc: <span><?php echo $row['price'] ?></span></p>
                        <p class="new-price" style="color: #4d2600;">Giá Khuyến Mãi: <span><?php echo $row['discount_price'] ?></span></p>
                    </div>

                    <div class="product-detail">
                        <h2> Thông tin sản phẩm: </h2>
                        <p><?php echo $row['description'] ?></p>
                    </div>

                    <div class="purchase-info">
                        <input type="number" min="0" value="1">
                        <button type="button" class="btn">
                            Thêm vào giỏ <i class="bi bi-basket2 account bigger-icon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php }
    ?>
    <script src="../modules/js/"></script>
</div>