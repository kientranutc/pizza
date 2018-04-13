$(document).ready(function() {
    var host = window.location.href;
    host = host.split('/');
    var url = host[0] + "//" + host[2] + "/";
    $('body').on('click','.rate-star-val', function (event) {
       var val = $(this).data('rate');
       var arr = val.split("_");
       var rate_number = arr[0];
       var product_id = arr[1];
        addRateStar(product_id, rate_number);

    });
    function  addRateStar(productId,rateNumber) {
        $.ajax({
            url:url+'rate-star',
            type : "get",
            data : {
                product_id:productId,
                rate_number:rateNumber
            },
            success: function(result){
                console.log(result);
            }
        });
    }

});