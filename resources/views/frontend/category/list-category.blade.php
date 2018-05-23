

@extends('frontend.layouts')
@section('after_style')
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/jquery-ui.css">
@stop
@section('content')

    <form method="get">
        <div class="banner1">
            <div class="container">
                <h3><a href="index.html">Home</a> / <span>Products</span></h3>
            </div>
        </div>
        <div class="content">

            <div class="products-agileinfo">

                {{--<h2 class="tittle">Men's Wear</h2>--}}
                <div class="container">
                    <div class="product-agileinfo-grids w3l">
                        @include('frontend.category.silderbar-menu')
                        <div class="col-md-9 product-agileinfon-grid1">

                            <div class="product-agileinfon-top">
                                <div class="col-md-6 product-agileinfon-top-left">
                                    <img class="img-responsive " src="{{asset('frontend')}}/images/img3.jpg" alt="">
                                </div>
                                <div class="col-md-6 product-agileinfon-top-left">
                                    <img class="img-responsive " src="{{asset('frontend')}}/images/img4.jpg" alt="">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mens-toolbar">
                                <p> Showing {{ $listCategory->firstItem() }} to {{ $listCategory->lastItem() }} of {{ $listCategory->total() }} results</p>
                                <p class="showing">Hiển thị giá
                                    <select name="sort" id="sort" class="product-filter">
                                        <option {{($param['sort'] == 'asc') ? 'selected' : ''}} value="{{URL::current().'?sort=asc&limit='.$param['limit'].'&start_price='.$param['start_price'].'&end_price='.$param['end_price']}}"> Cao đến thấp </option>
                                        <option {{($param['sort'] == 'desc') ? 'selected' : ''}} value="{{URL::current().'?sort=desc&limit='.$param['limit'].'&start_price='.$param['start_price'].'&end_price='.$param['end_price']}}"> Thấp đến cao </option>
                                    </select>
                                </p>
                                <p>Show
                                    <select name="limit" id="limit" class="product-filter">
                                        <option {{($param['limit'] == 12) ? 'selected' : ''}} value="{{URL::current().'?sort='.$param['sort'].'&limit=12'.'&start_price='.$param['start_price'].'&end_price='.$param['end_price']}}"> 12</option>
                                        <option {{($param['limit'] == 24) ? 'selected' : ''}} value="{{URL::current().'?sort='.$param['sort'].'&limit=24'.'&start_price='.$param['start_price'].'&end_price='.$param['end_price']}}"> 24</option>
                                        <option {{($param['limit'] == 36) ? 'selected' : ''}} value="{{URL::current().'?sort='.$param['sort'].'&limit=36'.'&start_price='.$param['start_price'].'&end_price='.$param['end_price']}}"> 36</option>
                                        <option {{($param['limit'] == 48) ? 'selected' : ''}} value="{{URL::current().'?sort='.$param['sort'].'&limit=48'.'&start_price='.$param['start_price'].'&end_price='.$param['end_price']}}"> 48</option>
                                    </select>
                                </p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav1 nav1-tabs left-tab" role="tablist">
                                    {{--<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">--}}
                                    {{--<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="glyphicon glyphicon-th"></i></a></li>--}}
                                    {{--<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><i class="glyphicon glyphicon-th-list"></i></a></li>--}}
                                    {{--</ul>--}}
                                    <h2  style="margin-bottom: 20px; text-align: left" class="title1">Danh sách thể loại</h2>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                            <div class="product-tab" id="product-tab">

                                                @foreach($listCategory as $item)
                                                    <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                                        <div class="grid-arr">
                                                            <div class="grid-arrival">
                                                                <figure>
                                                                    <a href="{{route('products.detail',$item['product_id'])}}" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                        <div class="grid-img">
                                                                            <img src="{{asset($item['product_image'])}}" class="img-responsive" alt="{{$item['product_name']}}">
                                                                        </div>
                                                                        <div class="grid-img">
                                                                            <img src="{{asset($item['product_image'])}}" class="img-responsive" alt="{{$item['product_name']}}">
                                                                        </div>
                                                                    </a>
                                                                </figure>
                                                            </div>
                                                            <div class="block">

                                                            </div>
                                                            <div class="women">
                                                                <h6><a href="{{route('products.detail', $item['product_id'])}}">{{$item['product_name']}}</a></h6>
                                                                <p ><em class="item_price">{{number_format($item['product_price'], 2)}} vnđ</em></p>
                                                                <a href='javascript:void(0)' onclick="Cart.addCart('{{$item['product_id']}}','{{$item['product_name']}}', 1, '{{$item['product_price']}}',  '{{$item['product_image']}}')"  data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                                <a href="{{route('products.detail',$item['product_id'])}}"  data-text="Xem chi tiết" class="my-cart-b item_add">Xem chi tiết</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="clearfix"></div>
                                            </div>
                                            @include('frontend.sub.pagination')
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                                            <div class="product-tab1">
                                                <div class="col-md-4 product-tab1-grid">
                                                    <div class="grid-arr">
                                                        <div class="grid-arrival">
                                                            <figure>
                                                                <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                    <div class="grid-img">
                                                                        <img src="images/s2.jpg" class="img-responsive" alt="">
                                                                    </div>
                                                                    <div class="grid-img">
                                                                        <img src="images/s1.jpg" class="img-responsive" alt="">
                                                                    </div>
                                                                </a>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Refert tamen, quo modo. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium. </p>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="product-tab1 prod3">
                                                <div class="col-md-4 product-tab1-grid">
                                                    <div class="grid-arr">
                                                        <div class="grid-arrival">
                                                            <figure>
                                                                <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                    <div class="grid-img">
                                                                        <img src="images/s4.jpg" class="img-responsive" alt="">
                                                                    </div>
                                                                    <div class="grid-img">
                                                                        <img src="images/s3.jpg" class="img-responsive" alt="">
                                                                    </div>
                                                                </a>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Refert tamen, quo modo. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium. </p>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="product-tab1">
                                                <div class="col-md-4 product-tab1-grid">
                                                    <div class="grid-arr">
                                                        <div class="grid-arrival">
                                                            <figure>
                                                                <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                    <div class="grid-img">
                                                                        <img src="images/s6.jpg" class="img-responsive" alt="">
                                                                    </div>
                                                                    <div class="grid-img">
                                                                        <img src="images/s5.jpg" class="img-responsive" alt="">
                                                                    </div>
                                                                </a>
                                                            </figure>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women w3l">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Refert tamen, quo modo. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium. </p>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="product-tab1 prod3">
                                                <div class="col-md-4 product-tab1-grid">
                                                    <div class="grid-arr">
                                                        <div class="grid-arrival">
                                                            <figure>
                                                                <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                    <div class="grid-img">
                                                                        <img src="images/s8.jpg" class="img-responsive" alt="">
                                                                    </div>
                                                                    <div class="grid-img">
                                                                        <img src="images/s7.jpg" class="img-responsive" alt="">
                                                                    </div>
                                                                </a>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Refert tamen, quo modo. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium. </p>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="product-tab1">
                                                <div class="col-md-4 product-tab1-grid">
                                                    <div class="grid-arr">
                                                        <div class="grid-arrival">
                                                            <figure>
                                                                <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                    <div class="grid-img">
                                                                        <img src="images/s10.jpg" class="img-responsive" alt="">
                                                                    </div>
                                                                    <div class="grid-img">
                                                                        <img src="images/s9.jpg" class="img-responsive" alt="">
                                                                    </div>
                                                                </a>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Refert tamen, quo modo. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium. </p>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </ul></div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="start_price" id="start_price" value="">
        <input type="hidden" name="end_price" id="start_price" value="">
    </form>
@endsection
@section('script_after')
    <script src="{{asset('static/main/js/main.js?v='.time())}}"></script>
    <script type="text/javascript">
        CategoryProduct._init();
    </script>

    <script type='text/javascript'>//<![CDATA[
        $(window).load(function(){
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 1000000,
                values: [ 0, 1000000],
                slide: function( event, ui ) {
                    $( "#amount" ).val(ui.values[ 0 ] + "đ - " + ui.values[ 1 ]+ 'đ' );
                    $('input[name=start_price]').val(ui.values[ 0 ]);
                    $('input[name=end_price]').val(ui.values[ 1 ]);
                }
            });
            $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 )+ "đ  - " + $( "#slider-range" ).slider( "values", 1 )+'đ');
        });
    </script>
    <script type="text/javascript" src="{{asset('frontend')}}/js/jquery-ui.js"></script>

@stop
