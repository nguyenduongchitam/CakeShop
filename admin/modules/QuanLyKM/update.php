<?php
include("config.php");
$coupon_id = $_GET['coupon_id'];
$sql= " SELECT * from coupon where coupon_id=$coupon_id limit 1 ";
$result=mysqli_query($mysqli, $sql);
?> 
<div class="container">
        <h2 class="text-center">Chỉnh sửa thông tin coupon</h2>
        <table class="table table-bordered" align="center">
            <form method="POST" enctype="multipart/form-data">
<?php
while($row= mysqli_fetch_array($result))
{
?>
<tr>
        <td>Nhập coupon</td>
        <td><input type="text" name="coupon_code" value="<?php echo $row['coupon_code']?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Nhập % khuyến mãi</td>
        <td><input type="text" name="discount_percentage" value="<?php echo $row['total_discount'] ?>" class="form-control"></input> </td>
    </tr>
    <tr>
        <td>cart_min</td>
        <td><input type="text" name="cart_min" value="<?php echo $row['cart_min'] ?>" class="form-control"></input></td>
    </tr>
    <tr>
        <td>Ngày phát hành</td>
        <td><input type="date" name="start_date" value="<?php echo $row['start_date'] ?>" class="form-control"></input></td>
    </tr>
    <tr>
        <td>Ngày hết hạn</td>
        <td><input type="date" name="end_date" value="<?php echo $row['end_date'] ?>" class="form-control"></input></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="quantity" value="<?php echo $row['quantity'] ?>" class="form-control"></input></td>
    </tr>
    <tr>
                        <td><input type="submit" name="update" value="Lưu" class="btn btn-primary"></td>
                        <td><input type="submit" name="return" value="Hủy việc chỉnh sửa" class="btn btn-secondary"></td>
                    </tr>
                <?php }  ?>
            </form>
        </table>
    </div>
<?php

if (isset($_POST['update']))
{
    $coupon_code= $_POST['coupon_code'];
    $discount_percentage=$_POST['discount_percentage'];
    $cart_min=$_POST['cart_min'];
    $start_date=$_POST['start_date'];
    $end_date=$_POST['end_date'];
    $quantity=$_POST['quantity'];    
    $sql_update = "UPDATE `coupon` SET `coupon_code`='$coupon_code', `total_discount`='$discount_percentage', `cart_min`='$cart_min', `start_date`='$start_date', end_date='$end_date', `quantity`='$quantity' WHERE coupon_id=$coupon_id";
mysqli_query($mysqli,$sql_update);
echo '<script>location.replace("../modules/index.php?action=quanlykhuyenmai&query=none");</script>';
}
else if (isset($_POST['return'])) echo '<script>location.replace("../modules/index.php?action=quanlykhuyenmai&query=none");</script>';
?>

