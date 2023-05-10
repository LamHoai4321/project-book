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
                  <h3 class="font-weight-bold">SỬA MÃ GIẢM GIÁ</h3>
                </div>
                <div class="col-12" style="padding-top:10px;">
                    <ul class="breadcrumb" style="border: none">
                      <li><a href="{{route('dashboard.index')}}">Dashboard</a></li><li>/</li>
                      <li><a href="{{route('magiamgia.index')}}">Quản lý mã giảm giá</a></li><li>/</li>
                      <li>Sửa mã giảm giá</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- form start -->
            <form action=" {{ route('magiamgia.update', $magiamgia->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return CheckInput();">
                {{ csrf_field() }}
    @csrf
            @method('PUT')
              
                <div class="row">
                  
                  <div class="col-lg-6">
                    <label for="exampleInputStatus">Trạng Thái</label>
                    <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" class="form-control" value="{{$magiamgia->TrangThai}}" name="TrangThai" id="TrangThai" placeholder="Status">
                        <option value="1">Còn hạn</option>
                        <option value="0">Hết hạn</option>             
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
<script language="javascript">
function genderChanged(obj)
{
  var value = obj.value;
  if (value === '1'){
    $("#ChietKhau1").prop('hidden', false);
    $("#ChietKhau2").prop('hidden', true);
  }
  else if (value === '0'){    
    $("#ChietKhau2").prop('hidden', false);
    $("#ChietKhau1").prop('hidden', true);         
  }
}


</script>
<script language="javascript">
 function Changed(obj){
  if (obj.value.length >100 && obj.value.length<0 && typeof (obj.value.length  === 'string'  )){
    alert('Vui lòng nhập số nhỏ hơn 100 và lớn hơn 0!');
  }
  
};
  </script>

@stop