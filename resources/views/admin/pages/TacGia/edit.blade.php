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
                  <h3 class="font-weight-bold">Sửa Tác Giả</h3>
                </div>
                <div class="col-12" style="padding-top:10px;">
                    <ul class="breadcrumb" style="border: none">
                      <li><a href="{{route('dashboard.index')}}">Dashboard</a></li><li>/</li>
                      <li><a href="{{route('tacgia.index')}}">Quản lý tác giả</a></li>
                      <li>/Sửa tác giả</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- form start -->
                <form action=" {{ route('tacgia.update', $tacgia->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return CheckInput();">
                {{ csrf_field() }}
    @csrf
            @method('PUT')
                <div class="row">
                  <div class="col-lg-6">
                    <label for="exampleInputTitle">Tên Tác Giả</label>
                    <input class="form-control" type="text" name="tentacgia" value="{{$tacgia->tentacgia}}" id="tentacgia" placeholder="Tên nhà cung cấp">
                  </div>
                 
                </div>
                <div class="row" style="float:right">
                  <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button> &nbsp;
                  <a class="btn btn-secondary" href="{{route('tacgia.index')}}" style="margin-left: 15px;margin-right: 30px; color:white"><i class="fas fa-window-close"></i></a>
                </div>
              </form>
        </div>
    </div>
</div>
@stop