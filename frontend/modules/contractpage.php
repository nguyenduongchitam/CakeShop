<div class="contractbody">
<hr border="2">
    <img src="/frontend/modules/images/Contract-1.png" alt="pic" style="padding-left:50px">
    <div class="title">
       <p style="opacity: 0.66">Tiệm bánh</p>
       <h1 class="title1">IU LÀ ĐÂY </h1>
    </div>
    
    <div class="info">
       <p> <ion-icon name="location-outline"></ion-icon> At: 220 Điện Biên Phủ - P.ĐaKao - Quận 1 - TP.HCM </p>
       <p> <ion-icon name="call-outline"></ion-icon> Hotline: 1900 1234 </p>
       <p style ="padding-left: 20px"> CSKH: 028345622 - 028425674</p>
       <p> <ion-icon name="mail-outline"></ion-icon> Email: iuladay@bake.com </p>
       <p> <ion-icon name="logo-facebook"></ion-icon> Fanpage: iu là đây </p>
    </div>
    
    <div class="wave-border"></div>
    <div class="container">
        <div class="form-container">
           <h1 style="text-align:center">Liên hệ <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></h1>
        <form method="POST">
            <table class="table">
                <tr>
                    <td>
                        <input type="text" name="firstname" placeholder="Họ" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="lastname" placeholder="Tên" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="email" placeholder="Email" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="phone" placeholder="Số điện thoại" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea placeholder="Nội dung" name="note" class="form-control"></textarea>
                    </td>
                </tr>
                <tr style="text-align: center">
                    <td colspan="2">
                        <input type="submit" name="sent" class="btn btn-primary">
                    </td>
                </tr>
            </table>
        </form>
        </div>
    </div>
    <?php
    include("../../Database/Config/config.php");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname= $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone'];
    $note = $_POST['note'];

    if(isset($_POST['sent']))
   {   
     $sql_add = "INSERT INTO feedback(firstname,lastname,email,phone_number,note) VALUES ('$firstname','$lastname','$email',$phone_number,'$note')";
     mysqli_query($mysqli,$sql_add);
   }   
    mysqli_close($mysqli);
  }
?>
</div >