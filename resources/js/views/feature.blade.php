@extends('layouts.frontend.app')

@section('title')
	{{$title}}
@endsection

@section('meta')
@php
	$website = App\Website::get()->last();
@endphp

@endsection

@push('css')

@section('content')
	<div class="breadcrumbs_area commun_bread py-3 grey-section">
		<div class="container">   
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb_content">
						<ul class="text-capitalize">
							<li><a href="{{ route('home') }}">home</a></li>
							<li><i class="fa fa-angle-right"></i></li>
							<li>{{$title}}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>         
	</div>
    <div class="best_selling_section  py-4">
        <div class="container">
            <div class="row cat">
                @if ($feature->count() > 0)
                    @foreach ($feature as $key=>$fea)
                        <div class="col-lg-3">
                            <div class="product text-center mb-4 grey-section">
                                <figure class="product-media mb-0">
                                    <a href="{{ route('product_details',$fea->slug) }}">
                                        <img style="width: 263px; height: 263px;" src="{{ URL::to($fea->cover_photo) }}" alt="{{ $fea->title }}">
                                    </a>
                                    <div class="product-label-group">
                                        @if($fea->discount)
                                            <span class="product-label label-sale">{{$fea->discount}}% off</span>
                                        @endif
                                    </div>
                                    <div class="product-action-vertical">
                                        <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a> -->
                                    </div>
                                </figure>
                                <div class="Service-bottom py-3">
                                    <h3 class="title" title="{{ $fea->title }}">
                                        <a href="{{ route('product_details',$fea->slug) }}">{{ $fea->title }}</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">৳ {{ $fea->sell_price }}</ins>
                                        @if($fea->discount)
                                            <del class="old-price">৳ {{ $fea->regular_price }}</del>
                                        @endif
                                    </div>
                                    <div class="product-action">
                                        <a href="{{ route('add_to_cart',$fea->id) }}" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="Buy Now">buy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush