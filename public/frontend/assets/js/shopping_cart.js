$(document).ready(function() {
    var host = window.location.href;
    host = host.split('/');
    var url = host[0] + "//" + host[2] + "/";

    $('.add-cart').on('click', function (event) {
       event.preventDefault();
       var id = $(this).data('product');
        addCart(id);
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
});