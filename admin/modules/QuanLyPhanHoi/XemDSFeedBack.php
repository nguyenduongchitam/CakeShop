<?php
include("config.php");
$sql = "SELECT * FROM `feedback`";
$result= mysqli_query($mysqli,$sql);
if ($result->num_rows > 0) {
    echo "Danh sách phản hồi:<br>";
    while ($row = $result->fetch_assoc()) {
        echo 'Mã phản hồi: ' . $row['feedback_id'] . '<br>';
        echo 'Tên khách hàng: ' . $row['firstname'] . ' ' . $row['lastname'] . '<br>';
        echo 'Email: ' . $row['email'] . '<br>';
        echo 'Số điện thoại: ' . $row['phone_number'] . '<br>';
        echo 'Ghi chú: ' . $row['note'] . '<br>';
        echo "------------------------<br>";
    }
} else {
    echo "Không có phản hồi nào từ khách hàng.";
}
?>