<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
//use Session;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Users;
use App\Mail\SendMail;
use App\Mail\SendMailOrder;
use Illuminate\Mail\Mailable;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\Bill_detail;
use App\Models\Slide;
use App\Models\Discount;

// use RealRashid\SweetAlert\Facades\Alert;


class CakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $product=Products::where('new', 1)->get();
        $new_products_count=count($product);

        $new_products_pgn =Products::where('new', 1)->paginate(4, ['*'], 'new' );


        $top_product=Products::where('new',0)->get();
        $top_products_count=count($top_product);

        $top_products=Products::where('new',0)->paginate(4);

        $slide = Slide::all();

        return view('layout.page.home',compact('new_products_count','new_products_pgn','top_products_count','top_products', 'slide'));

    }
    public function show($id)
    {
        //
        $cake_detail=Products::find($id);
        return view('layout.page.detail',compact('cake_detail'));
    }

    public function destroy($id)
    {
        //
    }
    public function getLoaisp($id){
        $san_pham_theo_loai=Products::where('id_type', $id)->get();

        $san_pham_theo_loai_count = count($san_pham_theo_loai);

        //$sp_theo_loai_count = count($san_pham_theo_loai);
        return view('layout.page.loai_sanpham', compact('san_pham_theo_loai','san_pham_theo_loai_count'));
    }



    public function Signup(){
        return view('layout.page.signup');
    }

    public function postSignup(Request $request){
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
            'full_name' => 'required',
            'address' => 'required',
            'phone' => 'required|min:10|max:11',


        ],
        [
            //Tùy chỉnh hiển thị thông báo
            'email.required' => 'Bạn chưa nhập người tạo!',
            'email.email' => 'Không đúng định dạng email',
            'email.unique' => 'Email đã có người sử dụng',
            'password.required' => 'Bạn chưa nhập name!',
            'password.min' => 'password tối thiếu 6 ký tự',
            'password.max'=> 'password tối đa 20 ký tự',
            'full_name' => 'Bạn phải nhập giá',
            'address' => 'bạn phải nhập giá giảm',
            'phone.required' => 'bạn phải chọn ảnh',
            'phone.min' => 'số điện thoại phải 10 số',
            'phone.max' => 'số điện thoại tối đa 11 số',

        ]
        );


		//$user->password=Hash::make($req->password);

        $data = array();
        $data['full_name'] = $request->full_name;
        $data['gender'] = $request->gender;
        $data['email'] = $request->email;

        $data['password'] = Hash::make($request->password);
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;



        $menu = DB::table('users')->insert($data);
        // Alert::success('Success Title', 'Success Message');
        // return redirect()->route('cake.Signup');
        return redirect()->route('cake.Signup')->with('alert', 'Đăng ký thành công');


    }

    public function Login(){
        return view('layout.page.signin');
    }
    public function PostLogin(Request $request){
        $this->validate($request, [
            'email'=>'required|email',
            'password' => 'required|min:6|max:20',
        ],
        [
            'email.required' => 'vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'vui lòng nhập password',
            'password.min' => 'password ít nhất phải 6 ký tự',
            'password.max' => 'password tối đá được 20 ký tự',
        ]
        );
        $credentials = array('email'=>$request->email,
        'password'=>$request->password
        );

        $credentials=['email'=>$request->email,'password'=>$request->password];
        if(Auth::attempt($credentials)){//The attempt method will return true if authentication was successful. Otherwise, false will be returned.

            return redirect('/cake')->with('thanhcong', 'Bạn đã đăng nhập thành công');
        }
        else{
            return redirect('/login')->with('danger', 'Bạn đã đăng nhập không thành công');
        }

    }
    public function getLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('cake.Login');
    }



    public function getInputEmail(){
        return view('emails.input-email');
    }

    public function postInputEmail(Request $req){
        $email=$req->txtEmail;
        //validate

        // kiểm tra có user có email như vậy không
        $user=Users::where('email',$email)->get();
        //dd($user);
        if($user->count()!=0){
            //gửi mật khẩu reset tới email
            $sentData = [
                'title' => 'Mật khẩu mới của bạn là:',
                'body' => '123456'
            ];
            \Mail::to($email)->send(new \App\Mail\SendMail($sentData));
            Session::flash('message', 'Send email successfully!');
            $bill = DB::table('users')
            ->where('email', $email)
            ->update(['password' => Hash::make('123456')]);
            return redirect('/input-email')->with('alert', 'Bạn vui lòng kiểm tra email');  //về lại trang đăng nhập của khách
        }
        else {
              return redirect()->route('getInputEmail')->with('message','Vui lòng nhập đúng email!!!');
        }
    }

    public function getAddtoCart(Request $req,  $id){
        $product = Products::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);

        return redirect('/cake');

    }

    public function getDeleteItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();

    }

    public function getCkectOut(){
        return view('layout.page.checkout');
    }

    public function postCkectOut(Request $req){
        $cart = Session::get('cart');
        if(Auth::check()){
            $validated = $req->validate([
                'phone_number' => 'required|min:10|max:11',


            ],
            [
                'phone_number.min' => 'số điện thoại phải 10 số',
                'phone_number.max' => 'số điện thoại tối đa 11 số',

            ]
            );

            $bill = new Bill;
            $bill->id_customer = Auth::user()->id;
            // $bill->email = $req->email;
            $bill->name = $req->name;
            $bill->address = $req->address;
            $bill->phone = $req->phone_number;
            $bill->date_order = date('Y-m-d');
            // if($request->magiamgiatrue === "true"){
            //         $total_price = $cart->totalPrice - $request->value_price;
            //         $bill->total = $total_price;
            // }
            // else{

            // }
            if($req->coupon_code != ""){
                $total_price = $cart->totalPrice - 100000;
                $bill->total = $total_price;
            }
            else{
                $bill->total = $cart->totalPrice;
            }


            $bill->payment = $req->payment_method;
            $bill->note = $req->note;
            $bill->save();

            foreach($cart->items as $key=>$value){
                $bill_detail = new Bill_detail;
                $bill_detail->id_bill = $bill->id;
                $bill_detail->id_product = $key;
                $bill_detail->quantity = $value['qty'];
                $bill_detail->unit_price = $value['price']/$value['qty'];
                $bill_detail->save();
            }
           // $custommer = Users::where('email', $req->email)->get();
           $custommer=$req->email;
            if($custommer!=''){
                $sentData = [
                    'title' => 'chi tiết đơn hàng',
                    'footer' => 'đơn hàng của bạn sẽ được giao trong 3 4 ngày'
                ];
                \Mail::to($req->email)->send(new \App\Mail\SendMailOrder($sentData));
                Session::forget('cart');
                return redirect('/cake')->with('alert', 'Thêm đơn hàng thành công');
            }
            else{
                return redirect()->route('dathang')->with('message', 'vui lòng nhập đúng email!!!');
            }

        }



    }

    public function listCart($id){
        $bill = Bill::where('id_customer', $id)->get();
        return view('layout.page.list_cart', compact('bill'));
    }

    public function PostMagiamgia(Request $request){
       $coupon_code = $request->coupon_code;
        $coupon = Discount::where('name', $coupon_code)->first();


        if($coupon->count() > 0){
            $valuegiamgia = $coupon->price;
            return redirect()->back()->with(['magiamgiatrue' => 'true','valuegiamgia' => $valuegiamgia, 'alert' => 'Bạn đã áp dụng mã giảm giá thành công']);
        }
        else{
            return redirect()->back()->with('alert', 'Mã giảm giá không chính xác vui long kiểm tra lại');
        }

    }

    public function GetAddHeadrt(Request $req, $id){
        $product = Products::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        //$req->session()->put('cart', $cart);

        return redirect()->back()->with('alert', 'Bạn thêm vào mục yêu thích');
    }

    public function ListHeadrt($id){
        return view('layout.page.headrt');
    }


}
