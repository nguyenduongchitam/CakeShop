<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>

<!-- Giỏ hàng -->
<div id="cart">
    <!-- Danh sách sản phẩm -->
    <ul id="product-list">
        <li data-price="100">Product 1</li>
        <li data-price="50">Product 2</li>
        <!-- Thêm các sản phẩm khác nếu cần -->
    </ul>

    <!-- Phí vận chuyển -->
    <label for="shipping">Chọn phí vận chuyển:</label>
    <select id="shipping" onchange="updateTotal()">
        <option value="0">Miễn phí</option>
        <option value="10">Phí vận chuyển: $10</option>
        <option value="20">Phí vận chuyển: $20</option>
        <!-- Thêm các tùy chọn vận chuyển khác nếu cần -->
    </select>

    <!-- Tổng tiền cuối cùng -->
    <div id="total">Tổng tiền: $0</div>
</div>

<script>
    // Hàm cập nhật tổng tiền cuối cùng
    function updateTotal() {
        // Lấy giá của sản phẩm
        var productPrice = 0;
        var productList = document.getElementById('product-list').getElementsByTagName('li');
        for (var i = 0; i < productList.length; i++) {
            productPrice += parseFloat(productList[i].getAttribute('data-price'));
        }

        // Lấy phí vận chuyển
        var shippingFee = parseFloat(document.getElementById('shipping').value);

        // Tính tổng tiền cuối cùng
        var totalPrice = productPrice + shippingFee;

        // Hiển thị tổng tiền cuối cùng
        document.getElementById('total').innerHTML = 'Tổng tiền: $' + totalPrice.toFixed(2);
    }

    // Gọi hàm cập nhật tổng tiền lần đầu tiên để hiển thị giá trị mặc định
    updateTotal();
</script>

</body>
</html>
