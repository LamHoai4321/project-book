@extends('user.layout')
	@section('content')
    		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.html">Trang chủ</a>
							<i>|</i>
						</li>
						<li>Quản lý tài khoản</li>
					</ul>
				</div>
			</div>

		</div>
		
	</div>
		<!--//banner -->
     <div class="container">
        <div class="row">
        <!--/tabs-->			
        @if (session()->has('infoUser') != null)
                <?php
                            $user = session()->get('infoUser');
                 ?>	
        <div class="responsive_tabs">
								<h4 style="text-align:center;color: #828284;">QUẢN LÝ TÀI KHOẢN</h4>
                                <hr width="100%">
								<br>
                                <div style="padding-bottom:10px; text-align:center">
                                <img src="{{asset('image/'.$user['AnhDaiDien'])}}" alt="" style="width:150px; height:150px; border-radius:50%">
                                </div>
                                <br>
                                <h6 style="font-weight:700; width:1100px; padding-bottom:10px">THÔNG TIN CÁ NHÂN</h6>
                                <table class="thong-tin" style="border-style:double">
								<tbody>
									<tr>
										<td>Họ và tên:</td>
										<td>{{$user['HoTen']}}</td>
									</tr>
									<tr>
										<td>Email:</td>
										<td>{{$user['Email']}}</td>
									</tr>
									<tr>
										<td>Số điện thoại:</td>
										<td>{{$user['SDT']}}</td>
									</tr>
									<tr>
										<td>Địa chỉ:</td>
										<td>{{$user['DiaChi']}}</td>
									</tr>
                  <tr>
                    <td><button class="btn btn-success" style="font-size:90%" data-toggle="modal" data-target="#exampleEditModalCenter">CẬP NHẬT</button><td>
                  </tr>
								</tbody>
								</table>
								<br>
                <div id="horizontalTab">
                <ul class="resp-tabs-list">
											
											<li>DANH SÁCH ĐƠN HÀNG</li>
							
										</ul>
			<div class="resp-tabs-container">
      <div id="horizontalTab">
										<ul class="resp-tabs-list">
											<li>DANH SÁCH ĐƠN HÀNG</li>
										</ul>
										<div>
										    <table class="table table-bordered" style="width:1100px; text-align:center">
										        <thead>
										            <th>Tên Người Nhận</th>
										            <th>Địa Chỉ</th>
										            <th>Ngày Lập</th>
										            <th>Tổng Tiền</th>
                                <th>Khuyến Mãi</th>
										            <th>Trạng Thái</th>
										            <th>Thao Tác</th>
										            <th></th>
										        </thead>
										        <tbdody>
										            @foreach( $don_hang as $order)
										            <tr>
										                <td>{{ $order->TaiKhoan->HoTen }}</td>
										                <td>{{ $order->DiaChiGH }}</td>
										                <td>{{date('d-m-Y', strtotime( $order->NgayLap ))}}</td>
										                <td>{{ number_format($order->TongTien) }} VND</td>
                                    <td>@if(($order->id_makm)!=null)
                      {{$order->MaGiamGia->ChietKhau}}%
                    
                    @else
                      Không Khuyến Mãi
                    @endif</td>
										                <td>
										                @if($order->TrangThai == 1) {{"Đơn Mới"}}
                                        @elseif (($order->TrangThai == 3)) {{"Đã Duyệt"}}
                                        @elseif (($order->TrangThai == 4)) {{"Đang Giao Hàng"}}
                                        @elseif (($order->TrangThai == 0)) {{"Đã Hủy"}}
                                        @else {{"Giao Hàng Thành Công"}}
                                        @endif
										                </td>
										                @if ($order->TrangThai == 1 )
                        <td><a href="{{ route('account.cancelorder', $order->id)}}" class="btn btn-danger">Hủy đơn</a></td>
                        @endif
                        <td><a href="{{ route('account.orderdetail', $order->id)}}" class="btn btn-primary">Xem chi tiết</a></td>
										            </tr>
										            @endforeach
										        </tbdody>
										    </table>
										</div>
    </div> 
        @endif
											</div>
												</div>
											</div>
								
										</div>
									</div>
								</div>


   

    <div class="modal fade" id="exampleEditModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#ffa500a8;">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color:white; font-size:120%; padding-left:130px">THÔNG TIN CÁ NHÂN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if (session()->has('infoUser') != null)
                <?php
                            $myaccount = session()->get('infoUser');
                 ?>
      <form action="{{ route('user.updateinfomation', $myaccount) }}" method="POST" enctype="multipart/form-data" id="save1">
      @csrf
      <div class="modal-body" style="margin-top:10px; padding-left:10px; padding-right:10px">
          <div class="row">
              <div class="col-lg-12">
                <label for="exampleInputTopic">Ảnh đại diện</label>
                <div class="custom-file">
                    <input accept="image/*" title="" type="file" class="form-control" name="AnhDaiDien" id="AnhDaiDien" placeholder="Chọn ảnh" />
                    <img width="15%" hight="10%" src="{{asset('image/'.$user['AnhDaiDien'])}}" class="img-thumbnail" />
               </div>
              </div>
              <div class="col-lg-12" style="margin-top:20px">
                <label for="exampleInputTopic">Họ tên</label>
                <input type="text" class="form-control" value="{{$user['HoTen']}}" name="HoTen" placeholder="Họ tên" >
              </div>
              <div class="col-lg-12" style="margin-top:20px">
                <label for="exampleInputTopic">Số điện thoại</label>
                <input type="text" class="form-control" value="{{$user['SDT']}}" name="SDT" placeholder="Số điện thoại" id ="phone_checkout">
              </div>
              <div class="col-lg-12" style="margin-top:20px; margin-bottom:10px">
                <label for="exampleInputTopic">Địa chỉ</label>
                <input type="text" class="form-control" value="{{$user['DiaChi']}}" name="DiaChi" placeholder="Địa chỉ" id ="Dia_Chi">
              </div>
          </div>
      </div>
      <div class="modal-footer" style="background-color:#ffa50099">
        <button type="button" class="btn btn-primary" id="btnsave"><i class="fas fa-save"></i></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i></button>
      </div>
      </form>
    </div>
  </div>
</div>
@endif
    <!--//tabs-->
        </div>
    </div>
    
    @stop