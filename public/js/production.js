var max = 0;

function addid(id, order, production){
    $("#inputId").val( id );
    max = order - production;

    $("#inputType").val( null );
}

function tes(type){
    const amount = document.querySelector('#inputAmount');

    if(type.value == 0){
        amount.setAttribute('max', Math.floor(max/12));
    } else{
        amount.setAttribute('max', max);
    }
}