<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BinhLuan;
use Session;
use DB;
class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $binhluan = BinhLuan::where('Xoa', 0)->orderBy('created_at', 'desc')->get();
        return View('admin.pages.BinhLuan.index', compact('binhluan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $binhluan = BinhLuan::find($id);
        $binhluan->Xoa = 1;
        $binhluan->save();
        return redirect()->back();
    }
    public function duyet(Request $request, $id)
    {
        $binhluan = BinhLuan::find($id);
        $binhluan->Duyet = 1;
        $binhluan->save();
        return redirect()->back();
    }
    public function allow_comment(Request $request){
        $data = $request->all();
        $comment = BinhLuan::find($data['comment_id']);
        $comment->Duyet = $data['comment_status'];
        $comment->save();
    }
    public function destroy($id)
    {
        //
    }
}
