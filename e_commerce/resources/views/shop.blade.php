
@extends('layouts.index')

@section('title', 'Shop')

@section('content')
  <main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Digital & Electronics</span></li>
				</ul>
			</div>
			<div class="row">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

					<div class="wrap-shop-control">

						<h1 class="shop-title">Digital & Electronics</h1>

					</div><!--end wrap shop control-->

					<div class="row">

						<ul class="product-list grid-products equal-container">

							@foreach ($products as $product)
								<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
								<div class="product product-style-3 equal-elem ">
									<div class="product-thumnail">
										<a href="{{ route('Shop.show', $product->slug)}}" title="{{ $product->name }}">
											<figure><img src="{{ asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}"></figure>
										</a>
									</div>
									<div class="product-info">
										<a href="{{ route('Shop.show', $product->slug)}}" class="product-name"><span>{{ $product->name }}</span></a>
									<div class="wrap-price"><span class="product-price">${{ $product->price}}</span></div>
										<a href="#" class="btn add-to-cart">Add To Cart</a>
									</div>
								</div>
							</li>
							@endforeach
							
						

						</ul>

					</div>

					<div class="wrap-pagination-info">
					
					{{ $products->links('vendor.pagination.custom') }}
					</div>
				</div><!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget mercado-widget categories-widget">
						<h2 class="widget-title">All Categories</h2>
						<div class="widget-content">
							<ul class="list-category">
								<li class="category-item has-child-cate">
									<a href="#" class="cate-link">Fashion & Accessories</a>
									<span class="toggle-control">+</span>
									<ul class="sub-cate">
										<li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>
									</ul>
								</li>
								<li class="category-item has-child-cate">
									<a href="#" class="cate-link">Furnitures & Home Decors</a>
									<span class="toggle-control">+</span>
									<ul class="sub-cate">
										<li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>
									</ul>
								</li>
								<li class="category-item has-child-cate">
									<a href="#" class="cate-link">Digital & Electronics</a>
									<span class="toggle-control">+</span>
									<ul class="sub-cate">
										<li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>
									</ul>
								</li>
								<li class="category-item">
									<a href="#" class="cate-link">Tools & Equipments</a>
								</li>
								<li class="category-item">
									<a href="#" class="cate-link">Kid’s Toys</a>
								</li>
								<li class="category-item">
									<a href="#" class="cate-link">Organics & Spa</a>
								</li>
							</ul>
						</div>
					</div><!-- Categories widget-->

					<div class="widget mercado-widget filter-widget price-filter">
						<h2 class="widget-title">Price</h2>
						<div class="widget-content">
							<div id="slider-range"></div>
							<p>
								<label for="amount">Price:</label>
								<input type="text" id="amount" readonly>
								<button class="filter-submit">Filter</button>
							</p>
						</div>
					</div><!-- Price-->


					<div class="widget mercado-widget widget-product">
						<h2 class="widget-title">Popular Products</h2>
						<div class="widget-content">
							<ul class="products">
								
									
								@foreach ($popularproduct as $product)
								<li class="product-item">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="{{ route('Shop.show', $product->slug)}}" title="{{ $product->name }}">
												<figure><img src="{{ asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}"></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="{{ route('Shop.show', $product->slug)}}" class="product-name"><span>{{ $product->name }}</span></a>
										<div class="wrap-price"><span class="product-price">${{ $product->price }}</span></div>
										</div>
									</div>
								</li>
								@endforeach

							</ul>
						</div>
					</div><!-- brand widget-->

				</div><!--end sitebar-->

			</div><!--end row-->

		</div><!--end container-->

	</main>
@endsection

