<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhMucTinTuc;
use Session;
use DB;

class DanhMucTinTucController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $theloai = DanhMucTinTuc::orderBy('id', 'desc')->paginate(12);
        return View('admin.pages.DanhMucTinTuc.index', compact('theloai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.DanhMucTinTuc.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $theloai = new DanhMucTinTuc;
        $this->validate($request, [
            'ten' => 'required', 
        ]);
        $theloai->ten=$request->ten;
        if($theloai->save())
        {
            Session::flash('message', 'Thêm thành công!');
        }
        else
            Session::flash('message', 'Thêm thất bại!');
        return redirect()->route('theloaitintuc.index');
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
        
        $theloai= DanhMucTinTuc::find($id);//Nhacungcap tên model      
        return view('admin.pages.DanhMucTinTuc.edit')->with('theloai', $theloai);
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
        $theloai= DanhMucTinTuc::find($id);
        
        $data=$request->validate([
            'ten' => 'required',
        ]);    
        
        if($theloai->update($data))
        { 
            Session::flash('message', 'Cập nhật thành công!');
        }
        else
            Session::flash('message', 'Cập nhật thất bại!');
            
        return redirect()->route('theloaitintuc.index');
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
        $theloai = DanhMucTinTuc::find($id);
        $theloai->delete();
        return redirect()->back();
    }
}
