$(document).on("click", ".detail", function () {

    document.querySelector('#form-update').setAttribute('action', `/customer/` + $(this).data('id'));

    $("#edit-id").val( $(this).data('id') );
    $("#updateName").val( $(this).data('name') );
    $("#updateEmail").val( $(this).data('email') );
    $("#updatePhone").val("0" + $(this).data('phone') );
    $("#updateAddress").val( $(this).data('address') );
});