<?php
include("../../Database/Config/config.php");
if(isset($_GET['id'])){ 
$id=$_GET['id'];
$sql="select * from product where product_id=$id";
$result= mysqli_query($mysqli,$sql);
}
while ($row = mysqli_fetch_array($result)) {
?>
<div class="product">
    <form method="POST" action="cart.php">
    
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