
// when click 
//$(".singleProduct").click(function () {
$('body').on('click', '.singleProduct', function () {
    // collect data
    var value = $('.quantity-section input');
    var values = [];
    value.each(function () {
        values.push($(this).attr("name"));
    });
    var obj = $.extend({}, values);
    var json = JSON.stringify(obj);
    console.log(obj);
    console.log("bbb");
    var id = $(this).data("id");
    var product = {id: id, value: json};
//    alert(id);
    // call ajax
    $.ajax({
        url: "../controller/ProductDetails.php",
        type: "GET",
        // sent data object to server
        data: product,

        success: function (data) {
//            alert(data);
            $(".order_products_table").append(data);
            var sum = 0;
            $('body').parents().find('.single-item-price').each(function (i, e) {
                var v = parseInt($(e).val());
                if (!isNaN(v))
                    sum += v;

            });
            $('body').parents().find("#totalPrice").find('input').val(sum);
            $('body').parents().find("#totalPrice").find('span').text(sum);

        }
    });

});

$("#orderUser").change(function () {

    var value = $(this).val();
    console.log(value);
    var product = {selectValue: value};
//    alert(id);
    // call ajax
    $.ajax({
        url: "../controller/userRoomDetails.php",
        type: "GET",
        // sent data object to server
        data: product,

        success: function (data) {
            
            console.log(data);
            $("#roomOfUser").val(data);
        }
    });

});

$('body').on('click', '.deleteItem', function () {
    $(this).parents('tr').remove();
});
$('body').on('click', '.plus', function () {
    $(this).parent().find('input').val(parseInt($(this).parent().find('input').val()) + 1);
    $(this).parent().siblings('.itemTotal').find('span').html(parseInt($(this).parent().find('input').val()) * parseInt($(this).parent().siblings('.itemPrice').find('span').text()));
    $(this).parent().siblings('.itemTotal').find('input').val(parseInt($(this).parent().find('input').val()) * parseInt($(this).parent().siblings('.itemPrice').find('span').text()));
    var sum = 0;
    $(this).parents().find('.single-item-price').each(function (i, e) {
        var v = parseInt($(e).val());
        if (!isNaN(v))
            sum += v;

    });
    $(this).parents().find("#totalPrice").find('input').val(sum);
    $(this).parents().find("#totalPrice").find('span').text(sum);
});
$('body').on('click', '.minus', function () {
    if (parseInt($(this).parent().find('input').val()) > 1)
    {
        $(this).parent().find('input').val(parseInt($(this).parent().find('input').val()) - 1);
        $(this).parent().siblings('.itemTotal').find('span').html(parseInt($(this).parent().find('input').val()) * parseInt($(this).parent().siblings('.itemPrice').find('span').text()));
        $(this).parent().siblings('.itemTotal').find('input').val(parseInt($(this).parent().find('input').val()) * parseInt($(this).parent().siblings('.itemPrice').find('span').text()));
        var sum = 0;
        $(this).parents().find('.single-item-price').each(function (i, e) {
            var v = parseInt($(e).val());
            if (!isNaN(v))
                sum += v;

        });
        $(this).parents().find("#totalPrice").find('input').val(sum);
        $(this).parents().find("#totalPrice").find('span').text(sum);
    }
});
$('body').on('blur', '.quantity-input', function () {
//    alert("jjj");
    if (parseInt($(this).val()) > 1)
    {
//        alert("jjj");
        $(this).parent().siblings('.itemTotal').find('span').html(parseInt($(this).val()) * parseInt($(this).parent().siblings('.itemPrice').find('span').text()));
        $(this).parent().siblings('.itemTotal').find('input').val(parseInt($(this).val()) * parseInt($(this).parent().siblings('.itemPrice').find('span').text()));
        var sum = 0;
        $(this).parents().find('.single-item-price').each(function (i, e) {
            var v = parseInt($(e).val());
            if (!isNaN(v))
                sum += v;

        });
        $(this).parents().find("#totalPrice").find('input').val(sum);
        $(this).parents().find("#totalPrice").find('span').text(sum);
    }
});
$("[type='number']").keypress(function (e) {
    e.preventDefault();
});

$('#product_search').on('keyup', function () {
    var value = $("#product_search").val();
//    alert(value);
    var product = {selectValue: value};
    $.ajax({
        type: 'POST',
        url: "../controller/productSearch.php",
        data:product,
        success: function (msg) {
            var obj = JSON.parse(msg);
            console.log();
            console.log(obj.flag);
            if (obj.flag == 0)
            {
                $(".seacrch_clients").html(obj.view);
                $(".orginal-search").css("display", "none");
            }
            else if (obj.flag == 1)
            {
                $(".orginal-search").css("display", "block");
                $(".seacrch_clients").html("");

            }
        }
    });
});


