<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <section class="myheader" style="background-color: #fff7e6;">
    <div class="container fs-4 py-3 text-center">
      <div class="row">
        <div class="col-md-3"><img src="../modules/homepage/2e.png" class="img-fluid logo" alt="Logo" style="max-width: 140px; height:120px"></div>
        <div class="col-md-4">
          <div class="input-group mb-3">
            <input type="text" class="form-control" style="color: #4d2600; font-family: cursive;" placeholder="Tìm kiếm..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" style="color: #4d2600;" type="button" id="button-addon2"><i class="bi bi-search-heart"></i></button>
          </div>
        </div>
        <div class="col-md-3">
          <i class="bi bi-telephone" style="color: #4d2600;"></i>
          <strong style="color: #4d2600;"> 0353780187</strong>
        </div>
        <a href="#" class="col-md-1 account bigger-icon"><i class="bi bi-person-circle"></i></a>
        <a href="#" class="col-md-1 account bigger-icon"><i class="bi bi-bag-heart bigger-icon"></i></a>
        <!-- <div class="col-md-1">
          <button type="button" class="btn position-relative" style="padding-top: 0; color: #4d2600;">
            <i class="bi bi-bag-heart bigger-icon"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="margin-bottom: 0;">
              99+
              <span class="visually-hidden">items</span>
            </span>
          </button>
        </div> -->
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
                      <a class="nav-link active" aria-current="page" href="#">Trang Chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                        Sản Phẩm
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Bánh Sinh Nhật A</a></li>
                        <li><a class="dropdown-item" href="#">Bánh Sinh Nhật B</a></li>
                        <li><a class="dropdown-item" href="#">Bánh Sinh Nhật C</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Menu Page</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Liên Hệ</a>
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
</body>

</html>

<ul class="dropdown-menu">
  <?php
  while ($row = mysqli_fetch_assoc($$result)) {
  ?>
    <li><?php echo $row['name']; ?></li>
</ul>
<?php
  }
?>