@extends('backend.layouts')
@section('after_style')
    <link rel="stylesheet" href="{{asset('backend')}}/bower_components/select2/dist/css/select2.min.css">
@stop
@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small> <a href="{{asset(route('category'))}}"> <i class="fa fa-angle-double-right"></i> Danh mục sản phẩm</a></small>
            <small><i class="fa fa-angle-double-right"></i> {{$title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{{$title}}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">

            <div class="col-md-7 col-lg-offset-2">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$title}}</h3>
                    </div>
                    <form role="form" method="post" action="{{route('category.submit')}}">
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group {{($errors->has('category_name')) ? 'has-error': ''}}" >
                                <label >Tên danh mục</label>
                                <input type="text" class="form-control" name="category_name" placeholder="Tên danh mục">
                                @if ($errors->has('category_name'))
                                    <span class="help-block">{{ $errors->first('category_name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label >Loại danh mục</label>
                                <select name="category_type" class="form-control select2" style="width: 100%;">
                                    <option value="category">Danh mục sản phẩm</option>
                                    <option value="new">Tin tức</option>
                                </select>
                            </div>
                            <div class="form-group category_level" style="display: block">
                                <label >Cấp độ danh mục</label>
                                <select name="category_level" class="form-control select2" style="width: 100%;">
                                    <option value="1" >Cấp độ 1</option>
                                    <option value="2" >Cấp độ 2</option>
                                    <option value="3" >Cấp độ 3</option>
                                </select>
                            </div>
                            <div class="form-group category_parent_id {{($errors->has('category_parent_id')) ? 'has-error': ''}}">
                                <label >Danh mục cha</label>
                                <select name="category_parent_id" class="form-control select2" style="width: 100%;">
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="is_active" class="form-control select2" style="width: 100%;">
                                    <option value="1">Đang hoạt động</option>
                                    <option value="0">Tạm ngưng</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('after_script')
    <script src="{{asset('backend')}}/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            category_type();
            category_level();
            function category_type() {
                let category_level = 'div.category_level';
                $('select[name=category_type]').change(function () {
                    if($(this).val() === 'new'){
                        $(category_level).css('display', 'none');
                        $('div.category_parent_id').css('display', 'none');
                    }else{
                        $(category_level).css('display', 'block');
                        $('div.category_parent_id').css('display', 'block');
                    }
                    if($('select[name=category_level]').val() === '1'){
                        $('div.category_parent_id').css('display', 'none');
                    }
                });
            }
            function category_level() {
                let category_level = 'select[name=category_level]';
                if($(category_level).val() === '1'){
                    $('div.category_parent_id').css('display', 'none');
                }
                $(category_level).change(function () {
                    if($(this).val() === '1'){
                        $('div.category_parent_id').css('display', 'none');
                    }else{
                            $('div.category_parent_id').css('display', 'block');
                            $.ajaxSetup(
                                {
                                    headers:
                                        {
                                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                                        }
                                });
                            $.post(laroute.route('category.filter-category'), {level: $(this).val()}, function (data) {
                                if (data.status === 1) {
                                    let options = '', category_parent_id = 'select[name=category_parent_id]';
                                    $(category_parent_id).empty().append('<option disabled="" selected>Danh mục cha</option>');
                                    $(data.data).each(function (k, v) {
                                        options += '<option value="' + v.category_id + '">' + v.category_name + '</option>';
                                    });
                                    $(category_parent_id).append(options);
                                }
                            }, 'json');
                    }

                });
            }
        });
    </script>
@stop