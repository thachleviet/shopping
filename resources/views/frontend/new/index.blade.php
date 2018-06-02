@extends('frontend.layouts')
@section('title', $title)
@section('after_style')

@endsection

@section('content')
<div id="content" class="blog-wrapper blog-archive page-wrapper">
    <header class="archive-page-header">
        <div class="row">
            <div class="large-12 text-center col">
                <h1 class="page-title is-large uppercase">
                    Bài viết	</h1>
            </div>
        </div>
    </header><!-- .page-header -->


    <div class="row row-large row-divided ">

        <div class="large-9 col">




            <div class="row large-columns-1 medium-columns- small-columns-1">
                @foreach($_object as $key=>$item)
                    <div class="col post-item">
                        <div class="col-inner">
                            <a href="{{route('tin-tuc.detail', $item['id'])}}" class="plain">
                                <div class="box box-vertical box-text-bottom box-blog-post has-hover">
                                    <div class="box-image" style="width:40%;">
                                        <div class="image-cover" style="padding-top:56%;">
                                            <img  alt="{{$item['new_title']}}" width="300" height="166" src="{{asset($item['new_image'])}}" class="attachment-medium size-medium wp-post-image"  sizes="(max-width: 300px) 100vw, 300px">  							  							  						</div>
                                    </div><!-- .box-image -->
                                    <div class="box-text text-left">
                                        <div class="box-text-inner blog-post-inner">

                                            <h5 class="post-title is-large ">{{$item['new_title']}}</h5>
                                            <div class="is-divider"></div>
                                            <p class="from_the_blog_excerpt ">{{Illuminate\Support\Str::words($item['new_description'],100)}} </p>



                                        </div><!-- .box-text-inner -->
                                    </div><!-- .box-text -->
                                    <div class="badge absolute top post-date badge-outline">
                                        <div class="badge-inner">
                                            <span class="post-date-day">{{date('d', strtotime($item['created_at']))}}</span><br>
                                            <span class="post-date-month is-xsmall">{{date('m', strtotime($item['created_at']))}}</span>
                                        </div>
                                    </div>
                                </div><!-- .box -->
                            </a><!-- .link -->
                        </div><!-- .col-inner -->
                    </div>
                @endforeach

            </div>

        </div> <!-- .large-9 -->

        <div class="post-sidebar large-3 col">
            <div id="secondary" class="widget-area " role="complementary">
                @if($_related->count()>0)
                    <aside id="flatsome_recent_posts-2" class="widget flatsome_recent_posts"><h3 class="widget-title ">
                            <span>Bài viết liên quan</span></h3><div class="is-divider small"></div>
                        <ul>
                            @foreach($_related as $key=>$item)
                                <li class="recent-blog-posts-li">
                                    <div class="flex-row recent-blog-posts align-top pt-half pb-half">
                                        <div class="flex-col mr-half">
                                            <div class="badge post-date badge-small badge-outline">
                                                <div class="badge-inner bg-fill">
                                                    <span class="post-date-day">{{date('d',strtotime($item['created_at']))}}</span><br>
                                                    <span class="post-date-month is-xsmall">Th5</span>
                                                </div>
                                            </div>
                                        </div><!-- .flex-col -->
                                        <div class="flex-col flex-grow">
                                            <a href="{{route('tin-tuc.detail', $item['id'])}}" title="{{$item['product_name']}}">[Xem] {{\Illuminate\Support\Str::words($item['new_title'],50)}}</a>
                                            <span class="post_comments oppercase op-7 block is-xsmall">
                                                <a href="{{route('san-pham.detail', [$item['id'],$item['slug']])}}" title="{{$item['product_name']}}">

                                                </a>
                                            </span>
                                        </div>
                                    </div><!-- .flex-row -->
                                </li>

                            @endforeach

                        </ul>
                    </aside>
                @endif
                    <aside id="flatsome_recent_posts-2" class="widget flatsome_recent_posts"><h3 class="widget-title ">
                            <span>Sản phẩm khuyến mãi</span></h3><div class="is-divider small"></div>
                        <ul>

                            @foreach($_objectDiscount as $key=>$item)


                                <li class="recent-blog-posts-li">
                                    <div class="flex-row recent-blog-posts align-top pt-half pb-half">
                                        <div class="flex-col mr-half">
                                            <div class="badge post-date badge-small badge-outline">
                                                <a href="{{route('san-pham.detail',[$item['id'],$item['slug']])}}">
                                                    <img width="180" height="180" src="{{asset($item['product_image'])}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt=""
                                                         sizes="(max-width: 180px) 100vw, 180px">

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
                                            </div>
                                        </div><!-- .flex-col -->
                                        <a href="{{route('san-pham.detail', [$item['id'],$item['slug']])}}">
                                            <span class="product-title">{{$item['product_name']}}</span></a>

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
        </div><!-- .post-sidebar -->

    </div><!-- .row -->

</div>
@endsection