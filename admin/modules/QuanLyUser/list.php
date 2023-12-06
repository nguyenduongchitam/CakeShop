<?php
include("config.php");
$sql="SELECT user.*, role.name
FROM user
INNER JOIN role ON user.role_id = role.role_id";
$result = mysqli_query($mysqli,$sql);
?>
  <div class="container" >
    <h1 class="text-center">Danh sách tài khoản</h1>
    <table class="table table-bordered table-striped mt-3">
      <thead>
        <tr>
          <th>Thứ tự</th>
          <th>Họ tên</th>
          <th>Email</th>
          <th>Số điện thoại</th>
          <th>Địa chỉ</th>
          <th>Quyền</th>
          <th>Ngày tạo </th>
          <th>Ngày cập nhật gần nhất </th>
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
            <td><?php echo $row['full_name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['phone_number'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php 
                    echo $row['name']
              ?>
            </td>
            <td><?php echo $row['create_at'] ?></td>
            <td><?php echo $row['update_at'] ?></td>
            <td><a onclick="return del('<?php echo $row['full_name'] ?>')" href="QuanLyUser/delete.php?query=delete&user_id=<?php echo $row['user_id'] ?>"class="btn btn-danger">Xóa</a></td>
            <td><a href="?action=quanlytaikhoan&query=update&user_id=<?php echo $row['user_id'] ?>&role_id=<?php echo $row['role_id']?>"class="btn btn-primary">Sửa</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <script>
    function del(name) {
      return confirm("Bạn có chắc chắn muốn xóa tài khoản: " + name + " không?");
    }
  </script>