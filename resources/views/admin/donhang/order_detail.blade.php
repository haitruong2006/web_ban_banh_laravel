@extends('admin.master')
@section('content')

<div class="page-wrapper">

    @if(Session('capnhapthanhcong'))
        <div class="alert alert-success">
            {{Session('capnhapthanhcong')}}
        </div>
    @endif

   <h1 style="text-align:center">Chi Tiết Đơn Hàng</h1>
   <h3>Thông tin khách hàng đặt</h3>
   <table class="table table-striped table-bordered">
    <thead >
        <tr>
            <th>ID</th>
            <th>FULLNAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>ADDRESS</th>

        </tr>
        </thead>
        @isset($bill)


        <tbody>
            <tr>
                <td>{{$bill->id_customer}}</td>
                <td>{{$bill->users->full_name}}</td>
                <td>{{$bill->users->email}}</td>
                <td>{{$bill->users->phone}}</td>
                <td>{{$bill->users->address}}</td>
            </tr>
        </tbody>
        </form>

        @endisset

   </table>
   <h3>Thông tin đơn hàng</h3>
   <table class="table table-striped table-bordered">
    <thead >
        <tr>
            <th>NAME_receive</th>
            <th>ADDRESS</th>
            <th>PHONE</th>
            <th>DATE</th>
            <th>TOTAL</th>
            <th>PAYMENT</th>


        </tr>
        </thead>
        @isset($bill)
        <tbody>
            <tr>
                <td>{{$bill->name}}</td>
                <td>{{$bill->address}}</td>
                <td>{{$bill->phone}}</td>
                <td>{{$bill->date_order}}</td>
                <td>{{number_format($bill->total)}}</td>
                <td>{{$bill->payment}}</td>
            </tr>
        </tbody>
        </form>

        @endisset

   </table>
   <h3>Thông tin sản phẩm</h3>
   <table class="table table-striped table-bordered">
    <thead >
        <tr>
            <th>STT</th>
            <th>ID_PRODUCT</th>
            <th>NAME</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <th>TỔNG</th>
            <th>IMAGE</th>
        </tr>
        </thead>

        @isset($bill_details)
        @foreach($bill_details as $chitiet)
        <tbody>
            <tr>
                <td>1</td>
                <td>{{$chitiet->product->id}}</td>
                <td>{{$chitiet->product->name}}</td>
                <td>{{$chitiet->quantity}}</td>
                <td>{{number_format($chitiet->unit_price)}}</td>
                <td>{{number_format($chitiet->unit_price*$chitiet->quantity)}}</td>
                <td>
                    <img width="100px" src="/product/{{$chitiet->product->image}}">
                </td>
            </tr>
        </tbody>
        </form>
        @endforeach
        @endisset

   </table>

   <h3>Tình trạng đơn hàng</h3>
   <form action="{{ route('donhang.updatestatus', $bill->id)}}" method="post" role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <table class="table ">
                <tr>
                    <th><a style="display: {{$bill->status == 2 || $bill->status == 3?'none':''}}"><input type="radio" name="status" value="1"{{$bill->status == 1?'checked':''}}> Chờ giao hàng</a></th>

                </tr>
                <tr>
                    <th><a style="display: {{$bill->status==3?'none':''}}"><input type="radio" name="status" value="2"{{$bill->status == 2?'checked':''}}> Đang giao hàng</a></th>
                </tr>
                <tr>
                    <th><a style="display: {{$bill->status == 1?'none':''}}"><input type="radio" name="status" value="3"{{$bill->status == 3?'checked':''}}> Đã giao hàng</a></th>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
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
