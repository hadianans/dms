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

  });