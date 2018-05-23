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
                    <form role="form" method="post" action="{{route('slider.submit-edit')}}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group {{($errors->has('slide_image')) ? 'has-error': ''}}" >
                                <label class=" col-form-label" style="text-align: right">Hình ảnh</label>

                                <input type="file" class="form-control" name="slide_image" >
                                @if ($errors->has('slide_image'))
                                    <span class="help-block">{{ $errors->first('slide_image')}}</span>
                                @endif
                                <img style="padding-top:10px ; width: 100% ; height: 250px" src="{{asset($item['slide_image'])}}">
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="is_active" class="form-control select2" style="width: 100%;">
                                    <option value="1">Đang hoạt động</option>
                                    <option value="0">Tạm ngưng</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="slide_id" value="{{$item['slide_id']}}">
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
        });
    </script>
@stop