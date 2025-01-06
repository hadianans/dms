$(document).on("click", ".detail", function () {

    document.querySelector('#form-update').setAttribute('action', `/color/` + $(this).data('id'));

    $("#edit-id").val( $(this).data('id') );
    $("#updateColor").val( $(this).data('color') );
});