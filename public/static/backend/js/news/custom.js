var New = {

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
                $.get(laroute.route('new.destroy', {id:id}), function() {
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
        $.ajaxSetup(
            {
                headers:
                    {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }
            });
        $.post(laroute.route('new.change-status'), {id: id, action: action}, function (data) {
            window.location.reload();
        }, 'JSON');
    },

};
