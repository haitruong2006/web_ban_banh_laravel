@extends('admin.master')


@section('content')


<div class="page-wrapper">
   <h1 style="text-align:center">Danh Sách Danh Mục Sản Phẩm</h1>

   <table class="table table-striped table-bordered">
    <thead >
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>ACTION</th>
        </tr>
        </thead>
        @isset($product_type)
        @foreach($product_type as $khachhang)
        <form action="{{route('danhmucsanpham.destroy',$khachhang->id)}}" method="post">
            @csrf
            @method('delete')
        <tbody>
            <tr>
                <td >{{$khachhang->id}}</td>
                <td>{{$khachhang->name}}</td>
                <td style="width:25%">{{$khachhang->description}}</td>
                <td>
                    <button type="button" class="btn btn-success" onclick="window.location='{{route('danhmucsanpham.edit',$khachhang->id)}}'">Update
					</button> ||
                    <button name="delete" class="btn btn-danger">Delete</button>
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
