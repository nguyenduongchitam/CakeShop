$(document).ready(function(){
    $('.img-select').slick({
        infinite: true,
        slidesToShow: 4,
        autoplay: true,
        autoplaySpeed: 3000,
        prevArrow:`<button type='button' class='slick-prev pull-left'><ion-icon name="chevron-back-outline"></ion-icon></button>`,
        nextArrow:`<button type='button' class='slick-next pull-right'><ion-icon name="chevron-forward-outline"></ion-icon></button>`,
    });
  });