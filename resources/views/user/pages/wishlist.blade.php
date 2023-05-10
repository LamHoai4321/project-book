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
        <div class="responsive_tabs">
								
                                
									<div id="horizontalTab">
										<ul class="resp-tabs-list">
											
											
                                        <li>SÁCH YÊU THÍCH</li>
										</ul>
										<div class="resp-tabs-container">
											<!--/tab_one-->
											<div class="tab1">
					
					<div class="single_page">
                    <table class="table table-bordered" id="favorite-book" style="width:1100px">
                    <thead>
                    <tr style="text-align:center">
                        <th>Tên sách</th>
                        <th>Ảnh bìa</th>
                        <th>Tác giả</th>
                        <th>Phiên bản</th>
                        <th>Giá tiền</th>
                        <th>Trạng thái</th>
                        <th>Xóa sách yêu thích</th>
                        <th>Xem chi tiết</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sach_yeu_thich as $favoritebook)
                    <tr>
                        <td>{{$favoritebook->Sach->TenSach}}</td>
                        <td><img src="{{asset('image/'.$favoritebook->Sach->AnhSach)}}" style="width:80px; height:80px; border-radius:0%"></td>
                        <td>{{$favoritebook->Sach->TacGia->tentacgia}}</td>
                        <td>
                        @if($favoritebook->Sach->LoaiBia == 0) {{"Bìa Cứng"}}
                        @elseif($favoritebook->Sach->LoaiBia == 1) {{"Massmarket Paperback"}}
                        @else {{"Bìa Mềm"}}
                        @endif
                        </td>
                        <td>
                        @if($favoritebook->Sach->GiaKM !=0)
																<div class="price"><span class="money ">{{number_format($favoritebook->Sach->GiaKM,0,",",",")}} VND</span></div>
                                                                  
																
                                                                @else
                                                                <span class="money ">{{number_format($favoritebook->Sach->GiaTien,0,",",",")}} VND</span>
                                                                @endif                                                             
                        </td>
                        <td>@if($favoritebook->Sach->TrangThai == 1) {{"Tạm hết hàng"}}
                      @elseif ($favoritebook->Sach->TrangThai == 0) {{"Ngừng bán"}}
                         @else {{"Còn hàng"}}
                      @endif</td>
                         <td>
                            <button class="btn btn-danger" onclick="DeleteFavorite({{$favoritebook->id}})">Xóa</button>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('user.single', $favoritebook->id)}}">Xem chi tiết</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>						
					</div>
				</div>
                <!--//tab_one-->
                
    
            </div>
        </div>
    </div>
    <!-- Modal -->

<!-- End Modal -->
    <!--//tabs-->
        </div>
    </div>
    @stop