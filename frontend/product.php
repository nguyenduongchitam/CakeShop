<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Card/Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../frontend/css/product.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body>
    <section style="background: bisque;">
        <div class="card-wrapper">
            <div class="card">
                <div class="product-imgs">
                    <div class="img-select">
                        <div class="img-item">
                            <img src="../frontend/modules/homepage/2e.png">
                        </div>
                    </div>
                </div>
                <div class="product-content">
                    <h2 class="product-title">Cake Sth</h2>

                    <div class="product-price">
                        <p class="last-price" style="color: #4d2600;">Giá Gốc: <span>$$$$$$</span></p>
                        <p class="new-price" style="color: #4d2600;">Giá Khuyến Mãi: <span>$$$$$$</span></p>
                    </div>

                    <div class="product-detail">
                        <h2> Thông tin sản phẩm: </h2>
                        <p> Thông tin bánh ở đây </p>
                    </div>

                    <div class="purchase-info">
                        <input type="number" min="0" value="1">
                        <button type="button" class="btn">
                            Thêm vào giỏ <i class="bi bi-basket2 account bigger-icon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>