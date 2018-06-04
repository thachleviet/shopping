@extends('backend.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small> <a href="{{asset(route('admin'))}}"> <i class="fa fa-angle-double-right"></i> Danh sách thành viên</a></small>
            <small><i class="fa fa-angle-double-right"></i> {{$title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{{$title}}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-7 col-lg-offset-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$title}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('admin.update',$user->id)}}">
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group {{($errors->has('name')) ? 'has-error': ''}}" >
                                <label >Tên người dùng</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên danh mục" value="{{$user->name}}">
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{($errors->has('email')) ? 'has-error': ''}}" >
                                <label >Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
                                @if ($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{($errors->has('phone')) ? 'has-error': ''}}" >
                                <label >Mật khẩu</label>
                                <input type="password" class="form-control" name="password" value="" placeholder="Nhập mật khẩu"     >
                                @if ($errors->has('password'))
                                    <span class="help-block">{{ $errors->first('password')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{($errors->has('phone')) ? 'has-error': ''}}" >
                                <label >Nhập lại password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Nhập mật khẩu"     >
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">{{ $errors->first('password_confirmation')}}</span>
                                @endif
                            </div>

                        </div>

                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection
