@extends('layout.master');

@section('content')
<div class="container">
		<div id="content">

			<form action="" method="post" class="beta-form-checkout">
                @csrf
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>


						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required class="@error('email') is-invalid @enderror">
						</div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-block">
							<label for="email">Password*</label>
							<input type="password" id="password" name="password" required class="@error('password') is-invalid @enderror">
						</div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" id="your_last_name" name ="full_name" required class="@error('fullname') is-invalid @enderror">
						</div>
                        @error('fullname')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-block">
                            <label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>


						</div>
                        @error('fullname')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" id="adress" name ="address"  required class="@error('address') is-invalid @enderror">
						</div>
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="number" id="phone" name="phone" required class="@error('phone') is-invalid @enderror">
						</div>
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>
<!-- @if(Session::has('user_add'))
  <script>
     swal("Great Job!", "{!! Session::get('user_add') !!}", "success", {
        button:'ok',
     })
  </script>
@endif -->
