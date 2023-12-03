<?php
include("config.php");
$sql = "SELECT * FROM user";
$result = mysqli_query($mysqli,$sql);
?>
  <div class="container" >
    <h1 class="text-center">Danh sách khách hàng</h1>
    <table class="table table-bordered table-striped mt-3">
      <thead>
        <tr>
          <th>Mã khách hàng</th>
          <th>Tên khách hàng</th>
          <th>Email</th>
          <th>Điện thoại</th>
          <th>Địa chỉ</th>
          <th>Mật khẩu</th>
          <th>Lịch sử mua hàng</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
          $i++;
        ?>
          <tr>
            <td><?php echo $row['user_id'] ?></td>
            <td><?php echo $row['full_name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['phone_number'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><a href="?action=quanlykhachhang&query=select&user_id=<?php echo $row['user_id'] ?>"class="btn btn-primary">Xem</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>