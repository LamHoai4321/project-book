@extends('user.layout')
	@section('content')
	
	<meta name="description" content="{{$meta_desc}}">
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$url_canonical}}" />
    <meta name="author" content="">
    <link  rel="icon" type="image/x-icon" href="" />
    
      <meta property="og:image" content="{{$share_images}}" />
      <meta property="og:site_name" content="http://sach.net:8000/" />
      <meta property="og:description" content="{{$meta_desc}}" />
      <meta property="og:title" content="{{$meta_title}}" />
      <meta property="og:url" content="{{$url_canonical}}" />
      <meta property="og:type" content="website" />
	
		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.html">Trang chủ</a>
							<i>|</i>
						</li>
						<li>Chi tiết sản phẩm</li>
					</ul>
				</div>
			</div>

		</div>
		
	</div>
		<!--//banner -->
		<!--/shop-->
		<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container">
				<div class="inner-sec-shop pt-lg-4 pt-3">
				@foreach($sach as $books)
					<div class="row">
							<div class="col-lg-4 single-right-left ">
									<div class="grid images_3_of_2">
										<div class="flexslider1">
					
											<ul class="slides">
												<li data-thumb="{!! asset('image/'.$books->AnhSach)!!}">
													<div class="thumb-image"> <img src="{!! asset('image/'.$books->AnhSach)!!}" data-imagezoom="true" class="img-fluid" alt=" "> </div>
												</li>
												<li data-thumb="{!! asset('image/'.$books->AnhSach)!!}">
													<div class="thumb-image"> <img src="{!! asset('image/'.$books->AnhSach)!!}" data-imagezoom="true" class="img-fluid" alt=" "> </div>
												</li>
												<li data-thumb="{!! asset('image/'.$books->AnhSach)!!}">
													<div class="thumb-image"> <img src="{!! asset('image/'.$books->AnhSach)!!}" data-imagezoom="true" class="img-fluid" alt=" "> </div>
												</li>
											</ul>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-8 single-right-left simpleCart_shelfItem">
									<h3>{{$books->TenSach}}</h3>
									<br>
									<div class="row">
  										<div class="col-6">
										  <span>Nhà cung cấp: </span>
										 <span> {{$books->NhaCungCap->TenNCC}}</span>
										  <a href='#'></a>
										  </div>
  										<div class="col-6">
										  <span>Tác giả:</span>
										  <span>{{$books->TacGia->tentacgia}}</span>
										</div>
									</div>
									<div class="row">
  										<div class="col-6">
										  <span>Nhà xuất bản: </span>
										  <span>{{$books->NhaXuatBans->tennhaxb}}</span>
										  </div>
  										<div class="col-6">
										  <span>Hình thức bìa:</span>
										  <span> @if($books->LoaiBia == 0) {{"Bìa cứng"}}
										  @elseif (($books->LoaiBia == 1)) {{"Massmarket Paperback"}}
										  @else {{"Bìa mềm"}}
										  @endif</span>
										</div>
									</div>
									@if($books->GiaKM !=0)
									<p><span class="item_price">{{number_format($books->GiaKM,0,",",",")}} VND</span>
										<del>{{number_format($books->GiaTien,0,",",",")}} VND</del>
										@else
										<span class="item_price">{{number_format($books->GiaTien,0,",",",")}} VND</span>
										@endif
									</p>
									<div class="rating1">
										<ul class="stars">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<br>
									
  										<div class="row">
    									<div class="col-sm-3">
											<span>Thời gian giao hàng</span>
    									</div>
    									<div class="col-sm-9">
											<span>Địa điểm giao hàng </span>
											<a href="#"> Thay đổi</a>
							
    									</div>
  										</div>
										  <div class="row">
    									<div class="col-sm-3">
											<span>Chính sách đổi trả </span>
    									</div>
    									<div class="col-sm-9">
											<span>Đổi trả sản phẩm trong 30 ngày </span>
											<a href="#"> Xem thêm</a>
							
    									</div>
  										</div>
									<br>
									@if (session()->has('infoUser') != null)
									
									@foreach($kho as $khos)
							
										
										<form action="{{route('user.thanhtoan')}}" method="POST">
										{{csrf_field()}}
										<label class="control-label">Số Lượng: </label>
										<div class="form-group quantity-box" style="display: inline-flex;align-items: baseline;justify-content: space-evenly;">                                
											<input class="form-control col-sm-3" id="So_Luong_SP" name="So_Luong" value="1" min="1" max="{{$khos->SoLuongTon}}" type="number" style="width:150px"> (Còn {{$khos->SoLuongTon}} sản phẩm)
											<input type="hidden" name="id" value="{{ $books->id }}"/>
											
										</div>
										<br>
										<input type="hidden" name="MuaNgay" value="true"/>
										<div class="occasion-cart" style="display: inline-flex; padding-top:15px">
											<div class="googles single-item singlepage">
												<button type="submit" class="link-product-add-cart">
													Mua ngay
												</button>														
											</div>
											<div class="vertical-line" style="height: 40px; margin-left:10px"></div>
											<div class="googles single-item singlepage" style="margin-left:10px">
												<button type="button" onclick="AddCart({{ $books->id }})" class="link-product-add-cart">
													Thêm giỏ hàng
												</button>														
											</div>
										</div>
										<div class="fb-share-button" data-href="{{$url_canonical}}" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>										@endforeach
									</form>@endif
										<br>
										
									
								</div>
								<div class="clearfix"> </div>
								<!--/tabs-->
								
						

								
								<div class="responsive_tabs">
								<h4>THÔNG TIN SẢN PHẨM</h4>
								<br>
								<table class="thong-tin">
								<tbody>
									<tr>
										<td>Tên Nhà Cung Cấp</td>
										<td>{{$books->NhaCungCap->TenNCC}}</td>
									</tr>
									<tr>
										<td>Tác giả</td>
										<td>{{$books->TacGia->tentacgia}}</td>
									</tr>
									<tr>
										<td>Nhà xuất bản</td>
										<td>{{$books->NhaXuatBans->tennhaxb}}</td>
									</tr>
									<tr>
										<td>Năm xuất bản</td>
										<td>{{$books->NamXB}}</td>
									</tr>
									<tr>
										<td>Kích thước bao bì</td>
										<td>{{$books->KichThuocs->kichthuoc}}</td>
									</tr>
									<tr>
										<td>Số trang</td>
										<td>{{$books->SoTrang}}</td>
									</tr>
									<tr>
										<td>Hình thức bìa</td>
										<td> @if($books->LoaiBia == 0) {{"Bìa cứng"}}
										  @elseif (($books->LoaiBia == 1)) {{"Massmarket Paperback"}}
										  @else {{"Bìa mềm"}}
										  @endif</td>
									</tr>
								</tbody>
								</table>
								<br>
									<div id="horizontalTab">
										<ul class="resp-tabs-list">
											
											<li>MÔ TẢ SẢN PHẨM</li>
											<li>KHÁCH HÀNG NHẬN XÉT</li>
										</ul>
										<div class="resp-tabs-container">
											<!--/tab_one-->
											<div class="tab1">
					
					<div class="single_page">
					<h5>MÔ TẢ SẢN PHẨM</h5>
					<p>
					{{$books->MoTa}}
					</p>
						
					</div>
				</div>
				@endforeach
											<!--//tab_one-->
											<div class="tab2">
					
												<div class="single_page">
													<div class="bootstrap-tab-text-grids" style="width:1100px">
													<div id="binhluan">
													@foreach($binhluan as $preview)
														<div class="bootstrap-tab-text-grid">
															<div class="bootstrap-tab-text-grid-left">
																<br>
																@if($preview->TaiKhoan !=null)
																<img src="{{asset('image/'.$preview->TaiKhoan->AnhDaiDien)}}" alt=" " class="img-fluid" style="width:100px; height:100px; object-fit:cover">
																@endif
															</div>
															<div class="bootstrap-tab-text-grid-right">
																<ul>
																	<li><a href="#">{{$preview->HoTen}}</a></li>
																	
																</ul>
																<p>{{$preview->NoiDung}}</p>
																<p>{{$preview->Ngay}}</p>
															</div>
															@endforeach
															<div class="clearfix"> </div>
														</div>
														<div class="add-review">
															<h4>Thêm nhận xét</h4>
															@if(session()->has('infoUser'))
                        								<?php $infoUser =session()->get('infoUser') ?>

																	<input class="form-control" type="text" name="HoTen" readonly placeholder="Bạn hãy nhập tên..." id="inputname"
                                       								 value="{{$infoUser['HoTen']}}" required="" style="width:1100px">
																<textarea name="Message" name="NoiDung" id="inputcontent" placeholder="Nhập nội dung" required=""></textarea>
																<input type="text" name="idKH" hidden class="form-control" id="inputid_user"
                                								value="{{$infoUser['id']}}">
														<input type="text" name="idSach" hidden class="form-control" id="inputid_sanpham"
															value="{{$books->id}}">
														<input type="text" name="TrangThai" hidden class="form-control" id="inputtrangthai"
															value="1">
													
																<input type="submit" value="Gửi" id="submitBinhLuan">
														<div id="duyetbinhluan" hidden>
															Vui lòng chờ duyệt bình luận </div>
														</div>
														@else
															<a href="{{route('getLogin')}}" class="btn hvr-hover">Vui lòng đăng nhập để bình luận</a>
														@endif		
													</div>
											</div>
												</div>
											</div>
								
										</div>
									</div>
								</div>

								<!--//tabs-->
					
					</div>
				</div>
			</div>
				
		</section>
		@stop
		<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="apvmyhxB"></script>