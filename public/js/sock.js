$(document).on("click", ".detail", function () {
    $("#edit-id").val( $(this).data('id') );
    $("#updateSock").val( $(this).data('sock') );
});