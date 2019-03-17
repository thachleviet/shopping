var Menu = {

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
            onClose: function()
            {
                $(obj).closest('tr').removeClass('label-warning');
                $("input[name=quantity]").removeClass('text-danger');
            }
        }).then(function(result) {
            if (result)
            {
                $.get(laroute.route('category.delete', {id:id}), function() {
                    swal(
                        'Deleted!',
                        'Your selected Item has been deleted.',
                        'success'
                    );
                    $(obj).closest('tr').remove();

                });
            }
        });
    },

    changeStatus:function (obj , id , action) {
        $.post(laroute.route('customer-group.change-status'), {id: id, action: action}, function (data) {
            // $('#autotable').PioTable('refresh');
        }, 'JSON');
    },

};

var table = $('#tb_slide').DataTable( {
    responsive: true,
    columnDefs: [
        { "targets": [0], "searchable": false, "orderable": false, "visible": true }
    ]
} );
new $.fn.dataTable.FixedHeader( table );