<?php
include("config.php");
$sql="SELECT * FROM product ,category where product.category_id=category.category_id";
$result = mysqli_query($mysqli,$sql);
?>

  <div class="container" >
    <h1 class="text-center">Danh sách sản phẩm</h1>
    <table class="table table-bordered table-striped mt-3">
      <thead>
        <tr>
          <th>Thứ tự</th>
          <th>Tên sản phẩm </th>
          <th>Loại sản phẩm </th>
          <th>Ảnh sản phẩm</th>
          <th>Giá sản phẩm</th>
          <th>Giá khuyến mãi</th>
          <th>Mô tả sản phẩm</th>
          <th>Ngày tạo </th>
          <th>Ngày cập nhật gần nhất </th>
          <th>Xóa</th>
          <th>Sửa</th>
          <td>Thêm ảnh</td>
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
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><img style="width: 100px" src="../../Database/Images/<?php echo $row['thumbnail'] ?> " alt=""></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['discount_price'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td><?php echo $row['created_at'] ?></td>
            <td><?php echo $row['update_at'] ?></td>
            <td><a onclick="return del('<?php echo $row['title'] ?>')" href="QuanLySanPham/delete.php?query=delete&product_id=<?php echo $row['product_id'] ?>"class="btn btn-danger">Xóa</a></td>
            <td><a href="?action=quanlysanpham&query=update&product_id=<?php echo $row['product_id'] ?>&category_id=<?php echo $row['category_id'] ?>"class="btn btn-primary">Sửa</a></td>
            <td><a href="?action=quanlyanh&query=none&product_id=<?php echo $row['product_id'] ?>"class="btn btn-primary">View</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <script>
    function del(name) {
      return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + " không?");
    }
  </script>