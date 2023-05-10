@extends('admin.layout')
@section('content')
 <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">QUẢN LÝ SÁCH</h3>
                </div>
                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show notify" role="alert">
                      <strong>Thông báo! </strong>{{Session::get('message')}}.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                        @endif
                        <div class="col-lg-12" style="padding-top:20px; display: flex; margin-bottom: 10px">
                  <div class="col-lg-6">
                  <a class="btn btn-primary" href="{{ route('sach.create')}}" style="padding: 0.7rem 1.5rem; border-radius: 10px; margin-left:10px;"><i class='fas fa-plus' style='font-size:15px'></i></a>
                  </div>
                  <div class="col-lg-6">
                  <form id="" method="POST" action="{{ route('sach.search')}}" style="float:right">
                  @csrf
                      <input style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:1.55rem" type="text" name="bookName" placeholder="Nhập tên sách hoặc tác giả" >                     
                      <button id="btnsearch" class="btn-search" type="submit" style="padding: 0.5rem 1.5rem; border-radius: 10px;background:#a3a4a5c2"><i class='fas fa-search' style='font-size:15px'></i></button>
                  </form>
                  </div>
                </div>
                  <!-- /.card-header -->
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <div class="card-body">
                    <table id="book" class="table" broder="1"  >
                  <thead>
                  <tr>
                    <th>Ảnh Bìa</th>
                    <th>Tên Sách</th>
                    <th>Nhà Xuất Bản</th>
                    <th>Tác Giả</th>
                    <th>Giá Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Tùy Chỉnh</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($sach ?? '' as $sachs)
                  <tr>
                    <td><img src="{{asset('image/'.$sachs->AnhSach)}}" style="width:50px; height:50px; border-radius:0%"></td>
                    <td style="max-width: 180px; text-overflow: ellipsis; overflow: hidden">{{$sachs->TenSach}}</td>
                    <td>{{$sachs->NhaXuatBans->tennhaxb}}</td> <!--   <3   -->
                    <td style="max-width: 180px; text-overflow: ellipsis; overflow: hidden">{{$sachs->TacGia->tentacgia}}</td>
                    <td>{{ number_format($sachs->GiaTien,0,",",",")}}</td>
                   
                    <td>@if($sachs->TrangThai == 1) {{"Tạm hết hàng"}} 
                    @elseif (($sachs->TrangThai == 0)) {{"Ngừng bán"}}
                    @else {{"Còn hàng"}}
                    @endif</td>
                    <td>
                        <a href="{{ route('sach.edit', [$sachs->id])}}" class="btn btn-warning" style="padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-edit' style='font-size:15px'></i></a>
                        <a onclick="return ComfirmDelete();" href="{{ route('sach.delete', [$sachs->id]) }}" class="btn btn-danger" style="padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-trash-alt' style='font-size:15px'></i></a>
                        
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              </div>
             
              <!-- /.card-body -->
                </div>
                </div>
                {{$sach->links()}}
            </div>
        </div>
    </div>
</div>
<script>
  function ComfirmDelete() {
  var txt;
  if (confirm("Bạn có muốn xóa sách đã chọn?")) {
    return true;
  }
  return false;
}
</script>
@stop
<style> 
tr:hover{
            background-color:#ddd;
            cursor:pointer;
        }
.table{
border: 1px solid #CED4DA;  
border-collapse: collapse; }
    
    
      </style>