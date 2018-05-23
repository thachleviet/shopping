
@extends('backend.layouts')
@section('after_style')
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">

@stop
@section('content')
    {{--<div id="app">--}}

        <div class="panel-body table-responsive">
            <router-view name="NewsIndex"></router-view>
            <router-view></router-view>
        </div>
    {{--</div>--}}

@endsection
@section('after_script')

    <script src="{{asset('//cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js')}}"></script>
    <script src="{{asset('//cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.min.js')}}"></script>

    <script src="{{asset('static/backend')}}/js/news/custom.js"></script>
@stop
