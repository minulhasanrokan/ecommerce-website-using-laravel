<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +8801627197089</a></li>
                <li><a href="mailto:minulhasanrokan@gmail.com"><i class="fa fa-envelope-o"></i> minulhasanrokan@gmail.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> BDT</a></li>
                @php
                    $customerId=Session::get('id');
                @endphp
                @if($customerId!=null)
                <li><a href="{{url('/cus-logout')}}"><i class="fa fa-user-o"></i> Logout</a></li>
                @else
                <li><a href="{{url('/login-check')}}"><i class="fa fa-user-o"></i> Login</a></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{url('/')}}" class="logo">
                            <img src="{{asset('frontend/img/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{url('/search')}}" method="get">
                            <select name="category" class="input-select">
                                <option value="ALL" {{request('category') == "ALL" ? 'selected' : ''}}>All Categories</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" {{request('category') == $category->id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            <input name="search_text" class="input" placeholder="Search here">
                            <button type="submit" class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->
                        @php
                            $cartArray = cart_array();
                        @endphp
                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty"><?php echo count($cartArray);?></div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    @foreach($cartArray as $cartValue)
                                    @php
                                        $image = $cartValue['attributes'][0];
                                        $image = explode('!',$image);
                                        $image = $image[0];
                                    @endphp
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{asset('product/'.$image)}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">{{$cartValue['name']}}</a></h3>
                                            <h4 class="product-price"><span class="qty">{{$cartValue['quantity']}}x</span>&#2547; {{$cartValue['price']}}</h4>
                                        </div>
                                        <a class="delete" href="{{url('/delete-cart/'.$cartValue['id'])}}"><i class="fa fa-close"></i></a>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="cart-summary">
                                    <small><?php echo count($cartArray);?> Item(s) selected</small>
                                    <h5>SUBTOTAL: &#2547; {{Cart::getTotal();}}</h5>
                                </div>
                                <div class="cart-btns">
                                    @if($customerId!=null)
                                    <a style="width: 100%" href="{{url('/check-out')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                    @else
                                    <a style="width: 100%" href="{{url('/login-check')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->