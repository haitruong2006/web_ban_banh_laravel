@extends('admin.master')
@section('content')
<div class="page-wrapper">
   <h1 style="text-align:center">Danh Sách Đơn Hàng </h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Stt</th>
                <th>name_customer</th>
                <th>date_order</th>
                <th>total</th>
                <th>status</th>
                <th>note</th>
                <th>action</th>
            </tr>
        </thead>
        @isset($cho_giao)

        @foreach($cho_giao as $san_pham)
        <form action="{{route('donhang.delete', $san_pham->id)}}" method="post">
            @csrf
            @method('delete')

        <tbody>
            <tr>
                <td scope="row">1</td>
                <td>{{ $san_pham->users->full_name }}</td>
                <td>{{ $san_pham->date_order }}</td>
                <td>{{ number_format($san_pham->total) }}</td>
                <td>{{ $san_pham->status == 1?"Chờ giao hàng":($san_pham->status==2?'Đang giao':'Đã giao') }}</td>
                <td>{{ $san_pham->note }}</td>
                <td>
                    <a class ="btn btn-primary" href="{{ route('donhang.detail', $san_pham->id) }}">Chi tiết</a>
                    <a style="display: {{$san_pham->status==3?'':'none'}}"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>

        </tbody>
    </form>
        @endforeach
    </table>

    @endisset($cho_giao)
</div>
@endsection

