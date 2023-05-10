
<script src="{!! asset('admin/vendors/js/vendor.bundle.base.js ')!!}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  {{-- <script src="{!! asset('admin/vendors/chart.js ')!!}/Chart.min.js ')!!}"></script> --}}
  <script src="{{ asset('admin/js/chart.js') }}"></script>
  <script src="{!! asset('admin/vendors/datatables.net/jquery.dataTables.js ')!!}"></script>
  <script src="{!! asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js ')!!}"></script>
  <script src="{!! asset('admin/js/dataTables.select.min.js ')!!}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{!! asset('admin/js/off-canvas.js ')!!}"></script>
  <script src="{!! asset('admin/js/hoverable-collapse.js ')!!}"></script>
  <script src="{!! asset('admin/js/template.js ')!!}"></script>
  <script src="{!! asset('admin/js/settings.js ')!!}"></script>
  <script src="{!! asset('admin/js/todolist.js ')!!}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  
  <script src="{!! asset('admin/js/Chart.roundedBarCharts.js ')!!}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>


  <!-- End custom js for this page-->
  <script type="text/javascript">
    $('.comment_duyet_btn').click(function(){

        var comment_status = $(this).data('comment_status');

        var comment_id = $(this).data('comment_id');
        var comment_product_id = $(this).attr('id');
        if(comment_status==1){

            var alert = 'Thay đổi thành duyệt thành công';
        }else{
            var alert = 'Thay đổi thành không duyệt thành công';
        }
          $.ajax({
                url:"{{route('allow_comment')}}",
                method:"POST",

                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{comment_status:comment_status,comment_id:comment_id,comment_product_id:comment_product_id},
                success:function(data){
                    location.reload();
                   $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');

                }
            });


    });

</script>
<script>

 $(document).ready(function(){
    $('body').on('change','#trangthaidonhang',function(){
    var selectVal = $("#trangthaidonhang option:selected").val();
    var id = $(this).data('id');
    $.ajax({
    headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                url: "{{route('hoadon.changeStatus')}}",
                method: 'POST',
                data:{
                    id: id,
                    TrangThai: selectVal,
                },
                success:function(data){
                    console.log(data);
                    if(data){

                        $('#trangthai'+id).html(data);
                        if(data=="Đơn hàng đã hủy"){
                            toastr.error('Đơn hàng đã hủy');
                        }else
                        toastr.success('Cập nhật thành công');

                        $('#exampleModalLong').modal('hide');

                    }

                }
            });
});
    });

$('.chitiet').off('click').click(function(){
var id = $(this).data('id');
var url = "{{route('hoadon.getdetail',":id")}}";
url = url.replace(':id', id);
$.ajax({
    headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                url: url,
                method: 'POST',
                success:function(data){
                    // thiết lập quyền

                    $('.modal-body[id="order-modal"]').empty();

                    $('.modal-body[id="order-modal"]').prepend(data);

                    // hiển thị modal
                    $('#modal').modal('exampleModalLong');
                }
            });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#sort').on('change',function(){
		var url=$(this).val();
		if(url){
			window.location=url;
		}
		return false;
	});
});
</script>
