<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>trang khách hàng</title>
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
      />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/home.css"> 
    <link rel="stylesheet" href="../css/aboutuspage.css">
    <link rel="stylesheet" href="../css/contract.css">
    <link rel="stylesheet" href="../css/menupage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushina">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
    <?php
    include("/xampp/htdocs/CakeShop/Database/Config/config.php");
    $sql="select * from category";
$resut= mysqli_query($mysqli,$sql);
    ?>
     <head>
  <body>
  <section class="myheader">
    <div class="container fs-4 py-3 text-center">
      <div class="row">
        <div class="col-md-3"><img src="/frontend/modules/images/Header-Logo.png" class="img-fluid logo" alt="Logo" style="max-width: 140px;"></div>
        <div class="col-md-4">
          <div class="input-group mb-3">
            <input type="text" class="form-control" style="color: black;" placeholder="Tìm kiếm..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" style="color: black;" type="button" id="button-addon2"><i class="bi bi-search-heart"></i></button>
          </div>
        </div>
        <div class="col-md-3">
          <i class="bi bi-telephone">
          </i><strong> 0353780187</strong>
        </div>
        <a href="#" class="col-md-1 account bigger-icon"><i class="bi bi-person-circle"></i></a>
        <div class="col-md-1">
          <button type="button" class="btn position-relative" style="padding-top: 0;">
            <i class="bi bi-bag-heart bigger-icon"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="margin-bottom: 0;">
              99+
              <span class="visually-hidden">items</span>
            </span>
          </button>
        </div>
      </div>
      <section class="menu">
        <div class="container pt-3">
          <div class="row">
            <nav class="navbar navbar-expand-lg" style="background-color: bisque;">
              <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav ps-3">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php?action=homepage&query=none">Trang Chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sản phẩm
                      </a>
                      <ul class="dropdown-menu">
                      <?php
                         while ($row = mysqli_fetch_array($resut)) {
                       ?>
                        <li><a class="dropdown-item" href="index.php?action=menupage&query=none&id=<?php echo $row['category_id'] ?>"> <?php echo $row['name'] ?></a></li>
                        <?php
                         }
                         ?>
                      </ul>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link active" aria-current="page" href="index.php?action=menupage&query=none">Menu page</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link active" aria-current="page" href="index.php?action=aboutuspage&query=none">Abouts us</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link active" aria-current="page" href="index.php?action=contractpage&query=none">Liên Hệ</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </section>
    </div>
  </section>
 <?php
 include("main.php");
 ?> 
  </body>

  <section class="myfooter" style="background: bisque;">
        <div class="container fs-4 py-3 text-center">
            <div class="row">
                <div class="col-md-3">
                    <img src="/frontend/modules/images/Header-Logo.png" class="img-fluid logo" alt="Logo" style="max-width: 140px;">
                    <div><i class="bi bi-house-heart"></i><span style="font-size: 16px;"> Số 09 Trần Thái Tông, P. Dịch Vọng, Q. Cầu Giấy, TP. Hà Nội</span></div>
                    <div><i class="bi bi-telephone"></i><span style="font-size: 16px;"> 0353780187</span></div>
                    <div class="mailfooter"><a href="#" style="text-decoration: none; color:black;"><i class="bi bi-envelope"></i><span style="font-size: 16px;"> tiembanhhoangtube@gmail.com</span></div></a>
                </div>
                <div class="col-md-3">
                    <h2>CHÍNH SÁCH</h2>
                    <ul>
                        <li><a href="#" style="font-size: 18px;">Chính sách và quy định chung</a></li>
                        <li><a href="#" style="font-size: 18px;">Chính sách giao dịch, thanh toán</a></li>
                        <li><a href="#" style="font-size: 18px;">Chính sách đổi trả</a></li>
                        <li><a href="#" style="font-size: 18px;">Chính sách bảo mật</a></li>
                        <li><a href="#" style="font-size: 18px;">Chính sách vận chuyển</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h2>CÔNG TY CỔ PHẦN BÁNH NGỌT XXX</h2>
                    <div style="font-size: 16px;">Địa chỉ tên miền: anhhoabakery.vn</div>
                    <div style="font-size: 16px;">Tên Doanh nghiệp: Công ty Cổ phần Bánh ngọt XXX</div>
                    <div style="font-size: 16px;">Trụ sở Doanh Nghiệp: Số 09 Trần Thái Tông, P. Dịch Vọng, Q. Cầu Giấy, TP. Hà Nội</div>
                    <div style="font-size: 16px;">MST/ĐKKD/QLTL: 0104802706</div>
                    <div style="font-size: 16px;">Ngày cấp: 21/07/2010</div>
                    <div style="font-size: 16px;">Nơi cấp: Sở Kế hoạch và Đầu tư Tp. Hà Nội</div>
                </div>
                <div class="col-md-2">
                    <h2>FOLLOW US</h2>
                    <ul>
                        <li><a href="#" style="font-size: 18px;"><i class="bi bi-facebook"></i> Facebook</a></li>
                        <li><a href="#" style="font-size: 18px;"><i class="bi bi-instagram"></i> Instagram</a></li>
                        <li><a href="#" style="font-size: 18px;"><i class="bi bi-twitter-x"></i> Twitter</a></li>
                        <li><a href="#" style="font-size: 18px;"><i class="bi bi-youtube"></i> Youtube</a></li>
                    </ul>
                </div>
            </div>
</section>
</html>