@extends('admin.master')


@section('content')


<div class="page-wrapper">
   <h1 style="text-align:center">Danh Sách Người Dùng</h1>
   <h3>Khách Hàng</h3>
   <table class="table table-striped table-bordered">
    <thead >
        <tr>
            <th>ID</th>
            <th>FULLNAME</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>PHONE</th>
            <th>ADDRESS</th>
            <th>ACTION</th>
        </tr>
        </thead>
        @isset($custommer)
        @foreach($custommer as $khachhang)
        <form action="{{ route('khachhang.destroy', $khachhang->id) }}" method="post">
            @csrf
            @method('delete')
        <tbody>
            <tr>
                <td >{{$khachhang->id}}</td>
                <td>{{$khachhang->full_name}}</td>
                <td>{{$khachhang->email}}</td>
                <td>*****</td>
                <td>{{$khachhang->phone}}</td>
                <td>{{$khachhang->address}}</td>
                <td>
                    <button type="button" class="btn btn-success" onclick="window.location='{{route('khachhang.edit',$khachhang->id)}}'">Update
					</button> ||
                    <button name="delete" class="btn btn-danger" type="submit">Xóa</button>
                </td>
            </tr>

        </tbody>
        </form>
        @endforeach
        @endisset

   </table>

   <h3>Nhân Viên</h3>
   <table class="table table-striped table-bordered">
    <thead >
        <tr>
            <th>ID</th>
            <th>FULLNAME</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>PHONE</th>
            <th>ADDRESS</th>
            <th>ACTION</th>
        </tr>
        </thead>
        @isset($staff)
        @foreach($staff as $nhanvien)
        <form action="{{route('nhanvien.destroy', $nhanvien->id)}}" method="post">
            @csrf
            @method('delete')
        <tbody>
            <tr>
                <td >{{$nhanvien->id}}</td>
                <td>{{$nhanvien->full_name}}</td>
                <td>{{$nhanvien->email}}</td>
                <td>*****</td>
                <td>{{$nhanvien->phone}}</td>
                <td>{{$nhanvien->address}}</td>
                <td>
                    <button type="button" class="btn btn-success" onclick="window.location='{{ route('nhanvien.edit', $nhanvien->id)}}'">Update
					</button>

                </td>
            </tr>

        </tbody>
        </form>
        @endforeach
        @endisset
   </table>


</div>
<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>
@endsection

