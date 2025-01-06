$(document).on("click", ".detail", function () {

    document.querySelector('#form-update').setAttribute('action', `/sock/` + $(this).data('id'));

    $("#edit-id").val( $(this).data('id') );
    $("#updateSock").val( $(this).data('sock') );
});