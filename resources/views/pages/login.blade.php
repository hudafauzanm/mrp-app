<!doctype html>
<html lang="en-US" style="height: 100%">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Login MRP App</title>

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />

	</head>
	<!--
		.boxed = boxed version
	-->
	<body>

		<div class="login-box">

			<!-- login form -->
			<form action="" method="post" class="sky-form boxed">
				{{ csrf_field() }}
				<header><i class="fa fa-users"></i> Login</header>
				
				@if (session('error'))
					<div class="alert alert-danger noborder text-center weight-400 nomargin noradius">
						Username/password salah!
					</div>
				@endif

				<fieldset>	
				
					<section>
						<label class="label">Username</label>
						<label class="input">
							<i class="icon-append fa fa-user"></i>
							<input type="text" name="username">
							<span class="tooltip tooltip-top-right">Username</span>
						</label>
					</section>
					
					<section>
						<label class="label">Password</label>
						<label class="input">
							<i class="icon-append fa fa-lock"></i>
							<input type="password" name="password">
							<b class="tooltip tooltip-top-right">Password</b>
						</label>
					</section>

					<section>
						<label class="label">NIP</label>
						<label class="input">
							<i class="icon-append fa fa-user"></i>
							<input type="text" name="nip">
							<span class="tooltip tooltip-top-right">Masukkan NIP Anda</span>
						</label>
					</section>

				</fieldset>

				<footer>
					<button type="submit" class="btn btn-primary pull-right">Sign In</button>
				</footer>
			</form>
			<!-- /login form -->

		</div>

		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
	</body>
</html>