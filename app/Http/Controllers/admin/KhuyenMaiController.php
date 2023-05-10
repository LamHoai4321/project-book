<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhuyenMai;
use Session;
use Carbon\Carbon;
use Illuminate\Support\MessageBag;
class KhuyenMaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $khuyenmai = KhuyenMai::where('Xoa', 0)->orderBy('created_at', 'desc')->get();
        return View('admin.pages.KhuyenMai.index', compact('khuyenmai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.KhuyenMai.create');
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
        $datenow = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $startdate = $request['ThoiGianBD'];
        $enddate = $request['ThoiGianKT'];
        
        
        $trangthai = -1;
        if($startdate > $enddate) //Khong hop le
        {
            $errors = new MessageBag(['create' => ["Ngày bắt đầu và ngày kết thúc không hợp lệ..!"]]);
            return redirect()->route('khuyenmai.create')->withErrors($errors);          
        } 
        else if ($startdate > $datenow) $trangthai = 2;//chua den
        else if ($enddate < $datenow) $trangthai = 0;//het han
        else $trangthai = 1;//dag ap dung
        if ($trangthai == 1)
        {
            $khuyenmai = new KhuyenMai();
            $this->validate($request, [
                'TenCTKM'=>'required',
                'ThoiGianBD' => 'required',
                'ThoiGianKT' => 'required',
                
            ]);
            // $request->image = $this->imageUpload($request);
            $khuyenmai->TenCTKM=$request->TenCTKM;
            $khuyenmai->ThoiGianBD=$request->ThoiGianBD;
            $khuyenmai->ThoiGianKT=$request->ThoiGianKT;
            $khuyenmai->ChietKhau=$request->ChietKhau;
            $khuyenmai->TrangThai=$trangthai;
    
            $khuyenmai->Xoa=0;
            $khuyenmai->save();
        }
        if ($trangthai == 2)
        {
            $khuyenmai = new KhuyenMai();
            $this->validate($request, [
                'TenCTKM'=>'required',
                'ThoiGianBD' => 'required',
                'ThoiGianKT' => 'required',
                
            ]);
            // $request->image = $this->imageUpload($request);
            $khuyenmai->TenCTKM=$request->TenCTKM;
            $khuyenmai->ThoiGianBD=$request->ThoiGianBD;
            $khuyenmai->ThoiGianKT=$request->ThoiGianKT;
            $khuyenmai->ChietKhau=$request->ChietKhau;
            $khuyenmai->TrangThai=$trangthai;
    
            $khuyenmai->Xoa=0;
            $khuyenmai->save();
        }
        return redirect()->route('khuyenmai.index');
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
        $khuyenmai= KhuyenMai::find($id);//Kho tên model      
        return view('admin.pages.KhuyenMai.edit')->with('khuyenmai', $khuyenmai);
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
        $khuyenmai= KhuyenMai::find($id);
        
        $data=$request->validate([
            'TenCTKM' => 'required',
            'ThoiGianBD' => 'required',
            'ThoiGianKT' => 'required',
            'ChietKhau' => 'required',
          
        ]);    
        $startdate = $data['ThoiGianBD'];
        $enddate = $data['ThoiGianKT'];
        $datenow = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $trangthai = -1;
        if($startdate > $enddate) //Khong hop le
        {
            $errors = new MessageBag(['create' => ["Ngày bắt đầu và ngày kết thúc không hợp lệ..!"]]);
            return redirect()->route('khuyenmai.edit', $id)->withErrors($errors);          
        } 
        else if ($startdate > $datenow) $trangthai = 2;//chua den
        else if ($enddate < $datenow) $trangthai = 0;//het han
        else $trangthai = 1;//dag ap dung
        $data['TrangThai']=$trangthai;
        if($khuyenmai->update($data))
        { 
            Session::flash('message', 'cập nhật thành công!');
        }
        else
            Session::flash('message', 'cập nhật thất bại!');
            
        return redirect()->route('khuyenmai.index');
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
    public function delete(Request $request, $id)
    {
        $khuyenmai = KhuyenMai::find($id);
        $khuyenmai->Xoa = 1;
        $khuyenmai->save();
        return redirect()->back();
    }
}
