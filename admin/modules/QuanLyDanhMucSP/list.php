<?php
include("config.php");
$sql="select * from category";
$resut= mysqli_query($mysqli,$sql);
?>
<div class="container">
        <h2 class="text-center">Danh sách các danh mục</h2>
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Thứ tự</th>
                    <th>Tên danh mục</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
            </thead>
           
            <tbody style=" height:200px;
    overflow-y:auto;
    width: 100%;">
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($resut)) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><a onclick="return del('<?php echo $row['name'] ?>')" href="QuanLyDanhMucSP/delete.php?query=delete&category_id=<?php echo $row['category_id'] ?>"  class="btn btn-danger">Xóa</a></td>
                        <td><a href="?action=quanlydanhmucsanpham&query=update&category_id=<?php echo $row['category_id'] ?>" class="btn btn-primary">Sửa</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        
        </table>
            </div>
    </div>
    
    <script>
        function del(name) {
            return confirm("Bạn có chắc chắn là muốn xóa danh mục: " + name + " không?");
        }
    </script>





