<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoaDonBan;
use App\Models\ChiTietHoaDonBan;
use App\Models\Sach;
use App\Models\User;
use App\Models\MaGiamGia;
use App\Classes\Helper;
use Illuminate\Support\Facades\Auth;
use Session;
use Carbon\Carbon;
use DB;
use Mail;
use PDF;
use App\Mail\Mailmagiamgia;
class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
      
        $hoadon = HoaDonBan::orderBy('created_at', 'desc')->paginate(12);
        $chitiethoadonban=ChiTietHoaDonBan::all();
        if(isset($_GET['sort_by'])){
          $sort_by=$_GET['sort_by'];
          
          if($sort_by=='all'){
            $hoadon=HoaDonBan::orderby('created_at','DESC')->get();
          
          }
          elseif($sort_by=='cancel'){
            $hoadon=HoaDonBan::where('TrangThai',0)->orderby('created_at','DESC')->get();
             
          }
          elseif($sort_by=='new'){
            $hoadon=HoaDonBan::where('TrangThai',1)->orderby('created_at','DESC')->get();
             
          }
          elseif($sort_by=='done'){
            $hoadon=HoaDonBan::where('TrangThai',3)->orderby('created_at','DESC')->get();
             
          }
          elseif($sort_by=='move'){
            
              $hoadon=HoaDonBan::where('TrangThai',4)->orderby('created_at','DESC')->get();
          }
          elseif($sort_by=='complete'){
            
            $hoadon=HoaDonBan::where('TrangThai',2)->orderby('created_at','DESC')->get();
        }
         
      }
  
        return View('admin.pages.HoaDon.index', compact('hoadon','chitiethoadonban'));
    }
    public function getDetail($id){
        $chitiethoadonban = ChiTietHoaDonBan::where('IdHoaDB', $id)->get();
        
        $hoadon = HoaDonBan::find($id);
        $html = '
        <div class="baobang">
        <div class="table-agile-info left-table">

              <div class="panel panel-default">
                <div class="panel-heading">
                Thông tin đăng nhập
                </div>
                
                <div class="table-responsive">
                                
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                      
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        
                        <th style="width:30px;"></th>
                      </tr>
                    </thead>
                    <tbody>
               
                    <tr>
                        <td>'.$hoadon->TaiKhoan->HoTen.'</td>
                        <td>'.$hoadon->TaiKhoan->SDT.'</td>
                        <td>'.$hoadon->TaiKhoan->Email.'</td>
                      </tr>
                
                    </tbody>
                  </table>

                </div>
              
              </div>
      </div>



      <div class="table-agile-info">
        
        <div class="panel panel-default">
          <div class="panel-heading">
            Liệt kê chi tiết đơn hàng
          </div>
                                    
        <div class="baochitiet">
          <div class="table-responsive chitietdh">
                           
            <table class="table table-striped ">
              <thead style="background: #f5f5f5;">
                <tr>
                  <th style="width:20px;">
                    STT
                  </th>
                  <th>Tên sản phẩm</th>
                  <th>Số lượng</th>
                  <th>Phí ship hàng</th>
                  <th>Giá sản phẩm</th>
                  <th>Tổng tiền</th>
                  
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>';
                
           
                $i=0;
                foreach($chitiethoadonban as $chitiet){ 
                        $i++;
                        $html .= '
                        <tr>
                        
                        <td><i>'.$i.'</i></td>
                        <td style="max-width: 180px; text-overflow: ellipsis; overflow: hidden">'.$chitiet->Sach->TenSach.'</td>
            
                        <td>'.$chitiet->SoLuong.'</td>
                        <td>'.number_format(15000 ,0,",",",").' VND</td>
                        <td>'.number_format($chitiet->GiaBan ,0,",",",").' VND</td>
                        <td>'.number_format($chitiet->HoaDon->TongTien ,0,",",",").' VND</td>
                        
                        
                        </tr>';
                        
            }
              
     $html .=' </div> </div> 
     <div class="modal-footer">
     <div id="detail">
    
    
     <select id="trangthaidonhang" data-id='.$hoadon->id.' class="form-control order_details">';
     if($hoadon->TrangThai==1){
     $html .=' <option selected value="1">Chưa xử lý</option>
      <option  value="3">Duyệt Đơn</option>
      <option  value="0">Hủy Đơn</option>';
    }else if($hoadon->TrangThai==3){
      $html .='<option selected hidden value="3">Đã Duyệt</option>
      <option  value="0">Hủy Đơn</option>
      <option value="4">Đang giao hàng</option>';
      
     }
    elseif($hoadon->TrangThai==4){
      $html .='<option selected hidden value="3">Đang giao hàng</option>
      <option  value="0">Hủy Đơn</option>
      <option  value="2">Giao hàng thành công</option>';
      
    }
    elseif($hoadon->TrangThai==2){
      $html .='<option selected hidden value="2">Giao hàng thành công</option>
      <option  value="2">Giao hàng thành công</option>';
    }
    else{
      $html .='<option selected hidden value="0">Đã Hủy</option>
      <option  value="0">Đã Hủy</option>
      <option value="4">Đang giao hàng</option>';
    }
    $html .='</select></div>';
 

        return $html;

    }
    public function move($idHoaDB){
		$order=HoaDonBan::where('IdHoaDB',$idHoaDB)->update(['TrangThai'=>4]);
		return redirect()->back()->with('message','đơn hàng đang được vận chuyển');
        dd($order);
	}

	public function complete($idHoaDB){
		$order=HoaDonBan::where('IdHoaDB',$idHoaDB)->update(['TrangThai'=>5]);
		return redirect()->back()->with('message','đơn hàng đã giao thành công');
	}
	public function huy_don_hang(Request $req){
		$data=$req->all();
		$order=HoaDonBan::where('IdHoaDB',$data['idHoaDB'])->update(['TrangThai'=>3]);
	}
	public function order_code(Request $request ,$idHoaDB){
		$order = HoaDonBan::where('IdHoaDB',$idHoaDB)->first();
		$order->delete();
		Session::flash('message','Xóa đơn hàng thành công');
		return redirect()->back();

	}
  public function changeStatusOrder(Request $request){
  
    $order = HoaDonBan::find($request->id);
    $order->TrangThai = $request->TrangThai;
    $orde=$order->TaiKhoan->HoTen;
    $orde1=$order->TaiKhoan->Email;
    
    if($order->save()){
      if($order->TrangThai == 1){
        return 'Đơn Mới';

      }else if($order->TrangThai == 2&&$order->TongTien>=500000){
        $time = Carbon::now()->timestamp;
        $magiamgia = new MaGiamGia();
        $magiamgia->Code = 'MG'.$order->id.$time;
        $magiamgia->SoLuong=1;
        $magiamgia->ChietKhau=10;
        $magiamgia->LoaiKM=1;
        $magiamgia->NgayBĐ= Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y'); //hom nay
        $magiamgia->NgayKT=Carbon::now('Asia/Ho_Chi_Minh')->addMonth()->format('d-m-Y');; //1 thang
        $magiamgia->TrangThai=1;
        $magiamgia->Xoa=0;
        if($magiamgia->save())
        {
          $data = [
            'name' => $orde,
            'MaDH' => $order->id,
            'magiamgia' => $magiamgia->Code,
            'ngaybatdau' =>  $magiamgia->NgayBĐ,
            'ngayketthuc' => $magiamgia->NgayKT,
            'Email'=>$orde1,
        ];
        Mail::to($orde1)->send(new Mailmagiamgia($data));
        return 'Giao hàng thành công';
      }
        
      }else if($order->TrangThai == 2){
       
        return 'Giao hàng thành công';
      }
        //mail 
       
       else if($order->TrangThai == 3){
        return 'Duyệt đơn thành công';
       
      }
    elseif($order->TrangThai == 4){
      return 'Đang giao hàng';

    }else{
      return 'Đơn hàng đã hủy';
    }
      //else if
  }
    return null;

  }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Lọc
   
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function print_order($id){
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($this->print_order_convert($id));
      
      return $pdf->stream();
  }
    public function print_order_convert($id){
      
      $order_details = ChiTietHoaDonBan::where('IdHoaDB',$id)->get();
    
      $order = HoaDonBan::find($id);
      $giamgia = 0;
    
      if($order->id_makm != null){
       $maGiamGia = MaGiamGia::find($order->id_makm);
       if($maGiamGia->LoaiKM == 1){ //%
        $giamgia = (($order->TongTien*100)/(100-$maGiamGia->ChietKhau)) - $order->TongTien;
      }
    
      }
      $tenkh = Auth::user()->HoTen;
      $diachi = Auth::user()->DiaChi;
      $sdt = Auth::user()->SDT;
      //$order_details_product = OrderDetail::with('product')->where('order_code', $checkout_code)->get();
      $tongcong = 0;
    

      $output = '';

      $output.='<!DOCTYPE html><html lang="vn">
      <head><meta charset="utf-8"></head><style type="text/css">
      body{
        font-family: DejaVu Sans;
      }
      .m-0{
          margin: 0px;
      }
      .p-0{
          padding: 0px;
      }
      .pt-5{
          padding-top:5px;
      }
      .mt-10{
          margin-top:10px;
      }
      .text-center{
          text-align:center !important;
      }
      .w-100{
          width: 100%;
      }
      .w-50{
          width:50%;   
      }
      .w-85{
          width:85%;   
      }
      .w-15{
          width:15%;   
      }
      .logo img{
          width:45px;
          height:45px;
          padding-top:30px;
      }
      .logo span{
          margin-left:8px;
          top:19px;
          position: absolute;
          font-weight: bold;
          font-size:25px;
      }
      .gray-color{
          color:#5D5D5D;
      }
      .text-bold{
          font-weight: bold;
      }
      .border{
          border: 1px solid black;
      }
      table tr,th,td{
          border: 1px solid #d2d2d2;
          border-collapse:collapse;
          padding: 7px 8px;
      }
      table tr th{
          background: #F4F4F4;
          font-size:15px;
      }
      table tr td{
          font-size:13px;
      }
      table{
          border-collapse:collapse;
      }
      .box-text p{
          line-height:10px;
      }
      .float-left{
          float:left;
      }
      .total-part{
          font-size:16px;
          line-height:12px;
      }
      .total-right p{
          padding-right:20px;
      }
  </style>
  <body>
  <div class="head-title">
      <h1 class="text-center m-0 p-0">HÓA ĐƠN BÁN</h1>
  </div>
  <div class="add-detail mt-10">
      <div class="w-50 float-left mt-10">
          <p class="m-0 pt-5 text-bold w-100">Số Hóa Đơn - <span class="gray-color">#'.$order->id.'</span></p>
          <p class="m-0 pt-5 text-bold w-100">Nhà Bán Hàng: Kim Đồng Books Store  <span class="gray-color"></span></p>
          <p class="m-0 pt-5 text-bold w-100">Ngày Lập - <span class="gray-color">'.Carbon::createFromFormat ('Y-m-d',$order->NgayLap).'</span></p>
      
      </div>

      <div class="w-50 float-left logo mt-10">
      </div>
      <div style="clear: both;"></div>
  </div>
  <div class="table-section bill-tbl w-100 mt-10">
      <table class="table w-100 mt-10">
          <tr>
              <th class="w-50">Từ</th>
              <th class="w-50">Đến</th>
          </tr>
          <tr>
              <td>
                  <div class="box-text">
                      <p>Họ Tên Người Gửi : '.$tenkh.'</p>
                      <p>Địa Chỉ :'.$diachi.' </p>
                      <p>Số Điện Thoại : '.$sdt.' </p>
                  </div>
              </td>
              <td>
                  <div class="box-text">
                      <p>Họ Tên Người Nhận : '.$order->TaiKhoan->HoTen.'</p>
                      <p>Địa Chỉ Giao Hàng : '.$order->DiaChiGH.'</p>
                      
                      <p>Số Điện Thoại : '.$order->SDT.'</p>
                  </div>
              </td>
          </tr>
      </table>
  </div>
  <div class="table-section bill-tbl w-100 mt-10">
      <table class="table w-100 mt-10">
          <tr>
              <th class="w-50">Phương Thức Thanh Toán</th>
              <th class="w-50">Phí Ship</th>
          </tr>
          <tr>
              <td>'; 
              if($order->PhuongTTT == 1) {
                $output .= "Ví VNPAY";
              }else if ($order->PhuongTTT == 2) {
                $output .= "Thanh Toán Nhận Hàng";
              }
              $output .=   
              '</td>
              <td>15,000 VND</td>
          </tr>
      </table>
  </div>
  <div class="table-section bill-tbl w-100 mt-10">
      <table class="table w-100 mt-10">
          <tr>
              <th class="w-50">STT</th>
              <th class="w-50">Tên Sách</th>
              <th class="w-50">Giá Bán</th>
              <th class="w-50">Số Lượng</th>
              <th class="w-50">Tổng Tiền</th>
          </tr>';
          $i=1;
          foreach($order_details as $product){
            $tongcong += $product->SoLuong*$product->GiaBan;
            $output .='<tr align="center">
            <td>'.$i.'</td>
            <td style="max-width: 180px; text-overflow: ellipsis; overflow: hidden">'.$product->Sach->TenSach.'</td>
            <td>'.number_format($product->GiaBan ,0,",",",").' VND</td>
            <td>'.$product->SoLuong.'</td>
            <td>'.number_format($product->SoLuong*$product->GiaBan,0,",",",").' VND</td>
            
        </tr>';
          $i++;}
          $sotiengiam = 0;
          if($order->id_makm != null){
          $sotiengiam = number_format((($tongcong)/100)*$maGiamGia->ChietKhau,0,",",",");
          }
          $output .='
          <tr>
              <td colspan="5">
                  <div class="total-part">
                      <div class="total-left w-85 float-left" align="right">
                      <p>Khuyến Mãi</p>
                      <p>Tổng Cộng</p>
                      </div>
                      <div class="total-right w-15 float-left text-bold" align="right">
                        <p>'.$sotiengiam.' VND</p>
                          <p>'.number_format($order->TongTien,0,",",",").' VND</p>
                      </div>
                      <div style="clear: both;"></div>
                  </div> 
              </td>
          </tr>
      </table>
  </div></body> </html>';

      return $output;


    }
}
