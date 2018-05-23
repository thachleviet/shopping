

@extends('frontend.layouts')
@section('script_after')
    <script src="{{asset('frontend')}}/js/imagezoom.js"></script>
    <!-- cart -->
    <script defer src="{{asset('frontend')}}/js/jquery.flexslider.js"></script>
    <link rel="stylesheet" href="{{asset('frontend')}}/css/flexslider.css" type="text/css" media="screen" />
    <script src="{{asset('frontend')}}/js/imagezoom.js"></script>
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    <!--//End-rate-->
    <link href="{{asset('frontend')}}/css/owl.carousel.css" rel="stylesheet">
    <script src="{{asset('frontend')}}/js/owl.carousel.js"></script>
    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                items : 1,
                lazyLoad : true,
                autoPlay : true,
                navigation : false,
                navigationText :  false,
                pagination : true,
            });
        });
    </script>
    <style>
        div#myTabContent img{
            margin: 0;
            position: relative;
            width: 100%  !important;
        }
    </style>
@stop

@section('content')
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Single</span></h3>
        </div>
    </div>
    <!--banner-->

    <!--content-->
    <div class="content">
        <!--single-->
        <div class="single-wl3">
            <div class="container">
                <div class="single-grids">
                    <div class="col-md-9 single-grid">
                        <div clas="single-top">
                            <div class="single-left">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li data-thumb="{{asset($object['product_image'])}}">
                                            <div class="thumb-image"><img  src="{{asset($object['product_image'])}}" data-imagezoom="true" class="img-responsive"> </div>
                                        </li>
                                        @foreach($listImage as $key=>$item)
                                            <li data-thumb="{{asset($item['image_product'])}}">
                                                <div class="thumb-image"><img  src="{{asset($item['image_product'])}}" data-imagezoom="true" class="img-responsive"> </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="single-right simpleCart_shelfItem">
                                <h4>{{$object['product_name']}}</h4>

                                <p class="price item_price">{{number_format($object['product_price'])}}</p>
                                <div class="description">
                                    <p><span>Mô tả : </span> {!!  $object['product_description'] !!}</p>
                                </div>
                                <div class="color-quality">
                                    <?php $class = new Constants();

                                    $class->countProductIds($object['product_id']);
                                    ?>
                                    <h6> Trạng thái :
                                    @if($object['product_number'] < (int)$class->countProductIds($object['product_id']))
                                        {{'Hết hàng'}}
                                        @else
                                        {{'Còn hàng'}}
                                    @endif
                                    </h6>
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus1" id="value-minus1">&nbsp;</div>
                                            <div class="entry value1" id="count">1</div>
                                            <div class="entry value-plus1 active" id="value-plus1">&nbsp;</div>
                                        </div>
                                    </div>
                                    <!--quantity-->
                                    <script>
                                        $('#value-plus1').on('click', function(){
                                            $('#count').html((Number($('#count').html())+1))
                                        });

                                        $('.value-minus1').on('click', function(){
                                            var minus = (Number($('#count').html())- 1);

                                            if(Number(minus) <1){
                                                $('#count').html(1)
                                            }else{
                                                $('#count').html(minus)
                                            }

                                        });
                                    </script>
                                    <!--quantity-->
                                </div>

                                <div class="women">
                                    {{--<span class="size">XL / XXL / S </span>--}}
                                    <a href='javascript:void(0)'  onclick="Cart.addCart('{{$object['product_id']}}','{{$object['product_name']}}', Number($('.quantity .value1').html()), '{{$object['product_price']}}',  '{{$object['product_image']}}')"  data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                </div>
                                <div class="social-icon">
                                    <a href="#"><i class="icon"></i></a>
                                    <a href="#"><i class="icon1"></i></a>
                                    <a href="#"><i class="icon2"></i></a>
                                    <a href="#"><i class="icon3"></i></a>
                                </div>
                            </div>
                            <div class="clearfix">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 single-grid1">
                        <h3 class="tittle1"style="color:#1ab315; font-size: 26px">Sản phẩm cùng loại </h3>
                        @foreach($listProductSame as $key=>$item)
                            <div class="recent-grids">
                                <div class="recent-left">
                                    <?php

                                    $class = new Constants();

                                    $count  = $class->countProductIds($item['product_id']) ;
//                                   echo  $count;
                                    //var_dump($count);
                                    ?>
                                    <a href="{{route('products.detail',$item['product_id'])}}"><img class="img-responsive "  src="{{asset($item['product_image'])}}" alt=""></a>
                                </div>
                                <div class="recent-right">
                                    <h6 class="best2"><a href="{{route('products.detail',$item['product_id'])}}">{{$item['product_name']}} </a></h6>

                                    <span class="price-in1">  {{$item['product_price']}}</span>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <!--Product Description-->
                <div class="product-w3agile">
                    <h3 class="tittle1">Chi tiết sản phẩm </h3>
                    <div class="product-grids">

                        <div class="col-md-4 product-grid">
                            <h3 class="tittle1" style="color:#1ab315; font-size: 26px">Sản phẩm khuyến mãi </h3>
                            <div style="padding-top: 20px" id="owl-demo" class="owl-carousel">
                                <div class="item">

                                    @foreach($listProductDiscount as $key=>$value)
                                        <div class="recent-grids">
                                            <div class="recent-left">
                                                <a href="{{route('products.detail',$value['product_id'])}}"><img class="img-responsive "  src="{{asset($value['product_image'])}}" alt=""></a>
                                            </div>
                                            <div class="recent-right">
                                                <h6 class="best2"><a href="{{route('products.detail',$value['product_id'])}}">{{$value['product_name']}} </a></h6>

                                                <span class=" price-in1">  {{$value['product_price']}} VNĐ</span>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>

                                    @endforeach
                                </div>

                            </div>
                            <img style="padding-top: 20px" class="img-responsive "  src="{{asset('frontend')}}/images/woo2.jpg" alt="">
                        </div>
                        <div class="col-md-8 product-grid1">
                            <div class="tab-wl3">
                                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
                                        {{--<li role="presentation"><a href="#reviews" role="tab" id="reviews-tab" data-toggle="tab" aria-controls="reviews">Reviews (1)</a></li>--}}
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        {!!$object['product_content'] !!}
                                        {{--{{ html_entity_decode($object['product_content']) }}--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <!--Product Description-->
            </div>
        </div>
        <!--single-->

    </div>
@endsection

