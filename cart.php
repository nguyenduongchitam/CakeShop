<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <!-- Link CSS của Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .product-row {
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }

        .product-row:last-child {
            border-bottom: none;
        }

        .product-name {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Giỏ hàng</h1>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="cartTable">
                                <div class="media-line-item line-item" data-line="1" data-variant-id="73" data-product-id="73">
                                           <div class="media-left">
                                              <div class="item-img">
                                                 <a href="/banh-xop-fullo-vani-sua-fullo-stick-wafer-vanilla-milk--73.html">
                                                 <img src="https://hinhanh.webvua.com/images/item/4807/resize/7373392361004.png" alt="Bánh xốp Fullo Vani Sữa (Fullo Stick Wafer Vanilla Milk)">
                                                 </a>
                                              </div>
                                              <div class="item-remove">
                                                 <a style="padding: 0 !important;" href="javascript:void(0)" onclick="if(confirm('Bạn muốn xóa ?')){ document.querySelector('.loading-overlay').style.display = 'block'; delCart(73); }return false;" class="cart">Xóa</a>
                                              </div>
                                           </div>
                                           <div class="media-right">
                                              <div class="item-info">
                                                 <h3 class="item--title"><a href="/banh-xop-fullo-vani-sua-fullo-stick-wafer-vanilla-milk--73.html">Bánh xốp Fullo Vani Sữa (Fullo Stick Wafer Vanilla Milk)</a></h3>
                                              </div>
                                              <div class="item-price">
                                                                                                  <p>
                                                      <span>5,000 ₫</span>
                                                   </p>
                                                                                         
                                              </div>
                                           </div>
                                           <div class="media-total">
                                              <div class="item-total-price">
                                                 <div class="price">
                                                    <span class="line-item-total">5,000₫</span>
                                                 </div>
                                              </div>
                                              <div class="item-qty">
                                                 <div class="qty quantity-partent qty-click clearfix">
                                                    <button onclick="prevquality('updates_73', 73)" type="button" class="qtyminus qty-btn">
                                                       <svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0">
                                                          <polygon points="4.5 4.5 3.5 4.5 0 4.5 0 5.5 3.5 5.5 4.5 5.5 10 5.5 10 4.5"></polygon>
                                                       </svg>
                                                    </button>
                                                    <input type="text" size="4" style="min-height: 29px !important;" name="updates[]" min="1" oriprice="25000" line="1" productid="pro73" id="updates_73" data-price="5000" value="1" readonly="" class="tc line-item-qty item-quantity">
                                                    <button type="button" class="qtyplus qty-btn" onclick="nextquality('updates_73', 73)">
                                                       <svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0">
                                                          <polygon points="10 4.5 5.5 4.5 5.5 0 4.5 0 4.5 4.5 0 4.5 0 5.5 4.5 5.5 4.5 10 5.5 10 5.5 5.5 10 5.5"></polygon>
                                                       </svg>
                                                    </button>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tổng cộng</h5>
                        <div class="cart-summary">
                            <p>Tổng số lượng: <span id="totalQuantity">0</span></p>
                            <p>Tổng tiền: <span id="totalAmount">0</span></p>
                        </div>
                        <button class="btn btn-primary btn-block" id="clearCartBtn">Xóa giỏ hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Link JavaScript của Bootstrap và jQuery -->
    
</body>

</html>