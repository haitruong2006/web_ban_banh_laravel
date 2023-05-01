@extends('admin.master')


@section('content')


<div class="page-wrapper">
   <h1 style="text-align:center">Thêm Mới Danh mục</h1>

   <form action="{{route('danhmucanpham.adddanhmuc')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name ="name" class="form-control" id="exampleFormControlInput1" placeholder="tên danh mục" required>
        </div>
        @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <div class="form-group">
          <label for="">Description</label>
          <textarea class="form-control" name="desscription" id="" rows="3" placeholder="ghi chú"></textarea>
        </div>

        <button type="submit" class="btn btn-outline-primary">Thêm mới</button>
    </form>
</div>
@endsection
<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>
