@extends('layout.master');

@section('content')
<div class="container">
		<div id="content">

			<form action="{{ route('login') }}" method="post" class="beta-form-checkout">
                @csrf
				<div class="row">
					<div class="col-sm-3"></div>
                    @if(Session('thanhcong'))
                        <div class="alert alert-success"> {{Session('thanhcong')}} </div>

                    @endif


					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>


						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email" required>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="text" id="phone"  name="password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div>
@endsection
