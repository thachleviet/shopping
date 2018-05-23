@extends('backend.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small> <a href="{{asset(route('admin-admin'))}}"> <i class="fa fa-angle-double-right"></i> Danh mục quản trị viên</a></small>
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
                <form role="form" method="post" action="{{route('admin-admin.store')}}">
                <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{$title}}</h3>
                        </div>

                        {!! csrf_field() !!}

                        <div class="box-body">
                            <div class="form-group {{($errors->has('name')) ? 'has-error': ''}}" >
                                <label >Tên danh mục</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên danh mục">
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{($errors->has('email')) ? 'has-error': ''}}" >
                                <label >Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{($errors->has('phone')) ? 'has-error': ''}}" >
                                <label >Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" placeholder="Số điện thoai">
                                @if ($errors->has('phone'))
                                    <span class="help-block">{{ $errors->first('phone')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{($errors->has('gender')) ? 'has-error': ''}}" >
                                <label >Nam</label>
                                <input type="radio"  name="gender" checked value="1" >
                                <label >Nữ</label>
                                <input type="radio" name="gender"  value="0">
                            </div>
                        </div>
                   <div class="box-header with-border">
                        <h3 class="box-title">Roles</h3>
                    </div>

                    {{--`name`, `email`, `phone`, `gender`, `avatar`, `ward_id`, `district_id`, `province_id`,
                    `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`, `status`--}}
                    <div class="box-body">
                        <div class="form-group row {{($errors->has('name')) ? 'has-error': ''}}" >
                            @foreach ($roles as $role)
                                <div class="col-sm-4">  <input type="checkbox"  name="roles[]" value="{{$role->id}}" > <label >{{$role->name}}</label></div>
                            @endforeach
                        </div>
                    </div>


                    <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                        </div>

                </div>
                </form>
            </div>

        </div>
    </section>
@endsection
@section('after_script')

@stop