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
						<li>Chi Tiết Tin Tức - {{$tinTuc->title}}</li>
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
						<div class="col-lg-12 about-info" style="text-align: center">
							<h3 class="tittle-w3layouts text-center mb-lg-5 mb-3">{{$tinTuc->title}}</h3>
                            <h5 style="margin: 20px 0;">Danh Mục: {{$tinTuc->DanhSachTinTuc->ten}}</h5>
							<div class="article-content"><p>
                                <img class="img-fluid" src="{{asset('image/'.$tinTuc->image)}}" style="border-radius:unset; width: fit-content;height:auto;object-fit: contain">
                                <p style="padding: 20px 100px;">{{$tinTuc->content}}</p>
                            </div>
						</div>
					</div>
				</div>
				
				<!-- /grids -->
				
			</div>
		</div>
	</section>
@stop