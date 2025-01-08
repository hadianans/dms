$(document).on("click", ".detail", function () {

    document.querySelector('#form-update').setAttribute('action', `/employe/` + $(this).data('id'));

    $("#edit-id").val( $(this).data('id') );
    $("#updateEmploye").val( $(this).data('employe') );
    $("#updatePhone").val("0" +  $(this).data('phone') );
    $("#updateRole").val( $(this).data('role') );
    $("#updateStatus").val( $(this).data('status') );
});