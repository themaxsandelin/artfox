@extends('master')

@section('contentNav')
	<h2 class="pageTitle">Login</h2>
	<div class="navSpace"></div>
@endsection

@section('body')
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="wrapper">
		<form class="loginForm" role="form" method="POST" action="{{ url('/auth/login') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="centerLogin loginFormItem">
				<input type="email" class="productFormItem productInput productFormHalfItem rightEdge" name="email" value="{{ old('email') }}" placeholder="Email">
				<input type="password" class="productFormItem productInput productFormHalfItem" name="password" placeholder="Password">
			</div>
			<div class="loginFormItem rememberItem">
				<input type="checkbox" name="remember" id="remember"><label for="remember">Remember Me</label>
			</div>
			<div class="loginFormItem">
				<button type="submit" class="btn btn-primary" id="hiddenLogin" hidden>Login</button>
			</div>
			<!--<div class="loginFormItem">
				<p>
					<a href="{{ url('/password/email') }}">
						<span>Forgot your password?</span>
					</a>
				</p>
			</div>-->
		</form>
	</div>
</div>
<div class="buttonsBar">
	<a href="{{ URL::previous() }}">
		<div class="button greyButton rightEdge">Cancel</div>
	</a>
	<div class="button greenButton" id="login">Login</div>
</div>
@endsection
