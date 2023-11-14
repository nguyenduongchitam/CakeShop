<?php
include("../testconnect.php");

$sql = "SELECT user_id, full_name FROM user";
$result = $con->query($sql);

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

    // Truy vấn lịch sử mua hàng của khách hàng
    $sql = "SELECT p.title, p.price, od.num, o.order_date
            FROM `order` o
            INNER JOIN order_detail od ON o.order_id = od.order_id
            INNER JOIN product p ON od.product_id = p.product_id
            WHERE o.user_id = $customerId";
    $result = $con->query($sql);

    // Kiểm tra và hiển thị lịch sử mua hàng
    if ($result->num_rows > 0) {
        echo "<br>Lịch sử mua hàng của khách hàng:<br>";
        while ($row = $result->fetch_assoc()) {
            echo "Ngay mua hang: " . $row['order_date'] . "<br>";
            echo "Tên sản phẩm: " . $row['title'] . "<br>";
            echo "Giá tiền: " . $row['price'] . "<br>";
            echo "Số lượng: " . $row['num'] . "<br>";
            echo "------------------------<br>";
        }
    } else {
        echo "Khách hàng không có lịch sử mua hàng.";
    }
}
$con->close();
?>