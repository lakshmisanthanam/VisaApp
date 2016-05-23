@extends('layouts.app') @section('contentHeader') Login @endsection

@section('content')

<div class="form-data-div">
	<div class="table-container">
		<div class="table-container-data">
			<form class="visa-form" role="form" method="POST"
				action="{{ url('/login') }}">
				{!! csrf_field() !!} <label>E-Mail Address</label> <input
					type="text" name="email" value="{{ old('email') }}"> <label>Password</label>
				<input type="password" name="password"> <label>Remember Me</label> <input
					type="checkbox" name="remember"> <input type="submit"
					value="Login" class="button" /> <a class="btn btn-link"
					href="{{ url('/password/reset') }}">Forgot Your Password?</a>
			</form>
		</div>
	</div>
</div>


@endsection
