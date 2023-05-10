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
                  <h3 class="font-weight-bold">THÊM NHÀ CUNG CẤP</h3>
                </div>
                <div class="col-12" style="padding-top:10px;">
                    <ul class="breadcrumb" style="border: none">
                      <li><a href="{{route('dashboard.index')}}">Dashboard</a></li><li>/</li>
                      <li><a href="{{route('nhacungcap.index')}}">Quản lý nhà cung cấp</a></li><li>/</li>
                      <li>Thêm nhà cung cấp</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- form start -->
                <form action=" {{route('nhacungcap.store')}} " method="POST" enctype="multipart/form-data" onsubmit="return CheckInput();">
                @csrf
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Tên Nhà Cung Cấp</label>
                    <input class="form-control" type="text" name="TenNCC" id="TenNCC" placeholder="Tên nhà cung cấp">
                  </div>
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Địa Chỉ</label>
                    <input class="form-control" type="text" name="DiaChi" id="DiaChi" placeholder="Địa chỉ">
                  </div>
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Số Điện Thoại</label>
                    <input class="form-control" type="text" name="SDT" id="SDT" placeholder="Số điện thoại">
                  </div>
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Email</label>
                    <input class="form-control" type="text" name="Email" id="Email" placeholder="Email">
                  </div>
                  <div class="col-lg-6">
                  <label for="exampleInputTitle">Trạng Thái</label>
                  <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" name="TrangThai" class="form-control" id="TrangThai" placeholder="Title">
                         <option value="1">Đang Cung Cấp</option>
                        <option value="0">Ngừng Cung Cấp</option>
                        
                    </select>
                </div>
                </div>
                <div class="row" style="float:right">
                  <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button> &nbsp;
                  <a class="btn btn-secondary" href="{{route('nhacungcap.index')}}" style="margin-left: 15px;margin-right: 30px; color:white"><i class="fas fa-window-close"></i></a>
                </div>
              </form>
        </div>
    </div>
</div>
@stop