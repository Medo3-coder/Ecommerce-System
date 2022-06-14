@extends('frontend.main_master')
@section('content')
@section('title', 'My Cart')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>My Cart</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="my-wishlist-page">
            <div class="row">
                <div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">My Cart</th>
                                </tr>
                            </thead>
                            <tbody id="cartPage">



                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
     @include('frontend.layouts.brands')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->


  {{-- <div class="rating">
    <i class="fa fa-star rate"></i>
    <i class="fa fa-star rate"></i>
    <i class="fa fa-star rate"></i>
    <i class="fa fa-star rate"></i>
    <i class="fa fa-star non-rate"></i>
    <span class="review">( 06 Reviews )</span>
</div> --}}

@endsection
