<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $custommer=Users::where('level', 2)->get();
        $staff=Users::where('level', 1)->get();
        return view('admin.quanlynhansu.list', compact('custommer', 'staff'));
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
        $custommer=Users::find($id);
        return view('admin.quanlynhansu.update', compact('custommer'));
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

        $validated = $request->validate([

            'full_name' => 'required',
            'address' => 'required',
            'phone' => 'required|min:10|max:11',


        ],
        [
            //Tùy chỉnh hiển thị thông báo

            'full_name' => 'Bạn phải nhập giá',
            'address' => 'bạn phải nhập giá giảm',
            'phone.required' => 'bạn phải chọn ảnh',
            'phone.min' => 'số điện thoại phải 10 số',
            'phone.max' => 'số điện thoại tối đa 11 số',

        ]
        );
        // $custommer=Users::find($id);
        // $custommer->update($request->all());
        $bill = DB::table('users')
        ->where('id', $id)
        ->update(['full_name' => $request->full_name, 'password' => Hash::make($request->password), 'phone' => $request->phone, 'address' => $request->address]);
        return redirect()->route('khachhang.index')->with('alert','cập nhập thành công');
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

        $bill=Bill::where('id_customer', $id)->get();
        $bill_count = count($bill);
        if($bill_count == 0){
            $custommer=Users::destroy($id);

            return redirect()->route('khachhang.index')->with('alert','Bạn đã xóa thành công');
        }
        else{
            return redirect()->route('khachhang.index')->with('alert','Khách hàng này đã tổn tại đơn hàng không thể xóa');
        }

    }

    public function editNhanvien($id){
        $nhanvien = Users::find($id);

        return view('admin.quanlynhansu.updatenhanvien', compact('nhanvien'));
    }

    public function updateNhanvien(Request $request, $id){
        $validated = $request->validate([

            'full_name' => 'required',
            'address' => 'required',
            'phone' => 'required|min:10|max:11',


        ],
        [
            //Tùy chỉnh hiển thị thông báo

            'full_name' => 'Bạn phải nhập giá',
            'address' => 'bạn phải nhập giá giảm',
            'phone.required' => 'bạn phải chọn ảnh',
            'phone.min' => 'số điện thoại phải 10 số',
            'phone.max' => 'số điện thoại tối đa 11 số',

        ]
        );
        // $nhanvien=Users::find($id);
        // $nhanvien->update($request->all());
        $bill = DB::table('users')
        ->where('id', $id)
        ->update(['full_name' => $request->full_name, 'password' => Hash::make($request->password), 'phone' => $request->phone, 'address' => $request->address]);
        return redirect()->route('khachhang.index')->with('successcapnhapthanhcong','cập nhập thành công');
       // return redirect()->route('khachhang.index')->with('successcapnhapthanhcong','cập nhập thành công');
    }

    public function destroyNhanvien($id){
        $nhanvien = Users::destroy($id);
        return redirect()->route('khachhang.index')->with('successxoa','Bạn đã xóa thành công');
    }

}
