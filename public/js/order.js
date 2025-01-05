$(document).on("click", ".detail", function () {
    $("#edit-id").val( $(this).data('id') );
    $("#updateCustomer").val( $(this).data('customer') );
    $("#updateSock").val( $(this).data('sock') );
    $("#updateColor").val( $(this).data('color') );
    $("#updateSize").val( $(this).data('size') );
    $("#updateAmount").val( $(this).data('amount') );
    $("#updateType").val( '1' );
    $("#updatePrice").val( $(this).data('price') );
    $("#updateDeadline").val( $(this).data('deadline') );
    $("#updateNote").val( $(this).data('note') );
});

function resetIfInvalid(el){
    //just for beeing sure that nothing is done if no value selected
    if (el.value == "")
        return;
    var options = el.list.options;
    for (var i = 0; i< options.length; i++) {
        if (el.value == options[i].value)
            //option matches: work is done
            return;
    }
    //no match was found: reset the value
    el.value = "";
 }

 function oneDot(input) {
    var value = input.value,
        value = value.split('.').join('');

    if (value.length > 3) {
      value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    input.value = value;
  }

  function doneOrder(id){

    const formDelete = document.querySelector('#form-order');
  
    Swal.fire({
        title: "Order is done?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, done it!"
      }).then((result) => {
        if (result.isConfirmed) {
            formDelete.setAttribute('action', `/order/` + id + `/edit`);
            formDelete.submit();
            return;
        }
      });
      
};