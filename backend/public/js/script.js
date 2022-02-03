$(function(){
    $('input[name=checkout]').click(function(event) {
        window.location.href="index.php?c=cart&a=checkout";
    });
    
    $(".cart-body .cart-body-product .delete").click(function (e) { 
        e.preventDefault();
        var product_id = $(".cart-body-product .id").attr("value");
        $.ajax({
            type: "GET",
            url: "index.php?c=cart&a=delete",
            data: {product_id: product_id},
            success: function (data) {
                $(".cart-body .cart-body-product").html(data)
            }
        });

    });
    //Thêm sp vào giỏ hàng
    $(".box-detail-product .buy").click(function (e) { 
        e.preventDefault();
        var param = new URLSearchParams(window.location.search);
        var product_id = param.get("id");
        $.ajax({
            type: "GET",
            url: "index.php?c=cart&a=add",
            data: {product_id: product_id, qty: 1},
            success: function (data) {
                $(".cart-modal").modal("show");
            }
        });
        
    });
    jQuery.validator.addMethod("regexMobile", function(value, regex) {
        return /^0([0-9]{9,9})$/.test(value);
    });
    jQuery.validator.addMethod("regexPassword", function(value) {
        return /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(value);
    });
      
      
    $(".form-register").validate({
        rules: {
            fullname: {
                required: true,
                minlength: 6,
            },
            mobile: {
                required: true,
                regexMobile: true,
            },
            email: {
                required: true,
                // email: true,
                remote: "/project/mobile/backend/index.php?c=register&a=existingEmail"
            },
            password: {
                required: true,
                regexPassword: true,
            },
            password_confirmation: {
                required: true,
                equalTo: "[name=password]",
            },
        },
        messages: {
            fullname: {
                required: "Vui lòng nhập họ và tên",
                minlength: "Vui lòng nhập ít nhất 6 ký tự",
            },
            mobile: {
                required: "Vui lòng nhập số điện thoại",
                regexMobile: "Vui lòng nhập 10 con số bắt đầu là 0",
            },
            email: {
                required: "Vui lòng nhập email",
                // email: "Vui lòng nhập đúng định dạng email. vd: a@gmail.com",
                remote: "Email đã tồn tại"
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
                regexPassword:"Mật khẩu ít nhất 8 ký tự, bao gồm chữ và số ",
            },
            password_confirmation: {
            required: "Vui lòng nhập lại mật khẩu",
            equalTo: "Mật khẩu không trùng khớp",
            },
        },
        
    });

    $(".form-comment").submit(function (e) { 
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "index.php?c=product&a=comments",
            data: data,
            success: function (response) {
                $(".list-comment").html(response);
                $(".box-comment .list-comment .comment-item .answered-star-rating").rating({
                    stars: "5",
                    min: 0, 
                    max: 5, 
                    size: "xs",
                    step: 1,
                    theme: 'krajee-fa',
                    filledStar: '<i class="fas fa-star"></i>', 
                    emptyStar: '<i class="fas fa-star"></i>',
                    showClear: false,
                    showCaption: false,
                    hoverEnabled: false,
                });
            }
        });
    });
    
    $(".login-user").click(function (){
        $('.menu-account').toggle();
    })

    // Hiện ẩn form đăng nhập/đăng kí
    $(".user").click(function (){
        $('#modal-login').modal("show");
    })
    $(".btn-register").click(function (){
        $('#modal-login').modal("hide");
        $('#modal-register').modal("show");
    })
    $(".btn-forgot-password").click(function (){
        $('#modal-login').modal("hide");
        $('#modal-forgot-password').modal("show");
    })

    // Đổi giá trị thành stars
    $(".box-common .item .star-rating").rating({
        stars: "5",
        min: 0, 
        max: 5, 
        size: "xs",
        step: 1,
        theme: 'krajee-fa',
        filledStar: '<i class="fas fa-star"></i>', 
        emptyStar: '<i class="fas fa-star"></i>',
        showClear: false,
        showCaption: false,
        hoverEnabled: false,
    });
    $(".box-comment .form-group .star-rating").rating({
        stars: "5",
        min: 0, 
        max: 5, 
        size: "xs",
        step: 1,
        theme: 'krajee-fa',
        filledStar: '<i class="fas fa-star"></i>', 
        emptyStar: '<i class="fas fa-star"></i>',
        showClear: false,
        showCaption: false,
    });
    $(".box-comment .list-comment .comment-item .answered-star-rating").rating({
        stars: "5",
        min: 0, 
        max: 5, 
        size: "xs",
        step: 1,
        theme: 'krajee-fa',
        filledStar: '<i class="fas fa-star"></i>', 
        emptyStar: '<i class="fas fa-star"></i>',
        showClear: false,
        showCaption: false,
        hoverEnabled: false,
    });
    
})

function goToPage(page) {
    var str_param = getUpdatedParam("page", page);
    window.location.href = "index.php?" + str_param;
}

function getUpdatedParam(k, v) {

    var param = new URLSearchParams(window.location.search);
    param.set(k, v);
    var str_param = param.toString();
    return str_param;
}

