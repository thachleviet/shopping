@extends('backend.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small> <a href="{{asset(route('roles'))}}"> <i class="fa fa-angle-double-right"></i>Danh mục vai trò</a></small>
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
                <form role="form" method="post" action="{{route('permissions.store')}}">
                    <div class="box box-primary">
                        <div class="box-header with-border">

                            <h3 class="box-title">{{$title}}</h3>
                        </div>

                        {!! csrf_field() !!}

                        <div class="box-body">
                            <div class="form-group {{($errors->has('name')) ? 'has-error': ''}}" >
                                <label >Tên vai trò</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên vai trò">
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="box-header with-border">
                            <h3 class="box-title">Permissions to Roles</h3>
                        </div>

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