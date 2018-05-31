@extends('backend.layouts')
@section('after_style')
    <link rel="stylesheet" href="{{asset('static')}}/main/css/icheck/orange.css">
    <link rel="stylesheet" href="{{asset('backend')}}/bower_components/select2/dist/css/select2.min.css">
@stop
@section('content')
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        #img-upload{
            padding-top: 10px;
            max-width: 200px;
            max-height: 200px;
        }

        div.form-group label{
            text-align: right;
            margin-bottom : 0!important;
        }
        .select2-container--default .select2-selection--single{
            border-radius: 0; !important;
            height:auto; !important;
            border-color: #d2d6de;  !important;
            width: 100% !important;
        }
        div.form-group  label.error{
            color: red !important;
            padding-left: 0px; vertical-align: bottom; }
    </style>
    <section class="content-header">
        <h1>
            Dashboard
            <small> <a href="{{asset(route('product'))}}"> <i class="fa fa-angle-double-right"></i> Danh mục </a></small>
            <small><i class="fa fa-angle-double-right"></i> {{$_title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{{$_title}}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <form id="form_add_product" role="form" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{$_title}}</h3>
                        </div>

                        {!! csrf_field() !!}

                        <div class="box-body">
                            @if(session()->has('message_warning'))
                                <div class="alert alert-danger">
                                    <strong>Warning!</strong> {{session()->get('message_warning')}}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-5" >
                                    {{--_menu--}}
                                    <div class="form-group {{($errors->has('product_name')) ? 'has-error': ''}}" >
                                        <label >Thể loại</label>
                                        <select  class="select2 form-control" name="menu" id="menu">
                                            <option value=""> Vui lòng chọn thể loại</option>
                                            @foreach($_menu as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('product_name'))
                                            <span class="help-block">{{ $errors->first('product_name')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{($errors->has('product_name')) ? 'has-error': ''}}" >
                                        <label >Tên hình ảnh</label>
                                        <input type="text" class="form-control" name="product_name" placeholder="Tên danh mục">
                                        @if ($errors->has('product_name'))
                                            <span class="help-block">{{ $errors->first('product_name')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{($errors->has('product_price')) ? 'has-error': ''}}" >
                                        <label >Giá : </label>
                                        <input type="text" class="form-control" name="product_price" placeholder="Tên danh mục">
                                        @if ($errors->has('product_price'))
                                            <span class="help-block">{{ $errors->first('product_price')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group  {{($errors->has('product_image')) ? 'has-error': ''}}">
                                        <label>Hình ảnh</label>
                                        <div class="input-group">

                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                Browse… <input type="file" id="imgInp" name="product_image">
                                            </span>
                                        </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                        @if ($errors->has('product_image'))
                                            <span class="help-block">{{ $errors->first('product_image')}}</span>
                                        @endif
                                        <img id='img-upload'/>
                                    </div>
                                    <div class="form-group {{($errors->has('product_description')) ? 'has-error': ''}}" >
                                        <label >Mô tả </label>
                                        <textarea  class="form-control" name="product_description" placeholder="Nhập mô tả"></textarea>
                                        @if ($errors->has('product_description'))
                                            <span class="help-block">{{ $errors->first('product_description')}}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-7" >
                                    <div class="form-group row{{($errors->has('product_discount')) ? 'has-error': ''}}" >
                                        <label class="col-sm-2 col-sx-12">Giảm giá</label>
                                        <div class="col-sm-10 col-sx-12">
                                        <input type="number" class="form-control" min="1" max="100" name="product_discount" placeholder="Giảm giá">
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-2 col-sx-12">Thể loại  : </label>
                                        <div class="col-sm-10 col-sx-12">
                                            <label ><input type="radio" name="product_type" checked value="male"></label>
                                            <span >Nam</span>
                                            <label ><input type="radio"  name="product_type" value="female"></label>
                                            <span >Nữ</span>
                                            <label ><input type="radio"  name="product_type" value="double"></label>
                                            <span >Đôi</span>
                                        </div>
                                    </div>
                                    <div class="form-group row {{($errors->has('product_status')) ? 'has-error': ''}}" >
                                        <label class="col-sm-2 col-sx-12">Trạng thái : </label>
                                        <div class="col-sm-10 col-sx-12">
                                            <label ><input type="radio" name="product_status" checked value="1"></label>
                                            <span >Hoạt động</span>

                                            <label ><input type="radio"  name="product_status" value="0"></label>

                                            <span >Tạm ngưng</span>
                                        </div>
                                    </div>
                                    <label class="col-md-12" style="color: #BD362F;"  onclick="plusThuocTinh()"><i class="fa fa-plus"></i> Thuộc tính</label>

                                    <div id="thuocTinh">

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="row" >
                                            <div class="col-md-12 col-md-offset-1 form-group {{($errors->has('product_content')) ? 'has-error': ''}}">
                                                <h5 ><i class="fa fa-plus"></i>  <a style="color: red" onclick="plusImages()" href='javascript:void(0)'>Hình ảnh kèm theo ( không bắt buộc ) </a></h5>

                                            </div>
                                            <div class="col-md-10 col-md-offset-1 form-group {{($errors->has('product_content')) ? 'has-error': ''}}">
                                                <div id="multi_image_product">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="row" >
                                            <div class="col-md-10 col-md-offset-1 form-group {{($errors->has('product_content')) ? 'has-error': ''}}">
                                                <label>Nội dung
                                                </label>
                                                <div >
                                                    <textarea style="min-height: 400px;"  class="form-control product_content" id="product_content" name="product_content" placeholder="Nội dung bài viết"></textarea>
                                                    @if ($errors->has('product_content'))
                                                        <span class="help-block">{{ $errors->first('product_content')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Lưu</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
@section('after_script')
    <script src="{{asset('backend')}}/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="{{asset('js')}}/jquery_number_format.js"></script>
    <script src="{{asset('js')}}/jquery.validate.min.js"></script>

    <script src="{{asset('static')}}/main/js/icheck/icheck.min.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{asset('static/backend')}}/js/product/custom.js"></script>
    <script>
        $('#form_add_product').validate({
            rules: {
                menu: "required",
                product_name: "required",
                product_price: "required",
                product_image: "required",

            },
            messages: {
                menu: "Please enter your category",
                product_name: "Please enter your product name",
                product_price: "Please enter your product price",
                product_image: "Please enter your product image",
            },
        });
        $('input[name=product_price]').number( true,2);
        function plusImages() {
            $('#multi_image_product').append(
                '<div class="form-group col-md-12 col-md-offset-1 row sortne ">' +
                '	    <div class="col-md-2">' +
                '           <input class="btn btn-default no " style="text-align: left" disabled value="Hình thứ '+ ($('#multi_image_product .sortne').length + 1) +'">'+
                ' 	    </div>' +
                '	    <div class="col-md-7">'+
                '   	     <input class="form-control" type="file" value=""  name="images[]"  />' +
                '	     </div>' +
                '   	 <div class="col-md-2">' +
                '        <a href="javascript:void(0)" onclick="Product.removeRows(this)" class="btn btn-xs btn-danger" data-button-type="delete"><i class="fa fa-trash"></i></a>'+
                '        <a href="javascript:void(0)" onclick="Product.removeRows(this)" class="btn btn-xs btn-primary" data-button-type="delete"><i class="fa fa-edit"></i></a>'+
                '  	     </div>' +
                '</div>'
            );
        }
        function plusThuocTinh() {
            $('#thuocTinh').append(
                '<div class="sortnes row"><div style="padding-top: 20px" class="col-md-2 " ><label>Thuộc tính '+($('.sortnes').length + 1)+'</div>' +
                '<div style="padding-top: 20px" class="col-md-4">\n' +
                '\n' +
                '<input type="text" class="form-control" name="attribute[key][]" placeholder="nhập tên thuộc tính">\n' +
                '</div>\n' +
                '<div style="padding-top: 20px" class="col-md-4">\n' +
                '<input type="text" class="form-control" name="attribute[value][]" placeholder="nhạp giá trị">\n' +
                '</div>' +
                '<div class="col-md-2"><a href="javascript:void(0)" onclick="Product.removeRow(this)" class="btn btn-xs btn-danger" data-button-type="delete"><i class="fa fa-trash"></i></a></div>' +
                '</div>');
        }
        $(document).ready( function() {
            $('.select2').select2();
            $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function(){
                readURL(this);
            });
        });

        let editor_config = {
            path_absolute : "/",
            selector: "textarea.product_content",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }
                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };
        tinymce.init(editor_config);
    </script>
@stop