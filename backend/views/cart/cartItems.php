<?php foreach ($items as $id => $item):
        ?>
        
            <div class="id" type="hidden" value="<?=$item["product_id"]?>"></div>
            <div class="col-md-1 item_product">
                <img src="public/images/product/<?=$item["img"]?>" alt="">
            </div>
            <div class="col-md-3 item_product">
                <div class="item">
                    <?=$item["name"]?>
                </div>
            </div>
            <div class="col-md-2 item_product">
                <div class="item">
                    <?=$item["unit_price"]?>
                </div>
            </div>
            <div class=" col-md-2 item_product">
                <div class="item">
                    <?=$item["qty"]?>
                </div>
            </div>
            <div class="col-md-2 item_product">
                <div class="item">
                    <?=number_format($item["total_price"])?> đ
                </div>
            </div>
            <div class="col-md-2 item_product ">
                <a class="btn btn-sm btn-dark delete">Hủy</a>
            </div>
        
        <?php endforeach ?>
        <div class="cart-footer container-fluid">
        <div class="row">
            <div class="col-md-12">
            <p>
                <span>Tổng tiền</span>
                <span class="price-total"><?=number_format($cartItems["total_price"])?> đ</span>
            </p>
            <input type="button" name="checkout" class="btn btn-primary" value="Đặt hàng">

            </div>
        </div>
    </div>