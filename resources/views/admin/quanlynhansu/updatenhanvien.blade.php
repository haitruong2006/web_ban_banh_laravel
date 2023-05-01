@extends('admin.master')

@section('content')
<div class="page-wrapper">
    <h1 style="text-align:center">Update custommer</h1>
    <form action="{{ route('nhanvien.update', $nhanvien->id)}}" method="post" role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fullname:</strong>
                    <input type="text" name ="full_name" value="{{$nhanvien->full_name}}" class="form-control" required>
                    @error('fullname')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>email:</strong>
                    <input type="email" name="email" class="form-control"  value="{{$nhanvien->email}}" class="form-control" required readonly = "true">

                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>password:</strong>
                    <input type="password" name="password" class="form-control" placeholder="password...." value="{{$nhanvien->password}}" class="form-control" placeholder="Description" required >

                    @error('password')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="number" name="phone" class="form-control" placeholder="" value="{{$nhanvien->phone}}" class="form-control" placeholder="phone...." required>

                    @error('phone')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>address:</strong>
                    <input type="text" name ="address" class="form-control" placeholder="" value="{{$nhanvien->address}}" class="form-control" placeholder="address...." required>

                    @error('address')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>



            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
@endsection
