@extends('user.layout')
@section('content')
		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="{{route('user.index')}}">Trang Chủ</a>
							<i>|</i>
						</li>
						<li>Sản Phẩm</li>
					</ul>
				</div>
			</div>
		</div>
		<!--//banner -->
		<!--/shop-->
		<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container-fluid">
				<div class="inner-sec-shop px-lg-4 px-3">
					<h4 class="tittle-w3layouts my-lg-4 mt-3">CÁC SẢN PHẨM SÁCH </h4>
					<div class="row">
						<!-- product left -->
						<div class="side-bar col-lg-3">
							<form action="{{route('user.shop')}}" method= "get">
								@csrf
							<!-- price range -->
							<div class="range">
								<h3 class="agileits-sear-head">Giá khoảng</h3>
								<ul class="dropdown-menu6">
									<li>
										<div id="slider-range"></div>
										<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
										<input type="text" id="start_price" name="start_price" value = "{{$min_price}}" hidden />
										<input type="text" id="end_price" name="end_price" value = "{{$max_price}}" hidden />
										<input type="text" id="start_price_range" value = "{{$min_price_range}}" hidden />
										<input type="text" id="end_price_range"  value = "{{$max_price_range}}" hidden />
										
									</li>
								</ul>
								<br>
								<div class="sorting">
							<select id="sort" name="tacgia"  class="frm-field required sect">
								<option value="null">Lọc tác giả </option>
								<!-- <option value="null">Bán chạy nhất</option>  -->
								@foreach($tacgia as $tacgias)
								<option value="{{$tacgias->id}}">{{$tacgias->tentacgia}}</option> 
											@endforeach		
							</select>
							
							    </div>
								<div class="loc-price-button">
									<input type="submit" value="Lọc" class="btn-search-price"/>
							    </div>

							</div>
</form>
							<!-- //price range -->
							<!--preference -->
							
							<!-- //discounts -->
							<!-- reviews -->
							
							<!-- //reviews -->
							<!-- deals -->
							
							<!-- //deals -->
						</div>
						<!-- //product left -->
						<!--/product right-->
						<div class="left-ads-display col-lg-9">
							<div class="wrapper_top_shop">
								<div class="row">
										<div class="col-md-6 shop_left">
												<img src="{!! asset('user\images\Book\SACH_KINH_TE\banner_Sach_kinh_te1.png') !!}" alt="">
												
										</div>
										<div class="col-md-6 shop_right">
												<img src="{!! asset('user\images\Book\SACH_KINH_TE\banner_Sach_kinh_te1.png') !!}" alt="">
									
											</div>
						
								</div>
								<div class="row">
									<!-- /womens -->
									@foreach($sach as $books)
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
                                                    @if($books->GiaKM !=0)
													<span class="product-new-top">-{{$books->KhuyenMai->ChietKhau}}%</span>
                                                    @else
                                                    <span class="product-new-top">Mới</span>
                                                    @endif
												</div>
												<div class="item-info-product">
													<div class="info-product-price">
														<div class="grid_meta">
															<div class="product_price">
																<h4>
																	<a href="{{route('user.single',$books->id)}}">{{$books->TenSach}}</a>
																</h4>
																<div class="grid-price mt-2">
                                                                    @if($books->GiaKM !=0)
																<div class="price"><span class="money ">{{number_format($books->GiaKM,0,",",",")}} VND</span></div>
                                                                  
																<div class="rootprice"> <del>	<span class="money ">{{number_format($books->GiaTien,0,",",",")}} VND</span></del></div>
                                                                @else
                                                                <span class="money ">{{number_format($books->GiaTien,0,",",",")}} VND</span>
                                                                @endif
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
											{{$sach->links()}}
						</div>
					</div>
					<!--//slider-->
				</div>
			</div>
		</section>
        @stop
		