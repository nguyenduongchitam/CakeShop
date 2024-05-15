<?php
include("config.php");
if (isset($_POST['search_key']))
{
  $searchkey=$_POST['search_key'];
$sql = "SELECT * FROM `order` where city like '%$searchkey%' or district like '%$searchkey%' or ward like '%$searchkey%' or `address` like '%$searchkey%'";
}
else $sql = "SELECT * FROM `order`";
$sql1 = "SELECT full_name FROM user u, `order` o  WHERE u.user_id=o.user_id ";
$result = mysqli_query($mysqli, $sql);
$result1 = mysqli_query($mysqli, $sql1);
?>

<div class="container">
<form style="float: right;" method="POST" action="">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Nhập địa chỉ cần tìm" style="width: 300px;" name="search_key" id="typed_email" >
        <button class="btn btn-primary" type="submit" name="search">
            <i class="fas fa-search"></i> Tìm 
        </button>
    </div>
</form>
  <h1 class="text-center">Danh sách hoá đơn</h1>
  <table class="table table-bordered table-striped mt-3">
    <thead>
      <tr>
        <th>Thứ tự</th>
        <th>Tên khách hàng</th>
        <th>Thành phố</th>
        <th>Quận</th>
        <th>Phường</th>
        <th>Ghi chú</th>
        <th>Giá giao hàng</th>
        <th>Giảm giá</th>
        <th>Ngày</th>
        <th>Trạng thái</th>
        <th>Tổng tiền</th>
        <th>Xoá</th>
        <th>Sửa</th>
        <th>CTHD</th>
        <th>In HĐ</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($result)) {
        $i++;
        $row1 = mysqli_fetch_array($result1)
      ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row1['full_name'] ?></td>
          <td><?php echo $row['city'] ?></td>
          <td><?php echo $row['district'] ?></td>
          <td><?php echo $row['ward'] ?></td>
          <td><?php echo $row['note'] ?></td>
          <td><?php echo $row['delivery_money'] ?></td>
          <td><?php echo $row['coupon_id'] ?></td>
          <td><?php echo $row['order_date'] ?></td>
          <td><?php echo $row['status'] ?></td>
          <td>
            <?php
            $temp = $row['order_id'];
            $sql2 = "SELECT SUM(price*quantity)  as total FROM `order` o, `order_detail` od WHERE o.order_id=od.order_id AND o.order_id=$temp";
            $result2 = mysqli_query($mysqli, $sql2);
            $row2 = mysqli_fetch_array($result2);
            $temp1 = $row2['total'];
            echo $temp1;
            ?>
          </td>
          <td><a onclick="return del('<?php echo $i ?>')" href="QuanLyHoaDon/delete.php?query=delete&order_id=<?php echo $row['order_id'] ?>" class="btn btn-danger">Xóa</a></td>
          <td><a href="?action=quanlyhoadon&query=update&order_id=<?php echo $row['order_id'] ?>&user_id=<?php echo $row['user_id'] ?>" class="btn btn-primary">Sửa</a></td>
          <td><a href="?action=quanlyCTHD&query=none&order_id=<?php echo $row['order_id'] ?>" class="btn btn-primary">View</a></td>
          <td><a href="QuanLyHoaDon/indonhang.php?order_id=<?php echo $row['order_id'] ?>" class="btn btn-primary">In</a></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>
<script>
  function del(name) {
    return confirm("Bạn có chắc chắn muốn xóa hoá đơn thứ tự " + name + " không?");
  }
</script>