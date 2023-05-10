@extends('user.layout')
@section('content')
	<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="{{ route('user.index')}}">Trang chủ</a>
							<i>|</i>
						</li>
						<li>Giới thiệu</li>
					</ul>
				</div>
			</div>

		</div>
	<!--//banner -->
	</div>
	<!--// header_top -->
	<!-- top Products -->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container-fluid">

			<div class="inner-sec-shop px-lg-4 px-3">
				<div class="about-content py-lg-5 py-3">
					<div class="row">

						<div class="col-lg-6 p-0">
							<img src="user/images/background-login.jpg" alt="Goggles" class="img-fluid">
						</div>
						<div class="col-lg-6 about-info">
							<h3 class="tittle-w3layouts text-left mb-lg-5 mb-3">Về chúng tôi</h3>
							<div class="article-content"><p>
								<p><strong>Tại sao bạn nên chọn Kim Đồng Books?</strong></p>
								
								<p><span style="font-weight: 400;">100% nội dung trên Kim Đồng Books là nội dung có bản quyền. Kim Đồng Books cam kết là nhà cung cấp dịch vụ và đối tác uy tín của bạn, hoạt động vì quyền lợi và sự phát triển bền vững của các bên.</span></p>
								
								<p><strong><em>Đối với Độc giả:</em></strong></p>
								<p>&nbsp; &nbsp; &nbsp; + Đọc cả kho sách điện tử giá trị chỉ với chi phí tiết kiệm.</p>
								<p>&nbsp; &nbsp; &nbsp; +&nbsp;Đăng ký tài khoản nhanh chóng, thuận tiện. Hỗ trợ đăng ký từ các tài khoản Mạng xã hội.</p>
								<p>&nbsp; &nbsp; &nbsp; +&nbsp;Sách mới được lựa chọn và cập nhật liên tục bởi đội ngũ biên tập viên giàu kinh nghiệm.</p>
								<p>&nbsp; &nbsp; &nbsp; +&nbsp;Đọc sách mọi lúc, mọi nơi, đồng bộ nội dung và lịch sử đọc sách trên đa màn hình, đa thiết bị.</p>
								<p>&nbsp; &nbsp; &nbsp; +&nbsp;Cơ hội được hưởng thêm những quyền lợi ưu đãi hấp dẫn khi trở thành thành viên của Y&B Books</p>
								
								<p><strong><em>Đối với nhà xuất bản, nhà phát hành, tác giả độc lập:</em></strong></p>
								<p>&nbsp; &nbsp; &nbsp; +&nbsp;Được tạo kho sách riêng biệt và phát triển thương hiệu trong mảng sách điện tử</p>
								<p>&nbsp; &nbsp; &nbsp; +&nbsp;Được tiếp cận và giới thiệu tác phẩm đến với hơn 3 triệu người đọc trên nền tảng Waka một cách nhanh chóng và hiệu quả nhất.</p>
								<p>&nbsp; &nbsp; &nbsp; +&nbsp;Bản quyền sách số được bảo vệ: Nội dung số được bảo vệ bằng công nghệ DRM, tránh sao chép và tái sử dụng nội dung.</p>
								<p>&nbsp; &nbsp; &nbsp; +&nbsp; Tất cả các trường hợp vi phạm bản quyền sách đều được xử lý nhanh chóng và nghiêm ngặt.</p>
								<p>&nbsp; &nbsp; &nbsp; +&nbsp;Được hỗ trợ về công nghệ và nhân lực để khai thác phiên bản sách số với doanh thu tối ưu.</p>
								<p><span style="font-weight: 400;">&nbsp; </span></p>
								<p><span style="font-weight: 400;">Chỉ với thao tác đăng ký đơn giản, hãy trở thành thành viên của Y&B Books ngay hôm nay!</span></p>
								</div>

							<a href="{{ route('user.shop')}}" class="btn btn-sm animated-button gibson-three mt-4">Mua Ngay</a>

						</div>
					</div>
				</div>
				
				<!-- /grids -->
				
			</div>
		</div>
	</section>
	<div class="inner-sec-shop px-lg-4 px-3" style="padding-top:30px;">
 					<div class="col-lg-12">
						<iframe width="100%" height="550" src="https://www.youtube.com/embed/dBv1zyMPM3A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
@stop