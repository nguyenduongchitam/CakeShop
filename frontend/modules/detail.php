<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>trang khách hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
    <head>
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
                    <th>Tên danh mục</th>
                </tr>
            </thead>
            <tbody >
                <?php
        
                while ($row = mysqli_fetch_array($resut)) {
                    
                ?>
                    <tr>
                       
                        <td> <?php echo $row['name'] ?> </td>
    
                    </tr>
                <?php
                }
                ?>
            </tbody>
        
        </table>
            </div>
    </div>
    
</html>