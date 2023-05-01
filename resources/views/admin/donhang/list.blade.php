@extends('admin.master')


@section('content')


<div class="page-wrapper">
   <h1 style="text-align:center">Danh Sách Đơn Hàng</h1>
   <table class="table table-striped table-bordered">
    <thead >
        <tr>
            <th>STT</th>
            <th>FULLNAME</th>
            <th>DATE_ORDER</th>
            <th>TOTAL PRICE</th>
            <th>STATUS</th>
            <th>NOTE</th>
            <th>ACTION</th>
        </tr>
        </thead>
        @isset($all_order)

        @foreach($all_order as $order_all)

        <form action="{{route('donhang.delete', $order_all->id)}}" method="post">
            @csrf
            @method('delete')
            <tbody>
            <tr>
                <td scope="row">1</td>
                <td>{{ $order_all->users->full_name }}</td>
                <td>{{ $order_all->date_order }}</td>
                <td>{{ number_format($order_all->total) }}</td>
                <td>{{ $order_all->status == 1?"Chờ giao hàng":($order_all->status==2?'Đang giao':'Đã giao') }}</td>
                <td>{{ $order_all->note }}</td>
                <td>
                    <a class ="btn btn-primary" href="{{ route('donhang.detail', $order_all->id) }}">Detail</a>
                    <a style="display: {{$order_all->status==3?'':'none'}}"><button class="btn btn-danger">Delete</button></a>
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
