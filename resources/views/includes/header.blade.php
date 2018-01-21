<header id="header">
	<!-- Mobile Button -->
	<button id="mobileMenuBtn"></button>

	<!-- Logo -->
	<span class="logo pull-left">
		<img src="/assets/images/logo-header.png" alt="admin panel" height="35" />
	</span>

	<nav>

		<!-- OPTIONS LIST -->
		<ul class="nav pull-right">
			<li class="dropdown pull-left">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				<i class="fa fa-bell" style="margin-top: 12px; font-size: 150%; "></i>
				<span>7</span>
			</a>
			<ul class="dropdown-menu notify-drop">
            	<div class="notify-drop-title">
            		<div class="row">
            			<div class="col-md-6 col-sm-6 col-xs-6">Belum Dibaca (<b>2</b>)</div>
            			<div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="Tandai telah dibaca semua"><i class="fa fa-check"></i></a></div>
            		</div>
            	</div>
	            <!-- end notify title -->
	            <!-- notify content -->
	            <div class="drop-content">
	            	<li>
	            		<div class="col-md-3 col-sm-3 col-xs-3">
	            			<div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div>
	            		</div>
	            		<div class="col-md-7 col-sm-7 col-xs-7 pd-l0">
	            			<a href="" style="padding-left: 0">Permintaan mutasi baru - Rotasi 5115100006</a>
	            			<br>
		            		<p class="time">baru saja</p>
	            		</div>
	            		<div class="col-md-2 col-sm-2 col-xs-2">
	            			<a href="" title="Tandai sudah dibaca"><i class="fa fa-dot-circle-o"></i></a></a>
	            		</div>
	            	</li>
	            	<li>
	            		<div class="col-md-3 col-sm-3 col-xs-3">
	            			<div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div>
	            		</div>
	            		<div class="col-md-7 col-sm-7 col-xs-7 pd-l0">
	            			<a href="" style="padding-left: 0">Permintaan mutasi baru - Rotasi 5115100006</a>
	            			<br>
		            		<p class="time">baru saja</p>
	            		</div>
	            		<div class="col-md-2 col-sm-2 col-xs-2">
	            			<a href="" title="Tandai sudah dibaca"><i class="fa fa-dot-circle-o"></i></a></a>
	            		</div>
	            	</li>
	            	<li>
	            		<div class="col-md-3 col-sm-3 col-xs-3">
	            			<div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div>
	            		</div>
	            		<div class="col-md-7 col-sm-7 col-xs-7 pd-l0">
	            			<a href="" style="padding-left: 0">Permintaan mutasi baru - Rotasi 5115100006</a>
	            			<br>
		            		<p class="time">baru saja</p>
	            		</div>
	            		<div class="col-md-2 col-sm-2 col-xs-2">
	            			<a href="" title="Tandai sudah dibaca"><i class="fa fa-dot-circle-o"></i></a></a>
	            		</div>
	            	</li>
	            	<li>
	            		<div class="col-md-3 col-sm-3 col-xs-3">
	            			<div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div>
	            		</div>
	            		<div class="col-md-7 col-sm-7 col-xs-7 pd-l0">
	            			<a href="" style="padding-left: 0">Permintaan mutasi baru - Rotasi 5115100006</a>
	            			<br>
		            		<p class="time">baru saja</p>
	            		</div>
	            		<div class="col-md-2 col-sm-2 col-xs-2">
	            			<a href="" title="Tandai sudah dibaca"><i class="fa fa-dot-circle-o"></i></a></a>
	            		</div>
	            	</li>
	            	<li>
	            		<div class="col-md-3 col-sm-3 col-xs-3">
	            			<div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div>
	            		</div>
	            		<div class="col-md-7 col-sm-7 col-xs-7 pd-l0">
	            			<a href="" style="padding-left: 0">Permintaan mutasi baru - Rotasi 5115100006</a>
	            			<br>
		            		<p class="time">baru saja</p>
	            		</div>
	            		<div class="col-md-2 col-sm-2 col-xs-2">
	            			<a href="" title="Tandai sudah dibaca"><i class="fa fa-dot-circle-o"></i></a></a>
	            		</div>
	            	</li>
	            	<li>
	            		<div class="col-md-3 col-sm-3 col-xs-3">
	            			<div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div>
	            		</div>
	            		<div class="col-md-7 col-sm-7 col-xs-7 pd-l0">
	            			<a href="" style="padding-left: 0">Permintaan mutasi baru - Rotasi 5115100006</a>
	            			<br>
		            		<p class="time">baru saja</p>
	            		</div>
	            		<div class="col-md-2 col-sm-2 col-xs-2">
	            			<a href="" title="Tandai sudah dibaca"><i class="fa fa-dot-circle-o"></i></a></a>
	            		</div>
	            	</li>
	            </div>
	            <div class="notify-drop-footer text-center">
	            	<a href=""><i class="fa fa-eye"></i> Lihat semua notifikasi</a>
	            </div>
	          </ul>
	        </li>


			<!-- USER OPTIONS -->
			<li class="dropdown pull-left">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img class="user-avatar" alt="" src="/assets/images/noavatar.png" height="34" /> 
					<span class="user-name">
						<span class="hidden-xs">
							{{ auth()->user()->nama_pendek }} <i class="fa fa-angle-down"></i>
						</span>
					</span>
				</a>
				<ul class="dropdown-menu hold-on-click">
					@if (auth()->user()->user_role === 1)
						<li><!-- settings -->
							<a href="/profil"><i class="fa fa-cogs"></i> Edit Profil</a>
						</li>

						<li class="divider"></li>
					@endif
				
					<li><!-- logout -->
						<a href="/logout"><i class="fa fa-power-off"></i> Log Out</a>
					</li>
				</ul>
			</li>
			<!-- /USER OPTIONS -->

		</ul>
		<!-- /OPTIONS LIST -->

	</nav>

</header>