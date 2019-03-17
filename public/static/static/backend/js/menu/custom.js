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

        }).then(function(result) {
            if (result)
            {
                $.get(laroute.route('menu.destroy', {id:id}), function(data) {
                    console.log(data);
                    if(data.status){
                        swal(
                            'Deleted!',
                             data.option.messages,
                            'success'
                        );
                        $(obj).closest('tr').remove().draw();
                    }else{
                        swal(
                            'Deleted!',
                             data.option.messages,
                            'warning'
                        );
                    }

                });
            }
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
        $.post(laroute.route('menu.change-status'), {id: id, action: action}, function (data) {
            window.location.reload();
        }, 'JSON');
    },
};

var table = $('#tb_menu').DataTable( {
    responsive: true,
    columnDefs: [
        { "targets": [0], "searchable": false, "orderable": false, "visible": true }
    ]
} );
new $.fn.dataTable.FixedHeader( table );