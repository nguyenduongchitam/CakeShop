<?php
include("config.php");
$sql="select * from category";
$result= mysqli_query($mysqli,$sql);

?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm sản phẩm</button> 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
<table class="table table-bordered">
  <form method="POST" action="../modules/QuanLySanPham/insert.php" enctype="multipart/form-data">
    <tr>
      <td>Nhập tiêu đề sản phẩm</td>
      <td><input type="text" name="title"></td>
    </tr>
    <tr>
      <td>Nhập loại sản phẩm</td>
      <td>
        <select name="name" class="form-control">
          <?php while($row= mysqli_fetch_array($result)) { ?>
            <option value="<?php echo $row['category_id'] ?>" name="name"><?php echo $row['name'] ?></option>
          <?php } ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Nhập link hình ảnh</td>
      <td><input type="file" name="thumbnail" require></td>
    </tr>
    <tr>
      <td>Nhập giá sản phẩm</td>
      <td><input type="text" name="price"></td>
    </tr>
    <tr>
      <td>Nhập giá khuyến mãi</td>
      <td><input type="text" name="discount_price"></td>
    </tr>
      <tr>
        <td>Nhập mô tả sản phẩm</td>
        <td><textarea name="description" rows="10" cols="70"></textarea></td>
      </tr>
      <tr>
      <td colspan="2">
        <input type="submit" name="insert" value="Thêm sản phẩm" class="btn btn-primary">
      </td>
    </tr>
  </form>
</table>
    </div>
</div>
</div>
