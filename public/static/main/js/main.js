var Main = {
    provinceOption:function () {
        $('select[name=province_id]').change(function () {
            $.ajaxSetup(
                {
                    headers:
                        {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        }
                });
           $.post(laroute.route('province'),{province_id:$(this).val()}, function (data) {
               let  elementOption = '';
               $.each(data.data,(function (k, v) {
                   elementOption +='<option value="'+k+'">'+v+'</option>'
               }));
              $('select[name=district_id]').removeAttr("disabled").empty().append(elementOption);
              $('select[name=ward_id]').attr("disabled", "disabled").empty().append('<option value="" >Chọn xã phường</option>');
           },'json');

        })
    },
    districtOption:function () {
        $('select[name=district_id]').change(function () {
            $.ajaxSetup(
                {
                    headers:
                        {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        }
                });
            $.post(laroute.route('district'),{district_id:$(this).val()}, function (data) {
                let  elementOption = '';
                $.each(data.data,(function (k, v) {
                    elementOption +='<option value="'+k+'">'+v+'</option>'
                }));
                $('select[name=ward_id]').removeAttr("disabled").empty().append(elementOption);
            },'json');

        })
    },
};

var orderSubmit = {
    _init : function(){
        $('#formOrderCart').validate({
            rules: {
                customer_fullname: "required",
                customer_email: {
                    required: true,
                    email: true
                },
                customer_phone:  {
                    required: true,
                    number: true,
                },
                province_id: "required",
                district_id: "required",
                ward_id: "required",
                customer_address:"required",

            },
            messages: {
                customer_fullname: "Vui lòng nhập họ tên",
                customer_email: {
                    required: "Vui lòng nhập Email",
                    email: "Email không hợp lệ"
                },
                customer_phone:  {
                    required: "Vui lòng nhập số  điện thoại",
                    number: "Vui lòng nhập giá trị là number"
                },
                province_id: "Vui lòng  chọn tỉnh thành",
                district_id: "Vui lòng chọn quận huyện",
                ward_id: "Vui lòng chọn xã phường",
                customer_address:"Vui nhập địa chỉ liên hệ"
            }
        });
        $('#formOrderCart').submit(function() {

            $(this).removeAttr("disabled");
            if (!$(this).valid()) {
                return false;
            }
            $('input[name=customer_fullname]').prop("disabled", false);
            $('input[name=customer_email]').prop("disabled", false);
            $('input[name=customer_phone]').prop("disabled", false);
            $.post(laroute.route('order.order-cart'), $('#formOrderCart').serialize(), function (data) {
                if(data.status)
                {
                   $('#simpleCart_total').empty();
                   $('#simpleCart_quantity').empty();
                   toastr.success(data.messages);
                   setTimeout(function () {
                       window.location.href = laroute.route(data.data.route);
                   }, 3000);
                }
            })
        });
    }
};
var updateProfile = {
    _init : function(){
        $('#updateProfile').validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                phone:  {
                    required: true,
                    number: true,
                },
                day:'required',
                month:'required',
                year:'required',
                province_id: "required",
                district_id: "required",
                ward_id: "required",
                address:"required",
            },
            messages: {
                name: "Vui lòng nhập họ tên",
                email: {
                    required: "Vui lòng nhập Email",
                    email: "Email không hợp lệ"
                },
                day:"Nhập ngày",
                month:"Nhập tháng",
                year:"Nhập năm",
                phone:  {
                    required: "Vui lòng nhập số  điện thoại",
                    number: "Vui lòng nhập giá trị là number"
                },
                province_id: "Vui lòng  chọn tỉnh thành",
                district_id: "Vui lòng chọn quận huyện",
                ward_id: "Vui lòng chọn xã phường",
                address:"Vui nhập địa chỉ liên hệ"
            }
        });
        $('#updateProfile').submit(function() {
            if (!$(this).valid()) {
                return false;
            }
            $.post(laroute.route('update-user'), $('#updateProfile').serialize(), function (data) {
                if(data.status)
                {
                    toastr.success(data.messages);
                    setTimeout(function () {
                        window.location.href = laroute.route(data.data.route);
                    }, 3000);
                }else{
                    let element = ' <div class="alert alert-danger">\n' +
                        ''+data.messages+'' +
                        '</div>';
                    $('div#message_error').empty().append(element);

                    setTimeout(function () {
                        $('div#message_error').empty();
                    }, 3000)
                }
            })
        });
    }
};

var registerUser = {
    _init:function () {
        $('#registerUser').validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                password:"required",
                password_confirmation : {
                    equalTo : "#password"
                },
                phone:  {
                    required: true,
                    number: true,
                },
                day:'required',
                month:'required',
                year:'required',
                province_id: "required",
                district_id: "required",
                ward_id: "required",
                address:"required",

            },
            messages: {
                name: "Vui lòng nhập họ tên",
                email: {
                    required: "Vui lòng nhập Email",
                    email: "Email không hợp lệ"
                },
                password: "Vui lòng nhập mật khẩu",
                password_confirmation:{
                    equalTo:"Mật khẩu không khớp"
                },
                day:"Nhập ngày",
                month:"Nhập tháng",
                year:"Nhập năm",
                phone:  {
                    required: "Vui lòng nhập số  điện thoại",
                    number: "Vui lòng nhập giá trị là number"
                },
                province_id: "Vui lòng  chọn tỉnh thành",
                district_id: "Vui lòng chọn quận huyện",
                ward_id: "Vui lòng chọn xã phường",
                address:"Vui nhập địa chỉ liên hệ"
            }
        });
        $('#registerUser').submit(function() {
            if (!$(this).valid()) {
                return false;
            }
            $.post(laroute.route('register'), $('#registerUser').serialize(), function (data) {


                if(data.status)
                {
                    toastr.success(data.messages);
                    setTimeout(function () {
                        window.location.href = laroute.route(data.data.route);
                    }, 3000);
                }else{
                    let error ='' ;
                    $.each(data.error, function (k, v) {
                        error +='<li><strong>'+v+'</strong></li>\n';
                    });
                    let element = ' <div class="alert alert-danger">\n' +
                        ''+error+'' +
                        '</div>';
                    $('div#message_error').empty().append(element);

                    setTimeout(function () {
                        $('div#message_error').empty();
                    }, 3000)
                }
            }, 'JSON')
        });
    }
};

var infoUser = {
    _init:function () {
        this.info();
        this.historyOrder();
    },
    info:function (p) {
        let o = this;

        if (typeof p == 'undefined') {
            p = 1;
        }

        $('#1a').load(laroute.route('info-user.info-users')+'?page=' + p , function(){
            // $('#filterGift').off('change').change(function() {
            //     o.gift();
            // });
        });
    },
    historyOrder:function (p) {
        let o = this;

        if (typeof p == 'undefined') {
            p = 1;
        }

        $('#2a').load(laroute.route('info-user.history-order')+'?page=' + p , function(){
            // $('#filterGift').off('change').change(function() {
            //     o.gift();
            // });
        });
    }
};

var CategoryProduct = {
    _init:function () {

        this.categoryV();
    },
    categoryV:function (p) {
        let o = this;

        if (typeof p == 'undefined') {
            p = 1;
        }

        // $.get(laroute.route('categorys.list-category')+'?page=' + p + '&sort=' + $('#sort').val()+'?limit='+$('#limit').val(), function(){
        //

            $('select.product-filter').change(function() {
                var address = $(this).val();
                window.location.replace(address);
           });
        // });
    }
};