<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Classes\Helper;
use Session;
use DB;
use Illuminate\Support\Facades\Hash;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $taikhoan = User::where('Xoa', 0)->orderBy('created_at', 'desc')->get();
        return View('admin.pages.TaiKhoan.index', compact('taikhoan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.TaiKhoan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageUpload(Request $request){
        if($request->hasFile('AnhDaiDien')){
            if($request->file('AnhDaiDien')->isValid()){
                $request->validate(['AnhDaiDien'=>'required|image|mimes:jpeg,jpg,png|max:2048',]);
                $imageName = time().'.'.$request->AnhDaiDien->extension();
                $request->AnhDaiDien->move(public_path('image'),$imageName);
                return $imageName;
            }
        }
        return 'x';
    }

    public function store(Request $request)
    {
        //
        $taikhoan = new User();
        $this->validate($request, [
            'HoTen' => 'required',
            'password'=> 'required',
            'Email'=> 'required',
            'DiaChi'=> 'required',
            'SDT'=> 'required',
            'LoaiTK'=> 'required',
            'AnhDaiDien'=> 'required',
            'TrangThai'=> 'required',
        ]);
        // $request->image = $this->imageUpload($request);
        $taikhoan->HoTen=$request->HoTen;
        $taikhoan->password=Hash::make($request->password);
        $taikhoan->Email=$request->Email;
        $taikhoan->DiaChi=$request->DiaChi;
        $taikhoan->SDT=$request->SDT;
        $taikhoan->LoaiTK=$request->LoaiTK;
        $taikhoan->AnhDaiDien=$this->imageUpload($request);
        $taikhoan->TrangThai=$request->TrangThai;
        $taikhoan->Xoa=0;
        if($taikhoan->save())
        {
            Session::flash('message', 'Thêm Thành Công!');
        }else
            Session::flash('message', 'Thêm Thất Bại!');
        return redirect()->route('taikhoan.index');
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
        $taikhoan= User::find($id);
        return view('admin.pages.TaiKhoan.edit')->with('taikhoan', $taikhoan);
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
        $taikhoan= User::find($id);
        $data=$request->validate([
            'HoTen' => 'required',
            'Email'=> 'required',
            'LoaiTK'=> 'required',
            'TrangThai'=> 'required',
           
        ]);  
        if ($request->AnhDaiDien == null) $imageName = $taikhoan->AnhDaiDien;
        else 
        $data['AnhDaiDien']=$this->imageUpload($request);
        //
        if ($request->SDT == null) $sdt = $taikhoan->NULL;
        else 
        $data['SDT']=$request->SDT;
        //
        if ($request->DiaChi == null) $diachi = $taikhoan->NULL;
        else 
        $data['DiaChi']=$request->DiaChi;
        if($taikhoan->update($data))
        {
            Session::flash('message', 'Cập nhật thành công!');
        }
        else
            Session::flash('message', 'Cập Nhật Thất Bại!');
        return redirect()->route('taikhoan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $taikhoan = User::find($id);
        $taikhoan->Xoa = 1;
        $taikhoan->save();
        return redirect()->back();
    }
    public function destroy($id)
    {
        //
    }
    public function search(Request $request)
    {
        $taikhoan = User::where([ ['HoTen','like','%'.$request->bookName.'%'],['Xoa', '=', '0'] ])
                    ->orwhere([ ['Email','like','%'.$request->bookName.'%'],['Xoa', '=', '0'] ])
                    ->paginate(5);
        return View('admin.pages.TaiKhoan.index', ['taikhoan'=>$taikhoan]);
    }
}
