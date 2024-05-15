<?php
require("../../../tfpdf/tfpdf.php");
require("../config.php");
$pdf = new tFPDF();
$pdf->AddPage("0");

$pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
$pdf->SetFont('DejaVu', '', 14);

$pdf->SetFillColor(193, 229, 252);

$order_id = $_GET['order_id'];

$pdf->Write(10, 'Thông tin: ');
$pdf->Ln(10);

$sql0 = "SELECT * FROM `order` WHERE order_id=$order_id";
$result0 = mysqli_query($mysqli, $sql0);

$width_cell0 = array(50, 50, 50, 50, 20, 30, 30, 30);

$pdf->Cell($width_cell0[0], 10, 'Họ tên', 1, 0, 'C', true);
$pdf->Cell($width_cell0[1], 10, 'Thành phố', 1, 0, 'C', true);
$pdf->Cell($width_cell0[2], 10, 'Quận', 1, 0, 'C', true);
$pdf->Cell($width_cell0[3], 10, 'Huyện', 1, 0, 'C', true);
$pdf->Cell($width_cell0[4], 10, 'Địa chỉ', 1, 0, 'C', true);
$pdf->Cell($width_cell0[5], 10, 'Giảm giá', 1, 0, 'C', true);
$pdf->Cell($width_cell0[6], 10, 'Tổng tiền', 1, 1, 'C', true);
$pdf->SetFillColor(235, 236, 236);
$fill = false;

$row0 = mysqli_fetch_array($result0);

$tempa = $row0['user_id'];
$sqla = "SELECT * FROM `user` WHERE user_id=$tempa";
$resulta = mysqli_query($mysqli, $sqla);
$rowa = mysqli_fetch_array($resulta);
$pdf->Cell($width_cell0[0], 10, $rowa['full_name'], 1, 0, 'C', $fill);

$pdf->Cell($width_cell0[1], 10, $row0['city'], 1, 0, 'C', $fill);
$pdf->Cell($width_cell0[2], 10, $row0['district'], 1, 0, 'C', $fill);
$pdf->Cell($width_cell0[3], 10, $row0['ward'], 1, 0, 'C', $fill);
$pdf->Cell($width_cell0[4], 10, $row0['address'], 1, 0, 'C', $fill);

$order_id = $row0['order_id'];
$sqlb = "SELECT SUM(price*quantity) as total FROM `order` o, `order_detail` od WHERE o.order_id=od.order_id AND o.order_id=$order_id";
$resultb = mysqli_query($mysqli, $sqlb);
$rowb = mysqli_fetch_array($resultb);
$tempb = $rowb['total'];

$coupon_code = $row0['coupon_id'];
$sqlc = "SELECT * FROM `coupon` WHERE coupon_id=$coupon_code";
$resultc = mysqli_query($mysqli, $sqlc);
$rowc = mysqli_fetch_array($resultc);
 $tempc = $rowc['total_discount'] . '%';
 $pdf->Cell($width_cell0[5], 10, $tempc, 1, 0, 'C', $fill);
 $pdf->Cell($width_cell0[6], 10, number_format($tempb * (100 - $tempc) / 100), 1, 0, 'C', $fill);   

$pdf->Ln(10);

$sql = "SELECT * FROM `order_detail` WHERE order_id=$order_id";
$result = mysqli_query($mysqli, $sql);

$pdf->Write(10, 'Đơn hàng của bạn gồm có: ');
$pdf->Ln(10);

$width_cell = array(40, 30, 30, 30);

$pdf->Cell($width_cell[0], 10, 'Tên sản phẩm', 1, 0, 'C', true);
$pdf->Cell($width_cell[1], 10, 'Giá', 1, 0, 'C', true);
$pdf->Cell($width_cell[2], 10, 'Số lượng', 1, 0, 'C', true);
$pdf->Cell($width_cell[3], 10, 'Tổng tiền', 1, 1, 'C', true);
$pdf->SetFillColor(235, 236, 236);
$fill = false;
while ($row = mysqli_fetch_array($result)) {
    $temp = $row['product_id'];
    $sql1 = "SELECT * FROM `product` WHERE product_id=$temp";
    $result1 = mysqli_query($mysqli, $sql1);
    $row1 = mysqli_fetch_array($result1);
    $pdf->Cell($width_cell[0], 10, $row1['title'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[1], 10, $row['price'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[2], 10, number_format($row['quantity']), 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[3], 10, number_format($row['price'] * $row['quantity']), 1, 0, 'C', $fill);
    $fill = !$fill;
    $pdf->Ln(10);
}
$pdf->Write(10, 'Cảm ơn bạn đã đặt hàng tại cake shop');
ob_clean();
$pdf->Output();
?>