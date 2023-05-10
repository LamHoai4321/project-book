@extends('admin.layout')
@section('content')
 <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">QUẢN LÝ MÃ GIẢM GIÁ</h3>
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
                  </div>
                  <div class="col-lg-6">

                  </div>
                </div>
                  <!-- /.card-header -->
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <div class="card-body">
                    <table id="book" class="table" broder="1"  >
                  <thead>
                  <tr>
                    <th>Mã Giảm Giá</th>
                    <th>Số Lượng</th>
                    <th>Chiết Khấu</th>
                    <th>Khuyến Mãi Theo</th>
                    <th>Ngày Bắt Đầu</th>
                    <th>Ngày Kết Thúc</th>
                    <th>Trạng Thái</th>
                    <th>Tùy Chỉnh</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($magiamgia ?? '' as $magiamgias)
                  <tr>
                    <td>{{$magiamgias->Code}}</td>
                    <td>{{$magiamgias->SoLuong}}</td>
                  
                    <?php
				               if($magiamgias->LoaiKM==1){
				                ?>
				              <td>{{$magiamgias->ChietKhau}} %</td>
				                <?php
				                 }else {
				                ?>  
				                <td>{{$magiamgias->ChietKhau}} VNĐ</td>
                        <?php
				               }
				              ?>
                    <td>@if($magiamgias->LoaiKM == 1) {{"Khuyến Mãi Theo %"}}
                    @endif</td>
                    <td>{{$magiamgias->NgayBĐ}}</td>
                    <td>{{$magiamgias->NgayKT}}</td>
                    <td>@if($magiamgias->TrangThai == 1) {{"Còn Hạn"}}
                    @else (($magiamgias->LoaiKM == 0)) {{"Hết Hạn"}}
                    @endif</td>
                    <td>
                    <a href="{{ route('magiamgia.edit', [$magiamgias->id])}}" class="btn btn-warning" style="padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-edit' style='font-size:15px'></i></a>

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
  if (confirm("Bạn có muốn xóa mã giảm giá đã chọn?")) {
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