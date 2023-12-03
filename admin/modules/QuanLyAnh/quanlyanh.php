<?php
include("config.php");
$product_id=$_GET['product_id'];
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm ảnh</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
<table class="table table-bordered">
  <form method="POST" action="../modules/QuanLyAnh/insert.php" enctype="multipart/form-data">

    <tr>
    <input type="text" hidden name="product_id" value="<?php echo $product_id?>" >
      <td>Nhập link hình ảnh</td>
      <td><input type="file" name="thumbnail" require></td>
    </tr>
      <tr>
      <td colspan="2">
        <input type="submit" name="insert" value="Thêm ảnh" class="btn btn-primary">
      </td>
    </tr>
  </form>
</table>
    </div>
</div>
</div>
