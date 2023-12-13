<?php
    include("config.php");
    $query="SELECT * FROM `role`";
    $result=mysqli_query($mysqli, $query);
?>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<div class="container">
<!-- <form style="float: right;" method="POST" action="search_result.php?quanlytaikhoan&query=search">
    <input type="coupon" placeholder="Nhập coupon tài khoản cần tìm" style="width: 300px;" name="typed_coupon" id="typed_coupon" required>
    <button class="btn btn-primary" type="submit" name="search">Tìm tài khoản<i class="fas fa-search" style="margin-left: 10px;"></i></button>
</form> -->
</div>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tạo coupon</button> 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="container">
        <h2 class="text-center">Thêm coupon</h2>
        <table class="table table-bordered">
            <form method="POST" action="../modules/QuanLyKM/insert.php">
                <tr>
                    <td>Nhập mã coupon</td>
                    <td><input type="text" name="coupon_code" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Nhập % giảm giá</td>
                    <td><input type="text" name="discount_percentage" class="form-control" required> </td>
                </tr>
                <tr>
                    <td>Nhập giá trị đơn hàng tối thiểu</td>
                    <td><input type="text" name="cart_min" class="form-control" required> </td>
                </tr>
                <tr>
                    <td>Chọn ngày bắt đầu</td>
                    <td><input type="date" name="start_date" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Chọn ngày kết thúc</td>
                    <td><input type="date" name="end_date" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Số lượng phát hành</td>
                    <td><input type="text" name="quantity" class="form-control" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="insert" value="Tạo coupon" class="btn btn-primary">
                    </td>
                </tr>
            </form>
        </table>
    </div>
   </div>
</div>
</div>
