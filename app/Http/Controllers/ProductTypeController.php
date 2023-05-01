<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ProductTypeController extends Controller
{
    //
    public function index(){
        $product_type = ProductType::all();
        return view('admin.quanlydanhmuc.list', compact("product_type"));
    }
    public function destroy($id){
        $proudct = Products::where('id_type', $id)->get();
        $product_count=count($proudct);
        if($product_count!=0){
            return redirect()->route('danhmucsanpham.list')->with('alert', 'Danh mục này đã tồn tại sản phẩm không thể xóa');
        }
        else{
            $product_type_delete = ProductType::destroy($id);
            return redirect()->route('danhmucsanpham.list')->with('alert', 'Bạn đã xóa thành công');
        }
    }
    public function getAdddanhmuc(){
        return view('admin.quanlydanhmuc.add');
    }
    public function postAdddanhmuc(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:type_products,name',
        ],
        [
            //Tùy chỉnh hiển thị thông báo
            'name.required' => 'Bạn chưa nhập tên!',
            'name.unique' => 'Danh mục này đã tồn tại',
        ]
        );

        $data = array();
        $data['name'] = $request->name;
        $data['description'] = $request->desscription;

        $insert = DB::table('type_products')->insert($data);

        Return redirect()->route('danhmucanpham.adddanhmuc')->with('alert', 'Bạn đã thêm thành công');

    }

    public function editdanhmuc($id){
        $product_type=ProductType::find($id);
        return view('admin.quanlydanhmuc.update', compact('product_type'));
    }
    public function updatedanhmuc(Request $request, $id){
        // $validated = $request->validate([
        //     'name' => 'required|unique:type_products,name',
        // ],
        // [
        //     //Tùy chỉnh hiển thị thông báo
        //     'name.required' => 'Bạn chưa nhập tên!',
        //     'name.unique' => 'Danh mục này đã tồn tại',
        // ]
        // );
        // return redirect('/cake');
    }

}
