$(document).ready(function() {
    var host = window.location.href;
    host = host.split('/');
    var url = host[0] + "//" + host[2] + "/";
    $('body').on('click', '#btn-comment', function () {
        var user_id = $('input[name="user_id"]').val();
        if (user_id!='') {
            $('#form-comment').submit();
        } else {
            alert('Bạn phải đăng nhập');
        }
    })
});