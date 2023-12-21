<?php
require("../../../tfpdf/tfpdf.php");
require("../config.php");
$pdf = new tFPDF();
$pdf->AddPage("0");

$pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
$pdf->SetFont('DejaVu', '', 14);

$pdf->SetFillColor(193, 229, 252);

$order_id = $_GET['order_id'];
$sql = "SELECT * FROM `order_detail` WHERE order_id=$order_id";
$result = mysqli_query($mysqli, $sql);

$pdf->Write(10, 'Đơn hàng của bạn gồm có: ');
$pdf->Ln(10);

$width_cell = array(20, 40, 40, 30, 30, 30);

$pdf->Cell($width_cell[0], 10, 'ID', 1, 0, 'C', true);
$pdf->Cell($width_cell[1], 10, 'Mã sản phẩm', 1, 0, 'C', true);
$pdf->Cell($width_cell[2], 10, 'Tên sản phẩm', 1, 0, 'C', true);
$pdf->Cell($width_cell[3], 10, 'Giá', 1, 0, 'C', true);
$pdf->Cell($width_cell[4], 10, 'Số lượng', 1, 0, 'C', true);
$pdf->Cell($width_cell[5], 10, 'Tổng tiền', 1, 1, 'C', true);
$pdf->SetFillColor(235, 236, 236);
$fill = false;
$i = 0;
while ($row = mysqli_fetch_array($result)) {
    $i++;
    $temp = $row['product_id'];
    $sql1 = "SELECT * FROM `product` WHERE product_id=$temp";
    $result1 = mysqli_query($mysqli, $sql1);
    $row1 = mysqli_fetch_array($result1);
    $pdf->Cell($width_cell[0], 10, $i, 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[1], 10, $row['product_id'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[2], 10, $row1['title'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[3], 10, $row['price'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[4], 10, number_format($row['quantity']), 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[5], 10, number_format($row['price'] * $row['quantity']), 1, 0, 'C', $fill);
    $fill = !$fill;
    $pdf->Ln(10);
}

$pdf->Write(10, 'Cảm ơn bạn đã đặt hàng tại cake shop');
ob_clean();
$pdf->Output();
?>