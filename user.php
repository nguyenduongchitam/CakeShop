<?php
    include('config.php');
    $email = "thongdit880@gmail.com";
    $sql = "SELECT * FROM user WHERE email='$email' LIMIT 1";
    $row = mysqli_query($mysqli,$sql);
    $result = mysqli_fetch_array($row);
?>
<?php
    //$customerId = $_GET['user_id'];
    $sql_history_dh = "SELECT *
            FROM `order` o
            INNER JOIN order_detail od ON o.order_id = od.order_id
            INNER JOIN product p ON od.product_id = p.product_id
            WHERE o.user_id = 8 ";
    $result_history_dh = mysqli_query($mysqli,$sql_history_dh);
?>
<?php
    if(isset($_POST['save-profile'])){
        $fullname = $_POST['fullname'];
        $phonenumber = $_POST['phone-number'];
        $address = $_POST['address'];
        if(empty($fullname))
        {
            $fullname = $result['full_name'];
        }
        if(empty($phonenumber))
        {
            $phonenumber = $result['phone_number'];
        }
        if(empty($address))
        {
            $address = $result['address'];
        }
        $sql = "UPDATE user SET full_name ='$fullname',phone_number = '$phonenumber',address ='$address' WHERE email = '$email' ";
        mysqli_query($mysqli,$sql);
        header('location:user.php');
    }
?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $error=[];
        $announce=[];
        $eventPasswordNew = $_POST['new-password'];
        $eventPasswordOld = $_POST['old-password'];
        if(empty(trim($eventPasswordOld))||empty(trim($eventPasswordNew)))
        {
            $error['password']['required'] = 'mật khẩu không được để trống';
        }
        else{
            if(empty(trim($_POST['repeat-password'])))
            {
                $error['repeat_password']['required'] = 'vui lòng nhâp lại mật khẩu';
                $error['password']['save'] = $eventPasswordNew;
            }
            else
            {
                if(($_POST['repeat-password'])!= $eventPasswordNew){
                $error['repeat_password']['compare'] = 'mật khẩu nhập lại không đúng';
                $error['password']['save'] = $eventPasswordNew;
                }
            }
        }
    }
    if(empty($error)){
        include('config.php');
        if(isset($_POST['save-account']))
        {
            $nhaplaimatkhau = $_POST['repeat-password'];
            $sqlpassword = "SELECT * FROM user WHERE email='$email' LIMIT 1";
            $row2 = mysqli_query($mysqli,$sqlpassword);
            $old = mysqli_fetch_array($row2);
            $passwordHashData = $old['password'];
            if(password_verify($eventPasswordNew,$passwordHashData)){
                $passwordHash = password_hash($eventPasswordNew,PASSWORD_DEFAULT);
                $sqlupdate = "UPDATE user SET password = '$passwordHash' WHERE email = '$email'";
                mysqli_query($mysqli,$sqlupdate);
                header('location:user.php');
            }
            else{
                $error['old-password']['verify']= 'mật khẩu cũ không đúng';
                $announce['repeat_password']['save'] = $nhaplaimatkhau;
                $announce['password']['save'] = $eventPasswordNew;
            }
        }
    }
    
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="user.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  /*overflow: hidden;*/
  display: flex;
  flex-direction: column;
  float: left;
  height: 300px;
  background-color: #7FD1AE;
  border-radius: 8px 0px 0px 0px;
  border: none;
  margin-left: 100px;
}
/* Style the buttons inside the tab */
.tab button {
  background-color: #849F85;
  outline: none;
  border: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
  width: 330px;
  border-radius: 25px;
  margin-bottom: 20px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #57846F;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #25695E;
}
/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: none;
  margin-left: 40px;
  margin-right: 40px;
  color:#112A46;
}
#forward-icon2, #forward-icon3, #forward-icon1{
    margin-right: 10px;
}
.button-content{
    margin-right: 80px;
}
</style>
</head>
<body>

