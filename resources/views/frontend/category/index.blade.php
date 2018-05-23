

@extends('frontend.layouts')
@section('script_after')


@stop


@section('content')
    <div class="content">
        <div class="products-agileinfo">
            <h2 class="tittle">Men's Wear</h2>
            <div class="container">
                <div class="product-agileinfo-grids w3l">
                    @include('frontend.category.silderbar-menu')
                    <div class="col-md-9 product-agileinfon-grid1">
                        <div class="product-agileinfon-top">
                            <div class="col-md-6 product-agileinfon-top-left">
                                <img class="img-responsive " src="images/img3.jpg" alt="">
                            </div>
                            <div class="col-md-6 product-agileinfon-top-left">
                                <img class="img-responsive " src="images/img4.jpg" alt="">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="mens-toolbar">
                            <p>Showing 1–9 of 21 results</p>
                            <p class="showing">Sorting By
                                <select>
                                    <option value=""> Name</option>
                                    <option value="">  Rate</option>
                                    <option value=""> Color </option>
                                    <option value=""> Price </option>
                                </select>
                            </p>
                            <p>Show
                                <select>
                                    <option value=""> 9</option>
                                    <option value="">  10</option>
                                    <option value=""> 11 </option>
                                    <option value=""> 12 </option>
                                </select>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav1 nav1-tabs left-tab" role="tablist">
                                <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><img src="images/menu1.png"></a></li>
                                    <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><img src="images/menu.png"></a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                        <div class="product-tab">
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                                <div class="grid-arr">
                                                    <div class="grid-arrival">
                                                        <figure>
                                                            <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                <div class="grid-img">
                                                                    <img src="images/p16.jpg" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="grid-img">
                                                                    <img src="images/p15.jpg" class="img-responsive" alt="">
                                                                </div>
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                                <div class="grid-arr">
                                                    <div class="grid-arrival">
                                                        <figure>
                                                            <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                <div class="grid-img">
                                                                    <img src="images/p28.jpg" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="grid-img">
                                                                    <img src="images/p27.jpg" class="img-responsive" alt="">
                                                                </div>
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                                <div class="grid-arr">
                                                    <div class="grid-arrival">
                                                        <figure>
                                                            <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                <div class="grid-img">
                                                                    <img src="images/p10.jpg" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="grid-img">
                                                                    <img src="images/p9.jpg" class="img-responsive" alt="">
                                                                </div>
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="product-tab prod1">
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
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
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
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
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                                <div class="grid-arr">
                                                    <div class="grid-arrival">
                                                        <figure>
                                                            <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                <div class="grid-img">
                                                                    <img src="images/p30.jpg" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="grid-img">
                                                                    <img src="images/p29.jpg" class="img-responsive" alt="">
                                                                </div>
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="product-tab">
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
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
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
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
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
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
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="product-tab prod2">
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                                <div class="grid-arr">
                                                    <div class="grid-arrival">
                                                        <figure>
                                                            <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                <div class="grid-img">
                                                                    <img src="images/s12.jpg" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="grid-img">
                                                                    <img src="images/s11.jpg" class="img-responsive" alt="">
                                                                </div>
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                                <div class="grid-arr">
                                                    <div class="grid-arrival">
                                                        <figure>
                                                            <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                <div class="grid-img">
                                                                    <img src="images/p16.jpg" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="grid-img">
                                                                    <img src="images/p15.jpg" class="img-responsive" alt="">
                                                                </div>
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
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
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
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
@endsection

