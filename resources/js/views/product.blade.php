
@extends('layouts.frontend.app')

@section('title')
	{{$title}}
@endsection

@section('meta')
@php
	$website = App\Website::get()->last();
@endphp
   <meta name='subject' content='ecommerce's subject'>
   <meta name='title' content='{{$title}} || {{ config('app.name') }}'>
   <meta name='description' content='@if (isset($website->meta_tag)) {{$website->meta_tag}} @endif'>
   <meta name='keywords' content='@if (isset($website->meta_keyword)) {{$website->meta_keyword}} @endif'>
   <meta name='author' content='yousuf1648|projanmoit.com'>
   <meta name='copyright' content='yousuf1648|projanmoit.com'>
@endsection

@push('css')
    <style>
        .set_upbg {
            background-color: #8BE78B;
            padding: 10px;
        }
    </style>
@endpush

@section('content')
    <div class="breadcrumbs_area commun_bread py-3 grey-section">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul class="text-capitalize">
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>Category</li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>{{$title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <div class="container">
        <div class="shop_wrapper shop_reverse pt-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="sidebar_widget set_upbg">
                            <!--widget color start-->
                            <div class="widget_list widget_color">
                                <h3>Category</h3>
                                @php
                                    $categories = App\Category::where('parent_id', NULL)->orderBy('id', 'DESC')->get();
                                @endphp
                                <ul>
                                    @foreach ($categories as $key=>$category)
                                        <li><a href="{{ route('category',$category->slug) }}">{{ $category->name }} </a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--widget color start-->

                            <!--manufacturer start-->
                            <div class="widget_list manufacturer">
                                <h3>Sub Category</h3>
                                @php
                                    $category = App\Category::where('parent_id', '!=',NULL)->orderBy('id', 'DESC')->get();
                                @endphp
                                <ul>
                                    @foreach ($category as $key=>$cate)
                                        <li><a href="#">{{ $cate->name }} </a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--manufacturer start-->

                            <!--widget  price start-->
                            <div class="widget_list price">
                                <h3>Pricer</h3>
                                <ul>
                                    <li><a href="{{route('price',['min_price'=>0, 'max_price'=>99])}}">0.00 - 100.00 </a></li>
                                    <li><a href="{{route('price',['min_price'=>101, 'max_price'=>199])}}">101.00 - 200.00 </a></li>
                                    <li><a href="{{route('price',['min_price'=>201, 'max_price'=>299])}}">201.00 - 300.00 </a></li>
                                    <li><a href="{{route('price',['min_price'=>301, 'max_price'=>499])}}">300 - 499.00</a></li>
                                    <li><a href="{{route('price',['min_price'=>500, 'max_price'=>999999999])}}">500 +</a></li>
                                </ul>
                            </div>
                            <!--widget  price start-->

                            <!--widget banner start-->
                            <div class="widget_list banner">
                                <div class="banner_thumb">
                                    <a href="#"><img src="{{ asset('frontend/img/banner/banner9.png') }}" alt=""></a>
                                </div>
                            </div>
                            <!--widget banner end-->
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <!--shop toolbar start-->
                        <div class="shop_toolbar">
                            <div class="select_option number show">
                                <form action="#">
                                    <label>Show:</label>
                                    <select name="orderby" id="short">
                                        <option selected value="1">9</option>
                                        <option value="1">19</option>
                                        <option value="1">30</option>
                                    </select>
                                </form>
                            </div>
                            <div class="select_option sort_by">
                                <form action="#">
                                    <label>Sort By</label>
                                    <select name="orderby" id="short1">
                                        <option selected value="1">Position</option>
                                        <option value="1">Price: Lowest</option>
                                        <option value="1">Price: Highest</option>
                                        <option value="1">Product Name:Z</option>
                                        <option value="1">Sort by price:low</option>
                                        <option value="1">Product Name: Z</option>
                                        <option value="1">In stock</option>
                                        <option value="1">Product Name: A</option>
                                        <option value="1">In stock</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <!--shop toolbar end-->
                        <!--shop tab product-->
                        <div class="shop_tab_product">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="large" role="tabpanel">
                                    <div class="row">
                                        @foreach ($products as $key=>$product)
                                            <div class="col-md-4">
                                                <div class="product text-center mb-4 grey-section">
                                                    <figure class="product-media mb-0">
                                                        <a href="{{ route('product_details',$product->slug) }}">
                                                            <img style="width: 263px; height: 263px;" src="{{ URL::to($product->cover_photo) }}" alt="{{ $product->title }}">
                                                        </a>
                                                        <div class="product-label-group">
                                                            @if($product->discount)
                                                                <span class="product-label label-sale">{{$product->discount}}% off</span>
                                                            @endif
                                                        </div>
                                                        <div class="product-action-vertical">
                                                            <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                                        </div>
                                                    </figure>
                                                    <div class="Service-bottom py-3">
                                                        <h3 class="title" title="{{ $product->title }}">
                                                            <a href="{{ route('product_details',$product->slug) }}">{{ $product->title }}</a>
                                                        </h3>
                                                        <div class="product-price">
                                                            <ins class="new-price">৳ {{ $product->sell_price }}</ins>
                                                            @if($product->discount)
                                                                <del class="old-price">৳ {{ $product->regular_price }}</del>
                                                            @endif
                                                        </div>
                                                        <div class="product-action">
                                                            <a href="{{ route('add_to_cart',$product->id) }}" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="Quick View">buy now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
	<script>
		function wishlist_form_submit(id) {
		    document.getElementById('wishlist_form_'+id).submit();
		}
	</script>
@endpush
