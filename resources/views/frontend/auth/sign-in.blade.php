@extends('frontend.layouts.main')

@section('breadcrumb')
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li><a href="/">Home</a></li>
					<li class='active'>Login</li>
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
					<h4 class="">Sign in</h4>
					<p class="">Hello, Welcome to your account.</p>
					<div class="social-sign-in outer-top-xs">
						<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
						<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
					</div>
					<form action="{{route('login.store')}}" method="POST" class="register-form outer-top-xs" role="form">
						@csrf
						<div class="form-group">
								<label class="info-title" for="login_email">Email Address <span>*</span></label>
								<input type="email" class="form-control unicase-form-control text-input" id="login_email" name="email">
								@error('email')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
								@enderror
						</div>
						<div class="form-group">
								<label class="info-title" for="login_password">Password <span>*</span></label>
								<input type="password" class="form-control unicase-form-control text-input" id="login_password" name="password">
								@error('password')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
								@enderror
						</div>
						<a href="{{route('password.request')}}" class="forgot-password pull-right">Forgot your Password?</a>
						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
					</form>
			</div>
			<!-- Sign-in -->
			<!-- create a new account -->
			<div class="col-md-6 col-sm-6 create-new-account">
					<h4 class="checkout-subtitle">Create a new account</h4>
					<p class="text title-tag-line">Create your new account.</p>
					<form action="{{route('register.store')}}" method="POST" class="register-form outer-top-xs" role="form">
						@csrf
						<div class="form-group">
								<label class="info-title" for="email">Email Address <span>*</span></label>
								<input type="email" class="form-control unicase-form-control text-input" id="email" name="email" value="{{old('email')}}">
								@error('email')
										<span class="invalid-feedback" role="alert">{{$message}}</span>
								@enderror
						</div>
						<div class="form-group">
								<label class="info-title" for="name">Name <span>*</span></label>
								<input type="text" class="form-control unicase-form-control text-input" id="name" name="name" value="{{old('name')}}">
								@error('name')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
								@enderror
						</div>
						<div class="form-group">
								<label class="info-title" for="password">Password <span>*</span></label>
								<input type="password" class="form-control unicase-form-control text-input" id="password" name="password">
								@error('password')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
								@enderror
						</div>
						<div class="form-group">
								<label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
								<input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation">
								@error('password_confirmation')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
								@enderror
						</div>
						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
					</form>
			</div>
			<!-- create a new account -->			
		</div>
		<!-- /.row -->
	</div>
@endsection
<!-- /.sigin-in-->