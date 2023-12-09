<?php
use Carbon\Carbon;
use Carbon\CarbonInterval;
include('config.php');
require('../carbon/autoload.php');

$subdays=Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
$now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString(); 
$sql="SELECT DATE(`order`.order_date) AS order_date, COUNT(`order`.order_id) AS count_orders, COUNT(order_detail.product_id) AS count_products, SUM(`order`.total_money) AS total_value
FROM `order`, order_detail
WHERE `order`.order_id = order_detail.order_id
AND `order`.order_date BETWEEN '$subdays' AND '$now'
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
