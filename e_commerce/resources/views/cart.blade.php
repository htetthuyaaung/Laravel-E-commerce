

@extends('layouts.index')

@section('title', 'Cart')

@section('content')

   <main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>login</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<div class="wrap-iten-in-cart">

                    @if (session()->has('success_message'))
					<div class="alert alert-success" role="alert">
						{{ session()->get('success_message')}}
					</div>
					@endif
				
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
						</ul>
					</div>
					
               		 @endif

                 	@if (Cart::count() >0)
                		<h3 class="box-title">{{ Cart::count() }}Product(s) Name</h3>
							<div class="products-cart">
                        
                        
						<div class="pr-cart-item">
							@foreach ( Cart::content() as $item)
							<div class="product-image">
                            <a href="{{ route('Shop.show', $item->model->slug)}}"><figure><img src="{{ asset('assets/images/products/'.$item->model->slug.'jpg')}}" alt="item"></figure></a>
							</div>
							<div class="product-name">
                            <a class="link-to-product" href="{{ route('Shop.show', $item->model->slug)}}">{{ $item->model->name}}</a>
							</div>
							<div class="price-field produtc-price"><p class="price">${{ $item->model->price}}</p></div>
							<div class="quantity">
								<div class="quantity-input">
									<input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >									
									<a class="btn btn-increase" href="#"></a>
									<a class="btn btn-reduce" href="#"></a>
								</div>
							</div>
							<div class="price-field sub-total"><p class="price">$256.00</p></div>
							<div class="delete">
								<a href="#" class="btn btn-delete" title="">
									<span>Delete from your cart</span>
									<i class="fa fa-times-circle" aria-hidden="true"></i>
								</a>
							</div>
							 @endforeach
                        </div>
                        
					</div>
                 @else
                 <h3>No items in cart!</h3>
                 @endif												
                    
                 
                </div>
               
				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">Order Summary</h4>
						<p class="summary-info"><span class="title">Subtotal</span><b class="index">$512.00</b></p>
						<p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
						<p class="summary-info total-info "><span class="title">Total</span><b class="index">$512.00</b></p>
					</div>
					<div class="checkout-info">
						<label class="checkbox-field">
							<input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
						</label>
						<a class="btn btn-checkout" href="checkout.html">Check out</a>
						<a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
					</div>
					<div class="update-clear">
						<a class="btn btn-clear" href="#">Clear Shopping Cart</a>
						<a class="btn btn-update" href="#">Update Shopping Cart</a>
					</div>
				</div>
                <!--start related prodcuts-->
				<div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Related Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                            @foreach ($relatedproduct as $product)
                                <div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="{{ route('Shop.show', $product->slug)}}" title="{{$product->name}}">
										<figure><img src="{{ asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="{{ route('Shop.show', $product->slug)}}" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="{{ route('Shop.show', $product->slug)}}" class="product-name"><span>{{$product->name}}</span></a>
                                <div class="wrap-price"><span class="product-price">${{ $product->price }}</span></div>
								</div>
							</div>
                            @endforeach
							
						</div>
					</div><!--End wrap-products-->
				</div><!--end related prodcuts-->

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
@endsection
