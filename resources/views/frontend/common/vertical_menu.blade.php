<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">

            @foreach ($categories as $category)
            {{-- <a href="{{ url('category/product/' .$category->id.'/' .$category->category_slug_en ) }}"> --}}
                <li class="dropdown menu-item">
                    {{-- <a href="{{ url('category/product/' .$category->id.'/' .$category->category_slug_en ) }}"> --}}
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon" aria-hidden="true">


                    </i>
                            {{ $category->name }}
                    </a>
                    {{-- </a> --}}
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @foreach ($category->childes as $childs)
                                    <div class="col-sm-12 col-md-3">
                                        {{-- <a href="{{ url('subcategory/product/' .$subcategory->id. '/' .$subcategory->sub_category_slug_en) }}"> --}}
                                        <h2 class="title">
                                                {{ $childs->name }}

                                        </h2>
                                        </a>

                                </h2>

                                {{-- <!--   // Get SubSubCategory Table Data -->
                                                            @php
                                                                $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)
                                                                    ->orderBy('subsubcategory_name_en', 'ASC')
                                                                    ->get();
                                                            @endphp --}}

                                @foreach ($category->subChildes as $subchiled)
                                    <ul class="links list-unstyled">
                                        <li>
                                            {{-- <a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en ) }}"> --}}
                                                    {{ $subchiled->name }}
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
