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
					<a href="">Trang chủ</a>
					<i class='fas fa-angle-right'></i>
				</li>
				<li>
					<a href="">Giỏ hàng</a>
					<i class='fas fa-angle-right'></i>
				</li>
				<li>Thanh toán </li>
			</ul>
		</div>
	</div>
</div>
<!--//banner -->
<!--// header_top -->
<!--checkout-->
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container">
        <div class="inner-sec-shop px-lg-4 px-3">
        <form id="formPayment" action="{{ route('user.checkout') }}" method="post">
                            @csrf
            <h3>THANH TOÁN</h3>
            <div class="checkout-left row">
                <div class="col-md-5 address_form">
                    <div class="container-fluid" style="border:1px solid;">
                        <h4>Thông tin nhận hàng</h4>
                        <form action="#" method="post" class="creditly-card-form agileinfo_form">
                            @csrf
                            <section class="creditly-wrapper wrapper">
                                <div class="information-wrapper">
                                    <div class="first-row form-group">
                                        <div class="controls">
                                            <label class="control-label">Họ và tên: </label>
                                            <input class="billing-address-name form-control"
                                                value="{{ Auth::user()->HoTen }}" type="text" name="name_checkout"
                                                placeholder="Họ và tên" readonly />
                                        </div>

                                        <div class="controls">
                                            <label class="control-label">Số điện thoại:</label>
                                            <input class="form-control" type="text" value="{{ Auth::user()->SDT }}" id ="phone_checkout"
                                                placeholder="Số điện thoại" name="phone_checkout"  />
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Email: </label>
                                            <input class="billing-address-name form-control"
                                                value="{{ Auth::user()->Email }}" type="text" name="email-checkout"
                                                placeholder="Email" readonly />
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Địa chỉ: </label>
                                            <input class="form-control" type="text"  id ="Dia_Chi"
                                                  value="{{ Auth::user()->DiaChi }}"
                                                id="Dia_Chi" name="address_checkout" placeholder="Địa chỉ"/>
                                            
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
                <div class="col-md-7 address_form">
                    <div class="container-fluid" style="border:1px solid; padding-bottom: 20px;">
                       
                            <h4>Đơn hàng</h4>
                            <table class="timetable_sub">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh Bìa</th>
                                        <th>Số lượng</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá Bán</th>
                                        <th>Tổng Tiền</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="rem1">
                                        <?php $stt = 1;?>
                                        @php
                                        $tong_tien=0;
                                        @endphp
                                        @foreach ($cart as $book)
                                        @php
                                        $tong_tien+=$book->GiaTien * $book->So_Luong;
                                        @endphp
                                        <td class="invert ">{{$stt}}</td>
                                        <td class="invert-image">
                                            <a href="{{route('user.single',$book->id)}}">
                                                <img src="{!! asset('image/'.$book->AnhSach)!!}" alt=" "
                                                    class="img-responsive">
                                            </a>
                                        </td>
                                        <td class="invert">
                                            <div class="quantity">
                                                <div class="quantity-select">

                                                    <div class="entry value">
                                                        <span >{{$book->So_Luong}}</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="invert">{{$book->TenSach}} </td>
                                        <input type="text" hidden value="{{$book->id}}" name="idsach"/>
                                        <input type="text" hidden value="{{$book->So_Luong}}" name="soluong"/>
                                        <td class="invert">{{number_format($book->GiaTien,0,",",",")}} VND</td>
                                        <td class="invert">
                                            {{ number_format($book->GiaTien * $book->So_Luong,0,",",",") }} VND
                                        </td>

                                    </tr>
                                    <?php $stt++; ?>
                                    @endforeach

                                </tbody>
                            </table>
                            <input type="text" hidden value="{{$MuaNgay}}" name="MuaNgay"/>
                    </div>
                    <div class="all-total">
                        <div class="all-order">Tổng đơn hàng: <p>{{ number_format($tong_tien,0,",",",") }} VND</p>
                        </div>
                        <div class="price-discount" id="div_num_discount" hidden>Khuyến mãi: <p style="color:red" id="num_discount">15,000 VND</p>
                        </div>
                        <div class="price-delivery">Phí giao hàng: <p>15,000 VND</p>
                        <input id="fee_ship" hidden value="15000">
                        </div>
                        <div class="discout-payment">
                            <p>Nhập mã khuyến mãi: </p>
                            <div class="giamgiatien">

                                <input type="text" id="coupon" onkeyup="InputCoupon()" class="form-control coup" name="coupon"
                                    placeholder="nhập mã khuyến mãi">
                                    <input  hidden id="idDiscount"
                                                hidden type="text" name="idDiscount" />
                                <button type="button" id="btn_check_coupon" onclick="CheckDiscount()" class="btn btn-success" name="check_coupon">
                                    Tính mã giảm giá</button>
                                    <button type="button" hidden id="btn_remove_coupon" onclick="EnableCheckCoupon()" class="btn btn-danger" name="remove_coupon">
                                    Hủy</button>
                            </div>
                        </div>
                        <p id="coupon-error" hidden style="color:red" >Mã khuyến mãi không hợp lệ</p>
                    </div>
                    <hr style="margin-top:15px; margin-bottom:10px" />
                    <div class="all-total-price">Tổng cộng: <p id="total-money">{{ number_format($tong_tien + 15000,0,",",",") }} VND</p>
                        <input hidden id="priceOriginal" value="{{$tong_tien}}" />
                        <input type="text" value="{{ $tong_tien +15000 }}" hidden name="tongTien">
                        <input  hidden name="totalDiscount" id="totalDiscount"/>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" id="flexCheckDefault" name="menthodPay" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                          Thanh Toán Khi Nhận Hàng
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="2" id="flexCheckChecked"  name="menthodPay">
                        <label class="form-check-label" for="flexCheckChecked">
                          VNPAY
                        </label>
                      </div>
                    <!-- <div class="container-fluid" style="border:1px solid; margin-top:15px;">
					<h4>Phương thức thanh toán</h4>
						<div class="col-lg-12" style="display: flex; margin-bottom: 15px">
							<div class="col-lg-4">
								<input type="radio" name="Hinh_Thuc" value="0" style="cursor: pointer" checked/> COD <br/>
								<img src="{{asset('user/images/ship-cod.jpg')}}" style="width:140px; height:90px" />
							</div>
							<div class="col-lg-4">
								<input type="radio" name="Hinh_Thuc" value="1" style="cursor: pointer" /> VNPAY <br/>
								<img src="{{asset('user/images/vnpay.jpg')}}" style="width:140px; height:90px" />
							</div>
							<div class="col-lg-4">
								<input type="radio" name="Hinh_Thuc" value="2" style="cursor: pointer" /> E-Banking <br/>
								<img src="{{asset('user/images/e-banking.jpg')}}" style="width:140px; height:90px" />
							</div>
						</div>
					</div> -->
                    <!-- text-align:right; margin-top: 15px; font-size:90%; font-weight:bold; color: #888
				    style="text-align:right; margin-top: 5px; font-size:90%; font-weight:bold; color: #888"
				<input style="width:110px; border:none; font-size:110%; text-align:right" id="order-total" readonly/>
			<input style="width:130px; border:none; color:red; text-align:right" id="total" readonly/>-->

                    <div class="checkout-right-basket">
                        <button type="button" id="btnPayment" class="btn btn-warning">Đặt hàng</button>
                        {{-- <a id="payment" style="color:white; cursor:pointer">Đặt hàng </a> --}}
                    </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</section>

@stop
