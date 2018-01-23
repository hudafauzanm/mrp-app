<?php 
use Carbon\Carbon;

?>
<!doctype html>
<html lang="en-US">
	<head>
		<title>Detail Permintaan Mutasi | MRP-App</title>

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="/assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />

	</head>

	<body>


		<!-- WRAPPER -->
		<div id="wrapper">

			<div class="padding-20">

				<div class="panel panel-default">
				
					<div class="panel-body">

						<div class="row">
							<div class="col-md-6 col-xs-6 text-right">
								<h4>Registry<strong> Number</strong></h4>
								<ul class="list-unstyled ">
									<li><strong>{{$detail->registry_number}}</strong></li>
								</ul>
							</div>
							<div class="col-md-6 col-xs-6 text-left">
								<h4><strong>Nomor</strong> Nota Dinas</h4>
								<ul class="list-unstyled ">
									<li><strong>{{$detail->no_dokumen_unit_asal}}</strong></li>
								</ul>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table table-condensed nomargin">
								<thead>
									<tr>
										<th width="12%">Detail Pegawai</th>
										<th width="12%">Detail Mutasi</th>
										<th width="30%">Proyeksi Jabatan</th>
										<th width="30%">Jabatan Saat Ini</th>
										<th width="8%">Masa Kerja</th>
										<th width="8%">Sisa Masa Kerja</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										
										<td>
											<ul class="list-unstyled">
												<li><strong>NIP:</strong> {{$detail->pegawai->nip}}</li>
												<li><strong>Nama:</strong> {{$detail->pegawai->nama_pegawai}}</li>
												<li><strong>Grade:</strong> {{$detail->pegawai->ps_group}}</li>
											</ul>
										</td>
										<td>
											<ul class="list-unstyled">
												<li><strong>Tanggal Aktifasi:</strong> {{ $detail->tgl_pooling}}</li>
												<li><strong>Jenis Mutasi:</strong> {{ $detail->jenis_mutasi}}</li>
												<li><strong>Mutasi:</strong> {{ $detail->mutasi }}</li>
												<li><strong>Jalur Mutasi:</strong> {{ $detail->jalur_mutasi}}</li>
											</ul>
										</td>
										<td>
											@if(isset($detail->formasi_jabatan))
											<div><strong>{{$detail->formasi_jabatan->formasi}} {{$detail->formasi_jabatan->jabatan}}</strong></div>
											<small>{{$detail->formasi_jabatan->posisi}}</small>
											@else
												Perlu saran
											@endif
										</td>
										<td>
											<div><strong>{{$detail->pegawai->formasi_jabatan->formasi}} {{$detail->pegawai->formasi_jabatan->jabatan}}</strong></div>
											<small>{{$detail->pegawai->formasi_jabatan->posisi}}</small>
										</td>

										<td>{{$detail->pegawai->time_diff(Carbon::parse($detail->pegawai->start_date), Carbon::now('Asia/Jakarta'))}}</td>
										<td>{{$detail->pegawai->time_diff(Carbon::now('Asia/Jakarta'), Carbon::parse($detail->pegawai->end_date))}}</td>
										
									</tr>
								</tbody>
							</table>
						</div>

						<hr class="nomargin-top" />

						<div class="row">

							<div class="col-md-6">
								<h4><strong>Unit</strong> Peminta</h4>
								<address>
									<strong>{{$detail->pegawai->formasi_jabatan->personnel_area->nama}}<br>{{$detail->pegawai->formasi_jabatan->personnel_area->direktorat->nama}}</strong><!-- <br>
									Jalan Trunojoyo Blok M – I No 135<br>
									Kebayoran Baru, Jakarta 12160, Indonesia<br>
									Telp : 021 – 7251234, 7261122<br>
									fax : 021 – 7221330 -->
								</address>

							</div>
							@if (session('success'))
								<div class="col-md-6 text-right">
									<a href="/dashboard" class="btn btn-lg btn-primary btn-3d">
										<i class="fa fa-home"></i>
										Kembali Ke Beranda
									</a>
								</div>
							@endif

						</div>

					</div>
				
				</div>

			</div>
		</div>
		<!-- /WRAPPER -->



	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '/assets/plugins/';</script>
		<script type="text/javascript" src="/assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/app.js"></script>

		<script type="text/javascript">
			// window.print();
		</script>

		@include('includes.notifications')

	</body>
</html>