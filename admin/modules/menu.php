<section class="content">
<div class="content_left">
<ul class="admin_list">
<li><a href="index.php?action=quanlytaikhoan&query=none">Quản lý tài khoản</a></li>
<li><a href="index.php?action=quanlydanhmucsanpham&query=none">Quản lý danh mục sản phẩm</a></li>
<li><a href="index.php?action=quanlysanpham&query=none">Quản lý sản phẩm</a></li>
<li><a href="index.php?action=quanlyhoadon&query=none">Quản lý hóa đơn</a></li>
<li><a href="index.php?action=quanlykhachhang&query=none">Quản lý khách hàng</a></li>
<li><a href="index.php?action=quanlyphanhoi&query=none">Quản lý Phản hồi</a></li>
<li><a href="index.php?action=quanlybaocao&query=none" >Quản lý báo cáo và thống kê</a></li>
<form method="POST" style="padding-left:45px">
    <button name="logout" style="width: 150px; height:50px; margin-top:40px" class="btn btn-danger">Đăng Xuất</button>
</form>
</ul>   
</div>
<?php 
if(isset($_POST['logout']))
{
    session_destroy();
    header("Location:admin_login.php");
}
?>