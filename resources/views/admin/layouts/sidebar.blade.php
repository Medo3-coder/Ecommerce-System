@php
    $prefix = Request::Route()->getPrefix(); // to get route prefix
    $route = Route::current()->getName(); // to get current route name
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Medo</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>



            <li class="{{ $route == 'admin.index' ? 'active' : '' }}">
                <a href="{{ route('admin.index') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Admins</span>
                </a>
            </li>


            <li class="{{ $prefix == 'admin/brand' ? 'active' : '' }}">
                <a href="{{ route('brands.index') }}">
                    <i data-feather="message-circle"></i>
                    <span>Brands</span>
                </a>
            </li>

            {{-- <li class="treeview {{ $prefix == 'admin/brand' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu {{ $route == 'brands.index' ? 'active' : '' }}">
                    <li class="{{ $route == 'brands.index' ? 'active' : '' }}"><a href="{{ route('brands.index') }}"><i
                                class="ti-more"></i>brands</a></li>
                    <li><a href="calendar.html"><i class="ti-more"></i>Calendar</a></li>
                </ul>
            </li> --}}






            <li class="treeview {{ $prefix == 'admin/category' ? 'active' : '' }} ">
                <a href="#">
                    <i data-feather="mail"></i> <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'categories.index' ? 'active' : '' }}"><a
                            href="{{ route('categories.index') }}"><i class="ti-more"></i> Categories</a></li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == 'admin/product' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'add-product' ? 'active' : '' }}">
                        <a href="{{ route('add-product') }}"><i class="ti-more"></i>Add products</a>
                    </li>
                    <li class="{{ $route == 'manage-product' ? 'active' : '' }}">
                        <a href="{{ route('manage-product') }}"><i class="ti-more"></i>Manage products</a>
                    </li>
                </ul>
            </li>




            {{-- <li class="treeview {{ $prefix == 'admin/slider' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'manage-slider' ? 'active' : '' }}">
                        <a href="{{ route('manage-slider') }}"><i class="ti-more"></i>Manage Sliders</a>
                    </li>
                </ul>
            </li> --}}




            <li class="{{ $prefix == 'admin/slider' ? 'active' : '' }}">
                <a href="{{ route('sliders.index') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Sliders</span>
                </a>
            </li>


            <li class="treeview {{ $prefix == 'admin/coupons' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Coupons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'manage-coupon' ? 'active' : '' }}">
                        <a href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Manage Coupons</a>
                    </li>
                </ul>
            </li>


            <li class="treeview {{ $prefix == 'admin/shipping' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Shipping Area</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'manage-division' ? 'active' : '' }}">
                        <a href="{{ route('manage-division') }}"><i class="ti-more"></i>Ship Division</a>
                    </li>

                    <li class="{{ $route == 'manage-district' ? 'active' : '' }}">
                        <a href="{{ route('manage-district') }}"><i class="ti-more"></i>Ship District</a>
                    </li>


                    <li class="{{ $route == 'manage-state' ? 'active' : '' }}">
                        <a href="{{ route('manage-state') }}"><i class="ti-more"></i>Ship State</a>
                    </li>



                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                </ul>
            </li>



            <li class="treeview">
                <a href="#">
                    <i data-feather="package"></i>
                    <span>Utilities</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="utilities_border.html"><i class="ti-more"></i>Border</a></li>
                    <li><a href="utilities_color.html"><i class="ti-more"></i>Color</a></li>
                    <li><a href="utilities_ribbons.html"><i class="ti-more"></i>Ribbons</a></li>
                    <li><a href="utilities_tab.html"><i class="ti-more"></i>Tabs</a></li>
                    <li><a href="utilities_animations.html"><i class="ti-more"></i>Animation</a></li>
                </ul>
            </li>
        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
