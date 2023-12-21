<?php
include("config.php");
$sql = "SELECT * FROM feedback";
$result = mysqli_query($mysqli,$sql);
?>
  <div class="container" >
    
    <h1 class="text-center">Danh sách phản hồi</h1>
    <table class="table table-bordered table-striped mt-3">
      <thead>
        <tr>
          <th>Mã phản hồi</th>
          <th>Tên khách hàng</th>
          <th>Email</th>
          <th>Điện thoại</th>
          <th>Bánh</th>
          <th>Ghi chú</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
          $i++;
        ?>
          <tr>
            <td><?php echo $row['feedback_id'] ?></td>
            <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['phone_number'] ?></td>
            <td><?php echo $row['subject_name'] ?></td>
            <td><?php echo $row['note'] ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>