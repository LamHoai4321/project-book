<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\TheLoaiCha;
use App\Models\HoaDonBan;
use App\Models\MaGiamGia;
use App\Models\ChiTietHoaDonBan;
use App\Models\TheLoai;
use App\Models\Kho;
use App\Models\Cart;
use App\Classes\Helper;
use session;
class LoginController extends Controller
{
    //Đăng Nhập
   
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('user.index');
        } else {
            return view('Login.Login');
        }
    }
    public function postLogin(Request $request)
    {   
        $this->validate($request,
        [
            
         
            'txtEmail'=>'required|email',
            'txtMatKhau'=>'required|min:6|max:20',
        ],
        [
            
           
            'txtEmail.required'=>'Vui lòng nhập email',
            'txtEmail.email'=>'Không đúng định dạng email',
            'txtMatKhau.required'=>'Vui lòng nhập mật khẩu',
            'txtMatKhau.min'=>'Mật khẩu ít nhất 6 kí tự'
        ]);
        $login = [
        'Email' => $request->txtEmail,
        'password' => $request->txtMatKhau,
        'TrangThai'    =>"1",
        'Xoa'          =>"0"
                 ];
    
        if (Auth::attempt($login)) {
            $infoUser=['id'=>Auth::User()->id,'Email'=>Auth::User()->Email,'HoTen'=>Auth::User()->HoTen,'AnhDaiDien'=>Auth::User()->AnhDaiDien,'DiaChi'=>Auth::User()->DiaChi,'SDT'=>Auth::User()->SDT];
            $request->session()->put('infoUser',$infoUser);
            if(Auth::User()->LoaiTK == 0)
            { 
            return redirect()->route('user.index')->with('message', 'Đăng nhập thành công');
            } 
            else
            {
            return redirect()->route('admin.dashboard')->with('message', 'Đăng nhập thành công');
            }
        }
        else 
        {
               return redirect()->back()->with('message', 'Email hoặc Password không chính xác');
        }
    }
    //Đăng Ký
    public function Register()
    {
        return view('Login.Login');
    }
    public function postRegister(Request $request)
    {
       
        $this->validate($request,
        [
            
            'HoTen'=>'required',
            'Email'=>'required|email|unique:user,email',
            'password'=>'required|min:6|max:20',
            'repassword'=>'required|same:password'
        ],
        [
            
            'HoTen.required'=>'Vui lòng nhập username',
            'Email.required'=>'Vui lòng nhập email',
            'Email.email'=>'Không đúng định dạng email',
            'Email.unique'=>'Email đã tồn tại! Vui lòng nhập emal khác',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'repassword.required'=>'Vui lòng xác nhận mật khẩu',
            'repassword.same'=>'Xác nhận mật khẩu không giống nhau',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự'
        ]);
        $user = new User();
        $user->HoTen=$request->HoTen;
        $user->Email=$request->Email;
        $user->password = Hash::make($request->password);
        $user->LoaiTK=0;
        $user->TrangThai=1;
        $user->Xoa=0;
        if($user->save())
        return redirect()->route('getLogin')->with('message','Tạo tài khoản thành công!');  
    }
    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('infoUser');
        return view('Login.Login');
    }
    
   
    public function updateAccount(Request $request, $id)
    {
        $user = User::find($id);
        $data=$request->validate(
        [
            'HoTen'=>'required',
            'Email'=>'required|Email',
            'password'=>'required|min:6|max:20',
            'repassword'=>'required|same:password'
        ],
        [
            'HoTen.required'=>'Vui lòng nhập tên',
            'Email.required'=>'Vui lòng nhập Email',
            'Email.Email'=>'Không đúng định dạng Email',
            'passwordcu.required'=>'Vui lòng nhập mật khẩu cũ',
            'password.required'=>'Vui lòng nhập mật khẩu mới',
            'repassword.required'=>'Vui lòng xác nhận mật khẩu mới',
            'repassword.same'=>'Xác nhận mật khẩu không giống nhau',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự'
        ]);
    
        $data['password'] = Hash::make($data['password']);
        if(Hash::check($request['passwordcu'], $user->password))        
        {
            if($user->update($data)){
            return redirect('/')->with('message','Cập nhật tài khoản thành công!');  }
           
        }
        else return redirect('/')->with('message','Cập nhật tài khoản thất bại!');  
    }   
    public function index(Request $request)
    { $listcha=TheLoaiCha::all();
        foreach($listcha as $cha){
            $cha->listcon=TheLoai::where('TenTLCha',$cha->id)->get();
            
            
        }
 
        $don_hang=HoaDonBan::where('IdKH',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        foreach($don_hang as $order){
            $giamgia = 0;
    
      if($order->id_makm != null){
       $maGiamGia = MaGiamGia::find($order->id_makm);
       if($maGiamGia->LoaiKM == 1){ //%
        $giamgia = (($order->TongTien*100)/(100-$maGiamGia->ChietKhau)) - $order->TongTien;
        }
     
    }
    if($giamgia==0){
        $order->sotiengiam=0;
    }else{
    $order->sotiengiam=$giamgia-$order->TongTien;}
}
      //  $chitiethoadonban = ChiTietHoaDonBan::where('IdHoaDB', $hoadon)->get();
        //return dd($user);
        return view('user.pages.usermanagement', compact('listcha','don_hang'));
        //
    }   
    public function orderdetail(Request $request,$id)
    {
        //
        $listcha=TheLoaiCha::all();
        foreach($listcha as $cha){
            $cha->listcon=TheLoai::where('TenTLCha',$cha->id)->get();
        }
        $hoadon = HoaDonBan::find($id);
        $chitiethoadonban = ChiTietHoaDonBan::where('IdHoaDB', $id)->get();
        $kh = User::where('id', $request->session()->get('infoUser')['id'])->get();
        return view('user.pages.orderdetail')
        ->with('hoadon',$hoadon)->with('chitiethoadonban',$chitiethoadonban)->with('kh',$kh)->with('listcha',$listcha);
    }
    public function cancelorder(Request $request,$id)
    {
        //
        $don_hang = HoaDonBan::find($id);
        if ($don_hang != null) {
            $don_hang->TrangThai = 0;
            $don_hang->save();
        }
        $chitiethoadon = ChiTietHoaDonBan::where('IdHoaDB',$id)->get();
       foreach($chitiethoadon as $cts)
       {

        $kho=Kho::where('IdSach',$cts->IdSach)->get();
       foreach($kho as $khos)
       {
           $khos->SoLuongTon = $khos->SoLuongTon + $cts->SoLuong;
       
           $khos->save();
           
       }
    }
        return redirect()->back();
    }

    public function updateinfomation(Request $request, $id)
    {
        //
        $tai_khoan = User::find($id);
        if($request->file('AnhDaiDien')!= null){
            $anh_dai_dien = $request->file('AnhDaiDien')->getClientOriginalName();   
            $request->file('AnhDaiDien')->move(public_path('image'),$anh_dai_dien);
          // $anh_dai_dien = $request->file('AnhDaiDien')->move( $name);
          //dd($anh_dai_dien);  
        } 
        else $anh_dai_dien=$tai_khoan->AnhDaiDien;
        
        $tai_khoan->HoTen=$request['HoTen'];
        $tai_khoan->AnhDaiDien=$anh_dai_dien;
        $tai_khoan->SDT=$request['SDT'];
        $tai_khoan->DiaChi=$request['DiaChi'];
        //$tai_khoan->Gioi_Tinh=$request['Gioi_Tinh'];
        $newName=$tai_khoan->HoTen;

        $tai_khoan->save();
        $request->session()->forget('infoUser');
        $request->session()->put('infoUser', $tai_khoan);
        return redirect()->route('user.account');
    }
}
