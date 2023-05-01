@extends('layout.master');

@section('content')
<div class="container">
		<div id="content">

			<form action="{{ route('cake.postLogin') }}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @csrf
				<div class="row">
					<div class="col-sm-3"></div>
                   @if(Session('success'))
                    <div class="alert alert-success"> {{Session('success')}} </div>

                   @endif
                    <div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>


						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email" required class="@error('email') is-invalid @enderror">
						</div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" id="phone"  name="password" required class="@error('password') is-invalid @enderror">
						</div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
                            <a href="/input-email" style="margin-top: 10px; margin-left: 140px">Quên mật khẩu??</a>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div>
@endsection
