<?php
include("config.php");
$product_id = $_GET ['product_id'];
$gallery_id= $_GET['gallery_id'];
$sql_select = "SELECT * FROM gallery WHERE gallery_id=$gallery_id";
$sql = mysqli_query($mysqli,$sql_select);
?>  
 <div class="container">
        <h2 class="text-center">Chỉnh sửa ảnh</h2>
        <table class="table table-bordered" align="center">
            <form method="POST" enctype="multipart/form-data">
                <?php while($row = mysqli_fetch_array($sql)){ ?>
                
                    <tr>
                        <td>Nhập link hình ảnh</td>
                        <td>
                        <img src="../../../Database/Images/<?php echo $row['thumbnail'] ?>"  style="width: 100px">
                        <br>
                        <input type="file" name="thumbnail" class="form-control" ></td>
                        <?php $thumbnailold=$row['thumbnail'] ?>
                    </tr>   
                    <tr>
                        <td><input type="submit" name="update" value="Sửa ảnh" class="btn btn-primary"></td>
                        <td><input type="submit" name="return" value="Hủy việc chỉnh sửa" class="btn btn-secondary"></td>
                    </tr>
                <?php } ?>
            </form>
        </table>
    </div>
<?php
if (isset($_POST['update']))
{
    
    if ($_FILES['thumbnail']['error'] == 0) {
        $thumbnail = $_FILES['thumbnail']['name'];
        $thumbnail_temp = $_FILES['thumbnail']['tmp_name'];
        move_uploaded_file($thumbnail_temp,'../../Database/Images/'.$thumbnail);
    } 
    else $thumbnail= $thumbnailold;
$sql_update = " UPDATE `gallery` SET `thumbnail`='$thumbnail' WHERE gallery_id=$gallery_id ";
mysqli_query($mysqli,$sql_update);
echo '<script>location.replace("../modules/index.php?action=quanlyanh&query=none&product_id='.$product_id.'");</script>';
}
else if (isset($_POST['return'])) echo '<script>location.replace("../modules/index.php?action=quanlyanh&query=none&product_id='.$product_id.'");</script>';
?> 

