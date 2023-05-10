<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TheLoaiCha;
use Session;

class TheLoaiChaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $theloaicha = TheLoaiCha::where('Xoa', 0)->orderBy('created_at', 'desc')->get();
        return View('admin.pages.TheLoaiCha.index', compact('theloaicha'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.TheLoaiCha.create');

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
        $theloaicha= new TheLoaiCha;
        $this->validate($request, [
            'TenTheLoaiCha' => 'required',
            
            
        ]);
       
        $theloaicha->TenTheLoaiCha=$request->TenTheLoaiCha;
        $theloaicha->Xoa=0;
       
        if($theloaicha->save())
        {
            Session::flash('message', 'Thêm thành công!');
        }
        else
            Session::flash('message', 'Thêm thất bại!');
        return redirect()->route('theloaicha.index');
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
        $theloaicha= TheLoaiCha::find($id);//Kho tên model      
        return view('admin.pages.TheLoaiCha.edit')->with('theloaicha', $theloaicha);
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
        $theloaicha= TheLoaiCha::find($id);
        
        $data=$request->validate([
            'TenTheLoaiCha' => 'required',
          
        ]);    
        
        if($theloaicha->update($data))
        { 
            Session::flash('message', 'cập nhật thành công!');
        }
        else
            Session::flash('message', 'cập nhật thất bại!');
            
        return redirect()->route('theloaicha.index');
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
        $theloaicha = TheLoaiCha::find($id);
        $theloaicha->Xoa = 1;
        $theloaicha->save();
        return redirect()->back();
    }
}
