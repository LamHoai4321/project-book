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
                  <h3 class="font-weight-bold">Sửa Thể Loại</h3>
                </div>
                <div class="col-12" style="padding-top:10px;">
                    <ul class="breadcrumb" style="border: none">
                      <li><a href="{{route('dashboard.index')}}">Dashboard</a></li><li>/</li>
                      <li><a href="{{route('theloai.index')}}">Quản lý thể loại</a></li>
                      <li>Sửa thể loại</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- form start -->
                <form action=" {{ route('theloai.update', $theloai->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return CheckInput();">
                {{ csrf_field() }}
    @csrf
            @method('PUT')
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Tên Thể Loại</label>
                    <input class="form-control" type="text" name="TenTheLoai" value="{{$theloai->TenTheLoai}}" id="TenTheLoai" placeholder="Tên sách">
                  </div>
                  
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Tên Thể Loại Cha</label>
                    <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" name="TenTLCha" class="form-control" id="TenTLCha" placeholder="Title">
                    @foreach($theloaicha as $theloaichas)
                        <option value="{{$theloaichas->id}}">{{$theloaichas->TenTheLoaiCha}}</option>
                  @endforeach
                    </select>
                  </div>
              
                <div class="row" style="float:right">
                  <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button> &nbsp;
                  <a class="btn btn-secondary" href="{{route('theloai.index')}}" style="margin-left: 15px;margin-right: 30px; color:white"><i class="fas fa-window-close"></i></a>
                </div>
              </form>
        </div>
    </div>
</div>
@stop