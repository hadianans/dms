$(document).on("click", ".detail", function () {
    $("#edit-id").val( $(this).data('id') );
    $("#updateColor").val( $(this).data('color') );
});