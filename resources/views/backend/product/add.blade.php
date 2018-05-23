@extends('backend.layouts')
@section('after_style')
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
            width: 100%;
        }

        div.form-group label{
            text-align: right;
        }
        .select2-container--default .select2-selection--single{
            border-radius: 0; !important;
            height:auto; !important;
            border-color: #d2d6de;  !important;
            width: 100% !important;
        }
    </style>
    <section class="content-header">
        <h1>
            <a style="color: #000; " href="{{url('admin')}}"> Trang chủ</a>

            <small> <a href="{{asset(route('product'))}}"> <i class="fa fa-angle-double-right"></i> Danh mục sản phẩm</a></small>
            <small><i class="fa fa-angle-double-right"></i> {{$title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{{$title}}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$title}}</h3>
                    </div>
                    <form role="form" method="post" action="{{route('product.submit')}}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group row {{($errors->has('product_category_id')) ? 'has-error': ''}} ">
                                        <label class="col-sm-4 col-form-label" >Thể loại</label>
                                        <div class="col-sm-8">
                                            <select name="product_category_id" class="form-control select2 {{($errors->has('product_category_id')) ? 'error': ''}}">
                                                <option value="" >Danh mục sản phẩm</option>
                                                @if(!empty($object))
                                                    <?php

                                                    $string = '|--------';
                                                    $space  = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                                    ?>
                                                    @foreach($object as $key=>$item)
                                                        @if($item['level'] == 2)
                                                            <option value="{{$item['category_id']}}">{{$item['category_name']}}</option>
                                                        @else
                                                            <option  value="{{$item['category_id']}}" ><span style="position:relative ;padding-left:{{($item['level']-1)*25}}px"></span>
                                                                @if($item['level']  == 3)
                                                                    {{$string}}
                                                                @else
                                                                    {{$space}}{{$string}}
                                                                @endif
                                                                {{($item['category_name'])}}
                                                            </option>
                                                        @endif

                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row {{($errors->has('product_name')) ? 'has-error': ''}}" >
                                        <label class="col-sm-4 col-form-label" style="text-align: right">Tên sản phẩm</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control product_name" name="product_name" placeholder="Tên sản phẩm">
                                            @if ($errors->has('product_name'))
                                                <span class="help-block">{{ $errors->first('product_name')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{($errors->has('product_price')) ? 'has-error': ''}}" >
                                        <label class="col-sm-4 col-form-label" >Giá</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="product_price" placeholder="Giá sản phẩm">
                                            @if ($errors->has('product_price'))
                                                <span class="help-block">{{ $errors->first('product_price')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{($errors->has('product_number')) ? 'has-error': ''}}" >
                                        <label class="col-sm-4 col-form-label" style="text-align: right">Số lượng</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control product_number" name="product_number" placeholder="Số lương sản phẩm">
                                            @if ($errors->has('product_number'))
                                                <span class="help-block">{{ $errors->first('product_number')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div id="product_image" class="form-group row {{($errors->has('product_image')) ? 'has-error': ''}}">
                                        <label class="col-sm-4 col-form-label" >Hình ảnh</label>
                                        <div class="col-sm-8">

                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Browse… <input type="file" name="product_image" id="imgInp">
                                                    </span>
                                                    </span>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                            <img class="img-responsive " style="padding-top: 10px; " id='img-upload'/>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" >Trạng thái</label>
                                        <div class="col-sm-8">
                                            <select name="is_active" class="form-control select2" style="width: 100%;">
                                                <option value="1">Đang hoạt động</option>
                                                <option value="0">Tạm ngưng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row {{($errors->has('product_description')) ? 'has-error': ''}}" >
                                        <label class="col-sm-4 col-form-label" style="text-align: right">Mô tả</label>
                                        <div class="col-sm-8">
                                            <textarea type="text" class="form-control product_description" name="product_description" placeholder="Mô tả sản phẩm"></textarea>
                                            @if ($errors->has('product_description'))
                                                <span class="help-block">{{ $errors->first('product_description')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group row {{($errors->has('product_price_input')) ? 'has-error': ''}}" >
                                        <label class="col-sm-4 col-form-label" >Giá nhập</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="product_price_input" placeholder="Giá sản phẩm nhập vào">
                                            @if ($errors->has('product_price_input'))
                                                <span class="help-block">{{ $errors->first('product_price_input')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{($errors->has('product_code')) ? 'has-error': ''}}" >
                                        <label class="col-sm-4 col-form-label" style="text-align: right">Mã sản phẩm</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control product_code" name="product_code" placeholder="Mã sản phẩm">
                                            @if ($errors->has('product_code'))
                                                <span class="help-block">{{ $errors->first('product_code')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{($errors->has('product_color')) ? 'has-error': ''}}" >
                                        <label class="col-sm-4 col-form-label" style="text-align: right">Màu sắc</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control product_color" name="product_color" placeholder="Mà sắc">
                                            @if ($errors->has('product_color'))
                                                <span class="help-block">{{ $errors->first('product_color')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{($errors->has('product_material')) ? 'has-error': ''}}" >
                                        <label class="col-sm-4 col-form-label" >Chất liệu</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="product_material" placeholder="Chất liệu sản phẩm">
                                            @if ($errors->has('product_material'))
                                                <span class="help-block">{{ $errors->first('product_material')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row {{($errors->has('product_type_designs')) ? 'has-error': ''}} ">
                                        <label class="col-sm-4 col-form-label" >Kiểu dáng</label>
                                        <div class="col-sm-8">
                                            <input type="text"  class="form-control" name="product_type_designs" placeholder="Kiểu thiết kế">
                                            @if ($errors->has('product_type_designs'))
                                                <span class="help-block">{{ $errors->first('product_type_designs')}}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div  class="form-group row {{($errors->has('product_suitable')) ? 'has-error': ''}}">
                                        <label class="col-sm-4 col-form-label" >Thích hợp</label>
                                        <div class="col-sm-8">
                                            <input type="text"  class="form-control" name="product_suitable" placeholder="Thích hợp">
                                            @if ($errors->has('product_suitable'))
                                                <span class="help-block">{{ $errors->first('product_suitable')}}</span>
                                            @endif
                                        </div>

                                    </div>
                                    <div id="product_image_intro" class="form-group row {{($errors->has('product_image_intro')) ? 'has-error': ''}}">
                                        <label class="col-sm-4 col-form-label" >Hình ảnh Intro</label>
                                        <div class="col-sm-8">

                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Browse… <input type="file" name="product_image_intro" id="imgInp_intro">
                                                    </span>
                                                    </span>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                            <img class="img-responsive " style="padding-top: 10px; " id='img-upload-intro'/>
                                        </div>

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
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('after_script')
    <script src="{{asset('backend')}}/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="{{asset('js')}}/jquery_number_format.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{asset('static/backend')}}/js/product/custom.js"></script>
    <script>

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
        $(document).ready(function () {
            $('.select2').select2();
            $('input[name=product_price]').number( true,2);
            $('input[name=product_price_input]').number( true,2);
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