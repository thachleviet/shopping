var Product = {
    remove:function (obj , id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            icon: 'warning',
            buttons: true,
            successMode: true,
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',

        }).then(function(result) {
            if (result)
            {
                $.get(laroute.route('product.destroy', {id:id}), function(data) {
                    console.log(data);
                    swal(
                        'Deleted!',
                         data.option.messages,
                        'success'
                    );

                });

                $(obj).closest('tr').remove().draw();
                location.reload();
            }


        });
    },
    removeRows: function(obj)
    {
        $(obj).closest('.sortne').remove();
        this.balanceNo();
    },
    removeRow: function(obj)
    {

        $(obj).closest('.sortnes').remove();
        this.balanceNos();
    },
    balanceNos: function()
    {
        var i = 1;
        $('.sortnes').each(function() {
            $(this).find('.no').val(i++);
        });
    },
    balanceNo: function()
    {
        var i = 1;
        $('.sortne').each(function() {
            $(this).find('.no').val(i++);
        });
    },
    changeStatus:function (obj , id , action) {
        $.ajaxSetup(
        {
            headers:
                {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.post(laroute.route('product.change-status'), {id: id, action: action}, function (data) {
            window.location.reload();
        }, 'JSON');
    },

};

var table = $('#tb_product').DataTable( {
    responsive: true,
    columnDefs: [
        { "targets": [0], "searchable": false, "orderable": false, "visible": true }
    ]
} );
new $.fn.dataTable.FixedHeader( table );