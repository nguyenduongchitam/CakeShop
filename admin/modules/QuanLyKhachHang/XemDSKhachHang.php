<?php
include("config.php");
if(isset($_POST['search_key']))
{
 $searchkey=$_POST['search_key'];
$sql ="SELECT * FROM user where full_name like '%$searchkey%' or email like '%$searchkey%'";
}
else $sql = "SELECT * FROM user";

$result = mysqli_query($mysqli,$sql);
?>
  <div class="container" >
  <form style="float: right;" method="POST" action="">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Nhập email hoặc tên cần tìm" style="width: 300px;" name="search_key" id="typed_email" >
        <button class="btn btn-primary" type="submit" name="search">
            <i class="fas fa-search"></i> Tìm tài khoản
        </button>
    </div>
</form>
    <h1 class="text-center">Danh sách khách hàng</h1>
    <table class="table table-bordered table-striped mt-3">
      <thead>
        <tr>
          <th>Mã khách hàng</th>
          <th>Tên khách hàng</th>
          <th>Email</th>
          <th>Điện thoại</th>
          <th>Địa chỉ</th>

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
            <td><a href="?action=quanlykhachhang&query=select&user_id=<?php echo $row['user_id'] ?>"class="btn btn-primary">Xem</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>