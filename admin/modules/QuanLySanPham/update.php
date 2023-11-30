<?php
include("config.php");
$product_id = $_GET ['product_id'];
$category_id=$_GET['category_id'];
$sql_select = "SELECT * FROM product,category WHERE product.category_id=category.category_id and product.product_id=$product_id limit 1";
$sql = mysqli_query($mysqli,$sql_select);

$sql_category="SELECT * FROM category";
$result=mysqli_query($mysqli,$sql_category);
?>  

 <div class="container">
        <h2 class="text-center">Chỉnh sửa sản phẩm</h2>
        <table class="table table-bordered" align="center">
            <form method="POST" enctype="multipart/form-data">
                <?php while($row = mysqli_fetch_array($sql)){ ?>
                    <tr>
                        <td>Nhập tiêu đề sản phẩm</td>
                        <td><input type="text" name="title" value="<?php echo $row['title'] ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Nhập loại sản phẩm</td>
                        <td> <select name="name" class="form-select" aria-label="Default select example"> 
                            <?php while($row_2= mysqli_fetch_array($result)) { ?> 
                    <option value="<?php echo $row_2['category_id'] ?>" name="name" <?php if ($row_2['category_id']==$category_id) echo "selected" ?> > <?php echo $row_2['name'] ?></option> 
                    <?php } ?>
                 </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Nhập link hình ảnh</td>
                        <td>
                        <img src="../../../Database/Images/<?php echo $row['thumbnail'] ?>"  style="width: 100px">
                        <br>
                        <input type="file" name="thumbnail" class="form-control" ></td>
                        <?php $thumbnailold=$row['thumbnail'] ?>
                    </tr>
                    <tr>
                        <td>Nhập giá sản phẩm</td>
                        <td><input type="text" name="price" value="<?php echo $row['price'] ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Nhập giá khuyến mãi</td>
                        <td><input type="text" name="discount_price" value="<?php echo $row['discount_price'] ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Nhập mô tả sản phẩm</td>
                        <td><input type="text" name="description" value="<?php echo $row['description'] ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="update" value="Sửa sản phẩm" class="btn btn-primary"></td>
                        <td><input type="submit" name="return" value="Hủy việc chỉnh sửa" class="btn btn-secondary"></td>
                    </tr>
                <?php } ?>
            </form>
        </table>
    </div>
<?php
if (isset($_POST['update']))
{
    $category_id= $_POST['name'];
    $title= $_POST['title'];
    $price= $_POST['price'];
    $discount_price= $_POST['discount_price'];
    
    if ($_FILES['thumbnail']['error'] === 0) {
        $thumbnail = $_FILES['thumbnail']['name'];
        $thumbnail_temp = $_FILES['thumbnail']['tmp_name'];
        move_uploaded_file($thumbnail_temp,'../../../Database/Images/'.$thumbnail);
    } 
    else $thumbnail= $thumbnailold;

    $description= $_POST['description'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $update_at = date("Y-m-d H:i:s");
$sql_update = " UPDATE `product` SET `category_id`='$category_id',`title`='$title',`price`='$price',`discount_price`='$discount_price',`thumbnail`='$thumbnail',`description`='$description' ,update_at='$update_at' WHERE product_id=$product_id ";
mysqli_query($mysqli,$sql_update);
echo '<script>location.replace("../modules/index.php?action=quanlysanpham&query=none");</script>';
}
else if (isset($_POST['return'])) echo '<script>location.replace("../modules/index.php?action=quanlysanpham&query=none");</script>';
?> 

