var Transaction  = {
    confirmOrder : function (obj, id) {
        $(obj).closest('tr').addClass('label-warning text-danger');

        swal({
            title: 'Xác nhận đơn hàng ?',
            text: "Bạn có chắc xác nhận đơn hàng !",
            type: 'warning',
            icon: 'warning',
            buttons: true,
            successMode: true,
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            onClose: function()
            {
                $(obj).closest('tr').removeClass('label-warning');

            }
        }).then(function(result) {
            if (result)
            {
                $.get(laroute.route('transaction.confirm-order', {id:id}), function(data) {
                    swal(
                        'Xác nhận đơn đặt hàng !',
                        data.messages,
                        'success'
                    );
                    window.location.href  = laroute.route(data.data.route)
                });
            }
        });
    },
    confirmOrder2 : function (obj, id) {


        swal({
            title: 'Xác nhận đơn hàng ?',
            text: "Bạn có chắc xác nhận đơn hàng !",
            type: 'warning',
            icon: 'warning',
            buttons: true,
            successMode: true,
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',

        }).then(function(result) {
            if (result)
            {
                $.get(laroute.route('transaction.confirm-order', {id:id}), function(data) {
                    swal(
                        'Xác nhận đơn đặt hàng !',
                        data.messages,
                        'success'
                    );
                    window.location.reload() ;
                });
            }
        });
    }
};