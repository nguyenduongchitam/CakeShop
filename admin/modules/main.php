
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
    else if( $action=='quanlydanhmucsanpham' && $query=='update') include("../modules/QuanLyDanhMucSP/update.php");
    else if ( $action=='quanlysanpham' && $query=='none')
    {
        include("../modules/QuanLySanPham/quanlysanpham.php");
        include("../modules/QuanLySanPham/list.php");
    }
    else if( $action=='quanlysanpham' && $query=='update') include("../modules/QuanLySanPham/update.php");
    else include("dashboard.php");
?>
</div>
</section>
 