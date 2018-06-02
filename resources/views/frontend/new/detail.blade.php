
@extends('frontend.layouts')
@section('title', $title)
@section('after_style')

@endsection

@section('content')
<div id="content" class="blog-wrapper blog-single page-wrapper">


    <div class="row row-large row-divided ">

        <div class="large-9 col">



            <article id="post-3130" class="post-3130 post type-post status-publish format-standard has-post-thumbnail hentry category-blog category-tu-van">
                <div class="article-inner ">
                    <header class="entry-header">
                        <div class="entry-header-text entry-header-text-top  text-center">

                            <h1 class="entry-title">{{$_object['new_title']}}</h1>
                            <div class="entry-divider is-divider small"></div>


                        </div><!-- .entry-header -->


                    </header><!-- post-header -->

                    <div class="entry-content single-page">

                        @if(!empty($_object))

                            {!! $_object['new_content'] !!}
                        @endif
                    </div><!-- .entry-content2 -->



                </div><!-- .article-inner -->
            </article><!-- #-3130 -->


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
                                                    <span class="post-date-day">03</span><br>
                                                    <span class="post-date-month is-xsmall">Th5</span>
                                                </div>
                                            </div>
                                        </div><!-- .flex-col -->
                                        <div class="flex-col flex-grow">
                                            <a href="{{route('news.detail', $item['id'])}}" title="{{$item['product_name']}}">[Xem] {{\Illuminate\Support\Str::words($item['new_title'],50)}}</a>
                                            <span class="post_comments oppercase op-7 block is-xsmall">
                                                <a href="{{route('san-pham.detail', [$item['id'], $item['slug']])}}" title="{{$item['product_name']}}">

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
                                            <a href="{{route('san-pham.detail', [$item['id'],$item['slug']])}}">
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

    </div><!-- .row -->

</div>
@endsection