<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $custommer=User::where('level', 2)->get();
        $staff=User::where('level', 1)->get();
        return view('admin.layout.home', compact('custommer', 'staff'));

        // return view('admin.layout.home',compact('custommer'));
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
        $custommer=User::find($id);


        return view('admin.layout.update',compact('custommer'));
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
        $custommer=User::find($id);
        $custommer->update($request->all());
        return redirect()->route('admin.index')->with('successcapnhapthanhcong','cập nhập thành công');
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
        $delete_custommer = User::destroy($id);

       return redirect('/admin')->with('successxoa','Bạn đã xóa thành công');
    }
    public function getLogin(){
        return view('admin.layout.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email đã có người sử  dụng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự'
        ]
        );
        $credentials=array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($credentials)){
            return redirect('/admin')->with('successthanhcong', 'Đăng nhập thành công');
        }
        else{
            return redirect('/dangnhap/admin')->with('successkhong', 'Đăng nhập không thành công');
        }

    }
    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.getLogin');
    }

}
