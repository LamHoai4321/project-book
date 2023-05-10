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
                  <h3 class="font-weight-bold">Sửa Khuyến Mãi</h3>
                </div>
                <div class="col-12" style="padding-top:10px;">
                    <ul class="breadcrumb" style="border: none">
                      <li><a href="{{route('dashboard.index')}}">Dashboard</a></li><li>/</li>
                      <li><a href="{{route('kho.index')}}">Quản lý khuyến mãi</a></li>
                      <li>Sửa khuyến mãi</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
          @if($errors->any())
          <h4>{{$errors->first()}}</h4><br>
          @endif
            <!-- form start -->
                <form action=" {{ route('khuyenmai.update', $khuyenmai->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return CheckInput();">
                {{ csrf_field() }}
    @csrf
            @method('PUT')
            <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Tên CT Khuyến Mãi</label>
                    <input class="form-control" type="text" name="TenCTKM" id="TenCTKM" value="{{$khuyenmai->TenCTKM}}" placeholder="Tên chương trình khuyến mãi">
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTopic">Thời Gian Bắt Đầu</label>
                    <div class="custom-file">
                        <input type="date" class="form-control" name="ThoiGianBD" value="{{$khuyenmai->ThoiGianBD}}" id="ThoiGianBD" placeholder="Thời gian bắt đầu" />
                    </div>
                  </div>
                  
                </div> 
                <div class="row">
                <div class="col-lg-6">
                    <label for="exampleInputTopic">Thời Gian Kết Thúc</label>
                    <div class="custom-file">
                        <input type="date" class="form-control" name="ThoiGianKT" value="{{$khuyenmai->ThoiGianKT}}" id="ThoiGianKT" placeholder="Thời gian kết thúc"/>

                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Khuyến Mãi Theo Phần Trăm</label>
                    <input class="form-control" type="text" name="ChietKhau" id="ChietKhau" value="{{$khuyenmai->ChietKhau}}" placeholder="Nhập số % khuyến mãi">
                  </div>
                </div>
                <div class="row" style="float:right">
                  <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button> &nbsp;
                  <a class="btn btn-secondary" href="{{route('khuyenmai.index')}}" style="margin-left: 15px;margin-right: 30px; color:white"><i class="fas fa-window-close"></i></a>
                </div>
              </form>
        </div>
    </div>
</div>
@stop