<nav id="sideNav"><!-- MAIN MENU -->
	<ul class="nav nav-list">
		<li><!-- dashboard -->
			<a class="dashboard" href="/dashboard"><!-- warning - url used by default by ajax (if eneabled) -->
				<i class="main-icon fa fa-dashboard"></i> <span>Monitoring & Evaluasi</span>
			</a>
		</li>
		<li>
			<a href="/mrp">
				<i class="main-icon fa fa-table"></i> <span>Tabel MRP</span>
			</a>
		</li>
		<li>
			<a href="/sk">
				<i class="main-icon fa fa-book"></i> <span>Daftar SK</span>
			</a>
		</li>
	</ul>

</nav>

@section('sdm_leftbar_scripts')
	<script>
		$("body").addClass('min');
		$("#mobileMenuBtn").addClass('active');
		$("#middle").css("margin-left", "0px")
	</script>
@append