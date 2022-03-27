<?php
	use App\Models\product;
?>

@extends('frontend.master')

@section('content')
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
<!-- Order Details -->
<div class="col-md-12 order-details">
	<div class="section-title text-center">
		<h3 class="title">Your Order</h3>
	</div>
	<div class="order-summary">
		<div class="order-col">
			<div><strong>PRODUCT</strong></div>
			<div><strong>TOTAL</strong></div>
		</div>
		<div class="order-products">
			@foreach($cartArray as $cart)
			<div class="order-col">
				<div>{{$cart['quantity']}}x {{$cart['name']}}</div>
				<div>&#2547; {{$cart['price']*$cart['quantity']}}</div>
			</div>
			@endforeach
		</div>
		<div class="order-col">
			<div>Shiping</div>
			<div><strong>&#2547; 50</strong></div>
		</div>
		<div class="order-col">
			<div><strong>TOTAL</strong></div>
			<div><strong class="order-total">&#2547; {{Cart::getTotal();}}</strong></div>
		</div>
	</div>
	<div class="section-title text-center" style="margin-top: 40px;">
		<h4 class="title"> Please Select A Payment Method</h4>
	</div>
	<form action="{{url('/order-place')}}" method="post">
		@csrf
		<div class="payment-method">
			<div class="input-radio">
				<input type="radio" name="payment" value="cash" id="payment-1">
				<label for="payment-1">
					<span></span>
					Cash On Delivary
				</label>
				<div class="caption">
					<p>Bkash No: 01627197089</p>
				</div>
			</div>
			<div class="input-radio">
				<input type="radio" name="payment" value="Bkash" id="payment-2">
				<label for="payment-2">
					<span></span>
					Bkash
				</label>
				<div class="caption">
					<p>Bkash No: 01627197089</p>
				</div>
			</div>
		</div>
		<div class="input-checkbox">
			<input type="checkbox" id="terms">
			<label for="terms">
				<span></span>
				I've read and accept the <a href="#">terms & conditions</a>
			</label>
		</div>
		<input style="float:right" class="primary-btn order-submit" type="submit" name="Submit" value="Place order">
	</form>
</div>
<!-- /Order Details -->
</div>
</div>
</div>
@endsection 