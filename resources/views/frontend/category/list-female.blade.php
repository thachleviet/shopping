@extends('frontend.layouts')
@section('title', $title)
@section('content')
    <style>
        ul.pagination {
            display: inline-block;
        }

        ul.pagination  li a{
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }
        ul.pagination  li span{
            color: white;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }
        ul.pagination  li.active{
            background-color: #4CAF50;
            color: white;
        }

        ul.pagination li:hover:not(.active) {background-color: #ddd;}
    </style>
    <div class="shop-page-title category-page-title page-title ">

        <div class="page-title-inner flex-row  medium-flex-wrap container">
            <div class="flex-col flex-grow medium-text-center">
                <div class="is-large">

                    <nav class="woocommerce-breadcrumb breadcrumbs"><a href="{{route('home')}}">Trang chủ</a> <span class="divider">/</span> Đồng hồ nữ</nav></div>
                <div class="category-filtering category-filter-row show-for-medium">
                    <a href="#" data-open="#shop-sidebar" data-visible-after="true" data-pos="left" class="filter-button uppercase plain">
                        <i class="icon-menu"></i>
                        <strong> Lọc</strong>
                    </a>
                    <div class="inline-block">
                    </div>
                </div>
            </div><!-- .flex-left -->

            <div class="flex-col medium-text-center">
                <p class="woocommerce-result-count hide-for-medium">

                    Hiển thị từ {{$_objectProduct->firstItem()}} đến {{$_objectProduct->lastItem()}} của  {{$_objectProduct->total()}} sản phẩm</p>

            </div>

        </div><!-- flex-row -->
    </div>
    <div class="row category-page-row">
        <div class="col large-3 hide-for-medium ">
            <div id="shop-sidebar" class="sidebar-inner col-inner">


                <aside id="woocommerce_products-2" class="widget woocommerce widget_products">
                    <h3 class="widget-title shop-sidebar">Sản phẩm giảm giá</h3><div class="is-divider small"></div><ul class="product_list_widget">

                        @foreach($_objectDiscount as $key=>$item)


                            <li>
                                <a href="{{route('san-pham.detail', [$item['id'],$item['slug']])}}">
                                    <img width="180" height="180" src="{{asset($item['product_image'])}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt=""
                                         sizes="(max-width: 180px) 100vw, 180px">		<span class="product-title">{{$item['product_name']}}</span>
                                </a>
                                <del>
                                            <span class="woocommerce-Price-amount amount">{{number_format($item['product_price'],2)}}
                                                <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                            </span>
                                </del>
                                <ins>

                                            <span class="woocommerce-Price-amount amount">{{number_format(($item['product_price']*(100 - $item['product_discount'])/100),2)}}
                                                <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                        </span>
                                </ins>
                            </li>
                        @endforeach


                    </ul>
                </aside>
            </div><!-- .sidebar-inner -->
        </div><!-- #shop-sidebar -->

        <div class="col large-9">
            <div class="shop-container">



                <div class="products row row-small large-columns-3 medium-columns-3 small-columns-2">

                    @foreach($_objectProduct as $key=>$item)
                        <div class="product-small col has-hover post-3492 product type-product status-publish has-post-thumbnail product_cat-dong-ho-bentley product_cat-dong-ho-nam product_cat-danh-muc-san-pham product_cat-phan-khuc-gia product_cat-duoi-5-trieu product_tag-bl1684-20471 product_tag-dong-ho-bentley product_tag-dong-ho-chinh-hang product_tag-dong-ho-day-da product_tag-dong-ho-deo-tay product_tag-dong-ho-nam  instock sale shipping-taxable purchasable product-type-simple">
                            <div class="col-inner">
                                @if($item['product_discount'] >0)
                                    <div class="badge-container absolute left top z-1">
                                        <div class="callout badge badge-circle">
                                            <div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div>
                                        </div>
                                    </div>
                                @endif
                                <div class="product-small box has-hover box-normal box-text-bottom">
                                    <div class="box-image">
                                        <div class="">
                                            <a href="{{route('san-pham.detail',[$item['id'],$item['slug']])}}">
                                                <img width="300" height="300"
                                                     src="{{asset($item['product_image'])}}"
                                                     class="show-on-hover absolute fill hide-for-small back-image" alt=""
                                                     sizes="(max-width: 300px) 100vw, 300px"/>
                                                <img width="300" height="300"  src="{{asset($item['product_image'])}}"
                                                     class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                     alt=""

                                                     sizes="(max-width: 300px) 100vw, 300px"/>
                                            </a>
                                        </div>

                                        <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                            <a   href="{{route('san-pham.detail', [$item['id'],$item['slug']])}}">Xem nhanh</a>
                                        </div>
                                    </div>
                                    <!-- box-image -->
                                    <div class="box-text text-center">
                                        <div class="title-wrapper">
                                            <p class="name product-title"><a
                                                        href="{{route('san-pham.detail', [$item['id'],$item['slug']])}}">{{$item['product_name']}}</a></p>
                                        </div>
                                        <div class="price-wrapper">
                                <span class="price">
                                    @if($item['product_discount'] >0)
                                        <del>
                                            <span class="woocommerce-Price-amount amount">{{number_format($item['product_price'],2)}}
                                                <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                            </span>
                                        </del>
                                        <ins>

                                            <span class="woocommerce-Price-amount amount">{{number_format(($item['product_price']*(100 - $item['product_discount'])/100),2)}}
                                                <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                        </span>
                                        </ins>
                                    @else
                                        <ins><span class="woocommerce-Price-amount amount">{{number_format($item['product_price'],2)}}
                                                <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                        </span>
                                    @endif

                                </span>
                                        </div>
                                    </div>
                                    <!-- box-text -->
                                </div>
                                <!-- box -->
                            </div>
                        </div><!-- col -->


                    @endforeach



                </div><!-- row -->
                @if($_objectProduct->count())
                    <div class="container">
                        <nav class="woocommerce-pagination">
                            <ul class="page-numbers nav-pagination links text-center">
                                @include('frontend.sub.pagination')

                            </ul>
                        </nav>
                    </div>
                @endif

            </div><!-- shop container -->
        </div>
    </div>

@endsection
