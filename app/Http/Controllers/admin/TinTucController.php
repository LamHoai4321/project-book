<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhMucTinTuc;
use App\Models\TinTuc;
use Session;
use DB;

class TinTucController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tintuc = TinTuc::orderBy('id', 'desc')->get();
        return View('admin.pages.TinTuc.index', compact('tintuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $theloai = DanhMucTinTuc::orderBy('id', 'desc')->get();
        return view('admin.pages.TinTuc.create', compact('theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageUpload(Request $request){
        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $request->validate(['image'=>'required|image|mimes:jpeg,jpg,png|max:2048',]);
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('image'),$imageName);
                return $imageName;
            }
        }
        return 'x';
    }

    public function store(Request $request)
    {
        //
        $taikhoan = new TinTuc();
        $this->validate($request, [
            'title' => 'required',
            'content'=> 'required',
            'image'=> 'required',
            'category_id'=> 'required',
        ]);
        // $request->image = $this->imageUpload($request);
        $taikhoan->title=$request->title;
        $taikhoan->content=$request->content;
        $taikhoan->image=$this->imageUpload($request);
        $taikhoan->category_id=$request->category_id;
        if($taikhoan->save())
        {
            Session::flash('message', 'Thêm Thành Công!');
        }else
            Session::flash('message', 'Thêm Thất Bại!');
        return redirect()->route('tintuc.index');
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
        $theloai = DanhMucTinTuc::orderBy('id', 'desc')->get();
        $tintuc= TinTuc::find($id);//Nhacungcap tên model      
        return view('admin.pages.TinTuc.edit', compact('theloai', 'tintuc'));
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
        $taikhoan= TinTuc::find($id);
        $data=$request->validate([
            'title' => 'required',
            'content'=> 'required',
            'category_id'=> 'required',
           
        ]);     
        if ($request->image == null) $imageName = $taikhoan->image;
        else 
        $data['image']=$this->imageUpload($request);
        //
        if ($request->title == null) $title = $taikhoan->NULL;
        else 
        $data['title']=$request->title;
        //
        if ($request->content == null) $content = $taikhoan->NULL;
        else 
        $data['content']=$request->content;
        if ($request->category_id == null) $category_id = $taikhoan->NULL;
        else 
        $data['category_id']=$request->category_id;

        if($taikhoan->update($data))
        {
            Session::flash('message', 'Cập nhật thành công!');
        }
        else
            Session::flash('message', 'Cập Nhật Thất Bại!');
        return redirect()->route('tintuc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $taikhoan = TinTuc::find($id);

        $taikhoan->delete();
        return redirect()->back();
    }
    public function destroy($id)
    {
        //
    }
    public function search(Request $request)
    {
        $taikhoan = TinTuc::where([ ['HoTen','like','%'.$request->bookName.'%'],['Xoa', '=', '0'] ])
                    ->orwhere([ ['Email','like','%'.$request->bookName.'%'],['Xoa', '=', '0'] ])
                    ->paginate(5);
        return View('admin.pages.TaiKhoan.index', ['taikhoan'=>$taikhoan]);
    }
}
