@extends('admin.layout')
@section('content')
 <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">QUẢN LÝ KHUYẾN MÃI</h3>
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
                  <a class="btn btn-primary" href="{{ route('khuyenmai.create')}}"  style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:40px"><i class='fas fa-plus' style='font-size:15px'></i></a>
                  <!-- /.card-header -->
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <div class="card-body">
                    <table id="book" class="table" broder="1"  >
                  <thead>
                  <tr>
                    <th>Tên CT Khuyến Mãi</th>
                    <th>Thời Gian BĐ</th>
                    <th>Thời Gian KT</th>
                    <th>Chiết Khấu</th>
                    <th>Trạng Thái</th>
                    <th>Tùy Chỉnh</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($khuyenmai ?? '' as $khuyenmais)
                  <tr>
                    <td>{{$khuyenmais->TenCTKM}}</td>
                    <td>{{date('d-m-Y', strtotime( $khuyenmais->ThoiGianBD))}}</td>
                    <td>{{date('d-m-Y', strtotime( $khuyenmais->ThoiGianKT))}}</td>
                    <td>{{$khuyenmais->ChietKhau}}%</td>
                    <td>   @if($khuyenmais->TrangThai == 0) {{"Hết khuyến mãi"}}
                    @elseif($khuyenmais->TrangThai == 1) {{"Còn khuyến mãi"}}
                    @elseif($khuyenmais->TrangThai == 2){{"Chưa đến thời gian khuyến mãi"}}
                    @endif</td>
                    <td>
                    <a href="{{ route('khuyenmai.edit', [$khuyenmais->id])}}" class="btn btn-warning" style="padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-edit' style='font-size:15px'></i></a>
                    <a onclick="return ComfirmDelete();" href="{{ route('khuyenmai.delete', [$khuyenmais->id]) }}" class="btn btn-danger" style="padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-trash-alt' style='font-size:15px'></i></a>

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
  if (confirm("Bạn có muốn xóa khuyến mãi đã chọn?")) {
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