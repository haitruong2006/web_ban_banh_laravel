@extends('admin.master')


@section('content')


<div class="page-wrapper">
    @if(Session('successxoasp'))
        <div class="alert alert-danger">
            {{Session('successxoasp')}}
        </div>
    @endif
    @if(Session('successxoaspthanhcong'))
        <div class="alert alert-success">
            {{Session('successxoaspthanhcong')}}
        </div>
    @endif
   <h1 style="text-align:center">Danh Sách Sản Phẩm</h1>
   <table class="table table-striped table-bordered">
    <thead >
        <tr>
            <th>STT</th>
            <th>Name_type</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Unit</th>
            <th>ACTION</th>
        </tr>
        </thead>
        @isset($product)

        @foreach($product as $sanpham)

        <form action="{{route('sanpham.destroy', $sanpham->id)}}" method="post">
            @csrf
            @method('delete')
            <tbody>
            <tr>
                <td scope="row">1</td>
                <td>{{ $sanpham->product_type->name }}</td>
                <td>{{ $sanpham->name }}</td>
                <td>{{ $sanpham->promotion_price>0?number_format($sanpham->promotion_price):number_format($sanpham->unit_price) }}</td>
                <td>
                    <img src="/product/{{$sanpham->image}}" width="100px">
                </td>
                <td>{{ $sanpham->unit }}</td>
                <td>
                    <button name="delete" class="btn btn-danger" type="submit">Xóa</button>
                </td>
            </tr>

            </tbody>
        </form>
        @endforeach
        @endisset

   </table>
</div>
@endsection
