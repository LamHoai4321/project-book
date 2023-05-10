@extends('user.layout')
@section('content')
<style>
td, th {
	border: 1px solid #dddddd;
	text-align: left;
	padding: 8px;
	}
</style>
<!-- banner -->
<div class="banner_inner">
	<div class="services-breadcrumb">
		<div class="inner_breadcrumb">
			<ul class="short">
				<li>
					<a href="{{route('user.index')}}">Trang chủ</a>
					<i class='fas fa-angle-right'></i>
				</li>
				<li>
        
					<a href="{{route('user.cart')}}">Đơn hàng {{$hoadon['id']}} </a>
					<i class='fas fa-angle-hoadonright'></i>
				</li>
				<li> Chi tiết </li>
			</ul>
		</div>
	</div>
</div>
<!--//banner -->
<!--// header_top -->
<!--checkout-->
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
	<div class="container" style="border: solid 1px">
		<div class="inner-sec-shop px-lg-4 px-3">
		<h3 style="text-align:center; color: #9c9b9b; letter-spacing: 2px; padding-top: 10px">CHI TIẾT ĐƠN HÀNG</h3>
			<div class="row">
                <div class="col-lg-12" style="display: inline-flex; padding-top:50px">
                    <div class="col-lg-4">
                        Mã đơn hàng: <b style="color:red">{{$hoadon['id']}} </b>
                    </div>
                    @foreach ($kh as $user)
                    <div class="col-lg-4">
                        Tên người nhận: <b style="color:red">{{ $user->HoTen }}</b>
                    </div>
                    @endforeach
                    <div class="col-lg-4">
                  
                        Ngày lập đơn: <b style="color:red">{{date("d-m-Y ", strtotime($hoadon->NgayLap))}}</b>
                      
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top:20px">
                <div class="col-lg-12" style="display: inline-flex;">
                    <div class="col-lg-6">
                    
                        Địa chỉ giao hàng: <b style="color:red">{{ $hoadon['DiaChiGH'] }}</b>
                      
                    </div>
                    <div class="col-lg-6">
                        Phương thức thanh toán: 
                        
                        @if ($hoadon['PhuongTTT'] == 1) <b style="color:red">Thanh toán khi nhận hàng(COD)</b>
                        @elseif ($hoadon['PhuongTTT'] == 2) <b style="color:red">Thanh toán qua VNPay</b>
                        @endif
                      
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top:50px">
                <div class="col-lg-12">
                    <h5>Danh sách sản phẩm</h5>
                    <table style="width:1060px; margin-top:20px; margin-bottom: 20px">
                    <thead>
                    <tr style="background-color: #9a9a9a">
                        <th>Tên sách</th>
                        <th>Ảnh bìa</th>
                        <th>Tác giả</th>
                        <th>Phiên bản</th>
                        <th>Số lượng</th>
                        <th>Giá Bán</th>
                        <th>Tổng Tiền</th>
                        <th>Phí Ship</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($chitiethoadonban as $sp)
                    <tr>
                        <td>{{ $sp->Sach->TenSach }}</td>
                        <td><img src="{!! asset('image/'.$sp->Sach->AnhSach)!!}" style="width:80px; height:80px; border-radius:0%"></td>
                        <td>{{ $sp->Sach->TacGia->tentacgia }}</td>
                        <td>
                            @if ($sp->Sach->PhienBan == 0) Bản thường
                            @else Bản đặc biệt
                            @endif
                        </td>
                        <td>{{ $sp->SoLuong }}</td>
                        <td>{{ number_format( $sp->GiaBan,0,",",",") }} VND</td>
                        <td>{{ number_format( $sp->GiaBan*$sp->SoLuong,0,",",",") }} VND</td>
                        <td>{{ number_format( 15000,0,",",",") }} VND </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
    
            <div class="row" style="float: right; padding-top: 15px; margin-bottom:50px; font-size: 130%">Tổng tiền: &nbsp; <b style="color:red">{{number_format($hoadon->TongTien,0,",",",")}} VND</b></div>
		</div>
	</div>
</section>
<!--//checkout-->
<!--footer -->
@stop