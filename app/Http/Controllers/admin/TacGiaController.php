<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TacGia;
use Session;
class TacGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tacgia = TacGia::where('Xoa',0)->orderBy('id', 'desc')->paginate(12);
        return View('admin.pages.TacGia.index', compact('tacgia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.TacGia.create');
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
        $tacgia = new TacGia;
        $this->validate($request, [
            'tentacgia' => 'required',        
        ]);
        $tacgia->tentacgia=$request->tentacgia;
        $tacgia->Xoa=0;
        if($tacgia->save())
        {
            Session::flash('message', 'Thêm thành công!');
        }
        else
            Session::flash('message', 'Thêm thất bại!');
        return redirect()->route('tacgia.index');
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
        $tacgia= TacGia::find($id);//Nhacungcap tên model      
        return view('admin.pages.TacGia.edit')->with('tacgia', $tacgia);
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
        $tacgia= TacGia::find($id);
        
        $data=$request->validate([
            'tentacgia' => 'required',  
           
        ]);    
        
        if($tacgia->update($data))
        { 
            Session::flash('message', 'cập nhật thành công!');
        }
        else
            Session::flash('message', 'cập nhật thất bại!');
            
        return redirect()->route('tacgia.index');
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
        $tacgia = TacGia::find($id);
        $tacgia->Xoa = 1;
        $tacgia->save();
        return redirect()->back();
    }
}
