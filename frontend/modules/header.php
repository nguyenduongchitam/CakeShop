<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>

<section class="myheader" style="background-color: #C7DCA7;">
    <div class=" container-fluid fs-4 text-center headerig" style="padding: 0;">
      <div class="row align-items-center">
        <div class="col-md-2"><img src="../modules/images/Header-logo.png" class="img-fluid logo" alt="Logo" style="max-width: 140px; height:90px"></div>
        <div class="col-md-6">
          <section class="menu">
            <div class="container-fluid pt-3 navbarne">
              <div class="row">
                <nav class="navbar navbar-expand-lg" style="padding-top: 0; padding-bottom: 0">
                  <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                      <ul class="navbar-nav ps-3 navbarr">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="index.php?action=homepage&query=none" style="padding-top: 0; color:#4d2600;">Trang Chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="color: #4d2600; padding-top: 0;">
                            Sản Phẩm
                          </a>
                          <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="index.php?action=menupage&query=none">Tất cả sản phẩm</a> </li>
                           <?php
                             while ($row = mysqli_fetch_array($result)) {
                             ?> 
                        <li><a class="dropdown-item" href="index.php?action=menupage&query=none&id=<?php echo $row['category_id'] ?>"> <?php echo $row['name'] ?></a></li>
                        <?php
                         }
                         ?>
                      </ul>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="index.php?action=aboutuspage&query=none" style="padding-top: 0; color:#4d2600;">About Us</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="index.php?action=contractpage&query=none" style="padding-top: 0; color:#4d2600;">Liên Hệ</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
              </div>
            </div>
          </section>
        </div>
        <div class="col-md-2" style="padding-top: 20px;">
          <div class="input-group mb-3">
            <input type="text" class="form-control" style="color: #4d2600; font-family: Segoe UI;" placeholder="Tìm kiếm..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" style="color: #4d2600;" type="button" id="button-addon2"><i class="bi bi-search-heart"></i></button>
          </div>
        </div>
        <div class="col-md-2">
          <section class="menu">
            <div class="container-fluid pt-3 navbarne">
              <div class="row">
                <nav class="navbar navbar-expand-lg" style="padding-top: 0; padding-bottom: 0">
                  <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                      <ul class="navbar-nav ps-3 navbarr">
                        <li class="nav-item dropdown">
                          <a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="color: #4d2600; padding-top: 0;">
                            <i class="bi bi-person-circle bigger-icon"></i>
                          </a>
                          <?php 
                       if(isset($_SESSION['dangnhap'])&&($_SESSION['dangnhap']!=""))
              {
               echo '<ul class="dropdown-menu">
               <li><a class="dropdown-item" href="profilepage.php">'.$_SESSION['dangnhap'].'</a></li>
               <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
             </ul>';
               }
                     else echo '<ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="sign-up.php">Đăng Ký</a></li>
                     <li><a class="dropdown-item" href="sign-in.php">Đăng Nhập</a></li>
                   </ul>';
                        ?> 
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="cart.php" style="padding-top: 0; color:#4d2600;"><i class="bi bi-basket2 account bigger-icon"></i> <?php if(isset($_SESSION['quantity_in_cart'])) echo $_SESSION['quantity_in_cart'];else echo 0; ?></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</body>

</html>


<!-- <div class="col-md-3">
  <a href="#" class="col-md-9 account "><i class="bi bi-person-circle bigger-icon"></i> Đăng Nhập</a>
  <a href="#" class="account"> Đăng Ký</a>
  <a href="#" class="col-md-3 account bigger-icon" style="padding-left: 20px;"><i class="bi bi-basket2"></i></a>
</div> -->


<!--  <section class="myheader" style="background-color: #C7DCA7;">
    <div class=" container-fluid fs-4 text-center headerig" style="padding: 0;">
      <div class="row align-items-center">
        <div class="col-md-2"><img src="../modules/images/Header-logo.png" class="img-fluid logo" alt="Logo" style="max-width: 140px; height:90px"></div>
        <div class="col-md-6">
          <div class="input-group mb-3">
            <input type="text" class="form-control" style="color: #4d2600; font-family: Segoe UI;" placeholder="Tìm kiếm..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" style="color: #4d2600;" type="button" id="button-addon2"><i class="bi bi-search-heart"></i></button>
          </div>
        </div>
        <div class="col-md-3">
          <i class="bi bi-telephone" style="color: #4d2600;"></i>
          <strong style="color: #4d2600;"> 039XXXXX</strong>
        </div>  
        <?php 
 if(isset($_SESSION['dangnhap'])&&($_SESSION['dangnhap']!=""))
     {
      echo '<a href="profilepage.php" class="col-md-1 account bigger-icon"><i class="bi bi-person-circle"></i>'.$_SESSION['dangnhap'].'</a>';
 }
 else echo '<a href="sign-in.php" class="col-md-1 account bigger-icon"><i class="bi bi-person-circle"></i>Login</a>';
      ?>
        <a href="cart.php" class="col-md-1 account small-icon"><i class="bi bi-basket2"></i><?php if(isset($_SESSION['quantity_in_cart'])) echo $_SESSION['quantity_in_cart'];else echo 0; ?></a>
        <a href="logout.php" style="text-decoration: none">Thoát</a>
      </div>
      <section class="menu">
        <div class="container pt-3">
          <div class="row">
            <nav class="navbar navbar-expand-lg">
              <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav ps-3 navbarr">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php?action=homepage&query=none">Trang Chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sản phẩm
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?action=menupage&query=none">Tất cả sản phẩm</a> </li>
                      <?php
                         while ($row = mysqli_fetch_array($result)) {
                       ?> 
                        <li><a class="dropdown-item" href="index.php?action=menupage&query=none&id=<?php echo $row['category_id'] ?>"> <?php echo $row['name'] ?></a></li>
                        <?php
                         }
                         ?>
                      </ul>
                    </li>
                    
                    <li class="nav-item ">
                      <a class="nav-link active" aria-current="page" href="index.php?action=aboutuspage&query=none">About us</a>
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
  </section>   -->  