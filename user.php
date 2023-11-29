<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="user.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Modal popup html,css</title>
</head>
<?php
    include('config.php');
    $sql = "SELECT * FROM user WHERE email='thongbmt789@gmail.com' LIMIT 1";
    $row = mysqli_query($mysqli,$sql);
    $result = mysqli_fetch_array($row);
    $email = "thongbmt789@gmail.com";
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
        $eventPassword1 = $_POST['new-password'];
        $eventPassword2 = $_POST['old-password'];
        if(empty(trim($eventPassword1))||empty(trim($eventPassword2)))
        {
            $error['password']['required'] = 'mật khẩu không được để trống';
        }
        else{
            if(empty(trim($_POST['repeat-password'])))
            {
                $error['repeat_password']['required'] = 'vui lòng nhâp lại mật khẩu';
                $error['password']['save'] = $eventPassword1;
            }
            else
            {
                if(($_POST['repeat-password'])!= $eventPassword1){
                $error['repeat_password']['compare'] = 'mật khẩu nhập lại không đúng';
                $error['password']['save'] = $eventPassword1;
                }
            }
        }
    }
    if(empty($error)){
        include('config.php');
        if(isset($_POST['save-account']))
        {
            $matkhaucu = $_POST['old-password'];
            $matkhaumoi = $_POST['new-password'];
            $nhaplaimatkhau = $_POST['repeat-password'];
            $sqlpassword = "SELECT * FROM user WHERE email='$email' LIMIT 1";
            $row2 = mysqli_query($mysqli,$sqlpassword);
            $old = mysqli_fetch_array($row2);
            $passwordHashData = $old['password'];
            if(password_verify($matkhaucu,$passwordHashData)){
                $passwordHash = password_hash($matkhaumoi,PASSWORD_DEFAULT);
                $sqlupdate = "UPDATE user SET password = '$passwordHash' WHERE email = '$email'";
                mysqli_query($mysqli,$sqlupdate);
                header('location:user.php');
            }
            else{
                $error['old-password']['verify']= 'mật khẩu cũ không đúng';
                $announce['repeat_password']['save'] = $nhaplaimatkhau;
                $announce['password']['save'] = $eventPassword1;
            }
        }
    }
    
?>
<body>
    <div id="wrapper">
        <div >
            <div>
                <div><h3> User profile</h3></div>
                <div class="main">
                    <div class="taskbar">
                        <div id="account-general">
                            <div>
                            <hr>
                            <div>
                                <div class="form-group">
                                    <h3>Thông tin tài khoản</h3>
                                </div>
                                <table border="0" class="profile">
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
                                    <button type="button" class="btn btn-primary" id="update-profile" name="save">CẬP NHẬT</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-change-password">
                        <div class="card-body pb-2">
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
                                <button type="button" class="btn btn-primary" id="update-account" name="save">CẬP NHẬT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal-->
            <div id="modal-container-profile">
                <div class="modal" id="modal-demo-profile">
                    <div class="modal-header-profile">
                        <h3>Cập nhật thông tin tài khoản</h3>
                        <button id="btn-close-profile"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <form class="modal-body-profile" method="POST" action="">
                        <div class="form-group">
                            <input type="text" placeholder="Họ và tên" name="fullname">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Số điện thoại" name="phone-number">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Địa chỉ" name="address">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary"  name="save-profile">CẬP NHẬT TÀI KHOẢN</button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="modal-container-account">
                <div class="modal" id="modal-demo-account">
                    <div class="modal-header-account">
                        <h3>Cập nhật thông tin đăng nhập</h3>
                        <button id="btn-close-account"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <form class="modal-body-account" method="POST" action="">
                        <div class="form-group">
                            <input type="text" placeholder="Nhập mật khẩu cũ" name="old-password">   
                        </div>
                        <?php
                            echo (!empty($error['password']['required']))?'<span class="error" style="color: red">'.$error['password']['required'].'</span>':false;

                            echo (!empty($error['old-password']['verify']))?'<span class="error" style="color: red">'.$error['old-password']['verify'].'</span>':false;
                        ?>
                        <div class="form-group">
                            <input type="text" placeholder="Nhập mật khẩu mới" name="new-password" value="<?php echo (!empty($error['password']['save']))?'<span>'.$error['password']['save'].'</span>':false;
                            echo (!empty($announce['password']['save']))?'<span>'.$announce['password']['save'].'</span>':false;?>"> 
                        </div>
                            <?php
                                echo (!empty($error['password']['required']))?'<span class="error" style="color: red">'.$error['password']['required'].'</span>':false;
                            ?>
                        <div class="form-group">
                            <input type="password" placeholder="Nhập lại mật khẩu" name="repeat-password" value="<?php echo (!empty($announce['repeat_password']['save']))?'<span>'.$announce['repeat_password']['save'].'</span>':false;?>">  
                        </div>
                        <?php
                            echo (!empty($error['repeat_password']['required']))?'<span class="error" style="color: red">'.$error['repeat_password']['required'].'</span>':false;

                            echo (!empty($error['repeat_password']['compare']))?'<span class="error" style="color: red">'.$error['repeat_password']['compare'].'</span>':false;
                        ?>
                        <div>
                            <button type="submit" class="btn btn-primary" name="save-account">CẬP NHẬT MẬT KHẨU</button>
                        </div>
                    </form>
                </div>
            </div>
        <!--End modal-->
    </div>
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