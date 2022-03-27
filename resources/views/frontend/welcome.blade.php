@extends('frontend.master')

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            @foreach($categories as $category)
            <!-- shop -->
            <div class="col-md-3 col-xs-3">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('category/'.$category->category_image)}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>{{$category->category_name}}<br>Collection</h3>
                        <a href="{{$category->id}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
            @endforeach
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@include('frontend.include.new-products');

        @include('frontend.include.hot-deals');

        @include('frontend.include.top-saling-products1');

        @include('frontend.include.top-saling-products2');
@endsection