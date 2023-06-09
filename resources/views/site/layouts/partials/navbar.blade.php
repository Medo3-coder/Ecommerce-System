    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}"
                                        data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                                        @if (session()->get('language') == 'hindi')
                                            घर
                                        @elseif(session()->get('language') == 'arabic')
                                            الصفحة الرئيسية
                                        @else
                                            Home
                                        @endif
                                    </a>
                                </li>

                                <!--   // Get Category Table Data -->
                                @php
                                    $categories = App\Models\Category::where('parent_id', null)
                                        ->limit(8)
                                        ->get();
                                @endphp

                                @foreach ($categories as $category)
                                    <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown"
                                            class="dropdown-toggle" data-toggle="dropdown">

                                            {{ $category->name }}

                                        </a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">


                                                        <!--   // Get SubCategory Table Data -->
                                                        @foreach ($category->childes as $subcategory)
                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">

                                                                <a
                                                                    href="{{ url('subcategory/product/' . $subcategory->id . '/' . $subcategory->slug) }}">
                                                                    <h2 class="title">
                                                                        {{ $subcategory->name }}
                                                                    </h2>
                                                                </a>


                                                                <!--   // Get SubSubCategory Table Data -->
                                                                @foreach ($category->subChildes as $subChild)
                                                                    <ul class="links">
                                                                        <li><a
                                                                                href="{{ url('subsubcategory/product/' . $subChild->id . '/' . $subChild->slug) }}">
                                                                                {{ $subChild->name }}
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                @endforeach
                                                            </div>
                                                            <!-- /.col -->
                                                        @endforeach

                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img class="img-responsive"
                                                                src="{{ asset('frontend/assets/images/banners/top-menu-banner') }}.jpg"
                                                                alt="">
                                                        </div>
                                                        <!-- /.yamm-content -->
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach


                                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a>
                                </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->
