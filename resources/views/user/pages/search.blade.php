@extends('user.layout')
@section('content')
		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">
                    <ul class="short">
						<li>
							<a href="{{route('user.index')}}">Trang Chủ</a>
							<i class='fas fa-angle-right'></i>
						</li>
						<li>KẾT QUẢ TÌM KIẾM</li>
					</ul>
					
				</div>
			</div>
		</div>
		<!--//banner -->
		<!--/shop-->
		<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container-fluid">
				<div class="inner-sec-shop px-lg-4 px-3">
					
					<div class="row">
						<!-- product left -->
						
						<!-- //product left -->
						<!--/product right-->
						<div class="left-ads-display col-lg-12">
							<div class="wrapper_top_shop">
								
								
								<div class="row">
									<!-- /womens -->
									@foreach($kq as $books)
									<div class="col-md-3 product-men women_two shop-gd">
										<div class="product-googles-info googles">
											<div class="men-pro-item">
												<div class="men-thumb-item">
													<img src="{!! asset('image/'.$books->AnhSach)!!}" class="img-fluid" alt="">
													<div class="men-cart-pro">
														<div class="inner-men-cart-pro">
															<a href="{{route('user.single',$books->id)}}" class="link-product-add-cart">Xem Ngay</a>
														</div>
													</div>
													<span class="product-new-top">Mới</span>
												</div>
												<div class="item-info-product">
													<div class="info-product-price">
														<div class="grid_meta">
															<div class="product_price">
																<h4>
																	<a href="{{route('user.single',$books->id)}}">{{$books->TenSach}}</a>
																</h4>
																<div class="grid-price mt-2">
																	<span class="money ">{{number_format($books->GiaTien,0,",",",")}} VND</span>
																</div>
															</div>
															
														</div>
														@if (session()->has('infoUser') != null)
														<div class="googles single-item hvr-outline-out">
														<form action="" method="POST">
															{{csrf_field()}}
															<button type="button" class="googles-cart pgoogles-cart" onclick="AddCart({{ $books->id }})">
																<i class="fas fa-cart-plus"></i>
															</button>								
														</form>
														</div>
														<div class="googles single-item hvr-outline-out" style="">
															<form>
															{{ csrf_field() }}
																<button type="button" class="googles-heart" onclick="Favorite({{ $books->id }})">
																   <a class="wishlist" href=""><i class="fas fa-heart"></i></a>	
																</button>	
															</form>
														</div>
														@endif
													</div>
													<div class="clearfix"></div>
												</div>
												
											</div>
											
										</div>
									</div>
									@endforeach
									
								</div>
								<br>
								
						</div>
						<!--//product right-->
					</div>
			</div>
		</section>
		
        @stop
		