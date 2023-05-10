<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\TheLoaiCha;
use Session;
use DB;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $theloai = TheLoai::where('Xoa', 0)->orderBy('created_at', 'desc')->paginate(12);
        $theloaicha = TheLoaiCha::where('Xoa',0)->get();
        return View('admin.pages.TheLoai.index', compact('theloai','theloaicha'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloaicha= TheLoaiCha::all();
        return view('admin.pages.TheLoai.create',compact('theloaicha'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $theloai = new TheLoai;
        $this->validate($request, [
            'TenTheLoai' => 'required',
            'TenTLCha' => 'required',
            
        ]);
        $theloai->TenTheLoai=$request->TenTheLoai;
        $theloai->TenTLCha=$request->TenTLCha;
        $theloai->Xoa=0;
        if($theloai->save())
        {
            Session::flash('message', 'Thêm thành công!');
        }
        else
            Session::flash('message', 'Thêm thất bại!');
        return redirect()->route('theloai.index');
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
        
        $theloai= TheLoai::find($id);//Nhacungcap tên model      
         $theloaicha= TheLoaiCha::all();
        return view('admin.pages.TheLoai.edit',['theloaicha'=>$theloaicha])->with('theloai', $theloai);
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
        $theloai= TheLoai::find($id);
        
        $data=$request->validate([
            'TenTheLoai' => 'required',
            'TenTLCha'=>'required',
        ]);    
        
        if($theloai->update($data))
        { 
            Session::flash('message', 'Cập nhật thành công!');
        }
        else
            Session::flash('message', 'Cập nhật thất bại!');
            
        return redirect()->route('theloai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
       
    }
    public function delete(Request $request, $id)
    {
        $theloai = TheLoai::find($id);
        $theloai->Xoa = 1;
        $theloai->save();
        return redirect()->back();
    }
}
