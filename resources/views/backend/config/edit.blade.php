@extends('backend.layouts')
@section('after_style')
    <link rel="stylesheet" href="{{asset('static/static')}}/main/css/icheck/orange.css">
@stop
@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small> <a href="{{asset(route('config'))}}"> <i class="fa fa-angle-double-right"></i> Cấu hình </a></small>
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
                <form role="form" method="post" action="{{route('config.update', $_object['id'])}}">
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
                            <div class="form-group " >
                                <label >Tên đại lý</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên" value="{{$_object['name']}}">
                            </div>
                            <div class="form-group " >
                                <label >Tiêu đề</label>
                                <input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề" value="{{$_object['title']}}">
                            </div>
                            <div class="form-group " >
                                <label >Header</label>
                                <input type="text" class="form-control" name="header" placeholder="Nhập header" value="{{$_object['header']}}">
                            </div>
                            <div class="form-group " >
                                <label >Footer</label>
                                <input type="text" class="form-control" name="footer" placeholder="Nhập Footer" value="{{$_object['footer']}}">
                            </div>
                            <div class="form-group " >
                                <label >Link FanPage</label>
                                <input type="text" class="form-control" name="link_fanpage" placeholder="Nhập Footer" value="{{$_object['link_fanpage']}}">
                            </div>
                            <div class="form-group " >
                                <label >Thời gian mở cửa</label>

                                <input type="text" class="form-control" name="time_open"  value="{{$_object['time_open']}}">
                            </div>

                            <div class="form-group " >
                                <label >Địa chỉ</label>
                                <textarea  style="height: 150px" class="form-control" name="address" >{{$_object['address']}}</textarea>
                            </div>

                            <div class="form-group " >
                                <label >Địa chỉ Google MAP</label>
                                <textarea style="height: 200px" class="form-control" name="map" >{{$_object['map']}}</textarea>
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



