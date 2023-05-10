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
	<br>
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3" style="margin-top: -80px;">
		<div class="container">
			<h3 class="tittle-w3layouts text-center my-lg-4 my-4">Liên Hệ</h3>
			<div class="inner_sec">
				<p class="sub text-center mb-lg-5 mb-3">Chúng tôi luôn mong chờ những đóng góp của bạn.</p>
				<div class="address row">

					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-3 address-left text-center">
								<i class="far fa-map"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Địa Chỉ</h6>
								<p>Bắc Từ Liêm, Hà Nội.

								</p>
							</div>
						</div>

					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-3 address-left text-center">
								<i class="far fa-envelope"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Email</h6>
								<p>
									<a href="mailto:ntbookstore2018@gmail.com" style="color:#2a8490;line-height: 1.9em;"> admin@gmail.com</a>
								</p>
							</div>

						</div>
					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-3 address-left text-center">
								<i class="fas fa-mobile-alt"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Phone</h6>
								<p>(+84) 0386667874
								</p>
							</div>

						</div>
					</div>
				</div>
				<div class="contact_grid_right">
					<form action="{{route('user.mailcontact')}}" method="POST">
					@csrf
						<div class="row contact_left_grid">
							<div class="col-md-6 con-left">
								<div class="form-group">
									<label class="my-2">Họ và tên</label>
									<input class="form-control" type="text" name="Name" placeholder="" required="">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" name="Email" placeholder="" required="">
								</div>

							</div>
							<div class="col-md-6 con-right">
								<div class="form-group">
									<label>Nội dung</label>
									<textarea id="textarea" name="Content" placeholder="" required=""></textarea>
								</div>
								<input class="form-control" type="submit" value="Gửi liên hệ">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	{{-- <div class="contact-map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.079548632198!2d106.71168864937755!3d10.728347862977762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f8dd83e71a3%3A0x9666d480043ef402!2zMyBOZ3V54buFbiBWxINuIExpbmgsIFTDom4gUGhvbmcsIFF14bqtbiA3LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1638964827738!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div> --}}
	<script>
	window.onload = function(){
	var element = document.getElementById("nav-contact");
	element.classList.add("active");
	}
	</script>
@stop
