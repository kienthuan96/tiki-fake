<?php require "views/layout/header.php"?>
    <main id="maincontent" class="page-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="/" target="_self">Giỏ hàng</a></li>
                        <li><span>/</span></li>
                        <li class="active"><span>Thông tin giao hàng</span></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="ship-checkout col-md-6">
                    <h4>Thông tin giao hàng</h4>
                    <div>Bạn đã có tài khoản? <a href="javascript:void(0)" class="btn-login">Đăng Nhập  </a></div>
                    <br>
                    <form action="thanh-toan.html" method="POST">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" value="Nguyễn Văn Nam" class="form-control" name="fullname" placeholder="Họ và tên" required="" oninvalid="this.setCustomValidity('Vui lòng nhập tên của bạn')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="tel" value="0932538468" class="form-control" name="mobile" placeholder="Số điện thoại" required="" pattern="[0][0-9]{9,}" oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại bắt đầu bằng số 0 và ít nhất 9 con số theo sau')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group col-sm-4">
                                <select name="province" class="form-control province" required="" oninvalid="this.setCustomValidity('Vui lòng chọn Tỉnh / thành phố')" oninput="this.setCustomValidity('')">
                                    <option value="">Tỉnh / thành phố</option>
                                    <option value="01">Thành phố Hà Nội</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <select name="district" class="form-control district" required="" oninvalid="this.setCustomValidity('Vui lòng chọn Quận / huyện')" oninput="this.setCustomValidity('')">
                                    <option value="">Quận / huyện</option>
                                    <option value="785"> Huyện Bình Chánh</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <select name="ward" class="form-control ward" required="" oninvalid="this.setCustomValidity('Vui lòng chọn Phường / xã')" oninput="this.setCustomValidity('')">
                                    <option value="">Phường / xã</option>
                                    <option value="27037"> Phường Hiệp Tân</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <input type="text" value="278 Hòa Bình" class="form-control" placeholder="Địa chỉ" name="address" required="" oninvalid="this.setCustomValidity('Vui lòng nhập địa chỉ bao gồm số nhà, tên đường')" oninput="this.setCustomValidity('')">
                            </div>
                        </div>
                        <h4>Phương thức thanh toán</h4>
                        <div class="form-group">
                            <label> <input type="radio" name="payment_method" checked="" value="0"> Thanh toán khi giao hàng (COD) </label>
                            <div></div>
                        </div>
                        <div class="form-group">
                            <label> <input type="radio" name="payment_method" value="1"> Chuyển khoản qua ngân hàng </label>
                            <div class="bank-info">STK: 0421003707901<br>Chủ TK: Nguyễn Hữu Lộc. Ngân hàng: Vietcombank TP.HCM <br>
                                Ghi chú chuyển khoản là tên và chụp hình gửi lại cho shop dễ kiểm tra ạ
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary pull-right">Hoàn tất đơn hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php require "views/layout/header.php"?>