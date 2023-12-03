<?php
include("../CakeShop/Database/Config/config.php");

$sql = "SELECT * from user where email='Tam123@gmail.com' LIMIT 1";
$result= mysqli_query($mysqli,$sql);
while ($row = mysqli_fetch_array($result)) $password=$row['password'];
echo $password; 

$enterpassword="12345678901012312323132132331213"; 


echo "<br>";
if(password_verify($enterpassword,$password) ){
    echo "Login thành công";
}else{
    echo "Truy cập trái phép";  
}
?>
