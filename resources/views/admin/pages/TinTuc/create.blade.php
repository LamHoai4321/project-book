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
                  <h3 class="font-weight-bold">THÊM TÀI KHOẢN</h3>
                </div>
                <div class="col-12" style="padding-top:10px;">
                    <ul class="breadcrumb" style="border: none">
                      <li><a href="{{route('dashboard.index')}}">Dashboard</a></li><li>/</li>
                      <li><a href="{{route('tintuc.index')}}">Quản lý Danh Mục Tin Tức</a></li><li>/</li>
                      <li>Thêm tin tức</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- form start -->
                <form action=" {{route('tintuc.store')}} " method="POST" enctype="multipart/form-data" onsubmit="return CheckInput();">
                @csrf
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Tên tin tức</label>
                    <input class="form-control" type="text" name="title" id="HoTen" placeholder="Họ Tên">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTopic">Ảnh</label>
                    <div class="custom-file">
                        <input accept="*.png|*.jpg|*.jpeg" type="file" class="form-control" name="image" id="AnhDaiDien" placeholder="Chọn ảnh" />
                    </div>
                  </div>
                
                </div> 
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Danh mục</label>
                    <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" name="category_id" class="form-control" id="IdNCC" placeholder="Title">
                    @foreach($theloai as $nhaccs)
                        <option value="{{$nhaccs->id}}">{{$nhaccs->ten}}</option>
                  @endforeach
                    </select>
                  </div>
                </div>
               
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Nội dung</label>
                    <textarea type="text" style="height:100px" class="form-control" name="content" id="MoTa" placeholder="Nhập nội dung mô tả"></textarea>
                  </div>
                </div>
                <div class="row" style="float:right">
                  <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button> &nbsp;
                  <a class="btn btn-secondary" href="{{route('tintuc.index')}}" style="margin-left: 15px;margin-right: 30px; color:white"><i class="fas fa-window-close"></i></a>
                </div>
              </form>
        </div>
    </div>
</div>
@stop