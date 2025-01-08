$(document).on("click", ".detail", function () {
    
    document.querySelector('#form-update').setAttribute('action', `/finishing/` + $(this).data('id'));
  
    $("#edit-id").val( $(this).data('id') );
    $("#updateCustomer").val( $(this).data('customer') );
    $("#updateSock").val( $(this).data('sock') );
    $("#updateColor").val( $(this).data('color') );
    $("#updateAmount").val( $(this).data('amount') );
    $("#updateType").val( '1' );
    $("#updateEmploye").val( $(this).data('employe') );
    $("#updateFinishingType").val( $(this).data('finishing') );
    $("#updateDate").val( $(this).data('date') );
});

function addid(id){
    $("#inputId").val( id );
}