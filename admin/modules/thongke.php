<?php
include('config.php');
$timezone = new DateTimeZone('Asia/Ho_Chi_Minh'); 
$currentDate = new DateTime('now', $timezone); // Lấy thời điểm hiện tại ở thành phố HCM
$oneYearAgo = $currentDate->sub(new DateInterval('P1Y')); // Trừ đi 1 năm
$oneYearAgoString = $oneYearAgo->format('Y-m-d H:i:s'); // Chuyển đổi thành kiểu chuỗi
$now=new DateTime('now', $timezone);
$now=$now->format('Y-m-d H:i:s');
$sql="SELECT DATE(`order`.order_date) AS order_date, COUNT(`order`.order_id) AS count_orders, COUNT(order_detail.product_id) AS count_products, SUM(`order`.total_money) AS total_value
FROM `order`, order_detail
WHERE `order`.order_id = order_detail.order_id
AND `order`.order_date BETWEEN '$oneYearAgoString' AND '$now'
GROUP BY DATE(`order`.order_date)
ORDER BY DATE(`order`.order_date) ASC";
$sql_query=mysqli_query($mysqli,$sql);

while ($val = mysqli_fetch_array($sql_query))
{
$chart_data[] = array(
'date'=> $val['order_date'],
'order'=> $val['count_orders'],
'sales'=>$val['total_value'],
'quantity'=>$val['count_products']);
}
echo json_encode($chart_data);
?>
