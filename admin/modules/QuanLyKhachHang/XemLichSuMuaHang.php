<?php
include("config.php");
$customerId = $_GET['user_id'];
$sql = "SELECT p.title, p.price, od.num, o.order_date
            FROM `order` o
            INNER JOIN order_detail od ON o.order_id = od.order_id
            INNER JOIN product p ON od.product_id = p.product_id
            WHERE o.user_id = $customerId";
$result = $mysqli->query($sql);
?>
  <div class="container" >
    <h1 class="text-center">Danh sách lịch sử mua hàng của khách hàng</h1>
    <table class="table table-bordered table-striped mt-3">
      <thead>
        <tr>
          <th>Ngày mua hàng</th>
          <th>Tên sản phẩm</th>
          <th>Giá tiền</th>
          <th>Số lượng</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
          $i++;
        ?>
          <tr>
            <td><?php echo $row['order_date'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['num'] ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>