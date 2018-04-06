$(function () {
    $('.input-image').on('click', function () {
        $("#imageModal").modal();
        $("#imageModal").on('hidden.bs.modal', function(e) {
            var image=$('#image-input').val();
            $('#show-image-add').show();
            $('#show-image-add>img').attr('src', image);
        });
    })
})