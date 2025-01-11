
$(document).ready(function() {
  var table = $('#order-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {url:"/dataorder"},
      columns: [
          { data: 'customer', name: 'customer' },
          { data: 'sock', name: 'sock' },
          { data: 'color', name: 'color' },
          { data: 'amount', name: 'amount', createdCell: function(td) { $(td).addClass('amount'); } },
          { data: 'deadline', name: 'deadline' },
          { data: 'production', name: 'production', createdCell: function(td) { $(td).addClass('amount'); } },
          { data: 'note', name: 'note' },
          { data: 'priority', name: 'priority' },
          { data: 'action', name: 'action' }
      ]
  });

  table.on('draw', function() {
    amountFormat();
});
});

// amountFormat();

$(document).on("click", ".detail", function () {
    
    document.querySelector('#form-update').setAttribute('action', `/order/` + $(this).data('id'));
  
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

function changePriority(id, priority, element){
  
  if (priority === 0) {
    // Ubah ke Urgen
    element.className = 'btn btn-danger priority';
    element.setAttribute('onclick', 'changePriority(' + id + ', 1, this)');
    element.innerText = 'Urgen';
  } else {
      // Ubah ke Normal
      element.className = 'btn btn-primary priority';
      element.setAttribute('onclick', 'changePriority(' + id + ', 0, this)');
      element.innerText = 'Normal';
  }

  $.ajax({
    url: '/change-priority',
    type: 'POST',
    data: {
      id        : id,
      priority  : priority,
      _token    : $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
        if (response.status === 'success') {
            console.log("priority change");
        } else {
            alert(response.message);
        }
    },
    error: function(xhr) {
        alert('Error: ' + xhr.responseText);
    }
  });

}

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

  function doneOrder(id, amount, production){

    const formDelete = document.querySelector('#form-order');
  
    if(production < amount){
      Swal.fire({
        icon: "warning",
        title: "Error",
        text: "Produksi belum memenuhi!"
      });
    }else{
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
    }
      
};