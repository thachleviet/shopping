var Slide = {
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
                $.get(laroute.route('slide.destroy', {id:id}), function(data) {

                    window.location.reload();

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
        $.post(laroute.route('slide.change-status'), {id: id, action: action}, function (data) {
            window.location.reload();
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