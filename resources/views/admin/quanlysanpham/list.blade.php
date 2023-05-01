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
        @isset($all_product)

        @foreach($all_product as $product)

        <form action="{{route('sanpham.destroy', $product->id)}}" method="post">
            @csrf
            @method('delete')
            <tbody>
            <tr>
                <td scope="row">1</td>
                <td>{{ $product->product_type->name }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->promotion_price>0?number_format($product->promotion_price):number_format($product->unit_price) }}</td>
                <td>
                    <img src="/product/{{$product->image}}" width="100px">
                </td>
                <td>{{ $product->unit }}</td>
                <td>
                    <button class="btn btn-success" onclick="window.location='{{route('sanpham.edit', $product->id)}}'">Update</button>
                    <button name="delete" class="btn btn-danger" type="submit">Delete</button>
                </td>
            </tr>

            </tbody>
        </form>
        @endforeach
        @endisset

   </table>
</div>
@endsection
<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>
