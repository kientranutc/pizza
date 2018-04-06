$(function () {
    $(".delete-view").click(function (event) {
        event.preventDefault();
        var hrefDelete = $(this).attr('href');
        $('#btn-modal-delete').attr('href', hrefDelete);
        $('#deleteModal').modal();
    });
});