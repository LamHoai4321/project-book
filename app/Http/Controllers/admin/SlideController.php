<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SlideShow;
use Session;
use DB;

class SlideController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tintuc = SlideShow::orderBy('id', 'desc')->get();
        return View('admin.pages.Slide.index', compact('tintuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $theloai = SlideShow::orderBy('id', 'desc')->get();
        return view('admin.pages.Slide.create', compact('theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageUpload(Request $request){

        if($request->hasFile('HinhAnh')){
            if($request->file('HinhAnh')->isValid()){
                $request->validate(['HinhAnh'=>'required|image|mimes:jpeg,jpg,png|max:2048',]);
                $imageName = time().'.'.$request->HinhAnh->extension();
                $request->HinhAnh->move(public_path('image'),$imageName);
                return $imageName;
            }
        }
        return 'x';
    }

    public function store(Request $request)
    {
        //
        $taikhoan = new SlideShow();
        $this->validate($request, [
            'link' => 'required',
            'HinhAnh'=> 'required',
        ]);
        // $request->image = $this->imageUpload($request);
        $taikhoan->link=$request->link;
        $taikhoan->HinhAnh=$this->imageUpload($request);
        if($taikhoan->save())
        {
            Session::flash('message', 'Thêm Thành Công!');
        }else
            Session::flash('message', 'Thêm Thất Bại!');
        return redirect()->route('slide.index');
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
        $tintuc= SlideShow::find($id);//Nhacungcap tên model      
        return view('admin.pages.Slide.edit', compact('tintuc'));
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
        $taikhoan= SlideShow::find($id);
        $data=$request->validate([
            'link' => 'required',
           
        ]);     
        if ($request->HinhAnh == null) $imageName = $taikhoan->HinhAnh;
        else 
        $data['HinhAnh']=$this->imageUpload($request);
        //
        if ($request->link == null) $link = $taikhoan->NULL;
        else 
        $data['link']=$request->link;
        //
       
        if($taikhoan->update($data))
        {
            Session::flash('message', 'Cập nhật thành công!');
        }
        else
            Session::flash('message', 'Cập Nhật Thất Bại!');
        return redirect()->route('slide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $taikhoan = SlideShow::find($id);

        $taikhoan->delete();
        return redirect()->back();
    }
    public function destroy($id)
    {
        //
    }
}
