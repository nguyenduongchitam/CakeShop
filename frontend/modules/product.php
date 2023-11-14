<?php
include("../../Database/Config/config.php");
if(isset($_GET['id'])){ 
$id=$_GET['id'];
$sql="select * from product where product_id=$id ";
$result= mysqli_query($mysqli,$sql);
}
while ($row = mysqli_fetch_array($result)) {
?>
<div class="product">
    <form method="POST" action="">
<table>
<tr>
    <td> Tên sp : <?php echo $row['title'] ?></td>
</tr>
<tr>
    <td>Giá sp: <?php echo $row['price'] ?></td>
</tr>
<tr>
    <td>Ảnh sản phẩm : <img src="../../../Database/images/<?php echo $row['thumbnail'] ?>" height="200" width="200" name="<?php echo $row['thumbnail'] ?>"></td>
</tr>
<tr>
    <td>Mô tả : <?php echo $row['description'] ?></td>
</tr>
<tr>
    <td><input type="number" value="1" min="0"></td>
</tr>


<tr>
    <td><input type="button" name="add_to_cart" value="Mua hàng"> </input></td>
</tr>
</table>
</form>
<?php
}
?>
</div>