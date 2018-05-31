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
                        <a href="{{route('admin.create')}}" class=" btn btn-success pull-right"> <i class="fa fa-plus"></i> Thêm </a>
                    </div>
                    <div class="box-body">
                        @if (Session::has('warning'))
                            <div class="alert alert-warning">{{ Session::get('warning') }}</div>
                        @endif
                        @include('backend.admin.list')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('after_script')
    <script src="{{asset('js')}}/bootstrap-toggle.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net/js/select2.full.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

@stop

