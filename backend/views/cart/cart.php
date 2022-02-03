<?php require "views/layout/header.php"?>
<section>
    <div class="cart-header container-fluid">
        <h3 class="title ">Giỏ hàng</h3>
    </div>
    <div class="cart-body container-fluid">
        <div class="row cart-body-title">
            <div class="col-md-1">
            </div>
            <div class="col-md-3">
                <div class="header">
                    Sản phẩm
                </div>
            </div>
            <div class="col-md-2">
                <div class="header">
                    Đơn giá
                </div>
            </div>
            <div class=" col-md-2">
                <div class="header">
                    Số lượng
                </div>
            </div>
            <div class="col-md-3">
                <div class="header">
                    Thành tiền
                </div>
            </div>
            <div class="col-md-1">
            </div>
        </div>
        <div class="row cart-body-product">
        <?php require "views/cart/cartItems.php" ?>
        </div>
    </div>
    

</section>

<?php require "views/layout/footer.php"?>

