<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>trang khách hàng</title>
    <style>
        .aboutuspage{
    padding: 0;
    margin: 0;
    background-color: #fff7e6;
    box-sizing: border-box;
    font-family: 'Segoe UI';
}

.aboutuspage .head{
    background-color: #fff7e6;
    overflow: hidden;
}
.aboutuspage .heading h1{
    color: #ff6347;
    font-size: 55px;
    text-align: center;
    margin-top: 35px;
}

.aboutuspage .container{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 90%;
    margin: 65px auto;
}

.aboutuspage .content{
    flex: 1;
    width: 600px;
    margin: 0px 25px;
}
.aboutuspage .content h2{
    font-size: 38px;
    margin-bottom: 20px;
    color: #333;
}
.aboutuspage .content p{
    font-size: 24px;
    line-height: 1.5;
    margin-bottom: 40px;
    color: #666;
    animation: fadeInUp 2s ease;
}
.aboutuspage .image{
    flex: 1;
    width: 600px;
    margin: auto;
    animation: fadeInRight 2s ease;
}

.aboutuspage img{
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.aboutuspage hr {
    width: 100%;
    border: 4px solid transparent;
    border-image: repeating-linear-gradient(-45deg, rgb(248, 110, 124), rgb(247, 73, 99) 10px, transparent 10px, transparent 20px) 10;
    animation: wave-animation 2s linear infinite;
    margin-top: 50px;
  }

  .aboutuspage  .map{
    float: left;
    margin-top: 30px;
    margin-left: 150px;
    font-family: 'Segoe UI';
  }
  .aboutuspage .mp{
    color: #4d2600;
    font-size: 40px;
    margin-left: 60px;
}
.aboutuspage .maps{
    float: right;
    margin-left: 350px;
    height: 400px;
    width: 900px;
    margin-bottom: 40px;
}

@keyframes fadeInUp {
    0%{
        opacity: 0;
        transform: translateX(50px);
    }
    100%{
        opacity: 1;
        transform: translateX(0px);
    }
}
@keyframes fadeInRight {
    0%{
        opacity: 0;
        transform: translateY(-50px);
    }
    100%{
        opacity: 1;
        transform: translateY(0px);
    }
}
    </style>
    <head>
  <body>
</div>
  <div class="container">
    <div class="content">
      <h2>Welcome To Our Website</h2>
      <p><i>Chúng mình - những thợ làm bánh thủ công luôn cố gắng tôn trọng tính nguyên bản, tự nhiên và chân thật nhất của từng nguyên liệu. Để dù có những bất toàn trong mỗi thứ riêng rẽ nhưng sau cùng vẫn tạo nên một ổ bánh hài hòa và ngon nhất.</i></p>
      <p><i>Vậy nên, bất cứ khi nào bạn cần những hương vị mộc mạc, tinh tế nhưng chẳng kém phần hấp dẫn, hãy đến với chúng mình. Luôn có rất nhiều điều đặc biệt đợi bạn khám phá đó nhé!</i></p>
    </div>
    <div class="image">
      <img src="../modules/images/aboutus.webp" alt="img">
    </div>
  </div>
    <hr>
    <div class="map">
        <p class="mp">Bản Đồ</p>
        <p ><iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.231240416692!2d106.80047917465674!3d10.870008889284488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527587e9ad5bf%3A0xafa66f9c8be3c91!2sUniversity%20of%20Information%20Technology%20-%20VNUHCM!5e0!3m2!1sen!2s!4v1699713039627!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
    </div>
    </div>
  </body>
  </html>