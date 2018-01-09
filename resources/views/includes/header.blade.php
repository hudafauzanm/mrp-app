<header id="header">
	<!-- Mobile Button -->
	<button id="mobileMenuBtn"></button>

	<!-- Logo -->
	<span class="logo pull-left">
		<img src="assets/images/logo-header.png" alt="admin panel" height="35" />
	</span>

	<form method="get" action="page-search.html" class="search pull-left hidden-xs">
		<input type="text" class="form-control" name="k" placeholder="Search for something..." />
	</form>

	<nav>

		<!-- OPTIONS LIST -->
		<ul class="nav pull-right">
			<li class="dropdown pull-left">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="fa fa-bell-o" style="margin-top: 15px; font-size: 150%; "></i>
					<span>7</span>
					{{-- <img class="user-avatar" alt="" src="assets/images/noavatar.png" height="34" /> 
					<span class="user-name">
						<span class="hidden-xs">
							{{ auth()->user()->nama_pendek }} <i class="fa fa-angle-down"></i>
						</span>
					</span> --}}
				</a>
				<ul class="dropdown-menu hold-on-click" style="max-height: 250px; overflow-y: scroll;">
					<li><!-- my calendar -->
						<a href="calendar.html"><i class="fa fa-calendar"></i> Permintaan rotasi baru dari unit OPAIDSOAJFSN</a>
					</li>
					<li><!-- my inbox -->
						<a href="#"><i class="fa fa-envelope"></i> Inbox
							<span class="pull-right label label-default">0</span>
						</a>
					</li>
					<li><!-- settings -->
						<a href="page-user-profile.html"><i class="fa fa-cogs"></i> Settings</a>
					</li>

					<li class="divider"></li>

					<li><!-- lockscreen -->
						<a href="page-lock.html"><i class="fa fa-lock"></i> Lock Screen</a>
					</li>
					<li><!-- logout -->
						<a href="page-login.html"><i class="fa fa-power-off"></i> Log Out</a>
					</li>
					

					<li><!-- my calendar -->
						<a href="calendar.html"><i class="fa fa-calendar"></i> Calendar</a>
					</li>
					<li><!-- my inbox -->
						<a href="#"><i class="fa fa-envelope"></i> Inbox
							<span class="pull-right label label-default">0</span>
						</a>
					</li>
					<li><!-- settings -->
						<a href="page-user-profile.html"><i class="fa fa-cogs"></i> Settings</a>
					</li>

					<li class="divider"></li>

					<li><!-- lockscreen -->
						<a href="page-lock.html"><i class="fa fa-lock"></i> Lock Screen</a>
					</li>
					<li><!-- logout -->
						<a href="page-login.html"><i class="fa fa-power-off"></i> Log Out</a>
					</li>

					<li><!-- my calendar -->
						<a href="calendar.html"><i class="fa fa-calendar"></i> Calendar</a>
					</li>
					<li><!-- my inbox -->
						<a href="#"><i class="fa fa-envelope"></i> Inbox
							<span class="pull-right label label-default">0</span>
						</a>
					</li>
					<li><!-- settings -->
						<a href="page-user-profile.html"><i class="fa fa-cogs"></i> Settings</a>
					</li>

					<li class="divider"></li>

					<li><!-- lockscreen -->
						<a href="page-lock.html"><i class="fa fa-lock"></i> Lock Screen</a>
					</li>
					<li><!-- logout -->
						<a href="page-login.html"><i class="fa fa-power-off"></i> Log Out</a>
					</li>
					<li><!-- logout -->
						<a href="page-login.html"><i class="fa fa-power-off"></i> Log Out</a>
					</li>
				</ul>
			</li>


			<!-- USER OPTIONS -->
			<li class="dropdown pull-left">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img class="user-avatar" alt="" src="assets/images/noavatar.png" height="34" /> 
					<span class="user-name">
						<span class="hidden-xs">
							{{ auth()->user()->nama_pendek }} <i class="fa fa-angle-down"></i>
						</span>
					</span>
				</a>
				<ul class="dropdown-menu hold-on-click">
					<li><!-- my calendar -->
						<a href="calendar.html"><i class="fa fa-calendar"></i> Calendar</a>
					</li>
					<li><!-- my inbox -->
						<a href="#"><i class="fa fa-envelope"></i> Inbox
							<span class="pull-right label label-default">0</span>
						</a>
					</li>
					<li><!-- settings -->
						<a href="page-user-profile.html"><i class="fa fa-cogs"></i> Settings</a>
					</li>

					<li class="divider"></li>

					<li><!-- lockscreen -->
						<a href="page-lock.html"><i class="fa fa-lock"></i> Lock Screen</a>
					</li>
					<li><!-- logout -->
						<a href="page-login.html"><i class="fa fa-power-off"></i> Log Out</a>
					</li>
				</ul>
			</li>
			<!-- /USER OPTIONS -->

		</ul>
		<!-- /OPTIONS LIST -->

	</nav>

</header>