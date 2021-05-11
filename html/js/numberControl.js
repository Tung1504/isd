$(function(){
    $('.btn-num-product-up').click(function (e) {
        var numProduct = Number($(this).prev().val()); // lấy giá trị của thàng truoc no va chuyen ve dang so
        $(this).prev().val(numProduct + 1); //tang gia tri thang input
    });
    $('.btn-num-product-down').click(function (e) {
        var numProduct = Number($(this).next().val());
        if (numProduct > 0) {
            $(this).next().val(numProduct - 1);
        }
    });
    $('.big-img').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.small-img'
    });
})