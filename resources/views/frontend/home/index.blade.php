
@extends('frontend.layouts')
@section('after_script')
<script src="{{asset('static')}}/frontend/js/cart.js"></script>
    @stop
@section('content')
@include('frontend.components._banner')
<div class="content">
    <!--banner-bottom-->
    <div class="ban-bottom-w3l">
        <div class="container">
            <div class="col-md-6 ban-bottom">
                <div class="ban-top">
                    <img src="{{asset('frontend')}}/images/p1.jpg" class="img-responsive" alt=""/>
                    <div class="ban-text">
                        <h4>Men’s Clothing</h4>
                    </div>
                    <div class="ban-text2 hvr-sweep-to-top">
                        <h4>50% <span>Off/-</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ban-bottom3">
                <div class="ban-top">
                    <img src="{{asset('frontend')}}/images/p2.jpg" class="img-responsive" alt=""/>
                    <div class="ban-text1">
                        <h4>Women's Clothing</h4>
                    </div>
                </div>
                <div class="ban-img">
                    <div class=" ban-bottom1">
                        <div class="ban-top">
                            <img src="{{asset('frontend')}}/images/p3.jpg" class="img-responsive" alt=""/>
                            <div class="ban-text1">
                                <h4>T - Shirt</h4>
                            </div>
                        </div>
                    </div>
                    <div class="ban-bottom2">
                        <div class="ban-top">
                            <img src="{{asset('frontend')}}/images/p4.jpg" class="img-responsive" alt=""/>
                            <div class="ban-text1">
                                <h4>Hand Bag</h4>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--banner-bottom-->
    <!--new-arrivals-->
    <div class="new-arrivals-w3agile">
        <div class="container">
            <h2 class="tittle">Thời trang khuyến mãi </h2>
            <div class="arrivals-grids">

                @foreach($listProductNew as $key=>$item)
                <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                    <div class="grid-arr">
                        <div  class="grid-arrival">
                            <figure>
                                <a  href="{{route('products.detail', $item['product_id'])}}" class="new-gri" >
                                    {{----}}
                                    <div class="grid-img">
                                        <img src="{{asset($item['product_image'])}}" class="img-responsive" alt="">
                                    </div>
                                    <div class="grid-img">
                                        <img src="{{asset($item['product_image_intro'])}}" class="img-responsive"  alt="">
                                    </div>
                                </a>
                            </figure>
                        </div>
                        @if($item['product_is_new'] == 1)
                        <div class="ribben">
                            <p>NEW</p>
                        </div>
                        @endif

                        @if($item['product_discount'] == 1)
                            <div class="ribben1">
                                <p>SALE</p>
                            </div>
                        @endif
                        <div class="women">
                            <h6 style="font-size: 14px"><a href="{{route('products.detail', $item['product_id'])}}">{{$item['product_name']}}</a></h6>
                            {{--<span class="size">XL / XXL / S </span>--}}
                            <p ><em class="item_price">{{number_format($item['product_price'], 2)}} vnđ</em></p>
                            <a href='javascript:void(0)' onclick="Cart.addCart('{{$item['product_id']}}','{{$item['product_name']}}', 1, '{{$item['product_price']}}',  '{{$item['product_image']}}')"  data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                            <a href="{{route('products.detail',$item['product_id'])}}"  data-text="Xem chi tiết" class="my-cart-b item_add">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--new-arrivals-->
    <!--accessories-->
    <div class="accessories-w3l">
        <div class="container">
            <h3 class="tittle">20% Discount on</h3>
            <span>TRENDING DESIGNS</span>
            <div class="button">
                <a href="#" class="button1"> Shop Now</a>
                <a href="#" class="button1"> Quick View</a>
            </div>
        </div>
    </div>
    <!--accessories-->
    <!--Products-->
    <div class="product-agile">
        <div class="container">
            <h3 class="tittle1"> Sản phẩm mới nhất</h3>
            <div class="slider">
                <div class="callbacks_container">
                    <ul class="rslides" id="slider">
                        <li>
                            <div class="caption">
                                @foreach($listProductNew as $key=>$item)
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="grid-arr panel panel-default text-center">
                                            <div  class="grid-arrival">
                                                <figure>
                                                    <a href="{{route('products.detail', $item['product_id'])}}">
                                                        <div class="grid-img">
                                                            <img src="{{asset($item['product_image'])}}" class="img-responsive" alt="">
                                                        </div>
                                                        <div class="grid-img">
                                                            <img src="{{asset($item['product_image_intro'])}}" class="img-responsive"  alt="">
                                                        </div>
                                                    </a>
                                                </figure>
                                            </div>
                                            <div class="block">

                                            </div>

                                            @if($item['product_is_new'] == 1)
                                                <div class="ribben">
                                                    <p>NEW</p>
                                                </div>
                                            @endif
                                            <div class="women">

                                                <h6 style="font-size: 14px"><a href="{{route('products.detail', $item['product_id'])}}">{{$item['product_name']}}</a></h6>
                                                <?php $class = new Constants();

                                                $class->countProductIds($item['product_id']);
                                                ?>

                                                <p ><em class="item_price">{{number_format($item['product_price'])}} vnđ</em></p>
                                                <a href='javascript:void(0)' onclick="Cart.addCart('{{$item['product_id']}}','{{$item['product_name']}}', 1, '{{$item['product_price']}}',  '{{$item['product_image']}}')"  data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                <a href="{{route('products.detail',$item['product_id'])}}"  data-text="Xem chi tiết" class="my-cart-b item_add">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Products-->
    <div class="latest-w3">
        <div class="container">
            <h3 class="tittle1">Latest Fashion Trends</h3>
            <div class="latest-grids">
                <div class="col-md-4 latest-grid">
                    <div class="latest-top">
                        <img src="{{asset('frontend')}}/images/l1.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Men</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4>-50%</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 latest-grid">
                    <div class="latest-top">
                        <img src="{{asset('frontend')}}/images/l2.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Shoes</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4>-20%</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 latest-grid">
                    <div class="latest-top">
                        <img src="{{asset('frontend')}}/images/l3.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Women</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4>-50%</h4>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="latest-grids">
                <div class="col-md-4 latest-grid">
                    <div class="latest-top">
                        <img src="{{asset('frontend')}}/images/l4.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Watch</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4>-45%</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 latest-grid">
                    <div class="latest-top">
                        <img src="{{asset('frontend')}}/images/l5.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Bag</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4>-10%</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 latest-grid">
                    <div class="latest-top">
                        <img src="{{asset('frontend')}}/images/l6.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Cameras</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4>-30%</h4>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!--new-arrivals-->
</div>
@endsection
@section('script_after')

@stop
