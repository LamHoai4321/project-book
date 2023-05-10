@extends('admin.layout')
@section('content')
 <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">QUẢN LÝ NHÀ XUẤT BẢN</h3>
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
                  <a class="btn btn-primary" href="{{ route('nhaxuatban.create')}}" style="padding: 0.7rem 1.5rem; border-radius: 10px; margin-left:10px;"><i class='fas fa-plus' style='font-size:15px'></i></a>
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
                    <th>Tên Nhà Xuất Bản</th>
                    <th>Tùy Chỉnh</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($nhaxuatban ?? '' as $nhaxuatbans)
                  <tr>
                    <td>{{$nhaxuatbans->tennhaxb}}</td>
                   
                    <td>
                        <a href="{{ route('nhaxuatban.edit', [$nhaxuatbans->id])}}" class="btn btn-warning" style="padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-edit' style='font-size:15px'></i></a>
                        <a onclick="return ComfirmDelete();" href="{{ route('nhaxuatban.delete', [$nhaxuatbans->id]) }}" class="btn btn-danger" style="padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-trash-alt' style='font-size:15px'></i></a>

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
                {{$nhaxuatban->links()}}
            </div>
        </div>
    </div>
</div>
<script>
  function ComfirmDelete() {
  var txt;
  if (confirm("Bạn có muốn xóa nhà xuất bản đã chọn?")) {
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