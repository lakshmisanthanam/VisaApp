<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>VisaApp</title>

<!-- Fonts -->
<link
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"
	rel='stylesheet' type='text/css'>
<link
	href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"
	rel='stylesheet' type='text/css'>

<!-- Styles -->
<!--     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
<!--     {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}} -->
<link href="/css/AppLayout.css" rel='stylesheet' type='text/css'>

</head>
<body>
	<div id="app-layout">
		<div id="header">
			<img alt="Appnovation Technologies" src="/images/logo.svg" class="logo-img">
			<span class="header-txt">VisaApp</span>
		</div>
		<div id="container">
			<div id="navbar">
				
				@if (Auth::guest())
					<ul class="nav-menu-list">
						<li><a href="{{ url('/login') }}">Login</a></li>
						<li><a href="{{ url('/register') }}">Register</a></li>
					</ul>
				@else
					<ul class="nav-menu-list">
						<li><a href="{{ url('/logout') }}">My Account</a></li>
						<li><a href="{{ url('/dependentsInfo') }}">Dependents</a></li>
						<li><a href="{{ url('/visaInfo') }}">Visa Info</a></li>
						<li><a href="{{ url('/visaDocuments') }}">Digital Docs</a></li>
						<li><a href="{{ url('/help') }}">Help</a></li>
						<li><a href="{{ url('/logout') }}">Logout</a></li>
					</ul>
				@endif
				
			</div>
			<div id="content">
				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>
