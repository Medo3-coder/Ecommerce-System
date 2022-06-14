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
        <div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th class="cart-romove item">Image</th>
					<th class="cart-description item">Name</th>
					<th class="cart-product-name item">Color</th>
					<th class="cart-edit item">Size</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Subtotal</th>
					<th class="cart-total last-item">Remove</th>
				</tr>
			</thead><!-- /thead -->
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
