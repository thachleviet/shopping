var User = {

    changeStatus:function (obj , id ) {
        swal({
            title: 'Are you sure?',
            text: ($(obj).attr('data-widget')=='approved')? "Bạn có chắc muốn vô hiệu hóa người dùng này " : "Bạn có chắc muốn cho user này hoạt động lại",
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
            if (result) {
                $.ajaxSetup(
                    {
                        headers:
                            {
                                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                            }
                    });
                $.post(laroute.route('user-admin.change-status'), {id: id, confirmed: $(obj).attr('data-widget')}, function (data) {
                    // $('#autotable').PioTable('refresh');
                    if (data.status) {
                        toastr.success(data.messages);
                        if(data.confirmed ==='approved'){
                            $(obj).removeClass('label-success').addClass('label-danger').attr('data-widget','cancel').html("Đã hủy")
                        }else{
                            $(obj).removeClass('label-danger').addClass('label-success').attr('data-widget','approved').html("Đang hoạt động")
                        }

                    } else {
                        toastr.warning(data.messages);
                    }
                }, 'JSON');
            }
        });
    }
};
