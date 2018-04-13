$(document).ready(function() {
    var host = window.location.href;
    host = host.split('/');
    var url = host[0] + "//" + host[2] + "/";
    //add cart
    $('.add-cart').on('click', function (event) {
       event.preventDefault();
       var id = $(this).data('product');
        addCart(id);
    });
    //update cart
    $('body').on('click', '.qty-update', function (event) {
        var id = $(this).data('cart');
        var qty = $(this).val();

        updateCart(id, qty);
    });

    //delete cart
    $('body').on('click', '.delete-cart', function (event) {
        event.preventDefault();
        var id = $(this).data('id');
        deleteCart(id)
    });


    function  addCart(id) {
        $.ajax({
            url:url+'shopping/add-cart',
            type : "get",
            data : {
                id:id,
            },
            success: function(result){
               $('.cart').load(' .cart');
               $('#notification-add-cart').modal('show');
            }
        });
    }

    function  updateCart(id, qty) {
        $.ajax({
            url:url+'shopping/update-cart',
            type : "get",
            data : {
                id:id,
                qty:qty
            },
            success: function(result){
                $('.cart').load(' .cart');
                $('.reload-order').load(' .reload-order');
            },
            error: function (error) {

              console.log(error);
            }
        });
    }
    function  deleteCart(id) {
        $.ajax({
            url:url+'shopping/delete-cart',
            type : "get",
            data : {
                id:id
            },
            success: function(result){
                $('.cart').load(' .cart');
                $('.reload-order').load(' .reload-order');
                if (result == 1){
                    location.reload();
                }
            },
            error: function (error) {

                console.log(error);
            }
        });
    }
});