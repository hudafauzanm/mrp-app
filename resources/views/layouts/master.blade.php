<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>@yield('title') | MRP App</title>

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		
		@section('includes-styles')
			<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
			
			<!-- THEME CSS -->
			<link href="/assets/css/essentials.css" rel="stylesheet" type="text/css" />
			<link href="/assets/css/layout.css" rel="stylesheet" type="text/css" />
			<link href="/assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />
			<!-- CORE CSS -->
		@show
	</head>
	<body>
		<!-- WRAPPER -->
		<div id="wrapper" class="clearfix">
			<aside id="aside">
				<!--
					Always open:
					<li class="active alays-open">

					LABELS:
						<span class="label label-danger pull-right">1</span>
						<span class="label label-default pull-right">1</span>
						<span class="label label-warning pull-right">1</span>
						<span class="label label-success pull-right">1</span>
						<span class="label label-info pull-right">1</span>
				-->
				@yield('leftbar')

				<span id="asidebg"><!-- aside fixed background --></span>
			</aside>
			<!-- /ASIDE -->


			<!-- HEADER -->
			@include('includes.header')
			<!-- /HEADER -->


			<!-- 
				MIDDLE 
			-->
			<section id="middle">
				@yield('content')
			</section>
			<!-- /MIDDLE -->

		</div>


		@section('includes-scripts')
			<!-- JAVASCRIPT FILES -->
			<script type="text/javascript">var plugin_path = '/assets/plugins/';</script>
			<script type="text/javascript" src="/assets/plugins/jquery/jquery-2.2.3.min.js"></script>
			<script type="text/javascript" src="/assets/js/app.js"></script>
		@show
		@include('includes.notifications')
	</body>
</html>