<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Card/Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
      />
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <section style="background-color: #fff7e6;">
        <div class="card-wrapper">
            <div class="card">
                <div class="product-imgs">
                <p style="color: #4d2600;"><a href="index.php?action=menupage&query=none" class="linkmenu">Menu</a> > [Ten banh] </p>
                    <div class="img-display" style="margin-top: 15px;">
                        <div class="img-magnifier-container">
                         <img src="images/2a.png" id="myimage">
                        </div>
                    </div>
             </div>
            
             <script>
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  /*create magnifier glass:*/
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");
  /*insert magnifier glass:*/
  img.parentElement.insertBefore(glass, img);
  /*set background properties for the magnifier glass:*/
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  /*execute a function when someone moves the magnifier glass over the image:*/
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /*prevent the magnifier glass from being positioned outside the image:*/
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /*set the position of the magnifier glass:*/
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>

             <script>
                magnify("myimage", 3);
             </script>

             <script>
            $(document).ready(function(){
            $('.img-select img').on('click', function(){
                var imagePath = $(this).attr('src');
                $('.img-display img').attr('src', imagePath);
            });

            $('.img-select').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: false,
                dots: false,
                centerMode: true,
                focusOnSelect: true
            });
        });
    </script>
                <div class="product-content">
                    <h2 class="product-title">Cake Sth</h2>

                    <div class="product-price">
                        <p class="last-price" style="color: #4d2600;">Giá Gốc: <span>100,000</span></p>
                        <p class="new-price" style="color: #4d2600;">Giá Khuyến Mãi: <span>69,000</span></p>
                    </div>

                    <div class="product-detail">
                        <h2> Thông tin sản phẩm: </h2>
                        <p> Thông tin bánh ở đây Thông tin bánh ở đây Thông tin bánh ở đây Thông tin bánh ở đây Thông tin bánh ở đây Thông tin bánh ở đây Thông tin bánh ở đây Thông tin bánh ở đây Thông tin bánh ở đây Thông tin bánh ở đây </p>
                    </div>

                    <div class="purchase-info">
                        <input type="number" min="0" value="1"><br>
                        <button type="button" class="btn"><b><ion-icon name="cart-outline"></ion-icon>
                            THÊM VÀO GIỎ </b>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <hr style="border: 1px dashed #B0A695; width: 50%; align-items:center; margin-left:auto; margin-right:auto;">
        <h1 class="title"> Sản Phẩm Liên Quan </h1>
        <div class="img-select">
                    <div class="col">
                        <div class="img-item">
                                <img src="../modules/images/2a.png" alt="pic" style="width: 200px; height: 200px;" >
                                </div>
                                <p style="text-align:center;">Banh ngot</p>
                       
                        </div>
                        <div class="col">
                        <div class="img-item">
                                <img src="../modules/images/2b.png" alt="pic" style="width: 200px; height: 200px;" >
                                </div>
                                <p >Banh ngot</p>
                       
                        </div>
                        <div class="col">
                        <div class="img-item">
                                <img src="../modules/images/2c.png" alt="pic" style="width: 200px; height: 200px;" >
                                </div>
                                <p >Banh ngot</p>
                       
                        </div>
                        <div class="col">
                        <div class="img-item">
                                <img src="../modules/images/2d.png" alt="pic" style="width: 200px; height: 200px;" >
                                </div>
                                <p >Banh ngot</p>
                       
                        </div>
                        <div class="col">
                        <div class="img-item">
                                <img src="../modules/images/2b.png" alt="pic" style="width: 200px; height: 200px;" >
                                </div>
                                <p >Banh ngot</p>
                       
                        </div>
          
                    </div>
         </div>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>   
    <script src="../modules/js/product.js"></script>      
    </section>

</body>


</html>