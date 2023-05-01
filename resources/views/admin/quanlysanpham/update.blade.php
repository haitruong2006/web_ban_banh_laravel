@extends('admin.master')


@section('content')


<div class="page-wrapper">
   <h1 style="text-align:center">Thêm Mới Sản Phẩm</h1>
    @if(Session('successthanhcong'))
        <div class="aler alert-success" >
            {{Session('successthanhcong')}}
        </div>
    @endif

   <form action="{{route('sanpham.getaddsp')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name ="name" class="form-control" id="exampleFormControlInput1" placeholder="tên sản phẩm" required>
        </div>
        @if(Session('successtrungten'))
            <div class="aler alert-danger" >
                {{Session('successtrungten')}}
            </div>
        @endif
        <div class="form-group">
            <label for="exampleFormControlSelect1">Type_product</label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_type">
                @isset($type_products)
                @foreach($type_products as $loai)
                <option value="{{$loai->id}}">{{$loai->name}}</option>

                @endforeach
                @endisset
            </select>
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <textarea class="form-control" name="desscription" id="" rows="3" placeholder="ghi chú"></textarea>
        </div>
        <div class="form-group">
          <label for="">Unit_price</label>
          <input type="number"
            class="form-control" name="unit_price" id="" aria-describedby="helpId" placeholder="giá gốc" required min=0>

        </div>
        @if(Session('success'))
            <div class="alert alert-danger">
                {{Session('success')}}
            </div>
        @endif
        <div class="form-group">
          <label for="">Promotion_price</label>
          <input type="number"
            class="form-control" name="promotion_price" id="" aria-describedby="helpId" placeholder="giá giảm" min=0>

        </div>
        <div class="form-group">
          <label for="">Image</label>

          <input type="file" name="image_file" id="" class="form-control" placeholder="" onchange="changeImage(event)" >
          <img id="image" class="img-thumnail" style="width: 150px;padding:5px"><br>

            <script type="text/javascript">
                const changeImage=(e)=>{
                    const img=document.getElementById('image');
                    const file=e.target.files[0]
                    img.src=URL.createObjectURL(file);
                }
            </script>
        </div>
        @error('image_file')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleFormControlSelect1">Unit</label>
            <select class="form-control" id="exampleFormControlSelect1" name="unit">
                <option value="hộp">Hộp</option>
                <option value="cái">Cái</option>
            </select>
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
