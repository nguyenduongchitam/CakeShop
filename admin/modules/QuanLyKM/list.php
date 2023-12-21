<?php
include("config.php");
if(isset($_POST['search_key']))
{$searchkey=$_POST['search_key'];
  $sql="SELECT * FROM coupon where coupon_code like '%$searchkey%'" ;
}
else $sql="SELECT * FROM coupon";

$result = mysqli_query($mysqli,$sql);
?>
  <div class="container" >
  <form style="float: right;" method="POST" action="">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Nhập địa chỉ cần tìm" style="width: 300px;" name="search_key" id="typed_email" >
        <button class="btn btn-primary" type="submit" name="search">
            <i class="fas fa-search"></i> Tìm mã giảm giá
        </button>
    </div>
</form>
    <h1 class="text-center">Danh sách coupon</h1>
    <table class="table table-bordered table-striped mt-3">
      <thead>
        <tr>
          <th>Thứ tự</th>
          <th>Mã coupon</th>
          <th>Phần trăm khuyến mãi</th>
          <th>Giá trị đơn hàng tối thiểu</th>
          <th>Số lượng khả dụng</th>
          <th>Ngày phát hành</th>
          <th>Ngày hết hạn</th>
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
            <td><?php echo $row['coupon_code'] ?></td>
            <td><?php echo $row['total_discount'] ?>%</td>
            <td><?php echo $row['cart_min'] ?></td>
            <td><?php echo $row['quantity']?></td>
            <td><?php echo $row['start_date'] ?></td>
            <td><?php echo $row['end_date']?></td>
            <td><a onclick="return del('<?php echo $row['coupon_code'] ?>')" href="QuanLyKM/delete.php?query=delete&coupon_id=<?php echo $row['coupon_id'] ?>"class="btn btn-danger">Xóa</a></td>
            <td><a href="?action=quanlykhuyenmai&query=update&coupon_id=<?php echo $row['coupon_id'] ?>" class="btn btn-primary">Sửa</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <script>
    function del(name) {
      return confirm("Bạn có chắc chắn muốn xóa coupon: " + name + " không?");
    }
  </script>