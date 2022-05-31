<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">

            @foreach ($categories as $category)
            {{-- <a href="{{ url('category/product/' .$category->id.'/' .$category->category_slug_en ) }}"> --}}
                <li class="dropdown menu-item">
                    {{-- <a href="{{ url('category/product/' .$category->id.'/' .$category->category_slug_en ) }}"> --}}
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon {{ $category->category_icon }}" aria-hidden="true">


                    </i>

                        @if (session()->get('language') == 'hindi')
                            {{ $category->category_name_hin }}
                        @elseif(session()->get('language') == 'arabic')
                            {{ $category->category_name_ar }}
                        @else
                            {{ $category->category_name_en }}
                        @endif

                    </a>
                    {{-- </a> --}}
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @foreach ($category->subCategories as $subcategory)
                                    <div class="col-sm-12 col-md-3">
                                        <a href="{{ url('subcategory/product/' .$subcategory->id. '/' .$subcategory->sub_category_slug_en) }}">
                                        <h2 class="title">
                                            @if (session()->get('language') == 'hindi')
                                                {{ $subcategory->sub_category_name_hin }}
                                            @elseif(session()->get('language') == 'arabic')
                                                {{ $subcategory->sub_category_name_ar }}
                                            @else
                                                {{ $subcategory->sub_category_name_en }}
                                        </h2>
                                        </a>
                                @endif
                                </h2>

                                {{-- <!--   // Get SubSubCategory Table Data -->
                                                            @php
                                                                $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)
                                                                    ->orderBy('subsubcategory_name_en', 'ASC')
                                                                    ->get();
                                                            @endphp --}}

                                @foreach ($subcategory->subSubCategories as $subsubcategory)
                                    <ul class="links list-unstyled">
                                        <li><a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en ) }}">
                                                @if (session()->get('language') == 'hindi')
                                                    {{ $subsubcategory->subsubcategory_name_hin }}
                                                @elseif(session()->get('language') == 'arabic')
                                                    {{ $subsubcategory->subsubcategory_name_ar }}
                                                @else
                                                    {{ $subsubcategory->subsubcategory_name_en }}
                                                @endif
                                            </a>
                                        </li>

                                    </ul>
                                @endforeach
                                <!-- // End SubSubCategory Foreach -->

                            </div>
                            <!-- /.col -->
            @endforeach <!-- End SubCategory Foreach -->

</div>
<!-- /.row -->
</li>
<!-- /.yamm-content -->
</ul>
<!-- /.dropdown-menu -->
</li>
<!-- /.menu-item -->
@endforeach <!-- End Category Foreach -->


<!-- /.menu-item -->
<li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
            class="icon fa fa-paper-plane"></i>Kids and Babies</a>
    <!-- /.dropdown-menu -->
</li>
<!-- /.menu-item -->

<li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
            class="icon fa fa-futbol-o"></i>Sports</a>
    <!-- ================================== MEGAMENU VERTICAL ================================== -->
    <!-- /.dropdown-menu -->
    <!-- ================================== MEGAMENU VERTICAL ================================== -->
</li>
<!-- /.menu-item -->

<li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
            class="icon fa fa-envira"></i>Home and Garden</a>
    <!-- /.dropdown-menu -->
</li>
<!-- /.menu-item -->

</ul>
<!-- /.nav -->
</nav>
<!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->
