<?php
include("config.php");
$sql="select * from category";
$resut= mysqli_query($mysqli,$sql);
?>

<table border="2px soild black">    
<form method="POST" action="../modules/QuanLySanPham/insert.php" enctype="multipart/form-data">
<tr>
        <td>
         Nhập tiêu đề sản phẩm 
        </td>   
        <td>
            <input type="text" name="title" > 
        </td>
</tr>
<tr>
        <td>
            nhập loại sản phẩm
        </td>
        <td>
        <select name="name">
         <?php
         while($row= mysqli_fetch_array($resut))
        {
        ?>
        <option value="<?php echo $row['category_id'] ?>" name="name"><?php echo $row['name'] ?></option>
<?php
}
?>
    </select> 

     </td>
</tr>
<tr>
        <td>
            nhập link hình ảnh 
        </td>
        <td >
        <input type="file" name="thumbnail" require>
        </td>
</tr>
<tr>
        <td>
            nhập giá sản phẩm
        </td>
        <td>
            <input type="text" name="price"> 
        </td>
</tr>
<tr>
        <td>
            nhập giá khuyến mãi 
        </td>
        <td>
            <input type="text" name="discount_price"> 
        </td>
</tr>
<tr>
        <td>
            nhập mô tả sản phẩm 
        </td>
        <td>
            <input type="text" name="description"> 
        </td>
</tr>
<tr>
<td colspan="2">
            <input type="submit" name="insert" value="Thêm sản phẩm">
        </td>
</tr>
</form>     
</table>