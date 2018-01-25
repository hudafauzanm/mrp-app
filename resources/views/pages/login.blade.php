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
		
		<style>
			body {
			    -moz-transform: scale(0.90, 0.90); /* Moz-browsers */
			    zoom: 0.90; /* Other non-webkit browsers */
			    zoom: 90%; /* Webkit browsers */
			}
		</style>

	</head>
	<!--
		.boxed = boxed version
	-->
	<body style="height: 100%">

		<div style="background-image: url(/assets/images/img_login1.jpg); background-size: cover; height: 100%;">
			<div class="row" style="height: 100%">
				<div class="col-md-10" style="height: 100%; width: 75%;">
					
					<div class="boxed" style="width: 650px; height:100% ;background-color:white ;opacity: 0.4 ;position: fixed;" ></div>
					<div class="login-box" style="max-width: 450px; margin-top:7.5%; margin-left:7.5%; position: relative;">
						{{-- <div class="login-box"> --}}
							<div style="margin-left: 55px; ">
								<h1>
									<img src="/assets/images/icon.png">
									<span style="color: black ;"> PT. PLN (PERSERO)</span>
								</h1>
							</div>
							<!-- login form -->
							<form action="" method="post" class="sky-form boxed">
								{{ csrf_field() }}
								<header style="color: #478FCA; text-align: center;"><strong>MRP-APP</strong></header>
								
								@if (session('error'))
									<div class="alert alert-danger noborder text-center weight-400 nomargin noradius">
										{{ session('error') }}
									</div>
								@endif

								<fieldset>	
								
									<section>
										<label class="label"><strong>Username</strong></label>
										<label class="input">
											<i class="icon-append fa fa-user"></i>
											<input type="text" name="username" required="" {{-- style="text-transform: uppercase" --}}>
											<span class="tooltip tooltip-top-right">Username</span>
										</label>
									</section>
									
									<section>
										<label class="label"><strong>Password</strong></label>
										<label class="input">
											<i class="icon-append fa fa-lock"></i>
											<input type="password" name="password" required="">
											<b class="tooltip tooltip-top-right">Password</b>
										</label>
									</section>

									<section>
										<label class="label"><strong>NIP</strong></label>
										<label class="input">
											<i class="icon-append fa fa-user"></i>
											<input type="text" name="nip" required="" {{-- style="text-transform: uppercase" --}}>
											<span class="tooltip tooltip-top-right">Masukkan NIP Anda</span>
										</label>
									</section>

									<section>
										<button type="submit" class="btn btn-aqua btn-lg" style="width: 87.5%;">Sign In</button>
									</section>

								</fieldset>

								{{-- <footer>
									<button type="submit" class="btn btn-aqua btn-lg" style="width: 87.5%;">Sign In</button>
								</footer> --}}
							</form>
							<!-- /login form -->

						{{-- </div> --}}
					</div>
				</div>
				</div>
			</div>		
		</div>
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
	</body>
</html>