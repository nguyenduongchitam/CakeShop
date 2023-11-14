
<table style="width: 400px;" border="2px soild black">    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<form method="POST" action="../modules/QuanLyUser/insert.php">
    <tr>
        <td>Nhập email</td>
        <td><input type="email" name="email"></td>
    </tr>
    <tr>
        <td>Nhập mật khẩu</td>
        <td><input type="text" name="password"> </td>
    </tr>
    <tr>
        <td>Họ tên</td>
        <td><input type="text" name="fullname"> </td>
    </tr>
    <tr>
        <td><label for="phone">Số điện thoại</label></td>
        <td><input type="tel" name="phone"></td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td><input type="text" name="address"></td>
    </tr>
    <tr>
        <td>Quyền</td>
        <td><input type="text" name="role"> </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" name="insert" value="Thêm tài khoản">
        </td>
    </tr>
</form>     
</table>
