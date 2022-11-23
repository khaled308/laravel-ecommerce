@extends('frontend.layouts.main')

@section('breadcrumb')
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li><a href="/">Home</a></li>
					<li><a href="/login">Login</a></li>
					<li class='active'>Forget Password</li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div>
@endsection

@section('content')
	<div class="sign-in-page">
		<div class="row">
			<!-- Sign-in -->			
			<div class="col-md-6 col-sm-6 sign-in">
					<h4 class="">Forget Password</h4>
					<p class="">Hello, Reset Your Password.</p>
					<form action="{{route('password.email')}}" method="POST" class="register-form outer-top-xs" role="form">
						@csrf
						<div class="form-group">
								<label class="info-title" for="email">Email Address <span>*</span></label>
								<input type="email" class="form-control unicase-form-control text-input" id="email" name="email">
                @error('email')
                  <span class="invalid-feedback" role="alert">{{$message}}</span>
                @enderror
						</div>
						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
					</form>
			</div>
			<!-- Sign-in -->
			<!-- create a new account -->		
		</div>
		<!-- /.row -->
	</div>
@endsection
<!-- /.sigin-in-->