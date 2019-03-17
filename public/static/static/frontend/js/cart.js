var Cart = {

    addCart:function (product_id, product_name ,qty,product_price, product_image){

        $.ajaxSetup(
            {
                headers:
                    {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }
            });
        let  total_money = $('#simpleCart_total').html();
        $.post(laroute.route('cart.add'),{product_id:product_id, product_name:product_name, qty:qty, product_price:product_price, product_image}, function (data) {
            if(data.status === 1){
                $('#simpleCart_total').empty().html(data.total);
                $('#simpleCart_quantity').empty().html(data.count);
                toastr.success(data.messages);

            }else{
                toastr.warning(data.messages);
            }

        });
    },
    showCart:function () {
        $.get(laroute.route('cart.show'), function (data) {

            $('#myModal').modal();
            $('#myModal').on('shown.bs.modal', function(){
                $('#myModal .load_modal').html(data);
            });
            $('#myModal').on('hidden.bs.modal', function(){
                $('#myModal .modal-body').data('');
            });
        })
    },
    updateCart:function (obj , id) {
        $.ajaxSetup(
            {
                headers:
                    {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }
            });
        $("table.cartItem td input").on('change',function () {
            $.post(laroute.route('cart.update'),{id:id, qty:$(this).val()} ,function (data) {
                if(data.status === 1){
                    $('#simpleCart_total').empty().html(data.total);
                    $('#simpleCart_quantity').empty().html(data.count);
                    toastr.success(data.messages);
                }else{
                    toastr.warning(data.messages);
                }
            });

        })
    },
    removeCart:function (obj , id) {
        $.ajaxSetup(
            {
                headers:
                    {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }
            });
        $.post(laroute.route('cart.delete'),{id:id} ,function (data) {

            if(data.status === 1){
                $('#simpleCart_total').empty().html(data.total);
                $('#simpleCart_quantity').empty().html(data.count);
                toastr.success(data.messages);
                $(obj).closest('tr').remove();
            }
        })
    }
};