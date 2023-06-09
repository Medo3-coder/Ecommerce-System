<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        {{-- @if (session()->get('language') == 'hindi')
                            <li><a href="{{ route('User_dashboard') }}"><i class="icon fa fa-user"></i>আমার অ্যাকাউন্ট</a>
                            </li>
                        @else
                            <li><a href="{{ route('User_dashboard') }}"><i class="icon fa fa-user"></i>My Account</a></li>
                        @endif --}}


                        <li><a href="#"><i class="icon fa fa-user"></i>
                                @if (session()->get('language') == 'arabic')
                                    حسابي الشخصي
                                @elseif (session()->get('language') == 'hindi')
                                    मेरी प्रोफाइल
                                @else
                                    My Account
                                @endif
                            </a></li>




                        {{-- <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li> --}}
                        <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a href="{{ route('my-cart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                        <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>


                        {{-- to hide login page when he login --}}
                        @auth
                            <li><a href="{{ route('user.dashboard') }}"><i class="icon fa fa-user"></i>User Profile</a>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login</a></li>
                        @endauth



                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                data-hover="dropdown" data-toggle="dropdown"><span class="value">
                                    @if (session()->get('language') == 'hindi')
                                        हिन्दी
                                    @elseif(session()->get('language') == 'arabic')
                                        العربية
                                    @else
                                        English
                                    @endif
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">

                                @if (session()->get('language') == 'hindi')
                                    <li><a href="{{ route('english.language') }}">English</a></li>
                                    <li><a href="{{ route('arabic.language') }}">Arabic</a></li>
                                @elseif(session()->get('language') == 'arabic')
                                    <li><a href="{{ route('hindi.language') }}">Hindi</a></li>
                                    <li><a href="{{ route('english.language') }}">English</a></li>
                                @else
                                    <li><a href="{{ route('arabic.language') }}">Arabic</a></li>
                                    <li><a href="{{ route('hindi.language') }}">Hindi</a></li>
                                @endif







                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="{{ url('/') }}"> <img
                                src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo"> </a> </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                            href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ==================== SHOPPING CART DROPDOWN ==================== -->

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count" id="cartQty">2</span></div>
                                <div class="total-price-basket"> <span class="lbl">cart -</span>
                                    <span class="total-price"> <span class="sign">$</span>
                                        <span class="value" id="cartSubTotal"></span> </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- // Mini Cart Start with Ajax -->
                                <div id="miniCart">

                                </div>

                                <!-- // End Mini Cart Start with Ajax -->
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span>
                                        <span class='price' id="cartSubTotal"></span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="checkout.html"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

  @include('site.layouts.partials.navbar')

</header>
