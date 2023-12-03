<?php
include("config.php");
$sql="SELECT * FROM product ,gallery where product.product_id=gallery.product_id";
$result = mysqli_query($mysqli,$sql);
?>

  <div class="container" >
    <h1 class="text-center">Danh sách ảnh</h1>
    <table class="table table-bordered table-striped mt-3">
      <thead>
        <tr>
          <th>Thứ tự</th>
          <th>Ảnh sản phẩm</th>
          <th>Xóa</th>
          <th>Sửa</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
          $i++;
        ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><img style="width: 100px" src="../../Database/Images/<?php echo $row['thumbnail'] ?> " alt=""></td>
            <td><a onclick="return del('<?php echo $row['thumbnail'] ?>')" href="QuanLyAnh/delete.php?query=delete&product_id=<?php echo $row['product_id'] ?>&gallery_id=<?php echo $row['gallery_id'] ?>"class="btn btn-danger">Xóa</a></td>
            <td><a href="?action=quanlyanh&query=update&product_id=<?php echo $row['product_id'] ?>&gallery_id=<?php echo $row['gallery_id'] ?>"class="btn btn-primary">Sửa</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <script>
    function del(thumbnail) {
      return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + thumbnail + " không?");
    }
  </script>