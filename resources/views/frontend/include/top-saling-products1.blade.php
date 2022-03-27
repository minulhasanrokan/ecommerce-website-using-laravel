 <!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Top selling</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            @foreach($categories as $category)
                            <li ><a data-toggle="tab" href="{{url('/product-by-category/'.$category->id)}}">{{$category->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                @foreach($topProducts as $topProduct)
                                @php
                                 $topProduct['product_image']=explode('!',$topProduct->product_image);
                                 $image = $topProduct->product_image[0];
                                @endphp
                                <!-- product -->
                                <div class="product">
                                    <a href="{{url('/view-product-details/'.$topProduct->id)}}">
                                        <div class="product-img">
                                            <img src="{{asset('product/'.$image)}}" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="product-body">
                                        <a href="{{url('/product-by-category/'.$topProduct->category->id)}}">
                                            <p class="product-category">{{$topProduct->category->category_name}}</p>
                                        </a>
                                        <h3 class="product-name"><a href="{{url('/view-product-details/'.$topProduct->id)}}">{{$topProduct->product_name}}</a></h3>
                                        <h4 class="product-price">&#2547; {{$topProduct->product_price}} <del class="product-old-price">&#2547; {{$topProduct->product_price}}</del></h4>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <form action="{{url('/add-to-cart')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="product_id" value="{{$topProduct->id}}">
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /product --> 
                                @endforeach

                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->