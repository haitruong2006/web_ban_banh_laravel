<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Bill_detail;
use App\Models\ProductType;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index(){
        $all_product = Products::all();
        return view('admin.quanlysanpham.list', compact('all_product'));
    }
    public function destroy($id){
        $bill_detail = Bill_detail::where('id_product', $id)->get();
        $bill_detail_count=count($bill_detail);
        if($bill_detail_count!=0){
            return redirect()->route('sanpham.list')->with('alert', 'Xóa không thành công sản phẩm này đã tồn tại trong giỏ hàng');
        }
        else{
            $product_delete=Products::destroy($id);
            return redirect()->back()->with('alert', 'Bạn đã xóa thành công');
        }
    }

    public function getLoaiSP($id){
        $product = Products::where('id_type', $id)->get();
        return view('admin.quanlysanpham.loaisanpham', compact('product'));
    }

    public function getAddSP(){
        $type_products = ProductType::all();
        return view('admin.quanlysanpham.add', compact('type_products'));
    }
    public function postAddSP(Request $request){

        $products = Products::where('name', $request->name);
        if($products->count()!=0){
            return redirect()->back()->with('alert', 'Sản phẩm này đã tồn tại');
        }
        else{
            if($request->promotion_price > $request->unit_price){
                return redirect()->route('sanpham.getaddsp')->with('alert', 'Bạn phải nhập giá giảm phải nhỏ hơn giá gốc');
            }
            else{
                $this->validate($request,
                    [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                        'image_file' => 'mimes:jpg,jpeg,png'
                    ],
                    [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                        'image_file.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                        'image_file.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    ]
                );
                $file = $request->file('image_file');
                $name=time().'_'.$file->getClientOriginalName();
                $destinationPath=public_path('product'); //project\public\car, //public_path(): trả về đường dẫn tới thư mục public
                $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/images/cars



                $data = array();
                $data['name'] = $request->name;
                $data['id_type'] = $request->id_type;
                $data['description'] = $request->desscription;
                $data['unit_price'] = $request->unit_price;
                $data['promotion_price'] = $request->promotion_price;
                $data['image'] = $name;
                $data['unit'] = $request->unit;
                $data['new'] =1;
                //$data['mf_id'] = $request->manufacture_id;

                $menu = DB::table('products')->insert($data);
                return redirect()->route('sanpham.getaddsp')->with('alert', 'Đã thêm thành công');
            }

        }

    }

    public function editSP($id)
    {
        $product=Products::find($id);
        return view('admin.quanlysanpham.update', compact('product'));
    }

}
