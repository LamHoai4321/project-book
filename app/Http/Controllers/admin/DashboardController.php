<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
// use DB;
use App\Models\HoaDonBan;
use App\Models\User;
use App\Models\Sach;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentMonth =  Carbon::now('Asia/Ho_Chi_Minh')->format('m/Y');
        $currentDate =  Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $dateFirstOfMonth = Carbon::now()->year;
        $dateFirstOfYear = Carbon::now()->year."-01-01";
        if(Carbon::now()->month<10){
            $dateFirstOfMonth .="-0".Carbon::now()->month.'-01';
        }else $dateFirstOfMonth .="-".Carbon::now()->month.'-01';

        //thong ke don hang va doanh thu
        $bills= HoaDonBan::where("NgayLap",">=", $dateFirstOfMonth)->where("NgayLap","<=", $currentDate)->get();
       
        $totalBillInMonth = count($bills);
        $totalMoneyInMonth = 0;
        foreach($bills as $bill){
            if($bill->TrangThai == 2){
                $totalMoneyInMonth += $bill->TongTien;
            }
        }
        $sach=Sach::orderby('id','desc')->where('TrangThai',1)->where('Xoa',0)->get();
        $app_product = Sach::all()->count();
        //thong ke thanh vien
        $accounts= User::whereDate("created_at",">=", $dateFirstOfMonth)->whereDate("created_at","<=", $currentDate)->get();
    
        $totalAccountInMonth = count($accounts);
        $years=HoaDonBan::select(DB::raw("Year(NgayLap) as year"))->where('TrangThai','=',2)->groupBy(DB::raw("Year(NgayLap)"))->pluck('year');
        $incomes=HoaDonBan::select(DB::raw("SUM(TongTien) as sum"))->where('TrangThai','=',2)->groupBy(DB::raw("Year(NgayLap)"))->pluck('sum');
        $datas= array();
       
   
        if(count($incomes)>0){
            foreach($years as $index =>$year)
            {
               
                $datas[$year]=$incomes[$index];
      
            }
         }
       
        $ttHuy=HoaDonBan::where('TrangThai',0)->count();
        $ttDonmoi=HoaDonBan::where('TrangThai',1)->count();
        $ttDuyetdon=HoaDonBan::where('TrangThai',3)->count();
        $ttGiaoThanhcong=HoaDonBan::where('TrangThai',2)->count();
        $ttVanchuyen=HoaDonBan::where('TrangThai',4)->count();
        // dd($ttVanchuyen);
        return view('admin.pages.dashboard',compact('ttDonmoi','ttDuyetdon','ttGiaoThanhcong','ttVanchuyen','ttHuy','totalMoneyInMonth','totalAccountInMonth','totalBillInMonth','app_product','datas'));
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
    public function destroy($id)
    {
        //
    }
    public function logout(){

    }
}
