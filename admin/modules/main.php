
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
        // else if ($action == 'quanlytaikhoan' && $query == 'search') {
        //     include("../modules/QuanLyUser/quanlyuser.php");
        //     include("../modules/QuanLyUser/search_result.php");
        //     }
    else if( $action=='quanlytaikhoan' && $query=='update') 
    include("../modules/QuanLyUser/update.php");
    else 
    if( $action=='quanlykhachhang' && $query=='none')
    {
        include("../modules/QuanLyKhachHang/XemDSKhachHang.php");
    }else if  ($action=='quanlykhachhang' && $query=='select')
    {
        include("../modules/QuanLyKhachHang/XemLichSuMuaHang.php");
    }else if( $action=='quanlyphanhoi' && $query=='none')
    {
        include("../modules/QuanLyPhanHoi/XemDSFeedBack.php");   
    }
    else  if( $action=='quanlytintuc' && $query=='none')
    {
        include("../modules/QuanLyTinTuc/quanlytintuc.php");
        include("../modules/QuanLyTinTuc/list.php");
    }
    else if( $action=='quanlytintuc' && $query=='update') 
    include("../modules/QuanLyTinTuc/update.php");
    else if( $action=='quanlytintuc' && $query=='content') 
    include("../modules/QuanLyTinTuc/noidung.php");
    else  if( $action=='quanlyhoadon' && $query=='none')
    {
        include("../modules/QuanLyHoaDon/quanlyhoadon.php");
        include("../modules/QuanLyHoaDon/list.php");
    }
    else if( $action=='quanlyhoadon' && $query=='update') 
    include("../modules/QuanLyHoaDon/update.php");
    else  if( $action=='quanlyCTHD' && $query=='none')
    {
        include("../modules/QuanLyCTHD/list.php");
    }
    else  if( $action=='quanlybaocao' && $query=='none')
    {
        include("../modules/QuanLyBaoCao/quanlybaocao.php");
    }
    else if( $action=='quanlykhuyenmai' && $query=='none')
    {
        include("../modules/QuanLyKM/quanlycoupon.php");
        include("../modules/QuanLyKM/list.php");
    }
    else if( $action=='quanlykhuyenmai' && $query=='update') 
    include("../modules/QuanLyKM/update.php");
    else include("dashboard.php");
?>
</div>
</section>
 