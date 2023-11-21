
<div class="content_right">
     <?php
    if(isset($_GET['action'])&&isset($_GET['query'])){
        $action=$_GET['action'];
        $query=$_GET['query'];
    }
    else 
    {
        $action='';
        $query='';
    }
    if( $action=='quanlydanhmucsanpham' && $query=='none')
    {
        include("../modules/QuanLyDanhMucSP/quanlydanhmucSP.php");
        include("../modules/QuanLyDanhMucSP/list.php");
    }
    else if( $action=='quanlydanhmucsanpham' && $query=='update') 
    include("../modules/QuanLyDanhMucSP/update.php");
     else 
     if( $action=='quanlysanpham' && $query=='none')
    {
        include("../modules/QuanLySanPham/quanlysanpham.php");
        include("../modules/QuanLySanPham/list.php");
    }
    else if( $action=='quanlysanpham' && $query=='update') 
    include("../modules/QuanLySanPham/update.php");
    else  if( $action=='quanlytaikhoan' && $query=='none')
    {
        include("../modules/QuanLyUser/quanlyuser.php");
        include("../modules/QuanLyUser/list.php");
    }
    else if( $action=='quanlytaikhoan' && $query=='update') 
    include("../modules/QuanLyUser/update.php");
    else 
    if( $action=='quanlykhachhang' && $query=='none')
    {
        include("../modules/QuanLyKhachHang/XemDSKhachHang.php");
        
    }
    else if( $action=='quanlyphanhoi' && $query=='none')
    {
        include("../modules/QuanLyPhanHoi/XemDSFeedBack.php");   
    }
    else include("dashboard.php");
?>
</div>
</section>
 