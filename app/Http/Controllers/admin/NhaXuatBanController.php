<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NhaXuatBan;
use Session;
class NhaXuatBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nhaxuatban = NhaXuatBan::where('Xoa',0)->orderBy('id', 'desc')->paginate(12);
        return View('admin.pages.NhaXuatBan.index', compact('nhaxuatban'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.NhaXuatBan.create');
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
        $nhaxuatban = new NhaXuatBan;
        $this->validate($request, [
            'tennhaxb' => 'required',        
        ]);
        $nhaxuatban->tennhaxb=$request->tennhaxb;
        $nhaxuatban->Xoa=0;
        if($nhaxuatban->save())
        {
            Session::flash('message', 'Thêm thành công!');
        }
        else
            Session::flash('message', 'Thêm thất bại!');
        return redirect()->route('nhaxuatban.index');
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
        $nhaxuatban= NhaXuatBan::find($id);//Nhacungcap tên model      
        return view('admin.pages.NhaXuatBan.edit')->with('nhaxuatban', $nhaxuatban);
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
        $nhaxuatban= NhaXuatBan::find($id);
        
        $data=$request->validate([
            'tennhaxb' => 'required', 
           
        ]);    
        
        if($nhaxuatban->update($data))
        { 
            Session::flash('message', 'cập nhật thành công!');
        }
        else
            Session::flash('message', 'cập nhật thất bại!');
            
        return redirect()->route('nhaxuatban.index');
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
        $nhaxuatban = NhaXuatBan::find($id);
        $nhaxuatban->Xoa = 1;
        $nhaxuatban->save();
        return redirect()->back();
    }
}
