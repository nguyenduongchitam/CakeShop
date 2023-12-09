<?php
include("../../../Database/Config/config.php");
$user_id = $_POST['name'];
$city = $_POST['city'];
$district = $_POST['district'];
$ward = $_POST['ward'];
$note = $_POST['note'];
$delivery_money = $_POST['delivery_money'];
$discount = $_POST['discount'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$order_date = date("Y-m-d H:i:s");
$status = $_POST['status'];

if (isset($_POST['insert'])) {
  $sql_add = "INSERT INTO `order`(`user_id`, `city`, `district`, `ward`, `note`, `delivery_money`,`discount`,`order_date`,`status`,`total_money`) VALUES (" . $user_id . ",'" . $city . "','" . $district . "','" . $ward . "','" . $note . "'," . $delivery_money . "," . $discount . ",'" . $order_date . "'," . $status . "," . 0 . ")";
  mysqli_query($mysqli, $sql_add);
  header('Location:../index.php?action=quanlyhoadon&query=none');
}
mysqli_close($mysqli);
