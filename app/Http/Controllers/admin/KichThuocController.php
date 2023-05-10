<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KichThuoc;
use Session;
class KichThuocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kichthuoc = KichThuoc::where('Xoa',0)->orderBy('id', 'desc')->paginate(12);
        return View('admin.pages.KichThuoc.index', compact('kichthuoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.KichThuoc.create');
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
        $kichthuoc = new KichThuoc;
        $this->validate($request, [
            'kichthuoc' => 'required',        
        ]);
        $kichthuoc->kichthuoc=$request->kichthuoc;
        $kichthuoc->Xoa=0;
        if($kichthuoc->save())
        {
            Session::flash('message', 'Thêm thành công!');
        }
        else
            Session::flash('message', 'Thêm thất bại!');
        return redirect()->route('kichthuoc.index');
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
        $kichthuoc= KichThuoc::find($id);//Nhacungcap tên model      
        return view('admin.pages.KichThuoc.edit')->with('kichthuoc', $kichthuoc);
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
        $kichthuoc= KichThuoc::find($id);
        
        $data=$request->validate([
            'kichthuoc' => 'required',        
           
        ]);    
        
        if($kichthuoc->update($data))
        { 
            Session::flash('message', 'cập nhật thành công!');
        }
        else
            Session::flash('message', 'cập nhật thất bại!');
            
        return redirect()->route('kichthuoc.index');
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
        $kichthuoc = KichThuoc::find($id);
        $kichthuoc->Xoa = 1;
        $kichthuoc->save();
        return redirect()->back();
    }
}
