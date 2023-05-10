@extends('admin.layout')
@section('content')
<style>
    .row{
        padding-top:20px !important;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12" style="margin-left: 80px; padding-right:70px">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Sửa SÁCH</h3>
                </div>
                <div class="col-12" style="padding-top:10px;">
                    <ul class="breadcrumb" style="border: none">
                      <li><a href="{{route('dashboard.index')}}">Dashboard</a></li><li>/</li>
                      <li><a href="{{route('sach.index')}}">Quản lý sách</a></li>
                      <li>Sửa sách</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- form start -->
                <form action=" {{ route('sach.update', $id) }}" method="POST" enctype="multipart/form-data" onsubmit="return CheckInput();">
                {{ csrf_field() }}
    @csrf
            @method('PUT')
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Tên Sách</label>
                    <input class="form-control" type="text" name="TenSach" value="{{$sach->TenSach}}" id="TenSach" placeholder="Tên sách">
                  </div>
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Nhà Cung Cấp</label>
                    <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" name="IdNCC" value="{{$sach->IdNCC}}" class="form-control" id="IdNCC" placeholder="Title">
                    @foreach($nhacc as $nhaccs)
                        <option value="{{$nhaccs->id}}" {{ $IdNCC == $nhaccs->id ? 'selected="selected"' : '' }} >{{$nhaccs->TenNCC}}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTopic">Ảnh Sách</label>
                    <div class="custom-file">
                        <input accept="*.png|*.jpg|*.jpeg" type="file" class="form-control" name="AnhSach" value="{{$sach->AnhSach}}" id="AnhSach" placeholder="Chọn ảnh" name="AnhSach" />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <label for="exampleInputTopic">Nhà Xuất Bản</label>
                    <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" name="NhaXuatBan" value="{{$sach->NhaXuatBan}}" class="form-control" id="NhaXuatBan" placeholder="Title">
                    @foreach($nhaxb as $nhaxbs)
                        <option value="{{$nhaxbs->id}}" {{ $NhaXuatBan == $nhaxbs->id ? 'selected="selected"' : '' }} >{{$nhaxbs->tennhaxb}}</option>
                    @endforeach
                    </select>
                  </div>
                </div> 
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Dịch Giả</label>
                    <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" name="DichGia" value="{{$sach->DichGia}}" class="form-control" id="NhaXuatBan" placeholder="Title">
                    @foreach($tacgia as $tacgias)
                        <option value="{{$tacgias->id}}" {{ $DichGia == $tacgias->id ? 'selected="selected"' : '' }} >{{$tacgias->tentacgia}}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="col-lg-6">
                    <label for="exampleInputTopic">Khuyến Mãi</label>
                    <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" name="IdKM" value="{{$sach->IdKM}}" class="form-control" id="IdKM" placeholder="Title">
                    @foreach($km as $kms)
                        <option value="{{$kms->id}}" {{ $IdKM == $kms->id ? 'selected="selected"' : '' }} >{{$kms->TenCTKM}}</option>
                    @endforeach
                    </select>
                    <div class="col-lg-6">
                                <input id="check" type="checkbox" class="check" name="check"  value="{{$sach->check}}">
                                <label for="check"><span class="icon"></span> Không khuyến mãi</label>
                              </div>
                  </div>               
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTopic">Số Trang</label>
                    <input class="form-control" type="text" id="SoTrang" name="SoTrang" value="{{$sach->SoTrang}}" placeholder="Số trang">
                  </div>
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Loại Bìa</label>
                    <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" name="LoaiBia" value="{{$sach->LoaiBia}}" class="form-control" id="LoaiBia" placeholder="Title">
                        <option value="0">Bìa cứng</option>
                        <option value="1">Massmarket Paperback</option>
                        <option value="2">Bìa mềm</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTopic">Giá Tiền</label>
                    <input class="form-control" type="text" name="GiaTien" value="{{$sach->GiaTien}}" id="GiaTien" placeholder="Giá tiền">
                  </div>
                  <div class="col-lg-6">
                    <label for="exampleInputTopic">Năm Xuất Bản</label>
                    <input class="form-control" type="" id="KichThuoc" name="NamXB" value="{{$sach->NamXB}}" placeholder="NamXB" style="margin-right:50px" >
                  </div>

                </div>
                
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTopic">Kích Thước</label>
                    <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" name="KichThuoc" value="{{$sach->KichThuoc}}" class="form-control" id="KichThuoc" placeholder="Title">
                    @foreach($kichthuoc as $kichthuocs)
                        <option value="{{$kichthuocs->id}}" {{ $KichThuoc == $kichthuocs->id ? 'selected="selected"' : '' }} >{{$kichthuocs->kichthuoc}}</option>
                    @endforeach
                    </select>
                </div>
                  <div class="col-lg-6" style=" margin-left:-1px">
                    <label for="exampleInputStatus">Trạng Thái</label>
                    <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" class="form-control" value="{{$sach->TrangThai}}" name="TrangThai" id="TrangThai" placeholder="Status">
                        <option value="2">Còn hàng</option>
                        <option value="0">Ngừng bán</option>
                        <option value="1">Tạm hết hàng</option>                   
                    </select>
                  </div>
                </div>
                <div class="row" style="float:right">
                  <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button> &nbsp;
                  <a class="btn btn-secondary" href="{{route('sach.index')}}" style="margin-left: 15px;margin-right: 30px; color:white"><i class="fas fa-window-close"></i></a>
                </div>
              </form>
        </div>
    </div>
</div>
@stop