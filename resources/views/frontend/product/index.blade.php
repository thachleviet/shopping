

@extends('frontend.layouts')
@section('script_after')

@stop

@section('content')
<div class="content">
    <div class="products-agileinfo">

        <div class="container">
            <h2 class="tittle">Danh sách tiềm kiếm</h2>
            <h3>Có  {{$listProduct->count()}} sản phẩm được tìm thấy</h3>
            <div class="product-agileinfo-grids w3l">

                <div class="col-md-12 product-agileinfon-grid1 w3l">

                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav1 nav1-tabs left-tab" role="tablist">
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                    <div class="product-tab">
                                        @foreach($listProduct as $key=>$item)
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
                                                        <h6><a href="{{route('products.detail', $item['product_id'])}}">{{$item['product_name']}}</a></h6>
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
                        </ul>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
@endsection