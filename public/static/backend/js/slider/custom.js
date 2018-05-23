var Slider = {

    remove:function (obj , id) {
        $(obj).closest('tr').addClass('label-warning text-danger');
        $("input[name=quantity]").addClass('text-danger');
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
                $.get(laroute.route('slider.delete', {id:id}), function() {
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
    removeMulti:function () {

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            icon: 'warning',
            buttons: true,
            successMode: true,
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',

        }).then(function (result) {
            if(result){

                let data = [] ;
                $('td input:checked').each(function () {
                    data.push($(this).attr('data-id'));
                });

                if(data.length <=0){
                    swal("", "Vui lòng chọn thể loại muốn xóa !", "warning");
                }else{
                    $.ajaxSetup(
                        {
                            headers:
                                {
                                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                                }
                        });
                    $.post(laroute.route('category.delete-multi-row'), {data:data}, function (data) {
                        if(data.status){
                            $('#alert-success').removeAttr('style').fadeTo(2000, 500).slideUp(500, function(){
                                $("alert-success").slideUp(500);
                            });
                            $('.content-message').html(data.message_success) ;

                            $('td input:checked').parent().parent().remove();
                            $('table #category').fadein('slow');
                        }
                    });
                }
            }
        });

    },
    ordering:function(id, obj) {
        let  element  =  $('input[id='+id+']').val() ;
        let  data =  {id:id,ordering:element} ;
        $.post(laroute.route('category.ordering'), data , function (){
            window.location.reload();
        }, 'JSON');
    },

    minus:function (obj, id) {
        $.ajaxSetup(
            {
                headers:
                    {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }
            });
        let  number = $('td div.qty input[data-id='+id+']').val();
        if (number>0) {
            $("td div.qty input[data-id="+id+"]").val((number - 1));
            $.post(laroute.route('category.ordering'), {category_id:id , category_ordering  :(number - 1)}, function (data){
                if(data.status){
                    $('#alert-success').removeAttr('style').fadeTo(2000, 500).slideUp(500, function(){
                        $("alert-success").slideUp(500);
                    });
                    $('.content-message').html(data.message_success) ;
                }
            }, 'JSON');
        } else{
            $("td div.qty input[data-id="+id+"]").val(0);
            $.post(laroute.route('category.ordering'), {category_id:id , category_ordering  :0}, function (data){
                if(data.status){
                    $('#alert-success').removeAttr('style').fadeTo(2000, 500).slideUp(500, function(){
                        $("alert-success").slideUp(500);
                    });
                    $('.content-message').html(data.message_success) ;
                }

            }, 'JSON');
        }
    },
    plus:function(obj,id) {
        $.ajaxSetup(
            {
                headers:
                    {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }
            });
        let  number = $("td div.qty input[data-id="+id+"]").val();

        if (number) {
            $('input[data-id='+id+'] ').val(Number(number) + 1);
            $.post(laroute.route('category.ordering'), {category_id:id , category_ordering :(Number(number) + 1)}, function (data){
                if(data.status){
                    $('#alert-success').removeAttr('style').fadeTo(2000, 500).slideUp(500, function(){
                        $("alert-success").slideUp(500);
                    });
                    $('.content-message').html(data.message_success) ;
                }
            }, 'JSON');
        }
    },
    changeStatus:function (obj , id , action) {
        $.post(laroute.route('customer-group.change-status'), {id: id, action: action}, function (data) {
            // $('#autotable').PioTable('refresh');
        }, 'JSON');
    },

};
$("th .checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
    if ($("td input:checkbox").is(":checked")) {
        //checked
        $("td input:checkbox").parent().parent().addClass("label-warning");
        $("td input[name=quantity]").addClass('text-danger');
        // $('#count-delete').html('<small class="label pull-right bg-red">'+$("td input:checkbox").length+'</small>');
    } else {
        //unchecked
        $('#count-delete').empty();
        $("td input:checkbox").parent().parent().removeClass("label-warning");
        $("td input[name=quantity]").removeClass('text-danger')
    }
});
$("td input:checkbox").click(function () {
    if ($(this).is(":checked")) {
        // checked


        $(this).parent().parent().addClass("label-warning");
        $("td input[name=quantity]").addClass('text-danger')
    } else {
        //unchecked

        // $('#count-delete').html('<small class="label pull-right bg-red">'+($('#count-delete small').html()-1)+'</small>');


        $(this).parent().parent().removeClass("label-warning");
        $("td input[name=quantity]").removeClass('text-danger')
    }
});
$("div button .swal-button--cancel").click(function () {
    window.location.reload() ;
});

var table = $('#category').DataTable( {
    responsive: true,
    columnDefs: [
        { "targets": [0], "searchable": false, "orderable": false, "visible": true }
    ]
} );
new $.fn.dataTable.FixedHeader( table );