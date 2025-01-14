$(document).ready(function() {
    var table = $('#history-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {url:"/datahistory"},
        columns: [
            { data: 'customer', name: 'customer' },
            { data: 'sock', name: 'sock' },
            { data: 'color', name: 'color' },
            { data: 'size', name: 'size' },
            { data: 'amount', name: 'amount', createdCell: function(td) { $(td).addClass('amount'); } },
            { data: 'price', name: 'price' },
            { data: 'done', name: 'done' },
            { data: 'note', name: 'note' },
        ]
    });
    
    table.on('draw', function() {
      amountFormat();
    });

    table.on('responsive-display', function(e, datatable, row, showHide) {
      if(showHide == true){
        var $amount = row.child().find('li[data-dt-column="4"] .dtr-data');
        $amount.addClass('amount-responsive');
        amountResposiveFormat();
      }
    });

  });