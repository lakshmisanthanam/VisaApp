<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>VisaApp</title>
<link href="/css/AppLayout.css" rel='stylesheet' type='text/css'>
</head>
<body>
	<nav class="navbar navbar-fixed-top">
	@if (Auth::guest())
		<a href="{{ url('/login') }}" class="NavPrimary-link">Login</a>
	@else 
		Welcome <span id="username-text">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name}}</span>
	@endif
	</nav>
	<div class="container">
		<header>
			<div class="Header-logo">
				<a href="/"> <img class="Header-logo-img" src="/images/logo.svg"
					alt="Appno Visa">
				</a>
			</div>
			<div class="header-text">Appno VISA</div>
		</header>
		<div id="content">
			<div id="container-content">
				<div id="container-nav">
					<div id="nav-col">
						@if (Auth::guest())
						<nav class="Header-navPrimry NavPrimary">
							<ul class="NavPrimary-items">
								<li class="NavPrimary-item"><a href="{{ url('/login') }}"
									class="NavPrimary-link">Login</a></li>
								<li class="NavPrimary-item"><a href="{{ url('/register') }}"
									class="NavPrimary-link">Register</a></li>
							</ul>
						</nav>
						@else
						<nav class="Header-navPrimry NavPrimary">
							<ul class="NavPrimary-items">
								<li class="NavPrimary-item"><a href="{{ url('/myAccount') }}"
									class="NavPrimary-link">My Account</a></li>
								<li class="NavPrimary-item"><a
									href="{{ url('/dependentsInfo') }}" class="NavPrimary-link">Dependents</a></li>
								<li class="NavPrimary-item"><a href="{{ url('/visaInfo') }}"
									class="NavPrimary-link">Visa Info</a></li>
								<li class="NavPrimary-item"><a
									href="{{ url('/listDigitalDocs') }}" class="NavPrimary-link">Digital
										Docs</a></li>
								<li class="NavPrimary-item"><a href="{{ url('/logout') }}"
									class="NavPrimary-link">Logout</a></li>
							</ul>
						</nav>
						@endif
					</div>
					<div id="content-col">
						<div class="content-data">
							@yield('content')
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">&copy; Appnovation Technologies</div>
	</div>

</body>
</html>
