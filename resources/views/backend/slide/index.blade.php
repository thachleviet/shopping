@extends('backend.layouts')

@section('content')
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel 2</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{$_title}}</li>
    </ol>
</section>


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- /.box -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$_title}}</h3>
                    <a href="{{route('slide.create')}}" class=" btn btn-sm  btn-success pull-right"> <i class="fa fa-plus"></i> Thêm </a>
                </div>
                <div class="box-header">

                </div>
                <div class="box-body">
                    @if(session()->has('message_success'))
                        <div class="alert alert-success">
                            <strong>Success !</strong> {{session()->get('message_success')}}
                        </div>
                    @endif
                    @include('backend.slide.list')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('after_script')
    <script src="{{asset('static/backend')}}/bower_components/datatables.net/js/select2.full.min.js"></script>
    <script src="{{asset('static/backend')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('static/backend')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{asset('static/backend')}}/bower_components/datatables.net-bs/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{asset('static/backend')}}/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('static/backend')}}/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <script src="{{asset('static/static/backend')}}/js/slider/custom.js"></script>
@stop