<h2 style="margin-left: 100px">User profile</h2>
<div class="tab">
  <button class="tablinks" onclick="openTabs(event, 'profile')"><i class="fa-solid fa-user" id="forward-icon1"></i><span class="button-content">Thông tin tài khoản</span><i class="fa-solid fa-arrow-right-long fa-xl" id="back-icon1"></i></button>
  <button class="tablinks" onclick="openTabs(event, 'account')"><i class="fa-solid fa-key" id="forward-icon2"></i><span class="button-content">Thông tin đăng nhập</span><i class="fa-solid fa-arrow-right-long fa-xl" id="back-icon2"></i></button>
  <button class="tablinks" onclick="openTabs(event, 'purchase-history')"><i class="fa-solid fa-cart-shopping" id="forward-icon3"></i><span class="button-content">Lịch sử đơn hàng</span><i class="fa-solid fa-arrow-right-long fa-xl" id="back-icon3"></i></button>
</div>
<div id="wrapper">
<div id="profile" class="tabcontent" style="display:block">
  <div class="form-group">
    <h3>Thông tin tài khoản</h3>
    </div>
    <table border="0" class="profile" id = "account-general">
    <tr>
        <td><label class="form-label">Họ và tên</label></td>
        <td><div class="user-info"><?php echo(!empty($result['full_name']))? '<span>'.$result['full_name'].'</span>':'<span style="color:gray;"><i>Chưa cập nhật!</i></span>' ?></div></td>
    </tr>
    <tr>
        <td><label class="form-label">Số điện thoại</label></td>
        <td><div class="user-info"><?php echo(!empty($result['phone_number']))? '<span>'.$result['phone_number'].'</span>':'<span style="color:gray;"><i>Chưa cập nhật!</i></span>' ?></div></td>
    </tr>
    <tr>
        <td><label class="form-label">Địa chỉ</label></td>
        <td><div class="user-info"><?php echo(!empty($result['address']))? '<span>'.$result['address'].'</span>':'<span style="color:gray;"><i>Chưa cập nhật!</i></span>' ?></div></td>
    </tr>
    </table>
    <div class="form-group">
    <button type="button" class="btn btn-primary" id="update-profile" name="save"><b>CẬP NHẬT</b></button>
    </div>
</div>
<div id="account" class="tabcontent">
    <div class="form-group">
        <h3>Thông tin đăng nhập</h3>
    </div>
    <table border="0" class="account">
            <tr>
                <td><label class="form-label">Email</label></td>
                <td><div class="user-info"><?php echo(!empty($result['email']))? '<span>'.$result['email'].'</span>':'<span style="color:gray;"><i>Chưa cập nhật!</i></span>' ?></div></td>
            </tr>
            <tr>
                <td><label class="form-label">Mật khẩu</label></td>
                <td><div class="user-info">**********************</div></td>
            </tr>
    </table>
    <div class="text-right mt-3">
        <button type="button" class="btn btn-primary" id="update-account" name="save" style="margin-bottom:20px"><b>CẬP NHẬT</b></button>
    </div>
</div>

<div id="purchase-history" class="tabcontent">
  <p><div class="form-group">
    <h3>Lịch sử đơn hàng</h3>
</div>
<div class="form-group">
<table style="width:100%" border="2" style="border-collapse:collapse">
<tr>
    <th>ID</th>
    <th>Mã đơn hàng</th>
    <th>Địa chỉ</th>
    <th>Tên sản phẩm</th>
    <th>Ngày đặt hàng</th>
    <th>Phí giao hàng</th>
    <th>Tổng giá tiền</th>
    <th>Quản lý</th>
</tr>
<?php
    $i = 0;
    while($row = mysqli_fetch_array($result_history_dh)){
    $i++;
?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['order_id']?></td>
    <td><?php echo $row['ward'].' - '.$row['district'].' - '.$row['city'];?></td>
    <td><?php echo $row['title']?></td>
    <td><?php echo $row['order_date']?></td>
    <td><?php echo $row['delivery_money']?></td>
    <td><?php echo $row['total_money']?></td>
    <td>
        <a href="#">Xem đơn hàng</a>
    </td>
</tr>  
    <?php
    }
    ?>
