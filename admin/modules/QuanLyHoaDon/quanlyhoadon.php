<?php
include("config.php");

$sql = "select * from user";
$result = mysqli_query($mysqli, $sql);

?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm hoá đơn</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <table class="table table-bordered">
        <form method="POST" action="../modules/QuanLyHoaDon/insert.php" enctype="multipart/form-data">
          <tr>
            <td>Nhập tên khách hàng</td>
            <td>
              <select name="name" class="form-control">
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                  <option value="<?php echo $row['user_id'] ?>" name="name"><?php echo $row['full_name'] ?></option>
                <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Nhập thành phố</td>
            <td><input type="text" name="city"></td>
          </tr>
          <tr>
            <td>Nhập quận</td>
            <td><input type="text" name="district"></td>
          </tr>
          <tr>
            <td>Nhập phường</td>
            <td><input type="text" name="ward"></td>
          </tr>
          <tr>
            <td>Nhập ghi chú</td>
            <td><textarea name="note" rows="10" cols="70"></textarea></td>
          </tr>
          <tr>
            <td>Nhập giá giao hàng</td>
            <td><input type="text" name="delivery_money"></td>
          </tr>
          <tr>
            <td>Nhập giảm giá</td>
            <td><input type="text" name="discount"></td>
          </tr>
          <tr>
            <td>Nhập trạng thái</td>
            <td><input type="text" name="status"></td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="submit" name="insert" value="Thêm hoá đơn" class="btn btn-primary">
            </td>
          </tr>
        </form>
      </table>
    </div>
  </div>
</div>