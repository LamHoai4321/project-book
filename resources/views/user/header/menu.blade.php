<label class="top-log mx-auto"></label>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">
				<!-- Nút show menu mobile -->
				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						
					</span>
				</button>
				<!-- Menu trang web -->
				<div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-bottom: -10px">
					<ul class="navbar-nav nav-mega mx-auto">
						<!-- Trang chủ -->
						<li class="nav-item active">
							<a class="nav-link ml-lg-0" href="{{ route('user.index')}}">Trang Chủ
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<!-- Ưu đãi lớn -->
						<li class="nav-item">
							<a class="nav-link" href="{{ route('user.promotion')}}">Khuyến Mãi</a>
						</li>
						<!-- Cửa hàng -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="{{ route('user.shop')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							    aria-expanded="false">
								Sản Phẩm
							</a>
							<ul class="dropdown-menu mega-menu">
								<li>
									<div class="row">
										@foreach($listcha as $book)
										<div class="col-md-4 media-list span4 text-left">
											<h5 class="tittle-w3layouts-sub"> {{$book->TenTheLoaiCha}} </h5>
											<ul>
											@foreach($book->listcon as $con)

												<li class="media-mini mt-3">
													<a href="{{ route('theloaisach',$con->id)}}">{{$con->TenTheLoai}}</a>
												</li>
												@endforeach
											</ul>
										</div>
										@endforeach
										
									</div>
									<hr>
									<a href="{{ route('user.shop')}}" style="text-align:center;color:black"><h5 class="tittle-w3layouts-sub"> Xem Tất Cả </h5></a>
								</li>
							</ul>
						</li>
						<!-- Tin tức -->
						{{-- <li class="nav-item">
							<a class="nav-link" href="{{ route('user.new')}}">Tin Tức</a>
						</li> --}}
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="{{ route('user.new')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							    aria-expanded="false">
								Tin Tức
							</a>
							<ul class="dropdown-menu mega-menu">
								<li>
									<div class="row">
										<div class="col-md-4 media-list span4 text-left">
											<h5 class="tittle-w3layouts-sub"> Tin Tức </h5>
											<ul>
											@foreach($danhMucTinTuc as $con)
	
												<li class="media-mini mt-3">
													<a href="{{ route('theloaitintuc',$con->id)}}">{{$con->ten}}</a>
												</li>
												@endforeach
											</ul>
										</div>
								
										
									</div>
								</li>

								
							</ul>
						</li>
							<!-- Giới thiệu -->
							<li class="nav-item">
							<a class="nav-link" href="{{ route('user.about')}}">Giới Thiệu</a>
						</li>
						<!-- Thông tin & liên hệ -->
						<li class="nav-item">
							<a class="nav-link" href="{{ route('user.contact')}}">Liên Hệ</a>
						</li>
						<!-- Thanh tìm kiếm -->
						<li style="padding: 5px 0 0 15px;">
						<form id="form-search" action="{{route('Search')}}"> 
						@csrf
							<input type="text" class="input-search" name="keyword" id="keywords">
							
							<button style="border-radius: 0.25rem; padding: 0.25rem 0.5rem; background-color: rgb(104, 101, 92); color: cornsilk;" type="button" onclick="saveSearch()">
								<i class="fas fa-search"></i>
							</button>	
						</form>
						</li>
					</ul>
					<div id="search_ajax"></div>
				</div>
			</nav>
		</header>
		<style>
	.time-dialog{
		width:60px;
		height:30px
	}
</style>
		
