<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Product Detail Page</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <style>
        .product-images {
            width: 400px;
            margin-bottom: 20px;
        }
        .product-images .main-image img {
            width: 100%;
            height: auto;
        }
        .product-images .thumbnail-images img {
            width: 100px;
            height: auto;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="product-images">
        <div class="main-image">
            <img src="path_to_main_image.jpg" alt="Main Image">
        </div>
        <div class="thumbnail-images">
            <img src="path_to_image1.jpg" alt="Image 1">
            <img src="path_to_image2.jpg" alt="Image 2">
            <img src="path_to_image3.jpg" alt="Image 3">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.thumbnail-images img').on('click', function(){
                var imagePath = $(this).attr('src');
                $('.main-image img').attr('src', imagePath);
            });

            $('.thumbnail-images').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: false,
                dots: false,
                centerMode: true,
                focusOnSelect: true
            });
        });
    </script>
</body>
</html>