@extends('admin.layout')
@section('content')
 <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">QUẢN LÝ BÌNH LUẬN</h3>
                </div>
                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show notify" role="alert">
                      <strong>Thông báo! </strong>{{Session::get('message')}}.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                        @endif
                <div class="col-12 col-xl-8 mb-4 mb-xl-0" style="padding-top:50px">
                  <!-- /.card-header -->
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <div class="card-body">
                    <table id="book" class="table" broder="1"  >
                  <thead>
                  <tr>
                    
                    <th>Tên Người Gửi</th>
                    <th>Bình Luận</th>
                    <th>Ngày Gửi</th>
                    <th>Tên Sách</th>
                    <th>Tùy Chỉnh</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($binhluan ?? '' as $binhluans)
                  <tr>
                  
                    <td>{{$binhluans->HoTen}}</td>
                    <td>{{$binhluans->NoiDung}}</td>
                    <td>{{$binhluans->Ngay}}</td>
                    <td style="max-width: 180px; text-overflow: ellipsis; overflow: hidden">{{$binhluans->Sach->TenSach}}</td>

                 
                    <td>
                    @if($binhluans->Duyet==0)
                <input type="button" data-comment_status="1" data-comment_id="{{$binhluans->id}}" id="{{$binhluans->IdSach}}" class="btn btn-primary btn-xs comment_duyet_btn" value="Duyệt" >
                  @else 
                <input type="button" data-comment_status="0" data-comment_id="{{$binhluans->id}}" id="{{$binhluans->IdSach}}" class="btn btn-danger btn-xs comment_duyet_btn" value="Bỏ Duyệt" >
                  @endif
                        <a onclick="return ComfirmDelete();" href="{{ route('binhluan.delete', [$binhluans->id]) }}" class="btn btn-danger" style="padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-trash-alt' style='font-size:15px'></i></a>
                        
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
            </div>
        </div>
    </div>
</div>
<script>
  function ComfirmDelete() {
  var txt;
  if (confirm("Bạn có muốn xóa bình luận đã chọn?")) {
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