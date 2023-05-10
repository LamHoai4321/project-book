@extends('user.layout')
@section('content')


		<!-- Slider Banner trang web -->
		
		<div class="banner">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				
				<div class="carousel-inner" role="listbox">
					@php
					$s=1;
				@endphp
					
               		@foreach($slideshow as $slideshows)
					@if($s==1){
						<div class="carousel-item active"><img src="{!! asset('image/'.$slideshows->HinhAnh)!!}" class="img-fluid" alt="">
							<div class="carousel-caption text-center">
								<h3>Ưu Đãi Lớn
									<span>Giảm Giá 50% Tất Cả Các Loại Sách</span>
								</h3>
								<a href="{{ route('user.shop')}}" class="btn btn-sm animated-button gibson-three mt-4">Đến Cửa Hàng</a>
							</div>
						</div>
					}
					@else
					<div class="carousel-item"><img src="{!! asset('image/'.$slideshows->HinhAnh)!!}" class="img-fluid" alt="">
						<div class="carousel-caption text-center">
							<h3>Ưu Đãi Lớn
								<span>Giảm Giá 50% Tất Cả Các Loại Sách</span>
							</h3>
							<a href="{{ route('user.shop')}}" class="btn btn-sm animated-button gibson-three mt-4">Đến Cửa Hàng</a>
						</div>
					</div>
					@endif
					@php
					$s++;
					@endphp
					@endforeach
					{{-- @foreach($slideshow2 as $slideshows)
					<div class="carousel-item item2"><img src="{!! asset('image/'.$slideshows->HinhAnh)!!}" class="img-fluid" alt="">">
						<div class="carousel-caption text-center">
							<h3>Với Kim Đồng
								<span>Kiến Thức Là Vô Tận</span>
							</h3>
							<a href="{{ route('user.shop')}}" class="btn btn-sm animated-button gibson-three mt-4">Đến Cửa Hàng</a>

						</div>
					</div>
					@endforeach --}}
					{{-- @foreach($slideshow3 as $slideshows)
					<div class="carousel-item item3"><img src="{!! asset('image/'.$slideshows->HinhAnh)!!}">
						<div class="carousel-caption text-center">
							<h3>Đến Với Kim Đồng
								<span>Chúng Tôi Sẽ Cho Bạn Dịch Vụ Tốt Nhất</span>
							</h3>
							<a href="{{ route('user.shop')}}" class="btn btn-sm animated-button gibson-three mt-4">Đến Cửa Hàng</a>

						</div>
					</div>
					@endforeach --}}
					{{-- @foreach($slideshow4 as $slideshows)
					<div class="carousel-item item4"><img src="{!! asset('image/'.$slideshows->HinhAnh)!!}"
						<div class="carousel-caption text-center">
							<!-- <h3>Đồng Hành Cùng Kim Đồng
								<span>Trở Lại Trường Sau Mùa Hè</span>
							</h3>
							<a href="{{ route('user.shop')}}" class="btn btn-sm animated-button gibson-three mt-4">Đến Cửa Hàng</a> -->
						</div>
					</div>
					@endforeach
					@foreach($slideshow5 as $slideshows)
					<div class="carousel-item item4"><img src="{!! asset('image/'.$slideshows->HinhAnh)!!}"
						<div class="carousel-caption text-center">
							<h3>Đồng Hành Cùng Kim Đồng
								<span>Trở Lại Trường Sau Mùa Hè</span>
							</h3>
							<a href="{{ route('user.shop')}}" class="btn btn-sm animated-button gibson-three mt-4">Đến Cửa Hàng</a>
						</div>
					</div>
					@endforeach --}}
				</div>
			
			</div>
			<!--//banner -->
		</div>
	</div>
	<!--//banner-sec-->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container-fluid">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 my-4">Sách Mới Cho Bạn </h3>
				<div class="row">
					<!-- Sách mới -->
					@foreach($sach_moi_nhat as $books)
					<div class="col-md-3">
						<div class="product-googles-info googles">
							
							<div class="men-pro-item">
								<!-- Hình ảnh -->
								<a href="{{route('user.single',$books->id)}}">
								<div class="men-thumb-item">
									<img src="{!! asset('image/'.$books->AnhSach)!!}" class="img-fluid" alt="">
									<span class="product-new-top" style="background-color: green;">Mới</span>
								</div>
							    </a>
								<div class="item-info-product">
									<div class="info-product-price">
										<!-- Tên và giá tiền -->
										<div class="grid_meta">
											<div class="product_price">
												<h4 style="padding-top:20px">
													<a href="{{route('user.single',$books->id)}}">{{$books->TenSach}}</a>
												</h4>
												<div class="grid-price mt-2">
													<span class="money ">{{number_format($books->GiaTien,0,",",",")}} VND</span>
												</div>
											</div>
										</div>
										<!-- Thêm vào giỏ hàng -->
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
				<!--//Sách mới-->
				<!--/Banner middle trang web-->
				<div class="row">
					<div class="col-md-12 middle-slider my-4">
						<div class="middle-text-info" style="background-image: url(user/images/banner-middle.jpg);">
							<!-- Bộ đếm ngược -->
							<!-- <div class="simply-countdown-custom" id="simply-countdown-custom"></div> -->
						</div>
					</div>
				</div>
				
				<!--//Banner trang web-->
				<div class="inner-sec-shop px-lg-4 px-3">
					<h3 class="tittle-w3layouts my-lg-4 my-4">Sách Bán Chạy Nhất </h3>
					<div class="row">
						<!-- Sách bán chạy -->
						@foreach($result as $bestSellers1)
						<div class="col-md-3">
							<div class="product-googles-info googles">
								<div class="men-pro-item">
									<div class="men-thumb-item">
										<img src="{!! asset('image/'.$bestSellers1->AnhSach)!!}" class="img-fluid" alt="">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="{{route('user.single',$bestSellers1->id)}}" class="link-product-add-cart">Xem Chi Tiết</a>
											</div>
										</div>
										<span class="product-new-top">Hot</span>
									</div>
									<div class="item-info-product">
										<div class="info-product-price">
											<div class="grid_meta">
												<div class="product_price">
													<h4 style="padding-top:20px">
														<a href="{{route('user.single',$bestSellers1->id)}}">{{$bestSellers1->TenSach}}</a>
													</h4>
													<div class="grid-price mt-2">
														<span class="money ">{{number_format($bestSellers1->GiaTien,0,",",",")}} VND</span>
													</div>
												</div>
											</div>
											@if (session()->has('infoUser') != null)
											<form action="" method="POST">
															{{csrf_field()}}
															<button type="button" class="googles-cart pgoogles-cart" onclick="AddCart({{ $books->id }})">
																<i class="fas fa-cart-plus"></i>
															</button>								
														</form>
											@endif
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						
											</div>
				</div>
			</div>
		</div>
	</section>
	<!-- about -->
@stop