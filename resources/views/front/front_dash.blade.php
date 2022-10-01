@extends('front-layouts.fmaster')
@section('title')
    Daily-Shop Home
@endsection
@section('content')
    <section id="aa-slider">
        <div class="aa-slider-area">
            <div id="sequence" class="seq col-md-8">
                <div class="seq-screen">
                    <ul class="seq-canvas">
                        <!-- single slide item -->
                        @foreach($banner as $list)
                            <li>
                                <div class="seq-model">
                                    <img data-seq src="{{asset('banner/'.$list->image)}}"/>
                                </div>
                                @if($list->btn_txt!='')
                                    <div class="seq-title">
                                        <a data-seq target="_blank" href="{{$list->btn_link}}"
                                           class="aa-shop-now-btn aa-secondary-btn">{{$list->btn_txt}}</a>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- slider navigation btn -->
                <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                    <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                    <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
                </fieldset>
            </div>
        </div>
    </section>
    <!-- / slider -->
    <!-- Start Promo section -->
    <section id="aa-promo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-promo-area">
                        <div class="row">
                            <div class="col-md-12 no-padding">
                                <div class="aa-promo-right">
                                    @foreach($categories as $list)
                                        <div class="aa-single-promo-right">
                                            <div class="aa-promo-banner">
                                                <img src="{{asset('category/'.$list->category_image)}}" alt="img">
                                                <div class="aa-prom-content">
                                                    <h4>
                                                        <a href="{{url('front/category/'.$list->category_slug)}}">{{$list->category_name}}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Promo section -->
    <!-- Products section -->
    <section id="aa-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-product-area">
                            <div class="aa-product-inner">
                                <!-- start prduct navigation -->
                                <ul class="nav nav-tabs aa-products-tab">
                                    @foreach($categories as $key=>$list)
                                        <li class=""><a href="#cat{{$key}}"
                                                        data-toggle="tab">{{$list->category_name}}</a></li>
                                    @endforeach
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Start men product category -->
                                    @php
                                        $loop_count=1;
                                    @endphp
                                    {{--                                    @dd($categories)--}}
                                    @foreach($categories as $keys=>$list)
                                        @php
                                            $cat_class="";
                                            if($loop_count==1){
                                              $cat_class="in active";
                                              $loop_count++;
                                            }
                                        @endphp
                                        <div class="tab-pane fade{{$cat_class}} " id="cat{{$keys}}">
                                            <ul class="aa-product-catg col-md-10">


                                                @if(isset($list->proitem[0]))
                                                    @foreach($list->proitem as $productArr)

                                                        <li>
                                                            <figure>
                                                                <a class="aa-product-img"
                                                                   href="{{url('front/product/'.$productArr->slug)}}"><img
                                                                        src="{{asset('main_image/'.$productArr->image)}}"
                                                                        alt="{{$productArr->name}}"></a>
                                                                @if(isset($productArr->productAttr[0]))
                                                                    <a class="aa-add-card-btn" href="javascript:void(0)"
                                                                       onclick="home_add_to_cart('{{$productArr->id}}','{{$productArr->productAttr[0]->size}}','{{$productArr->productAttr[0]->color}}')"><span
                                                                            class="fa fa-shopping-cart"></span>Add To
                                                                        Cart</a>
                                                                    <figcaption>
                                                                        <h4 class="aa-product-title"><a
                                                                                href="{{url('front/product/'.$productArr->slug)}}">{{$productArr->name}}</a>
                                                                        </h4>
                                                                        <span
                                                                            class="aa-product-price">Rs {{$productArr->productAttr[0]->price}}</span><span
                                                                            class="aa-product-price"><del>Rs {{$productArr->productAttr[0]->mrp}}</del></span>
                                                                    </figcaption>
                                                                @endif
                                                            </figure>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <li>
                                                        <figure>
                                                            No data found
                                                            <figure>
                                                    <li>
                                                @endif
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Products section -->
    <!-- banner section -->
    <section id="aa-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-banner-area">
                            <a href="#"><img src="{{asset('front/img/fashion-banner.jpg')}}"
                                             alt="fashion banner img"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- popular section -->
    <section id="aa-popular-category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-popular-category-area">
                            <!-- start prduct navigation -->
                            <ul class="nav nav-tabs aa-products-tab">
                                <li class="active"><a href="#featured" data-toggle="tab">Featured</a></li>
                                <li><a href="#tranding" data-toggle="tab">Tranding</a></li>
                                <li><a href="#discounted" data-toggle="tab">Discounted</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Start men featured category -->
                                <div class="tab-pane fade in active" id="featured">
                                    <ul class="aa-product-catg aa-featured-slider">
                                        <!-- start single product item -->


                                        @if(isset($featured_product))
                                            @foreach($featured_product as $productArr)

                                                <li>
                                                    <figure>

                                                        <a class="aa-product-img"
                                                           href="{{url('front/product/'.$productArr->slug)}}"><img
                                                                src="{{asset('main_image/'.$productArr->image)}}"
                                                                alt="{{$productArr->name}}"></a>

                                                        <a class="aa-add-card-btn" href="javascript:void(0)"
                                                           onclick="home_add_to_cart('{{$productArr->id}}','{{$productArr->productAttr[0]->size}}','{{$productArr->productAttr[0]->color}}')"><span
                                                                class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a
                                                                    href="{{url('front/product/'.$productArr->slug)}}">{{$productArr->name}}</a>
                                                            </h4>
                                                            <span
                                                                class="aa-product-price">Rs {{$productArr->productAttr[0]->price}}</span><span
                                                                class="aa-product-price"><del>Rs {{$productArr->productAttr[0]->mrp}}</del></span>
                                                        </figcaption>

                                                    </figure>
                                                </li>
                                            @endforeach
                                        @else
                                            <li>
                                                <figure>
                                                    No data found
                                                    <figure>
                                            <li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- / popular product category -->

                                <!-- start tranding product category -->
                                <div class="tab-pane fade" id="tranding">
                                    <ul class="aa-product-catg aa-tranding-slider">
                                        <!-- start single product item -->
                                        @if(isset($tranding_product))
                                            @foreach($tranding_product as $productArr)
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img"
                                                           href="{{url('front/product/'.$productArr->slug)}}"><img
                                                                src="{{asset('main_image/'.$productArr->image)}}"
                                                                alt="{{$productArr->name}}"></a>
                                                        <a class="aa-add-card-btn" href="javascript:void(0)"
                                                           onclick="home_add_to_cart('{{$productArr->id}}','{{$productArr->productAttr[0]->size}}','{{$productArr->productAttr[0]->color}}')"><span
                                                                class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a
                                                                    href="{{url('front/product/'.$productArr->slug)}}">{{$productArr->name}}</a>
                                                            </h4>
                                                            <span
                                                                class="aa-product-price">Rs {{$productArr->productAttr[0]->price}}</span><span
                                                                class="aa-product-price"><del>Rs {{$productArr->productAttr[0]->mrp}}</del></span>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                            @endforeach
                                        @else
                                            <li>
                                                <figure>
                                                    No data found
                                                    <figure>
                                            <li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- / featured product category -->

                                <!-- start discounted product category -->
                                <div class="tab-pane fade" id="discounted">
                                    <ul class="aa-product-catg aa-discounted-slider col-md-12">
                                        <!-- start single product item -->

                                        @if(isset($discount_product))
                                            @foreach($discount_product as $productArr)
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img"
                                                           href="{{url('front/product/'.$productArr->slug)}}"><img
                                                                src="{{asset('main_image/'.$productArr->image)}}"
                                                                alt="{{$productArr->name}}"></a>
                                                        <a class="aa-add-card-btn" href="javascript:void(0)"
                                                           onclick="home_add_to_cart('{{$productArr->id}}','{{$productArr->productAttr[0]->size}}','{{$productArr->productAttr[0]->color}}')"><span
                                                                class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a
                                                                    href="{{url('front/product/'.$productArr->slug)}}">{{$productArr->name}}</a>
                                                            </h4>
                                                            <span
                                                                class="aa-product-price">Rs {{$productArr->productAttr[0]->price}}</span><span
                                                                class="aa-product-price"><del>Rs {{$productArr->productAttr[0]->mrp}}</del></span>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                            @endforeach
                                        @else
                                            <li>
                                                <figure>
                                                    No data found
                                                </figure>
                                            <li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- / latest product category -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / popular section -->
    <!-- Support section -->
    <section id="aa-support">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-support-area">
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-truck"></span>
                                <h4>FREE SHIPPING</h4>
                                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-clock-o"></span>
                                <h4>30 DAYS MONEY BACK</h4>
                                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-phone"></span>
                                <h4>SUPPORT 24/7</h4>
                                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Support section -->

    <!-- Client Brand -->
    <section id="aa-client-brand">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-client-brand-area">
                        <ul class="aa-client-brand-slider">
                            @foreach($brand as $list)
                                <li><a href="#"><img src="{{asset('brand/'.$list->image)}}" alt="{{$list->name}}"
                                                     width="300" height="200"></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Client Brand -->
    <input type="hidden" id="qty" value="1"/>
    <form id="frmAddToCart">
        <input type="hidden" id="size_id" name="size_id"/>
        <input type="hidden" id="color_id" name="color_id"/>
        <input type="hidden" id="pqty" name="pqty"/>
        <input type="hidden" id="product_id" name="product_id"/>
        @csrf
    </form>
@endsection
