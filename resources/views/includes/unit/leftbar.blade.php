<nav id="sideNav"><!-- MAIN MENU -->
	<ul class="nav nav-list">
		<li>
			<a class="dashboard" href="/dashboard"><!-- warning - url used by default by ajax (if eneabled) -->
				<i class="main-icon fa fa-home"></i> <span>Beranda</span>
			</a>
		</li>
	</ul>
	
	<h3>Form Mutasi</h3>
	<ul class="nav nav-list">
		<li>
			<a href="/mutasi/pengajuan?tipe=1">
				<i class="main-icon fa fa-plus-circle"></i> <span>Meminta Pegawai</span>
			</a>
		</li>
		<li>
			<a href="/mutasi/pengajuan?tipe=2">
				<i class="main-icon fa fa-user-plus"></i> <span>Bursa Pegawai</span>
			</a>
		</li>
		<li>
			<a href="/mutasi/pengajuan?tipe=3">
				<i class="main-icon fa fa-book"></i> <span>Bursa Jabatan</span>
			</a>
		</li>
	</ul>

	<h3>Status Proses Mutasi</h3>
	<ul class="nav nav-list">
		<li>
			<a href="#">
				<i class="fa fa-menu-arrow pull-right"></i>
				<i class="main-icon fa fa-arrow-circle-right"></i> <span>Mutasi Diajukan</span>
			</a>
			<ul>
				<li><a href="/status?act=minta"><span>Permintaan Pegawai</span></a></li>
				<li><a href="/status?act=req"><span>Pengajuan Pegawai</span></a></li>
				<li><a href="/status?act=reqjab"><span>Pengajuan Jabatan</span></a></li>
			</ul>
		</li>

		<li>
			<a href="#">
				<i class="fa fa-menu-arrow pull-right"></i>
				<i class="main-icon fa fa-arrow-circle-right"></i> <span>Mutasi Diterima</span>
			</a>
			<ul>
				<li><a href="/status?act=resminta"><span>Pegawai Diminta</span></a></li>
				<li><a href="/status?act=resjab"><span>Jabatan Diproyeksikan</span></a></li>
			</ul>
		</li>
	</ul>


</nav>