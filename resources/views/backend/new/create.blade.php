@extends('backend.layouts')
@section('after_style')
    <link rel="stylesheet" href="{{asset('static/static')}}/main/css/icheck/orange.css">
    <link rel="stylesheet" href="{{asset('static/backend')}}/bower_components/select2/dist/css/select2.min.css">
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
            <small> <a href="{{asset(route('new'))}}"> <i class="fa fa-angle-double-right"></i> Danh mục </a></small>
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
                <form id="form_add_product" role="form" method="post" action="{{route('new.store')}}" enctype="multipart/form-data">
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
                                    <div class="col-md-12">
                                        <div class="row" >

                                            <div class="col-md-9 col-md-offset-2 form-group  {{($errors->has('new_type')) ? 'has-error': ''}}" >
                                                <label >Thể loại</label>
                                                <select  class=" form-control" name="new_type" id="new_type">
                                                    <option value="new"> Tin tức</option>
                                                    <option value="guide"> Hướng dẫn</option>
                                                </select>
                                                @if ($errors->has('new_type'))
                                                    <span class="help-block">{{ $errors->first('new_type')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-9 col-md-offset-2 form-group {{($errors->has('new_status')) ? 'has-error': ''}}" >
                                                <label >Trạng thái : </label>
                                                <div >
                                                    <label ><input type="radio" name="new_status" checked value="1"></label>
                                                    <span >Hoạt động</span>

                                                    <label ><input type="radio"  name="new_status" value="0"></label>

                                                    <span >Tạm ngưng</span>
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-md-offset-2 form-group  {{($errors->has('new_image')) ? 'has-error': ''}}" >
                                                <label >Hình ảnh đại diện</label>
                                                <input type="file" class="form-control" name="new_image" >
                                                @if ($errors->has('new_image'))
                                                    <span class="help-block">{{ $errors->first('new_image')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-9 col-md-offset-2 form-group  {{($errors->has('new_title')) ? 'has-error': ''}}" >
                                                <label >Tiêu đề</label>
                                                <input type="text" class="form-control" name="new_title" placeholder="Tiêu đề">
                                                @if ($errors->has('new_title'))
                                                    <span class="help-block">{{ $errors->first('new_title')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-9 col-md-offset-2 form-group {{($errors->has('new_description')) ? 'has-error': ''}}"  >
                                                <label >Mô tả</label>
                                                <textarea style="height: 200px" class=" form-control" name="new_description" id="new" placeholder="Nhập mô tả"></textarea>
                                                @if ($errors->has('new_description'))
                                                    <span class="help-block">{{ $errors->first('new_description')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="row" >
                                            <div class="col-md-9 col-md-offset-2 form-group ">
                                                <label>Nội dung
                                                </label>
                                                @if ($errors->has('new_content'))
                                                    <span class="help-block">{{ $errors->first('new_content')}}</span>
                                                @endif
                                                <div >
                                                    <textarea style="min-height: 400px;"  class="form-control new_content" id="new_content" name="new_content" placeholder="Nội dung bài viết"></textarea>

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


    <script src="{{asset('static/js')}}/jquery.validate.min.js"></script>


    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

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
            selector: "textarea.new_content",
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