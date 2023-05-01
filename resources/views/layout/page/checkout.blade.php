@extends('layout.master')

@section('content')
@if(Auth::check())
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">

            <div class="form-block">
                <label for="name">Mã giảm giá</label>
                <form action="{{ route('cake.magiamgia') }}" method="post">
                        @csrf
                    <input type="text" name="coupon_code" value="" placeholder="mã giảm giá">
                    <button class="beta-btn primary" href="#">ÁP dụng  <i class="fa fa-chevron-right"></i></button>


                </form>
			</div>
			<form action="{{ route('postdathang') }}" method="post" class="beta-form-checkout">
                @csrf
				<div class="row">
					<div class="col-sm-6">

						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" name ="name" id="name" placeholder="Họ tên" value="{{ Auth::user()->full_name }}" required>
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>

						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" name="email"  id="email" required placeholder="expample@gmail.com" value="{{ Auth::user()->email }}">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" name="address" id="adress" placeholder="Street Address" required value="{{ Auth::user()->address }}">
						</div>


						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" name="phone_number"  id="phone" required value="{{ Auth::user()->phone }}">
						</div>
                        @error('phone_number')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="note"></textarea>
						</div>
<!-- </form> -->

                        <!-- <div class="form-block">
							<label for="adress">Mã giảm giá</label>
							<form action="" method="post">
                                @csrf
                                <input type="text" name="coupon_code" value="" placeholder="mã giảm giá">
                                <button   type="submit" class="beta-btn primary" name="apply_coupon">Áp dụng <i class="fa fa-chevron-right"></i></button>
                            </form>
                            @if(Session('value_price'))
                        <div class="cart-totals-row"><span>Shipping:</span> <span>{{ number_format(Session('value_price')) }}</span></div>
                    @endif
						</div> -->

					</div>
                    <!-- <form action="{{ route('postdathang') }}" method="post" class="beta-form-checkout"> -->
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
                                    @if(Session::has('cart'))
                                    @foreach($product_cart as $product)
										<div class="media">
											<img width="25%" src="/product/{{ $product['item']['image']  }}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{ $product['item']['name'] }}</p>
                                                @if($product['item']['promotion_price'] > 0)
												<span class="color-gray your-order-info">Giá: {{ number_format($product['item']['promotion_price']) }}</span>
                                                @else
                                                <span class="color-gray your-order-info">Giá: {{ number_format($product['item']['unit_price']) }}</span>
                                                @endif
												<span class="color-gray your-order-info">Qty: {{ $product['qty'] }}</span>
											</div>
										</div>
                                    @endforeach
                                    @endif
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}}@endif</h5></div>

                                    <div class="clearfix"></div>
								</div>
                                <div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Giám giá:</p></div>
									<div class="pull-right"><h5 class="color-black">{{ Session('valuegiamgia')!=' '?number_format(Session('valuegiamgia')):0 }}</h5></div>

                                    <div class="clearfix"></div>
								</div>
                                <div class="your-order-item">
                                 <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{ Session('valuegiamgia')!=' '?number_format($totalPrice - Session('valuegiamgia')):$totalPrice }}</h5></div>

                                    <div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>
									</li>

								</ul>
							</div>

							<div class="text-center"><button class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

    @else
      <script>window.location.href= '/login'</script>

    @endif

@endsection
<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>
