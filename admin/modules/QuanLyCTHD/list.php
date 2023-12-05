<?php
include("config.php");
$order_id = $_GET['order_id'];
$sql = "SELECT * FROM `order_detail` WHERE order_id=$order_id";
$result = mysqli_query($mysqli, $sql);
?>

<div class="container">
  <h1 class="text-center">Danh sách chi tiết hoá đơn</h1>
  <table class="table table-bordered table-striped mt-3">
    <thead>
      <tr>
        <th>Thứ tự</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($result)) {
        $i++;
        $temp = $row['product_id'];
        $sql1 = "SELECT * FROM `product` WHERE product_id=$temp";
        $result1 = mysqli_query($mysqli, $sql1);
        $row1 = mysqli_fetch_array($result1);
      ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row1['title'] ?></td>
          <td><?php echo $row1['price'] ?></td>
          <td><?php echo $row['num'] ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  <a href="?action=quanlyhoadon&query=none" class="btn btn-primary">Trở về</a>
</div>