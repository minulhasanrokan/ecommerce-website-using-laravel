<?php
	use App\Models\product;
?>

@extends('frontend.master')

@section('content')
<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Sub Categories</h3>
							<div class="checkbox-filter">
								@foreach($subCategories as $subCategory)
								@php
									$productCountBySubCat =App\Models\product::product_count_by_sub_cat($subCategory->cat_id);
								@endphp
								<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										<li>
											<a href="{{url('/product-by-sub-category/'.$subCategory->cat_id)}}">
												{{$subCategory->category_name}}
												<small>({{$productCountBySubCat}})</small>
											</a>
										</li>
									</label>
								</div>
								@endforeach
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brand</h3>
							<div class="checkbox-filter">
								@foreach($brands as $brand)
								@php
									$productCountByBrand =App\Models\product::product_count_by_brand($brand->id);
								@endphp
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>

										<li>
											<a href="{{url('/product-by-brand/'.$brand->id)}}">
												{{$brand->brand_name}}
												<small>({{$productCountByBrand}})</small>
											</a>
										</li>
									</label>
								</div>
								@endforeach
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Top selling</h3>
			
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">


							@foreach($products as $product)
                                @php
                                 $product['product_image']=explode('!',$product->product_image);
                                 $image = $product->product_image[0];
                                @endphp
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<a href="{{url('/view-product-details/'.$product->id)}}">
									<div class="product-img">
										<img src="{{asset('product/'.$image)}}" alt="">
									</div>
									<div class="product-body">
										<a href="{{url('/product-by-category/'.$product->category->id)}}">
										<p class="product-category">{{$product->category->category_name}}</p>
										</a>
										<h3 class="product-name"><a href="{{url('/view-product-details/'.$product->id)}}">{{$product->product_name}}</a></h3>
										<h4 class="product-price">&#2547; {{$product->product_price}} <del class="product-old-price">&#2547; {{$product->product_price}}</del></h4>
										<div class="product-rating">
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
											
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>

										</div>
									</div>
								</a>
									<div class="add-to-cart">
										<form action="{{url('/add-to-cart')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </div>
                                    </form>
									</div>
								</div>
							</div>
							<!-- /product -->

							 @endforeach


						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection