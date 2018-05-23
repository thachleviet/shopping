@extends('backend.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel 2</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{{$title}}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$title}}</h3>
                    </div>
                    <div class="box-header">
                        <a href="{{route('permissions.create')}}" class=" btn btn-success pull-right"> <i class="fa fa-plus"></i> Thêm </a>
                    </div>
                    <div class="box-body">
                        @if (Session::has('warning'))
                            <div class="alert alert-warning">{{ Session::get('warning') }}</div>
                        @endif
{{--                        @include('backend.admin.list')--}}

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Permissions</th>
                                        <th>Operation</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach ($permissions as $permission)
                                        <tr>

                                            <td>{{ $permission->name }}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/permissions/edit/'.$permission->id.'') }}" class="btn btn-info " style="margin-right: 3px;">Edit</a>
                                                <a href='javascript:void(0)' onclick="Roles.remove(this, {{$permission->id}})" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                {{--{!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}--}}
                                                {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                                                {{--{!! Form::close() !!}--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('after_script')
    <script src="{{asset('static/backend')}}/js/roles/custom.js"></script>
@stop

