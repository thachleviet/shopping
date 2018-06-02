var Roles = {
    remove:function (obj, id) {
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
                $.get(laroute.route('role.destroy-roles',{id: id}), function (data) {
                    if(data.status){
                        swal(
                            'Deleted!',
                             data.status,
                            'success'
                        );
                        $(obj).closest('tr').remove();
                    }
                });
            }
        });
    }
};