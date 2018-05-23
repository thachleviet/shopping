@extends('backend.layouts')

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
            <!-- left column -->
            <div class="col-md-7 col-lg-offset-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$title}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('category.submit-edit')}}">
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group {{($errors->has('category_name')) ? 'has-error': ''}}" >
                                <label >Tên danh mục</label>
                                <input value="{{$object['category_name']}}" type="text" class="form-control" name="category_name" placeholder="Tên danh mục">
                                @if ($errors->has('category_name'))
                                    <span class="help-block">{{ $errors->first('category_name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="is_active" class="form-control">
                                    <option value="1" {{($object['category_status'] == 1) ? 'selected' : ''}}>Đang hoạt động</option>
                                    <option value="0" {{($object['category_status'] == 0) ? 'selected' : ''}}>Tạm ngưng</option>
                                </select>
                            </div>
                            <input type="hidden" name="category_id" value="{{$object['category_id']}}">
                        </div>
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
