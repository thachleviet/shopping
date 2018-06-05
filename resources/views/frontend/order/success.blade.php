@extends('frontend.layouts')
@section('content')

    <div class="checkout-page-title page-title">
        <div class="page-title-inner flex-row medium-flex-wrap container">
            <div class="flex-col flex-grow medium-text-center">
                <nav class="breadcrumbs heading-font checkout-breadcrumbs text-center h2 strong">
                    <a href="{{route('cart')}}" class="hide-for-small">Thông tin giỏ hàng</a>
                    <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
                    <a href="{{route('order')}}" class="hide-for-small" >Thông tin chi tiết</a>
                    <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
                    <a href='javascript:void(0)' class="current" >Hoàn tất mua hàng</a>
                </nav>
            </div><!-- .flex-left -->
        </div><!-- flex-row -->
    </div><!-- .page-title -->
    <div class="cart-container container page-wrapper page-checkout">
        <div class="woocommerce">
            <h6 style="text-align: center; color: #BD362F">Chúc mừng bạn đã đặt hàng thành công  </h6>
        </div>
    </div>
@endsection
@section('after_script')

@stop