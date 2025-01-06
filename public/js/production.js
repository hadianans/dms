var inputmax = 0, updatemax = 0;

function addid(id, order, production){
    $("#inputId").val( id );
    inputmax = order - production;

    $("#inputType").val( null );
}

function inputselect(type){
    const amount = document.querySelector('#inputAmount');
    if(type.value == 0){
        amount.setAttribute('max', Math.floor(inputmax/12));
    } else{
        amount.setAttribute('max', inputmax);
    }
}

$(document).on("click", ".detail", function () {

    document.querySelector('#form-update').setAttribute('action', `/production/` + $(this).data('id'));
    
    $("#edit-id").val( $(this).data('id') );
    $("#updateCustomer").val( $(this).data('customer') );
    $("#updateSock").val( $(this).data('sock') );
    $("#updateColor").val( $(this).data('color') );
    $("#updateAmount").val( $(this).data('amount') );
    $("#updateType").val( '1' );
    $("#updateShift").val( $(this).data('shift') );
    $("#updateDate").val( $(this).data('date') );

    updatemax = $(this).data('order') - $(this).data('production') + $(this).data('amount');

    document.querySelector('#updateAmount').setAttribute('max', updatemax);
});

function updateselect(type){
    const amount = document.querySelector('#updateAmount');
    if(type.value == 0){
        amount.setAttribute('max', Math.floor(updatemax/12));
    } else{
        amount.setAttribute('max', updatemax);
    }
}