</table>
</div>
</div>
<div id="modal-container-profile">
    <div class="modal" id="modal-demo-profile">
        <div class="modal-header-profile">
            <h3>Cập nhật thông tin tài khoản</h3>
            <button id="btn-close-profile"><i class="fa-sharp fa-solid fa-circle-xmark fa-2xl"></i></button>
        </div>
        <form class="modal-body-profile" method="POST" action="">
            <div class="form-group-modal">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Họ và tên" name="fullname" class="form-input">
            </div>
            <div class="form-group-modal">
                <i class="fa-solid fa-phone"></i>
                <input type="text" placeholder="Số điện thoại" name="phone-number" class="form-input">
            </div>
            <div class="form-group-modal">
                <i class="fa-solid fa-location-dot"></i>
                <input type="text" placeholder="Địa chỉ" name="address" class="form-input">
            </div>
            <div>
                <button type="submit" class="btn btn-secondary"  name="save-profile" id="update-pro"><b>CẬP NHẬT TÀI KHOẢN</b></button>
            </div>
        </form>
    </div>
</div>
<div id="modal-container-account">
    <div class="modal" id="modal-demo-account">
        <div class="modal-header-account">
            <h3>Cập nhật thông tin đăng nhập</h3>
            <button id="btn-close-account"><i class="fa-sharp fa-solid fa-circle-xmark fa-2xl"></i></button>
        </div>
        <form class="modal-body-account" method="POST" action="">
            <div class="form-group-modal">
                <i class="fa-solid fa-lock"></i>
                <input type="text" placeholder="Nhập mật khẩu cũ" name="old-password" class="form-input">   
            </div>
            <?php
                echo (!empty($error['password']['required']))?'<span class="error" style="color: red">'.$error['password']['required'].'</span>':false;

                echo (!empty($error['old-password']['verify']))?'<span class="error" style="color: red">'.$error['old-password']['verify'].'</span>':false;
            ?>
            <div class="form-group-modal">
                <i class="fa-solid fa-lock"></i>
                <input type="text" class="form-input" placeholder="Nhập mật khẩu mới" name="new-password" value="<?php echo (!empty($error['password']['save']))? $error['password']['save'] :false;
                echo (!empty($announce['password']['save']))? $announce['password']['save'] :false; ?>"> 
            </div>
                <?php
                    echo (!empty($error['password']['required']))?'<span class="error" style="color: red">'.$error['password']['required'].'</span>':false;
                ?>
            <div class="form-group-modal">
                <i class="fa-solid fa-lock"></i>
                <input type="password" class="form-input" placeholder="Nhập lại mật khẩu" name="repeat-password" value="<?php echo (!empty($announce['repeat_password']['save']))? $announce['repeat_password']['save']:false;?>">  
            </div>
            <?php
                echo (!empty($error['repeat_password']['required']))?'<span class="error" style="color: red">'.$error['repeat_password']['required'].'</span>':false;

                echo (!empty($error['repeat_password']['compare']))?'<span class="error" style="color: red">'.$error['repeat_password']['compare'].'</span>':false;
            ?>
            <div>
                <button type="submit" class="btn btn-secondary" name="save-account" id="update-pass"><b>CẬP NHẬT MẬT KHẨU</b></button>
            </div>
        </form>
    </div>
</div>
</div>
<script>
function openTabs(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<script>
        const btn_open_profile = document.getElementById('update-profile');
        const btn_close_profile = document.getElementById('btn-close-profile');
        const modal_container_profile = document.getElementById('modal-container-profile');
        const modal_demo_profile = document.getElementById('modal-demo-profile');
        btn_open_profile.addEventListener('click',()=>{
            modal_container_profile.classList.add('show');
        });
        btn_close_profile.addEventListener('click',()=>{
            modal_container_profile.classList.remove('show');
        });
        modal_container_profile.addEventListener('click', (e)=>{
            if(!modal_demo_profile.contains(e.target))
            {
                btn_close_profile.click();
            }
        })
    </script>
    <script>
        const btn_open_account = document.getElementById('update-account');
        const btn_close_account = document.getElementById('btn-close-account');
        const modal_container_account = document.getElementById('modal-container-account');
        const modal_demo_account = document.getElementById('modal-demo-account');
        btn_open_account .addEventListener('click',()=>{
            modal_container_account.classList.add('show');
        });
        btn_close_account .addEventListener('click',()=>{
            modal_container_account.classList.remove('show');
        });
        modal_container_account .addEventListener('click', (e)=>{
            if(!modal_demo_account.contains(e.target))
            {
                btn_close_account.click();
            }
        })
    </script>
   
</body>
</html> 
