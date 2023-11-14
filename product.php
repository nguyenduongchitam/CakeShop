<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="search_box.css">
    <title>product</title>
    <?php include("config.php")?>
    <?php
    $sql_pro = "SELECT * FROM Product,Category WHERE Product.category_id=Category.category_id ORDER BY Product.product_id DESC LIMIT 5";
    $query_pro = mysqli_query($mysqli,$sql_pro);   
?>
</head>
<body>
    <div>
        <div class="header">
            <div class="taskbar">
                <div id="square"><img src="image\bakery.avif" id="logo"></div>
                <div id="items">
                    <div class="box">
                        <input id ="search" type="text" placeholder="Search here"> 
                        <a><i class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                    <div id="user"><i class="fa-solid fa-user"></i></div>
                    <div id="shopping-cart"><i class="fa-solid fa-cart-shopping"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="category">
                <div>Trang chủ</div>
                <div>Menu</div>
                <div>Sự kiện</div>
                <div>About us</div>
                <div>Liên hệ</div>
            </div>
        </div>
    </div>
    <div class="main-product">
        <div id="product-properties">
            <?php
            $sql_product = "SELECT * FROM Product,Category WHERE Product.category_id = Category.category_id AND Product.product_id ='$_GET[id]' LIMIT 1";
            $query_detail = mysqli_query($mysqli,$sql_product);
            while($row_detail = mysqli_fetch_array($query_detail)){
            ?>
            <div id="product-picture">
                <img src="image\afc.jpg<?php echo $row_detail['thumnail']?>" id="product-picture-detail">
            </div>
            <form method="POST" action="themgiohang.php?product_id=<?php echo $row_detail['product_id']?>">
            <div id="product detail">
                    <h3><?php echo $row_detail['title']?></h3>
                    <p><?php echo $row_detail['product_id']?></p>
                    <div>
                        <span><?php echo number_format($row_detail['price'],0,',','.').'vnđ'?></span>
                        <span><?php echo number_format($row_detail['discount_price'],0,',','.').'vnđ'?></span>
                    </div>
                    <span>Số lượng:&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="buttons_added">
                    <button class="minus" onclick="handleMinus()"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                            </svg>
                    </button>
                    <input aria-label="quantity" class="input-qty" max="20" min="1" type="number" value="1" id="amount">
                    <button class="plus" onclick="handlePlus()"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                            </svg>
                    </button>
                    </span><br>
                    <p><button type="submit" value="Thêm giỏ hàng" class="themgiohang"></button></p>
                </div>
            </form>
            <?php
                }
            ?>
            <div class="clear"></div>
        </div>

        <div id="suggestion-product">
            <h4 style="text-align:center;text-transform:uppercase">sản phẩm liên quan</h4>
            <!-- <p>Danh mục sản phẩm: <?php echo $row_title['name'] ?></p> -->
            <ul class="suggestion-product-list">
                <?php
                    while($row_pro = mysqli_fetch_array($query_pro)){
                ?>
                <li>
                    <a href="index.php?">
                        <img src="CakeShop\Database\CakeShop.sql<?php echo $row_pro['thumbnail']?>">
                        <p class="title_product"><?php echo $row_pro['title'] ?></p>
                        <p class="price_product"><?php echo number_format($row_pro['price'],0,',','.').'vnd'?></p>
                    </a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="footer">
            <div id="detail"><img src="image\footer.png" id="footer-pic"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        let amountElement = document.getElementById('amount');
        let amount = amountElement.value;
        let render = (amount) =>{
            amountElement.value = amount
        }
        let handlePlus = () =>{
            amount++
            render(amount);
        }
        let handleMinus = () =>{
            if(amount > 1)
                amount--;
            render(amount);
        }
        amountElement.addEventListener('input', () => {
            amount = amountElement.value;
            amount = (amount==0)?1:amount;
            render(amount);
        });
    </script>

</body>
</html>