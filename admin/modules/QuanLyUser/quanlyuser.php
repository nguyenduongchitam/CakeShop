<?php
    include("config.php");
    $query="SELECT * FROM `role`";
    $result=mysqli_query($mysqli, $query);
?>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<div class="container">
<form style="float: right;" method="POST" action="">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Nhập email hoặc tên cần tìm" style="width: 300px;" name="search_key" id="typed_email" >
        <button class="btn btn-primary" type="submit" name="search">
            <i class="fas fa-search"></i> Tìm tài khoản
        </button>
    </div>
</form>
</div>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm tài khoản</button> 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="container">
        <h2 class="text-center">Thêm tài khoản</h2>
        <table class="table table-bordered">
            <form method="POST" action="../modules/QuanLyUser/insert.php">
                <tr>
                    <td>Nhập email</td>
                    <td><input type="text" name="email" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Nhập mật khẩu</td>
                    <td><input type="text" name="password" class="form-control" required> </td>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td><input type="text" name="fullname" class="form-control" > </td>
                </tr>
                <tr>
                    <td><label for="phone">Số điện thoại</label></td>
                    <td><input type="tel" name="phone" class="form-control" ></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><input type="text" name="address" class="form-control" ></td>
                </tr>
                <tr>
                    <td>Quyền</td>
                    <td>
                        <select name="selectOption" id="selectOption">
                            <?php while($row=mysqli_fetch_array($result)):; ?>
                            <option value="<?php echo $row[0]; ?>"><?php echo $row[1];?></option>
                            <?php endwhile;?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="insert" value="Thêm tài khoản" class="btn btn-primary">
                    </td>
                </tr>
            </form>
        </table>
    </div>
   </div>
</div>
</div>
