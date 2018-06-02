@extends('backend.layouts')
@section('after_style')
    <link rel="stylesheet" href="{{asset('static/static')}}/main/css/icheck/orange.css">
@stop
@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small> <a href="{{asset(route('menu'))}}"> <i class="fa fa-angle-double-right"></i> Danh mục </a></small>
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
                <form role="form" method="post" action="{{route('menu.update', $_object['id'])}}">
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


                            <div class="form-group {{($errors->has('menu_name')) ? 'has-error': ''}}" >
                                <label >Tên danh mục</label>
                                <input type="text" class="form-control" name="menu_name" placeholder="Tên danh mục" value="{{$_object['menu_name']}}">
                                @if ($errors->has('menu_name'))
                                    <span class="help-block">{{ $errors->first('menu_name')}}</span>
                                @endif
                            </div>

                            <div class="form-group row{{($errors->has('menu_status')) ? 'has-error': ''}}" >

                                <label class="col-sm-2 col-sx-12">Thể loại : </label>

                                <div class="col-sm-10 col-sx-12">
                                    <label ><input type="radio" name="menu_type" {{($_object['menu_type'] =='product') ? 'checked' : ''}} checked value="product"></label>
                                    <span >Sản phẩm </span>

                                    <label ><input type="radio"  name="menu_type" {{($_object['menu_type'] =='new') ? 'checked' : ''}} value="new"></label>

                                    <span >Tin tức</span>
                                </div>

                            </div>

                            <div class="form-group row {{($errors->has('menu_status')) ? 'has-error': ''}}" >
                                <label class="col-sm-2 col-sx-12">Trạng thái : </label>
                                <div class="col-sm-10 col-sx-12">
                                    <label ><input type="radio" name="menu_status" checked value="1"></label>
                                    <span >Hoạt động</span>

                                    <label ><input type="radio"  name="menu_status" value="0"></label>

                                    <span >Tạm ngưng</span>
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
    <script src="{{asset('static/static')}}/main/js/icheck/icheck.min.js"></script>
@stop