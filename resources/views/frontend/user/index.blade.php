@extends('frontend.layouts')
@section('content')
    <div class="content container">
        <!--login-->
        <div class="row login">
            <div class="col-md-12 row" style="margin-bottom: 20px; color: #00a65a; font-family:'Arial Black arial-black' ">
                <h2 class="title1">Thông tin tài khoản</h2>
            </div>
            <div class="row col-md-12">
                <div class=" " >
                    <div id="exTab1" >
                        <ul  class="nav nav-pills">
                            <li class="active">
                                <a  href="#1a" data-toggle="tab">Thông tin</a>
                            </li>
                            <li><a href="#2a" data-toggle="tab">Lịch sử đặt hàng</a>
                            </li>
                            {{--<li><a href="#3a" data-toggle="tab">Cập nhập thông tin</a>--}}
                            {{--</li>--}}
                        </ul>

                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="1a">


                            </div>
                            <div class="tab-pane" id="2a">

                                {{--<h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>--}}
                            </div>
                            {{--<div class="tab-pane" id="3a">--}}
                                {{--<h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>--}}
                            {{--</div>--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script_after')
    <script src="{{asset('static/main/js/main.js?v='.time())}}"></script>
    <script type="text/javascript">
        infoUser._init();
    </script>
@stop