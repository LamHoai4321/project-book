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
                  <h3 class="font-weight-bold">THÊM VÀO KHO</h3>
                </div>
                <div class="col-12" style="padding-top:10px;">
                    <ul class="breadcrumb" style="border: none">
                      <li><a href="{{route('dashboard.index')}}">Dashboard</a></li><li>/</li>
                      <li><a href="{{route('kho.index')}}">Quản lý kho</a></li><li>/</li>
                      <li>Thêm kho</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- form start -->
                <form action=" {{route('kho.store')}} " method="POST" enctype="multipart/form-data" onsubmit="return CheckInput();">
                @csrf
                <div class="row">
                  
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Tên Sách</label>
                    <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" name="IdSach" class="form-control" id="IdSach" placeholder="Title">
                    @foreach($sach as $sachs)
                        <option value="{{$sachs->id}}">{{$sachs->TenSach}}</option>
                  @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-lg-6">
                    <label for="exampleInputTopic">Số Lượng Tồn</label>
                    <input class="form-control" type="text" name="SoLuongTon" id="SoLuongTon" placeholder="SoLuongTon">
                  </div>
                </div> 
                <div class="row" style="float:right">
                  <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button> &nbsp;
                  <a class="btn btn-secondary" href="{{route('kho.index')}}" style="margin-left: 15px;margin-right: 30px; color:white"><i class="fas fa-window-close"></i></a>
                </div>
              </form>
        </div>
    </div>
</div>
@stop