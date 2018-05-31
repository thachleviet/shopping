@extends('backend.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small> <a href="{{asset(route('slide'))}}"> <i class="fa fa-angle-double-right"></i> Danh mục </a></small>
            <small><i class="fa fa-angle-double-right"></i> {{$_title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{{$_title}}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">

            <div class="col-md-7 col-lg-offset-2">
                <form role="form" method="post" action="{{route('slide.store')}}" enctype="multipart/form-data">
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
                            <div class="form-group">
                                <label >Tên Slide</label>
                                <input type="text" class="form-control" name="slider_name" placeholder="Tên slide ">
                            </div>
                            <div class="form-group {{($errors->has('slider_title')) ? 'has-error': ''}}" >
                                <label >Tiêu đề</label>
                                <input type="text" class="form-control" name="slider_title" placeholder="Tiêu đề">
                                @if ($errors->has('slider_title'))
                                    <span class="help-block">{{ $errors->first('slider_title')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{($errors->has('slider_image')) ? 'has-error': ''}}" >
                                <label >Hình ảnh</label>
                                <input type="file" class="form-control" name="slider_image">
                                @if ($errors->has('slider_image'))
                                    <span class="help-block">{{ $errors->first('slider_image')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{($errors->has('slider_type')) ? 'has-error': ''}}" >
                                <label >Thể loại</label>
                                <select  class="form-control select2" name="slider_type">
                                    <option value="slide">Slide</option>
                                    <option value="logo">Logo</option>
                                    <option value="qc">Quảng Cáo</option>
                                </select>

                                @if ($errors->has('slider_type'))
                                    <span class="help-block">{{ $errors->first('slider_type')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{($errors->has('menu_status')) ? 'has-error': ''}}" >
                                <label >Trạng thái</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="slider_status" checked value="1">
                                <span >Hoạt động</span>

                                <input type="radio"  name="slider_status" value="0">

                                <span >Tạm ngưng</span>
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

@stop