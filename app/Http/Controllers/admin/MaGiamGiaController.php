<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MaGiamGia;
use Session;
class MaGiamGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $magiamgia= MaGiamGia::where('Xoa',0)->orderBy('created_at', 'desc')->get();
        return View('admin.pages.MaGiamGia.index', compact('magiamgia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.MaGiamGia.create');
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
        $magiamgia = new MaGiamGia;
        $this->validate($request, [
            'Code' => 'required',
            'SoLuong' => 'required',
            'ChietKhau' => 'required',
            'LoaiKM' => 'required',
            'NgayBĐ' => 'required',
            'NgayKT' => 'required',
            'TrangThai'=> 'required',
        ]);
        $magiamgia->Code=$request->Code;
        $magiamgia->SoLuong=$request->SoLuong;
        $magiamgia->ChietKhau=$request->ChietKhau;
        $magiamgia->LoaiKM=$request->LoaiKM;
        $magiamgia->NgayBĐ=$request->NgayBĐ;
        $magiamgia->NgayKT=$request->NgayKT;
        $magiamgia->TrangThai=$request->TrangThai;
        $magiamgia->Xoa=0;
        if($magiamgia->save())
        {
            Session::flash('message', 'Thêm thành công!');
        }
        else
            Session::flash('message', 'Thêm thất bại!');
    
        return redirect()->route('magiamgia.index');
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
        $magiamgia= MaGiamGia::find($id);//Kho tên model      
        return view('admin.pages.MaGiamGia.edit')->with('magiamgia', $magiamgia);
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
        $magiamgia= MaGiamGia::find($id);
        
        $data=$request->validate([
            'TrangThai'=> 'required',
          
        ]);    
        
        if($magiamgia->update($data))
        { 
            Session::flash('message', 'cập nhật thành công!');
        }
        else
            Session::flash('message', 'cập nhật thất bại!');
            
        return redirect()->route('magiamgia.index');
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
        $magiamgia = MaGiamGia::find($id);
        $magiamgia->Xoa = 1;
        $magiamgia->save();
        return redirect()->back();
    }
}
