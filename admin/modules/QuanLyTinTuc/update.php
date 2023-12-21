<?php
include("config.php");
$tintuc_id = $_GET['tintuc_id'];
$sql_select = "SELECT * FROM news WHERE news_id=$tintuc_id";
$sql = mysqli_query($mysqli, $sql_select);
?>
<div class="container">
    <h2 class="text-center">Chỉnh sửa tin tức</h2>
    <table class="table table-bordered" align="center">
        <form method="POST" enctype="multipart/form-data">
            <?php while ($row = mysqli_fetch_array($sql)) { ?>
                <tr>
                    <td>Nhập tiêu đề tin tức</td>
                    <td><input type="text" name="title" value="<?php echo $row['title'] ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>Nhập nội dung</td>
                    <td><textarea name="content"><?php echo $row['content'] ?></textarea></td>
                </tr>
                <tr>
                    <td>Nhập link hình ảnh</td>
                    <td>
                        <img src="../../Database/Images/<?php echo $row['thumbnail'] ?>" height="100px" width="100px">
                        <br>
                        <input type="file" name="anh" require class="form-control">
                    </td>
                    <?php $anhold = $row['thumbnail'] ?>
                </tr>
                <tr>
                    <td><input type="submit" name="update" value="Sửa tin tức" class="btn btn-primary"></td>
                    <td><input type="submit" name="return" value="Hủy việc chỉnh sửa" class="btn btn-secondary"></td>
                </tr>
            <?php } ?>
        </form>
    </table>
</div>
<?php
if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if ($_FILES['anh']['error'] === 0) {
        $anh = $_FILES['anh']['name'];
        $anh_temp = $_FILES['anh']['tmp_name'];
        move_uploaded_file($anh_temp, '../../Database/Images/' . $anh);
    } else $anh = $anhold;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $publish_date = date("Y-m-d H:i:s");
    $sql_update = " UPDATE `news` SET `title`='$title',`content`='$content',`thumbnail`='$anh',`publish_date`='$publish_date' WHERE news_id=$tintuc_id ";
    mysqli_query($mysqli, $sql_update);
    echo '<script>location.replace("../modules/index.php?action=quanlytintuc&query=none");</script>';
} else if (isset($_POST['return'])) echo '<script>location.replace("../modules/index.php?action=quanlytintuc&query=none");</script>';
?>