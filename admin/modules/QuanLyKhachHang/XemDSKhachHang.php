<?php
include("config.php");

$sql = "SELECT user_id, full_name FROM user";
$result= mysqli_query($mysqli,$sql);
if ($result->num_rows > 0) {
    echo "Danh sách khách hàng:<br>";
    while ($row = $result->fetch_assoc()) {
        echo '<a href="?user_id=' . $row['user_id'] . '">' . $row['full_name'] . '</a><br>';
    }
} else {
    echo "Không có khách hàng.";
}

if (isset($_GET['user_id'])) {
    $customerId = $_GET['user_id'];

    $sql = "SELECT * FROM user WHERE user_id = $customerId";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
        echo "Thông tin chi tiết khách hàng:<br>";
        echo "ID: " . $customer['user_id'] . "<br>";
        echo "Tên: " . $customer['full_name'] . "<br>";
        echo "Email: " . $customer['email'] . "<br>";
        echo "Điện thoại: " . $customer['phone_number'] . "<br>";
        echo "Dia chi: " . $customer['address'] . "<br>";
        echo "Mat khau: " . $customer['password'] . "<br>";
    } else {
        echo "Khách hàng không tồn tại.";
    }
}

?>