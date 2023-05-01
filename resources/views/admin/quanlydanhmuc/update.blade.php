@extends('admin.master')


@section('content')


<div class="page-wrapper">
   <h1 style="text-align:center">Thêm Mới Danh mục</h1>
    @if(Session('successthanhcong'))
        <div class="aler alert-success" >
            {{Session('successthanhcong')}}
        </div>
    @endif
   <form action="{{route('danhmucsanpham.update', $product_type->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name ="name" class="form-control" id="exampleFormControlInput1" placeholder="tên danh mục" required value="{{$product_type->name}}">
        </div>
        @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        <div class="form-group">
          <label for="">Description</label>
          <textarea class="form-control" name="desscription" id="" rows="3" placeholder="ghi chú" value = "{{ $product_type->description }}"></textarea>
        </div>

        <button type="submit" class="btn btn-outline-primary">Update</button>
    </form>
</div>
@endsection
