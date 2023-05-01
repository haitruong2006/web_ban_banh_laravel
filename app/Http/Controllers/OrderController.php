<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Bill_detail;
use App\Models\Users;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMailOrderstatus;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_order = Bill::all();
        return view('admin.donhang.list', compact('all_order'));
    }

    public function getLoaiDOn($id){
        $cho_giao = Bill::where('status', $id)->get();
        $cho_giao_dem = count($cho_giao);

        return view('admin.donhang.loai_don', compact('cho_giao','cho_giao_dem'));
    }

    public function getDetail($id){
        $bill = Bill::find($id);
        $bill_details = Bill_detail::where('id_bill', $id)->get();
        return view('admin.donhang.order_detail', compact('bill', 'bill_details'));
    }

    public function updatestatus(Request $request, $id){
        $status = $request->status;
        $bill = DB::table('bills')
              ->where('id', $id)
              ->update(['status' => $request->status]);


        // $bills = Bill::where('id', $id)->get();

            return redirect()->back()->with('alert', 'Bạn đã cập nhập thành công');



    }

    public function delete($id){
        $bill = Bill::destroy($id);
        $bill_detail = DB::table('bill_detail')
                        ->where('id_bill', $id)
                        ->delete();
        return redirect()->route('donhang.list')->with('alert', 'Đã xóa thành công');
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
        return view('admin.donhang.loai_don');
    }


}
