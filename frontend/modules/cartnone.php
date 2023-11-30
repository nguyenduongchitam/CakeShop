<div class="cartnone">
    <div class="container">
        <div>
            <img  class="imagee" src="../modules/images/cart-empty.png" alt="img">
        </div>
        <div>
            <p  class="ifmt">Giỏ hàng không có gì cả!!!</p>
            <p  class="ifmt1"><i>Bạn cần ít nhất 1 sản phẩm trong giỏ hàng</i></p>
        </div>
        <div>
            <button  class="but" onclick="redirectToMenuPage()">Quay lại Trang sản phẩm</button>
        </div>
    </div>
</div>
<script>
function redirectToMenuPage() {
  window.location.href = "index.php?action=menupage&query=none";
}
</script>
