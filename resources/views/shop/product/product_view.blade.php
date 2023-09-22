@extends('shop.layouts.app')
@section('breadcrumb')
    <x-website.breadcrumb>
        {{ Breadcrumbs::render($SinglePageView['breadcrumb'],$trees,$Product) }}
    </x-website.breadcrumb>
@endsection
@section('content')

    <div class="section ProductViewPage pt-lg-5 pt-4 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    @if($Product->more_photos_count > 0 )
                        <div class="product-image vertical_gallery">
                            <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
                                @foreach($Product->more_photos as $photo)
                                    <div class="item">
                                        <a href="#" class="product_gallery_item  @if($loop->index == 0) active @endif" data-image="{{getPhotoPath($photo->photo)}}" data-zoom-image="{{getPhotoPath($photo->photo)}}">
                                            <img src="{{getPhotoPath($photo->photo)}}" alt="product_small_img1" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="product_img_box">
                                @foreach($Product->more_photos as $photo)
                                    @if($loop->index == 0)
                                        <img id="product_img" src='{{getPhotoPath($photo->photo_thum_1)}}' data-zoom-image="{{getPhotoPath($photo->photo)}}" alt="product_img1" />
                                        <a href="#" class="product_img_zoom" title="Zoom">
                                            <span class="linearicons-zoom-in"></span>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="product_img_box">
                            <img id="product_img" src='{{getPhotoPath($Product->photo)}}' data-zoom-image="{{getPhotoPath($Product->photo)}}" alt="product_img1" />
                        </div>
                    @endif
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="pr_detail">
                        <div class="product_description product_view_page">
                            <h2 class="product_title def_h2" style="line-height: 40px!important;">{{$Product->name}}</h2>
                            <x-shop.print-product-price :product="$Product" :show-avr="true" />

                            <div class="clearfix"></div>

                            @if($Product->des)
                                <div class="pr_desc">
                                    <p>{!! nl2br($Product->des) !!}</p>
                                </div>
                            @endif

                            <div class="clearfix"></div>
                        </div>
                        <hr />
                        <div class="cart_extra">
                            <div class="cart-product-quantity">
                                <div class="quantity">
                                    <input type="button" value="-" class="minus">
                                    <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                    <input type="button" value="+" class="plus">
                                </div>
                            </div>

                            <div class="cart_btn">
                                <button class="btn btn-fill-out btn-addtocart" type="button"><i class="icon-basket-loaded"></i> {{__('web/cart.Add To Cart')}}</button>
                            </div>


                        </div>
                        <hr />
                        <ul class="product-meta">
                            @if($Product->ref_code)
                                <li> {{__('web/def.lable_SKU')}} <a href="#">  <span>{{$Product->ref_code}}</span> </a></li>
                            @endif

                            <li>{{__('web/def.lable_Category')}}
                                @foreach($Product->product_with_category as $category )
                                    <a href="{{ route('Page_WebCategoryView',$category->slug)}}"><span> {{$category->name}}</span></a>
                                @endforeach
                            </li>
                        </ul>


                    </div>

                </div>
            </div>


            @if(count($ReletedProducts) > 0)

                <div class="row mt-lg-5">
                    <div class="col-12">
                        <h3 class="ReletedProducts">{{__('web/def.Releted_Products')}}</h3>
                        <hr>
                    </div>

                    <div class="col-12">
                        @if($agent->isMobile())
                            <div class="row align-items-center mb-4 pb-1">
                                <div class="col-12">
                                    <div class="product_header">
                                        <div class="product_header_right">
                                            <div class="products_view">
                                                <a href="javascript:void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                                <a href="javascript:void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div class="row shop_container shop_container_50  mt-lg-3">
                            @foreach($ReletedProducts as $Product )
                                <div class="col-lg-3 col-md-4 col-6">
                                    <x-shop.block-list-pro-from-cat  :product="$Product" :category="$Category" />
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            @endif










        </div>
    </div>
@endsection


@section('AddScript')

@endsection
