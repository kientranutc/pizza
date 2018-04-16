$(document).ready(function() {
    var host = window.location.href;
    host = host.split('/');
    var url = host[0] + "//" + host[2] + "/";
    $('body').on('click', '#show-modal-login', function (event) {
        event.preventDefault();
        $('#modalLogin').modal('show');
    });
});